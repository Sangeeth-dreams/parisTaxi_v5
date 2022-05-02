<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TourSubCategories;//
use App\Models\Rates;//
use App\Models\TourCategories;//
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class TourSubCategoriesController extends Controller
{
    public function index(){
        return TourSubCategories::where('deleted','=','0')->get();
    }
    public function cat_index(){ 
        $tour_categories = TourCategories::where('deleted','=', '0')->get(); 
        // dd($tour_categories);
        return $tour_categories;
    }



    public function store(Request $request){
        
        

        $request->validate([
            
            'name' => 'required',
            'tourCategory' => 'required',
            //'tour_categories_id' => 'required',
            
        ]);

        try{

            // dd($request->all());

                $tourSubCategories ['name'] = $request->name;
                $tourSubCategories ['tour_categories_id'] = $request->tourCategory;

                $result = TourSubCategories::create($tourSubCategories);


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
            'name' => 'required',
            //'active' => 'required',
        ]);

        try{

        $id = $request->id;
        $name = $request->name;
        $active = $request->active;

        // dd($request->all());

        $tourSubCategory_save = TourSubCategories::where('id', $id)
                                ->update([
                                    'name' => $name,
                                    'active' => $active,
                                    ]);


        if($tourSubCategory_save){
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

            $tourSubCategory =TourSubCategories::find($request->id);

            $delete = TourSubCategories::where('id', $request->id)->update(['deleted' => '1']);


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
