<?php

namespace app\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TourCategories; //
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TourController extends Controller
{
    public function index()
    {
        return TourCategories::where('deleted', '=', '0')->get();
    }



    public function store(Request $request)
    {

        //dd($request->all());

        $request->validate([

            'name' => 'required',
            // 'image' => 'required|string|image64:jpeg,jpg,png'
        ]);

        try {

            $tourCategories['name'] = $request->name;

            $result = TourCategories::create($tourCategories);


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

            $tourCategories_save = TourCategories::where('id', $id)
                ->update([
                    'name' => $name,
                    'active' => $active,
                ]);


            if ($tourCategories_save) {
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
            $tourCategory = TourCategories::find($request->id);
            $delete = TourCategories::where('id', $request->id)->update(['deleted' => 1]);
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
