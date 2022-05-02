<?php


namespace app\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\PassengerCategories;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class PassengerController extends Controller
{
    public function index(){
        return PassengerCategories::where('deleted','=','0')->get();
    }



    public function store(Request $request){
        
        //dd($request->all());

        $request->validate([
            
            'name' => 'required',
            'passenger_count' => 'required|integer',

        ]);

        try{
                $passengerCategories['name'] = $request->name;
                $passengerCategories['passenger_count'] = $request->passenger_count;

                $result = PassengerCategories::create($passengerCategories);


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
            'passenger_count' => 'required|integer|between:1,20',
            // 'active' => 'required'
        ]);

        try{

        $id = $request->id;
        $name = $request->name;
        $passenger_count = $request->passenger_count;
        $active = $request->active;

        $passengerCategories_save = PassengerCategories::where('id', $id)
                                ->update([
                                    //'email' => $email,
                                    'name' => $name,
                                    'passenger_count' => $passenger_count,
                                    'active' => $active,
                                    ]);


        if($passengerCategories_save){
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

            $passengerCategories = PassengerCategories::find($request->id);
              
            $delete = PassengerCategories::where('id', $request->id)->update(['deleted' => '1']);
          
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
