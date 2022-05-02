<?php

namespace app\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Place;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PlacesController extends Controller
{
    public function index(){
        return Place::where('deleted','=','0')->get();
    }



    public function store(Request $request){
        
        //dd($request->all());

        $request->validate([
            
            'name' => 'required',
            'short_name' => 'required',
            // 'image' => 'required|string|image64:jpeg,jpg,png'
        ]);

        try{


                // $imageData = $request->image;
                // $data = substr($imageData, strpos($imageData, ',') + 1);
                // $data = base64_decode($data);
                // $fileName = Carbon::now()->timestamp . '_' . uniqid() . '.' . explode('/', explode(':', substr($imageData, 0, strpos($imageData, ';')))[1])[1];
                // Storage::disk('public')->put("/admins/".$fileName , $data);

                //give the variable name as it is in the database eg:- $place['name']    
                //$request->name this request name will be passed in Places.vue
                $place['name'] = $request->name;
                $place['short_name'] = $request->short_name;
                // $admin['image'] = $fileName;

                $result = Place::create($place);


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
            //'email' => 'required|email|unique:users,email,'.$request->id
            // 'active' => 'required'
        ]);

        try{

        $id = $request->id;
        $name = $request->name;
        $short_name=$request->short_name;
        $active = $request->active;

        

        $place_save = Place::where('id', $id)
                                ->update([
                                    //'email' => $email,
                                    'name' => $name,
                                    'short_name' => $short_name,
                                    'active' => $active,
                                    ]);


        if($place_save){
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

            $place = Place::find($request->id);

            $delete = Place::where('id', $request->id)->update(['deleted' => '1']);

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
