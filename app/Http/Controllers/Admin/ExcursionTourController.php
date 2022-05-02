<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ExcursionTourCategories; 
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;


class ExcursionTourController extends Controller
{
    public function index()
    {
        return ExcursionTourCategories::where('deleted', '=', '0')->get();
    }

    public function store(Request $request)
    {

        // dd($request->all());

        $request->validate([

            'name' => 'required',

        ]);

        try {

            $categories['name'] = $request->name;

            $result = ExcursionTourCategories::create($categories);


            if ($result) {
                return 1;
            } else {
                return 0;
            }
        } catch (Exception $ex) {
            return $ex;
        }
    }


    public function update(Request $request)
    {

        $request->validate([
            'id' => 'required',
            'name' => 'required',

        ]);

        try {

            $id = $request->id;
            $name = $request->name;
            $active = $request->active;


            // dd($request->all());

            $excursionTourCategories_save = ExcursionTourCategories::where('id', $id)
                ->update([
                    'name' => $name,
                    'active' => $active,
                ]);


            if ($excursionTourCategories_save) {
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
            $excursionTourCategory = ExcursionTourCategories::find($request->id);
            $delete = ExcursionTourCategories::where('id', $request->id)->update(['deleted' => 1]);
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

