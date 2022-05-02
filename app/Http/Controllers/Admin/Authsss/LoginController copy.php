<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Http\JsonResponse;

class LoginController extends Controller
{

    use ThrottlesLogins;
    use AuthenticatesUsers;

    // public $maxAttempts = 5;

    protected $redirectTo = RouteServiceProvider::ADMIN;


    /**
     * Number of minutes to lock the login.
     */
    // public $decayMinutes = 3;

    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

    public function showLoginForm()
    {
        return view('admin.auth.login',[
            'title' => 'Login',
            'loginRoute' => 'login',
            'forgotPasswordRoute' => 'password.request',
        ]);


    }




    public function login(Request $request)
        {
            $this->validator($request);

            // $credentials = $request->except(['_token']);
            $credentials = $request->all();



            //check if the user has too many login attempts.
            if ($this->hasTooManyLoginAttempts($request)){
                //Fire the lockout event.
                $this->fireLockoutEvent($request);

                //redirect the user back after lockout.
                return $this->sendLockoutResponse($request);
            }


            //attempt login.
            // if ($this->attemptLogin($request)) {
            //     dd('here');

            //     return $this->sendLoginResponse($request);
            // }else{
            //     dd('else atepmt login');
            // }

            // dd( $credentials);

            // dd(gettype($credentials));

            if(Auth::guard('admin')->attempt($request))
            {
                dd('indede');
                return redirect(RouteServiceProvider::DOCTOR);
            }else{
                echo "sss";
            }


            // return redirect()->action([
            //     LoginController::class,
            //     'login'
            // ])->with('message','Credentials not matced in our records! final');



            //keep track of login attempts from the user.
            // $this->incrementLoginAttempts($request);

            //Authentication failed
            // return $this->loginFailed();
        }

    /**
     * Logout the admin.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout()
    {

        Auth::guard('admin')->logout();
        return redirect()
            ->route('admin.login')
            ->with('status','Admin has been logged out!');
    }

    /**
     * Validate the form data.
     *
     * @param \Illuminate\Http\Request $request
     * @return
     */
    private function validator(Request $request)
        {
            //validation rules.
            $rules = [
                'email'    => 'required|email|exists:admins|min:5|max:191',
                'password' => 'required|string|min:6|max:255',
            ];

            //custom validation error messages.
            $messages = [
                'email.exists' => 'These credentials do not match our records.validate',
            ];

            //validate the request.
            $request->validate($rules,$messages);
        }

    /**
     * Redirect back after a failed login.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    private function loginFailed()
    {


      //Login failed...
      return redirect()
        ->back()
        ->withInput()
        ->with('error','Login failed, please try again!');

    }


    protected function attemptLogin(Request $request)
    {
        return $this->guard('admin')->attempt(
            $this->credentials($request), $request->filled('remember')
        );
    }


    protected function sendLoginResponse(Request $request)
    {
        $request->session()->regenerate();

        $this->clearLoginAttempts($request);

        if ($response = $this->authenticated($request, $this->guard('admin')->user())) {
            return $response;
        }

        return $request->wantsJson()
                    ? new JsonResponse([], 204)
                    : redirect()->intended($this->redirectPath());
    }



    public function username(){
        return 'email';
    }


}
