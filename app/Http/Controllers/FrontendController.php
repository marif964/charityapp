<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\Models\Project;
use App\Models\Category;

class FrontendController extends Controller
{
    public function index(){
    	$categories = Category::get();
    	return view('home', compact('categories'));
    }
    
    public function signIn(){
    	return view('sign-in');
    }
    
    public function aboutUs(){
    	return view('about-us');
    }


    public function categoryWise(Request $request){
    	$categoryId =  Crypt::decrypt($request->category);
    	$categories = Category::get();
    	return view('category-wise', compact('categories', 'categoryId'));
    }
    
    public function projectDetail(Request $request){
    	$projectId = Crypt::decrypt($request->project_id);
    	$project = Project::find($projectId);
    	return view('project-detail', compact('project'));
    }

    public function projectGallery(Request $request){
        $projectId = $request->project_id;
        $project = Project::find($projectId);
        return view('project-img-gallery', compact('project'));
    }

    public function shareProject(Request $request){
        $projectId = $request->project_id;
        $project = Project::find($projectId);
        return view('share-project', compact('project'));
    }

    public function projects(){
        
        $projects = Project::orderBy('id', 'desc')->get();
        return view('all-project', compact('projects'));
    }
}
