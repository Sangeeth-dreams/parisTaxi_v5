<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tours;
use App\Models\Rates;
use Exception;
use Illuminate\Http\Request;

class ToursController extends Controller
{
    public function index()
    {
        $tours = Tours::where('deleted', '=', '0')->get();

        foreach($tours as $tour){

            $rate_value = Rates::where('id','=',$tour['rates_id'])->first();
            $tour['rate_name'] = $rate_value['rate']; 

        }

        return $tours;

    }

    public function fetchTours(){
        return Tours::all();
    }

    public function fetchRates(){
        return Rates::all();
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

            $tours_save = Tours::where('id', $id)
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
            $tour = Tours::find($request->id);
            $delete = Tours::where('id', $request->id)->update(['deleted' => 1]);
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
