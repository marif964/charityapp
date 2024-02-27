<?php

namespace App\Http\Controllers\Doner;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Doner;
use App\Models\Donation;
use Illuminate\Support\Facades\Validator;
use Hash;


class DonerController extends Controller
{
    

    public function showRegistrationForm(){
        return view('doner.sign-up');
    }


    
    public function index(){
         
         return view('doner.dashboard');
    }

    public function myDonation(){
       $user = Auth::user();
       $donations = Donation::where('doner_id', $user->id)->get();
       return view('doner.my-donation', compact('donations'));
    }


    public function profile(Request $request){

        $id = $request->id;
        $profile = Doner::find($id);

        return view('doner.profile', compact('profile'));
    }

    public function updateProfile(Request $request){


        if (!(Hash::check($request->current_password, Auth::guard('doner')->user()->password))) {
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
        $user = Auth::guard('doner')->user();
        $user->password = bcrypt($request->password);

        if ($request->hasfile('image') && !empty($request->file('image'))) {

            $preImg = $user->image;

            $name = time().rand(1,100).'.'.$request->file('image')->extension();
            $request->file('image')->move(public_path('/assets/uploads/doner-profile/'), $name);
            $user->image = $name;
            
            $imgPath = public_path('/assets/uploads/doner-profile/'.$preImg);

            if ($preImg != '' && file_exists($imgPath)) {
               unlink($imgPath);
            }

        }

        if($user->save()){
             return redirect()->route('doner.home')->with("successful_message","Password successfully changed!");
        }else{
            return redirect()->route('doner.home')->with("error_message","Password not changed! someting went wrong");
        }
        
    }

    
}
