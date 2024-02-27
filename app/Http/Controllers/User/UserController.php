<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Project;
use App\Models\Donation;
use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{

    public function profile(Request $request){

        $id = $request->id;
        $profile = User::find($id);

        return view('users.profile', compact('profile'));
    }

    public function updateProfile(Request $request){


        if (!(Hash::check($request->current_password, Auth::guard('web')->user()->password))) {
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
        $user = Auth::guard('web')->user();
        $user->password = bcrypt($request->password);

        if ($request->hasfile('image') && !empty($request->file('image'))) {

            $preImg = $user->image;

            $name = time().rand(1,100).'.'.$request->file('image')->extension();
            $request->file('image')->move(public_path('/assets/uploads/user-profile/'), $name);
            $user->image = $name;
            
            $imgPath = public_path('/assets/uploads/profile/'.$preImg);

            if ($preImg != '' && file_exists($imgPath)) {
               unlink($imgPath);
            }

        }

        if($user->save()){
             return redirect()->route('home')->with("successful_message","Password successfully changed!");
        }else{
            return redirect()->route('home')->with("error_message","Password not changed! someting went wrong");
        }
        
    }


    public function destroy(Request $request){

    	$userId = $request->id;

    	$user = User::find($userId);

    	if (count($user->projects) > 0) {
    		
    		foreach ($projects as $key => $project) {
    		  
    		  $donation = Donation::where('project_id', $project->id);

    		  if ($donation->exists()) {
    		  	   $donation->delete();
    		  }


    		  $projectImgs = ProjectImage::where('project_id', $project->id);
               
               foreach ($projectImgs as $k => $img) {

               	    $imgPath = public_path('/assets/uploads/project/'.$img->image);

                        if ($img->image != '' && file_exists($imgPath)) {
                           unlink($imgPath);
                        } 
               }

               $projectImgs->delete();
                  

    		  Project::find($project->id)->delete();

    		}
    	}

    	if ($user->delete()) {
    		return redirect()->back()->with("successful_message","user is deleted successfully.");
    	}else{
    		return redirect()->back()->with("error_message","user not deleted something went wrong.");
    	}
    }
    
    
    public function verificationNeeded(){
        
        $user = Auth::user();
        $verifyUser = User::where('id', $user->id)->first();
        
        if($verifyUser->email_verified_at != ''){
            return redirect()->route('home');
        }
        
        return view('users.verification-needed');
    }
    
    public function verified(Request $request){
        
        $remember_token = $request->token;
        
        $verifyUser = User::where('remember_token', $remember_token)->first();
        
        if(!is_null($verifyUser) ){
          
            if($verifyUser->email_verified_at==null){
                
                $verifyUser->email_verified_at = now();
                $verifyUser->save();
                $message = "Thank you for activating your account. Now you can sign in & complete your account profile";
                Auth::guard('web')->logout();
                return redirect()->route('login')->with(['successful_message' =>  $message]);
            } else {
                $message = "Your e-mail is already verified.";
                
                return redirect()->route('home')->with(['error_message' => $message]);
            }
        }
        
        return redirect()->route('user-verification-needed')->with(['error_message' => 'Sorry your email cannot be identified']);
    }
}
