<?php

namespace App\Http\Controllers\Admin;
use App\Models\ExcursionTours;
use App\Models\ExcursionTourCategories;
use App\Models\ExcursionTourRates;
use Exception;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ExcursionTourBackController extends Controller
{
    public function index()
    { 
        $tours = ExcursionTours::where('deleted', '=', '0')->get();

        foreach($tours as $tour){

            $excursion_tour_category = ExcursionTourCategories::where('id','=',$tour['excursion_tour_categories_id'])->first();
            $tour['excursion_tour_name'] = $excursion_tour_category['name'];    
            
            $excursion_tour_rate = ExcursionTourRates::where('id','=',$tour['excursion_tour_rates_id'])->first();
            $tour['excursion_tour_rate_value'] = $excursion_tour_rate['rate'];    
        }

        return $tours;

   
    }

    public function fetchExcursionTourCategories(){ 
        
        return ExcursionTourCategories::all();
    }

    public function fetchExcursionTourRates(){ 
        
        return ExcursionTourRates::all();
    }

    public function update(Request $request)
    {

        

        $request->validate([
            //'id' => 'required',
            // 'name' => 'required|min:5',
            //'email' => 'required|email|unique:users,email,'.$request->id
            // 'active' => 'required'
        ]);

        try {

            $id = $request->id;
            $status = $request->status;


            // dd($request->all());

            $tours_save = ExcursionTours::where('id', $id)
                ->update([
                    'status' => $status,
                ]);


            if ($tours_save) {
                return 1;
            } else {
                return 0;
            }
        } catch (Exception $e) {
            return $e;
        }
    }

    public function destroy(Request $request)
    {

        $request->validate([
            'id' => 'required'
        ]);

        try {
            $tour = ExcursionTours::find($request->id);
            $delete = ExcursionTours::where('id', $request->id)->update(['deleted' => 1]);
            error_log($delete);
            if ($delete) {
                return 1;
            } else {
                return 0;
            }
        } catch (Exception $e) {
            return $e;
        }
    }

}
