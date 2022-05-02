<?php

namespace app\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Rates;
use App\Models\TourCategories;
use App\Models\TourSubCategories;
use App\Models\PassengerCategories;
use App\Models\Place;
//use Resources\views\frontend\rates\oneway.blade.php;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class RatesController extends Controller
{
    public function index(){

        // $rates = Rates::all();{
        //     return oneway::make('oneway', compact('rates'));
        // }
        

        $rates =  Rates::where('deleted','=','0')->where('active','=','1')->get();

        // foreach($rates as $rate){

        //     $tour_category = TourCategories::where('id','=',$rate['tour_categories_id'])->first();
        //     $rate['tour_category_name'] = $tour_category['name'];
        //     //dd($rate);
        // }

        // foreach($rates as $rate){

        //     $tour_sub_category = TourSubCategories::where('id','=',$rate['tour_sub_categories_id'])->first();
        //     $rate['tour_sub_category_name'] = $tour_sub_category['name'];    
        // }

        // foreach($rates as $rate){

        //     $tour_category = TourSubCategories::where('id','=',$rate['tour_sub_categories_id'])->first();
        //     $rate['tour_category_name_type'] = $tour_category['tour_categories_id'];
        // }


        foreach($rates as $rate){

            $passenger_category = PassengerCategories::where('id','=',$rate['pasenger_categories_id'])->first();
            $rate['passenger_category_name'] = $passenger_category['name'];
        }

        foreach($rates as $rate){

            $place = Place::where('id','=',$rate['places_id_start'])->first();
            $rate['places_id_start'] = $place['name'];
        }

        foreach($rates as $rate){

            $place = Place::where('id','=',$rate['places_id_destination'])->first();
            $rate['places_id_destination'] = $place['name'];
        }

        //dd($rates);
       return $rates;
        
    }
    public function fetchTourCategories(){ 
        return TourCategories::all();
    }
    public function fetchTourSubCategories(){ 
        
        return TourSubCategories::all();
    }
    public function fetchPassengerCategories(){ 
        
        return PassengerCategories::all();
    }

    public function fetchPlaces(){ 
        
        return Place::all();
    }




    public function store(Request $request){
        
        

        $request->validate([
            
            'rate' => ' required',
            'passengerCategory' => 'required',
            'startplaces' => 'required',
            'endplaces' => 'required',
            
        ]);

        try{

            //dd($request->all());

                $rate ['rate'] = $request->rate;
                $rate ['pasenger_categories_id'] = $request->passengerCategory;
                $rate ['places_id_start'] = $request->startplaces;
                $rate ['places_id_destination'] = $request->endplaces;
                // $admin['image'] = $fileName;

                $result = Rates::create($rate);


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

        $rate_save = Rates::where('id', $id)
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

            $rate =Rates::find($request->id);

            $delete =Rates::where('id', $request->id)->update(['deleted' => '1']);

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

