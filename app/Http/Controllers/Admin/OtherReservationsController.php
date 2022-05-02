<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\OtherReservations;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;



class OtherReservationsController extends Controller
    {
        public function index(){
            // $to = OtherReservations::where('deleted','=','0')->get();
            // dd($to);
            return OtherReservations::where('deleted','=','0')->get();
        }
    
    
    
        public function store(Request $request){
            
            //dd($request->all());
    
            $request->validate([
                
                'name' => 'required',
                'hotels' => 'required',
                'room_no' => 'required|regex:/^[a-bA-B0-9 ]+$/',
                'city' => 'required',
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
                    $otherReservations['name'] = $request->name;
                    $otherReservations['hotels'] = $request->hotels;
                    $otherReservations['room_no'] = $request->room_no;
                    $otherReservations['city'] = $request->city;

                    // $admin['image'] = $fileName;
    
                    $result = OtherReservations::create($otherReservations);
    
    
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
                'room_no' => 'required|regex:/^[a-bA-B0-9 ]+$/',

                
                //'email' => 'required|email|unique:users,email,'.$request->id
                // 'active' => 'required'
            ]);
    
            try{
    
            $id = $request->id;
            $name = $request->name;
            $hotels=$request->hotels;
            $room_no=$request->room_no;
            $city=$request->city;
            $status = $request->status;
    
            
    
            $other_reservation_save = OtherReservations::where('id', $id)
                                    ->update([
                                        //'email' => $email,
                                        'name' => $name,
                                        'hotels' => $hotels,
                                        'hotels' => $hotels,
                                        'room_no' => $room_no,
                                        'city' => $city,
                                        'status' => $status,
                                        ]);
    
    
            if($other_reservation_save){
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
                'id' => 'required',
            ]);
    
            try{
    
                $otherReservations = OtherReservations::find($request->id);
    
                $delete = OtherReservations::where('id', $request->id)->update(['deleted' => '1']);
    
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
    

