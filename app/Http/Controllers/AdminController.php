<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use App\Models\User;
use Hash;
use App\Models\Project;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Validator;


class AdminController extends Controller
{

    use AuthenticatesUsers;

    public function login(){
        return view('admin.sign-in');
    }


    public function index(){

        $users = User::get(); 
        $projects = Project::orderBy('id', 'desc')->paginate(15); 
       
        return view('admin.dashboard', compact('users', 'projects'));
    }


    public function userList(){
        $users = User::get();
        return view('admin.user.index', compact('users'));
    }

    public function editUser(Request $request){

        $id = $request->id;
        $user = User::find($id);
        return view('admin.user.edit', compact('user'));
    }
     

    public function profile(Request $request){

        $id = $request->id;
        $profile = Admin::find($id);

        return view('admin.profile', compact('profile'));
    }

    public function updateProfile(Request $request){


        if (!(Hash::check($request->current_password, Auth::guard('admin')->user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error_message","Your current password does not matches with the password.");
        }

        
        if(strcmp($request->current_password, $request->password) == 0){
            // Current password and new password same
            return redirect()->back()->with("error_message","New Password cannot be same as your current password.");
        }


        $validator = Validator::make(request()->all(),[
            'current_password' => 'required',
            'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:6'
            // 'password' => 'required|string|min:8|confirmed',
        ]);

        

        if($validator->fails()) {
            $errors = $validator->errors();
            return redirect()->back()->withErrors($errors);
        }


        //Change Password
        $admin = Auth::guard('admin')->user();
        $admin->name = $request->name;
        $admin->password = bcrypt($request->password);

        if ($request->hasfile('image') && !empty($request->file('image'))) {

            $preImg = $admin->image;

            $name = time().rand(1,100).'.'.$request->file('image')->extension();
            $request->file('image')->move(public_path('/assets/uploads/profile/'), $name);
            $admin->image = $name;
            
            $imgPath = public_path('/assets/uploads/profile/'.$preImg);

            if ($preImg != '' && file_exists($imgPath)) {
               unlink($imgPath);
            }

        }

        if($admin->save()){
             return redirect()->route('admin.home')->with("successful_message","Password successfully changed!");
        }else{
            return redirect()->route('admin.home')->with("error_message","Password not changed! someting went wrong");
        }
        
    }


    public function authenticated(Request $request){
        // dd($request);
        $credentials = $request->only('email', 'password');

        if (Auth::guard('admin')->attempt($credentials, $request->remember)) {
            $user = Admin::where('email', $request->email)->first();

            Auth::guard('admin')->login($user);  
            return redirect()->route('admin.home');
        }

        return redirect()->route('admin.login')->with('error_message', 'Failed to process login, invalid credentials');
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
       return redirect()->route('admin.login');
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('admin');
    }
    

    // public function logout(){
    //     if(Auth::guard('admin')->logout()){
    //         return redirect()->route('admin.login')->with('status', 'your loggout.');
    //     }
    // }


}
