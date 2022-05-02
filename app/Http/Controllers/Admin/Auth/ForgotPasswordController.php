<?php

namespace App\Http\Controllers\AuthUser;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;

class ForgotPasswordController extends Controller
{

    // use SendsPasswordResetEmails;
    use ResetsPasswords;

    protected $redirectTo = '/login';

    public function __construct()
    {
        $this->middleware('guest:biduser');
    }



    public function showLinkRequestForm()
    {
      return view('user-auth.passwords.email');
    }

    public function showResetForm(Request $request, $token = null)
    {
        return view('user-auth.passwords.reset')->with(
            ['token' => $token, 'email' => $request->email]
        );
    }





    public function sendResetLinkEmail(Request $request)
    {
        $this->validateEmail($request);

        // We will send the password reset link to this user. Once we have attempted
        // to send the link, we will examine the response then see the message we
        // need to show to the user. Finally, we'll send out a proper response.
        $response = $this->broker()->sendResetLink(
            $this->credentials($request)
        );

        return $response == Password::RESET_LINK_SENT
                    ? $this->sendResetLinkResponse($request, $response)
                    : $this->sendResetLinkFailedResponse($request, $response);
    }


    protected function validateEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);
    }


    protected function credentials(Request $request)
    {
        return $request->only('email');
    }


    protected function sendResetLinkResponse(Request $request, $response)
    {
        return back()->with('status', trans($response));
    }

    protected function sendResetLinkFailedResponse(Request $request, $response)
    {
        return back()
                ->withInput($request->only('email'))
                ->withErrors(['email' => trans($response)]);
    }






    public function broker()
    {
        return Password::broker('bidusers');
    }

    protected function guard()
    {
    return Auth::guard('biduser');
    }

}
