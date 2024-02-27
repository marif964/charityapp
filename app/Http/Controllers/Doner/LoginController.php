<?php

namespace App\Http\Controllers\Doner;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Validator;
use Hash;
use App\Models\Doner;

class LoginController extends Controller
{

	use AuthenticatesUsers;

	 /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::DONER;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('doner.guest')->except('logout');
        $this->redirectTo = url()->previous();
    }

    public function login(){
        return view('doner.sign-in');
    }

    public function authenticated(Request $request){
        
        $credentials = $request->only('email', 'password');

        if (Auth::guard('doner')->attempt($credentials, $request->remember)) {
            $doner = Doner::where('email', $request->email)->first();

            Auth::guard('doner')->login($doner);  
            // return redirect()->route('doner.home');
            redirect(session()->get('url.intended'));
        }

        return redirect()->route('doner.login')->with('error_message', 'Failed to process login, invalid credentials');
    }

     /**
     * The user has been authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    // protected function authenticated(Request $request, $user)
    // {
    //     return redirect()->route('admin.home');
    // }

       /**
     * The user has logged out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    protected function loggedOut(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();
       return redirect()->route('doner.login');
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('doner');
    }
}
