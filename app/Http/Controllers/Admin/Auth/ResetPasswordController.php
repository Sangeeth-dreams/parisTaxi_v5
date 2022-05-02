<?php

namespace App\Http\Controllers\AuthUser;

use App\BidUser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;


use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Foundation\Auth\ResetsPasswords;

class ResetPasswordController extends Controller
{
    use ResetsPasswords;
    
    protected $redirectTo = '/login';

    public function __construct()
    {
        $this->middleware('guest:biduser');
    }


    public function showResetForm(Request $request, $token = null)
    {
        return view('user-auth.passwords.reset')->with(
            ['token' => $token, 'email' => $request->email]
        );
    } 


    protected function resetPassword($user, $password)
    {
        $user->password = Hash::make($password);

        $user->setRememberToken(Str::random(60));

        $user->save();

        event(new PasswordReset($user));

        //$this->guard('biduser')->login($user);
        $this->guard('biduser');
        return redirect()->route('user.login');
    }


    
  
    public function broker()
    {
        return Password::broker('bidusers');
    }



    protected function guard(){
        return Auth::guard('biduser');
    }
}