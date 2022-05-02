<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ExcursionTourRates;
use App\Models\PassengerCategories;
use App\Models\ExcursionTourCategories;
use Exception;
use Illuminate\Http\Request;

class ExcursionTourRateController extends Controller
{
    public function index(){
        

        $excursionTourRates =  ExcursionTourRates::where('deleted','=','0')->where('active','=','1')->get();

        foreach($excursionTourRates as $excusrionTourRate){

            $passenger_category_start = PassengerCategories::where('id','=',$excusrionTourRate['start_passenger_categories_id'])->first();
            $excusrionTourRate['passenger_start_name'] = $passenger_category_start['name'];    
        }

        foreach($excursionTourRates as $excusrionTourRate){

            $passenger_category_end = PassengerCategories::where('id','=',$excusrionTourRate['end_passenger_categories_id'])->first();
            $excusrionTourRate['passenger_end_name'] = $passenger_category_end['name'];    
        }

        foreach($excursionTourRates as $excusrionTourRate){

            $excursion_tour_category = ExcursionTourCategories::where('id','=',$excusrionTourRate['excursion_tour_categories_id'])->first();
            $excusrionTourRate['excursion_tour_name'] = $excursion_tour_category['name'];    
        }

        // dd($rates);
       return $excursionTourRates;
        
    }

    public function fetchPassengerCategories(){ 
        
        return PassengerCategories::all();
    }

    public function fetchExcursionTourCategories(){ 
        
        return ExcursionTourCategories::all();
    }


    public function store(Request $request){
        
        

        $request->validate([
            
            // 'rate' => ' required',
            // 'startPassengers' => 'required',
            // 'endPassengers' => 'requied',
            // 'excursionTourcategory' => 'required',
            
        ]);

        try{

            //dd($request->all());

                $excursionTourRates ['rate'] = $request->rate;
                $excursionTourRates ['start_passenger_categories_id'] = $request->startPassengers;
                $excursionTourRates ['end_passenger_categories_id'] = $request->endPassengers;
                $excursionTourRates ['excursion_tour_categories_id'] = $request->excursionTourCategory;

                $result = ExcursionTourRates::create($excursionTourRates);


                if ($result) {
                    return 1;
                } else {
                    return 0;
                }

            } catch (Exception $ex) {
                return $ex;
            }

    }


    public function update(Request $request){

        $request->validate([
            'id' => 'required',
            'rate' => ' required|regex:/^\d+(\.\d{1,2})?$/',
            //'active' => 'required',
        ]);

        try{

        $id = $request->id;
        $rate = $request->rate;
        $active = $request->active;

        // dd($request->all());

        $rate_save = ExcursionTourRates::where('id', $id)
                                ->update([
                                    'rate' => $rate,
                                    'active' => $active,
                                    ]);


        if($rate_save){
            return 1;
        }else{
            return 0;
        }

        }catch(Exception $e){
            return $e;
        }

    }




    public function destroy(Request $request){

        $request->validate([
            'id' => 'required'
        ]);

        try{

            $rate = ExcursionTourRates::find($request->id);

            $delete = ExcursionTourRates::where('id', $request->id)->update(['deleted' => '1']);

            if($delete){
                return 1;
            }else{
                return 0;
            }

        }catch(Exception $e){
            return $e;
        }

    }




}