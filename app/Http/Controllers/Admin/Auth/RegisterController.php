<?php

namespace App\Http\Controllers\AuthUser;

use App\Bid_User;
use App\BidUser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\VerifyMail;
use App\Referral;
use App\VerifyUser;
use Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class RegisterController extends Controller
{

    public function showRegistrationForm()
    {

        if (auth()->guard('biduser')->user()) return redirect()->route('user.dashboard.index');
        return view('user-auth.register');
    }




    protected function register(Request $request)
    {


        $request->validate([
            'user_fname' => 'required|string|max:25|min:3',
            'user_lname' => 'required|string|max:25|min:3',
            'email' => 'required|string|email|max:25|unique:bid_users',
            // 'username' => 'required|string|max:20|min:3|unique:bid_users|alpha',
            'password' => 'required|string|min:6|confirmed|max:30',
            'password_confirmation' => 'required',
            'user_phn1' => 'required|min:8|max:20',
            // 'parent_id' => ""
        ]);

        // $token = Str::random(30).date('His');



        $user = Bid_User::create([
            'user_fname' => $request->user_fname,
            'user_lname' => $request->user_lname,
            'username' =>  $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'user_phn1' => $request->user_phn1,
            // 'token' => $token,
            'user_active' => 1,
            'timezone'=>$request->timezone,
        ]);



            echo $user->id;
            $token = Str::random(2).$user->id.Str::random(2);

            Bid_User::where('id',$user->id)
                      ->update(['token' => $token]);


        if (isset($request->parent_id)) {
            $referral = Referral::create([
                'bid_users_id' => $user->id,
                'parent_user_id' => $request->parent_id
            ]);
        } else {
            $referral = Referral::create([
                'bid_users_id' => $user->id,
                'parent_user_id' => 0
            ]);
        }

        $verifyUser = verifyUser::create([
            'user_id' => $user->id,
            'token' => Str::random(40)
        ]);



        $user['token'] = $verifyUser->token;
        Mail::to($user->email)->send(new VerifyMail($user));

        $status = "We have sent you an activation code, please check your email";

        return redirect()->route('user.login')->with('status', $status);
    }




    public function verifyUser($token)
    {
        $verifyUser = VerifyUser::where('token', $token)->first();
        $bid_user = Bid_User::find($verifyUser->user_id);
        if (isset($verifyUser)) {

            if (!$bid_user->verified) {
                $bid_user->verified = 1;
                $bid_user->save();
                $status = "Your e-mail is verified. You can now login.";
            } else {
                $status = "Your e-mail is already verified. You can now login.";
            }
        } else {
            return redirect('/login')->with('warning', "Sorry your email cannot be identified.");
        }

        return redirect('/login')->with('status', $status);
    }


    protected function registered(Request $request, $user)
    {
        $this->guard()->logout();
        return redirect('/login')->with('status', 'We sent you an activation code. Check your email and click on the link to verify.');
    }

    protected function guard()
    {
        return Auth::guard('biduser');
    }
}
