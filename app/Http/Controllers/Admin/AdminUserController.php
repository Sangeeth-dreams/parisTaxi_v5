<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class AdminUserController extends Controller
{
    public function index(){
        return Admin::all();
    }



    public function store(Request $request){
        // dd($request->all());

        $request->validate([
            'full_name' => 'required|min:5',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
            // 'image' => 'required|string|image64:jpeg,jpg,png'
        ]);

        try{


                // $imageData = $request->image;
                // $data = substr($imageData, strpos($imageData, ',') + 1);
                // $data = base64_decode($data);
                // $fileName = Carbon::now()->timestamp . '_' . uniqid() . '.' . explode('/', explode(':', substr($imageData, 0, strpos($imageData, ';')))[1])[1];
                // Storage::disk('public')->put("/admins/".$fileName , $data);

                $admin['name'] = $request->full_name;
                $admin['email'] = $request->email;
                $admin['password'] = Hash::make($request->password);
                // $admin['image'] = $fileName;

                $result = Admin::create($admin);


                if ($result) {
                    return 1;
                } else {
                    return 0;
                }

            } catch (Exception $ex) {
                return $ex;
            }

    }


    public function delete($id){

        try{

            $admin = Admin::find($id);
            $admin->user_active = 0;
            $admin->save();

            return 1;

        }catch(Exception $e){
            return $e;
        }

    }


    public function update(Request $request){

        $request->validate([
            'id' => 'required',
            'full_name' => 'required|min:5',
            'email' => 'required|email|unique:users,email,'.$request->id
            // 'active' => 'required'
        ]);

        try{

        $id = $request->id;
        $full_name = $request->full_name;
        $email = $request->email;
        // $active = $request->active;

        // dd($request->all());

        $admin_save = Admin::where('id', $id)
                                ->update([
                                    'email' => $email,
                                    'name' => $full_name
                                    // 'active' => $active
                                    ]);


        if($admin_save){
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

            $admin = Admin::find($request->id);

            // $image_name = $admin['image'];

            // $image_path = public_path().'/storage/admins/'.$image_name;
            // unlink($image_path);

            $delete = Admin::where('id', $request->id)->delete();


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