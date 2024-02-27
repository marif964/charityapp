<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Module;

class ModuleController extends Controller
{
    public function index(){

        $modules = Module::get();  
        return view('admin.module.index', compact('modules'));
    }


    public function edit(Request $request){

        $module = Module::find($request->id);  
        return view('admin.module.edit', compact('module'));
    }


    public function update(Request $request){

        
        $module = Module::find($request->id);  
	
		$module->title = $request->title;
		$module->description = $request->description;
		$module->status  = $request->status;

		if ($request->heading == "News") {
			
			$module->link_title = $request->link_title;
			$module->link = $request->link;
		}

		if ($request->hasfile('image') && !empty($request->file('image'))) {

			$preImg = $module->image;

            $name = time().rand(1,100).'.'.$request->file('image')->extension();
            $request->file('image')->move(public_path('/assets/uploads/module/'), $name);
            $module->image = $name;
            
            $imgPath = public_path('/assets/uploads/module/'.$preImg);

            if ($preImg != '' && file_exists($imgPath)) {
               unlink($imgPath);
            }
			 
		}
        

        if ($module->save()) {

        	return redirect()->route('admin.module-list')->with([
                'successful_message' => 'module is updated successfully',
            ]);
        }

        return back()->with([
                'error_message' => 'module is not updated',
            ]);
    }
}
