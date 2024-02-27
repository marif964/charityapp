<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Organization;
use Illuminate\Support\Facades\Auth;


class OrganizationController extends Controller
{
    public function index(){
        
        $user_id = Auth::user()->id;
    	$organization = Organization::where('user_id', $user_id)->first();
    	return view('users.organization.index', compact('organization'));
    }

    public function edit(Request $request){

        $id =  $request->id;
        $organization = Organization::find($id);
    	return view('users.organization.edit', compact('organization'));

    }


    public function update(Request $request){

        
        $id =  $request->id;
        $org = Organization::find($id);

        $org->contact_no = $request->contact_no;
        $org->designation = $request->designation;
        $org->address = $request->address;


        if ($request->hasfile('reg_certificate') && !empty($request->file('reg_certificate'))) {
           
            $preCerti = $org->reg_certificate;

		    $name = time().rand(1,100).'.'.$request->file('reg_certificate')->extension();
		    $request->file('reg_certificate')->move(public_path('/assets/uploads/org-document/'), $name);
		    $org->reg_certificate = $name;

		    $preCertiPath = public_path('/assets/uploads/org-document/'.$preCerti);

            if ($preCerti != '' && file_exists($preCertiPath)) {
               unlink($preCertiPath);
            }

		}


		if ($request->hasfile('audit_report') && !empty($request->file('audit_report'))) {
		    
		    $preAuditReport = $org->audit_report;

		    $name = time().rand(1,100).'.'.$request->file('audit_report')->extension();
		    $request->file('audit_report')->move(public_path('/assets/uploads/org-document/'), $name);
		    $org->audit_report = $name;

		    $preAuditReportPath = public_path('/assets/uploads/org-document/'.$preAuditReport);

            if ($preAuditReport != '' && file_exists($preAuditReportPath)) {
               unlink($preAuditReportPath);
            }

		}

        if($org->save()){
        	return redirect()->route('our-organization')->with("successful_message","organization info.. is updated successfully");
        }else{
        	return redirect()->back()->with("error_message","someting went wrong try again");
        }

    }
}
