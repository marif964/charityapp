<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Doner;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
        $this->middleware('doner.guest');
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\View\View
     */
    public function showRegistrationForm()
    {
        return view('auth.sign-up');
    }
    
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();
        $user = $this->create($request->all());
        
        Auth::guard('web')->login($user);
        
        $remember_token = $user->remember_token;
        
        $viewRender = view('email.user-confirmation-template',  compact('remember_token'))->render();
        
        $subject = "Verification";
        
        // Set content-type header for sending HTML email 
        $headers = "MIME-Version: 1.0" . "\r\n"; 
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n"; 
        
        $fromName = 'ARCPK ORG';
        $from = 'digipaki_digi@digipakistan.com';
        // Additional headers 
        $headers .= 'From: '.$fromName.'<'.$from.'>' . "\r\n"; 
        
        mail($user->email, $subject, $viewRender, $headers);
        return redirect()->route('user-verification-needed')->with(['successful_message' => 'your account has been created successfully, now you can activate it & then Sign In']);
    }
    
    
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'fname' => ['required', 'string', 'max:255'],
            'lname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            // 'password' => ['required', 'string', 'min:8', 'confirmed'],
            'password' => ['required', 'confirmed', Rules\Password::min(8)
        ->mixedCase()
        ->letters()
        ->numbers()
        ->symbols(),
            ],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        
        $remember_token = Str::random(64);
       
        return User::create([
            'fname' => $data['fname'],
            'lname' => $data['lname'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'remember_token' => $remember_token,
        ]);
        
        
    }


    public function showDonerRegisterForm()
    {
        return view('doner.sign-up');
    }

    

    protected function createDoner(Request $request)
    {
        
       
        $validator = Validator::make($request->all(), [
            'fname' => ['required', 'string', 'max:255'],
            'lname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:doners'],
            // 'password' => ['required', 'string', 'min:8', 'confirmed'],
            'password' => ['required', 'confirmed', Rules\Password::min(8)
        ->mixedCase()
        ->letters()
        ->numbers()
        ->symbols(),
            ],
        ]);
        

        if ($validator->fails()) {

            $mesgs = $validator->messages()->all();
            $errMesg = ''; 

            for ($i=0; $i < count($mesgs) ; $i++) {

                  $errMesg .= $mesgs[$i].'\r\n'; 
                 
            }
            return redirect()->back()->with('error_message', $errMesg)->withInput($request->all());
        }
        
        $remember_token = Str::random(64);

        $doner = Doner::create([
            'name' => $request['fname'].' '.$request['lname'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'remember_token' => $remember_token,
        ]);
        
        Auth::guard('doner')->login($doner);
        
        
        $viewRender = view('email.confirmation-template',  compact('remember_token'))->render();
        
        $subject = "Verification";
        
        // Set content-type header for sending HTML email 
        $headers = "MIME-Version: 1.0" . "\r\n"; 
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n"; 
        
        $fromName = 'ARCPK ORG';
        $from = 'digipaki_digi@digipakistan.com';
        // Additional headers 
        $headers .= 'From: '.$fromName.'<'.$from.'>' . "\r\n"; 
        // $headers .= 'Cc: welcome@example.com' . "\r\n"; 
        // $headers .= 'Bcc: welcome2@example.com' . "\r\n";
        
        // dd($viewRender);
        
        // mail($request['email'] , 'Activate Account' , $message , 'From: deepak.suhawal@gmail.com');  
        mail($request['email'], $subject, $viewRender, $headers);
        return redirect()->route('verification-needed')->with(['successful_message' => 'your account has been created successfully, now you can activate it & then Sign In']);
    }


   
}
