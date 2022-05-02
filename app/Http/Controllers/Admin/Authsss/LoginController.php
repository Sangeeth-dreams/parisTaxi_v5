<?php



namespace App\Http\Controllers\Admin\Auth;

use Illuminate\Http\Request;
use Facades\App\Helper\Helper;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\Providers\RouteServiceProvider;
use Symfony\Component\HttpFoundation\Response;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        if(View::exists('admin.auth.login'))
        {
            return view('admin.auth.login');
        }
        abort(Response::HTTP_NOT_FOUND);
    }

    public function login(Request $request)
    {
        $credentials = $request->except(['_token']);

        // if(isDoctorActive($request->email))
        // {
            if(Auth::guard('admin')->attempt($credentials))
            {

                return redirect(RouteServiceProvider::ADMIN);
            }
            return redirect()->action([
                LoginController::class,
                'login'
            ])->with('message','Credentials not matced in our records!');
        // }
        // return redirect()->action([
        //     LoginController::class,
        //     'login'
        // ])->with('message','You are not an active doctors!');
    }


    public function logout()
    {

        Auth::guard('admin')->logout();
        return redirect()
            ->route('admin.login')
            ->with('status','Admin has been logged out!');
    }


}
