<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Bid_User;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Session\Session;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Expr\FuncCall;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller{


	use AuthenticatesUsers;
    protected $redirectTo = '/';

    public function __construct(){
        $this->middleware('guest:admin')->except('logout');
    }

    public function showLoginForm(){

        // if (auth()->guard('admin')->user()) return redirect()->route('admin.dashboard');
        // return view('admin.auth.login');

        if (auth()->guard('admin')->user()){
            dd('you are alredy login');
            // return redirect()->route('admin.dashboard');
        }

        return view('admin.auth.login');
    }

   public function login(Request $request){

        $request->validate([
            'email' => 'required|string|email|max:25',
            'password' => 'required|string|min:6|max:30'
        ]);

        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }



        if ($this->attemptLogin($request)) {
            return redirect()->route('admin.dashboard');

        }else{
            $errors = [$this->username() => trans('auth.failed')];
        }



        $this->incrementLoginAttempts($request);



       return redirect()->back()
            ->withInput($request->only($this->username(), 'remember'))
            ->withErrors($errors);
    }


    protected function guard(){
        return Auth::guard('admin');
    }

    // public function logout(Request $request) {
    //     $this->guard('admin')->logout();
    //     $request->session()->invalidate();
    //     return redirect('/login');

    //    }


    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return $this->loggedOut($request) ?: redirect('/');
    }



}
