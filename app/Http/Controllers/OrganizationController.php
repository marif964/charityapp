<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Organization;
use Illuminate\Support\Facades\Auth;

class OrganizationController extends Controller
{
    public function index(){
         
       $user_id = Auth::user()->id;
         
       if(!Organization::where('user_id', $user_id)->exists()){

    	   return view('organization.create');
       } 

       return redirect()->route('home'); 

    }


    public function store(Request $request){
    		
    		$org = new Organization();
            $org->name = $request->org_name;
            $org->contact_no = $request->contact_no;
            $org->designation = $request->designation;
            $org->address = $request->address;
            $org->user_id = Auth::user()->id;

            if($org->save()){
            	return redirect()->route('upload-docs',['org'=>$org->id]);
            }else{
            	return redirect()->back()->with("error_message","someting went wrong try again");
            }
    }


    public function uploadOrgDocs(Request $request){


    	    $org = Organization::find($request->org_id);

			if ($request->hasfile('org_certificate') && !empty($request->file('org_certificate'))) {

			    $name = time().rand(1,100).'.'.$request->file('org_certificate')->extension();
			    $request->file('org_certificate')->move(public_path('/assets/uploads/org-document/'), $name);
			    $org->reg_certificate = $name;

			}


			if ($request->hasfile('audit_report') && !empty($request->file('audit_report'))) {
			    
			    $name = time().rand(1,100).'.'.$request->file('audit_report')->extension();
			    $request->file('audit_report')->move(public_path('/assets/uploads/org-document/'), $name);
			    $org->audit_report = $name;

			}


    		

            if($org->save()){
            	return redirect()->route('home')->with("successful_message","organization is registerd successfully");
            }else{
            	return redirect()->back()->with("error_message","someting went wrong try again");
            }
    }

    public function uploadDocs(Request $request){

    	$orgId = $request->org;

    	if (!Organization::where('id', $orgId)->exists()) {
    		return redirect()->back()->with("error_message","organization is not exists");
    	}

    	return view('organization.upload-docs', compact('orgId'));

    	
    }
}
