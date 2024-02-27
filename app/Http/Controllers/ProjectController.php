<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Category;
use App\Models\Donation;
use App\Models\ProjectImage;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::orderBy('id', 'desc')->get();
        return view('admin.project.index', compact('projects'));
    }

    public function edit(Request $request)
    {
        $categories = Category::get();
        $project = Project::find($request->id);

        return view('admin.project.edit', compact('project', 'categories'));
    }

    public function changeRank(Request $request){
        
        $id = $request->project_id;
    	$project = Project::find($id);
    	
    	$project->ranked = $request->rank;
    	return $project->save();
    }
    
    
    public function update(Request $request)
    {
        $id = $request->id;
    	$project = Project::find($id);

        $project->category_id = $request->category; 
        $project->title = $request->title; 
        $project->url = $request->url; 
        $project->description = $request->description; 
        $project->summary = $request->summary; 
        $project->challenge = $request->challenge; 
        $project->solution = $request->solution; 
        $project->donation_usage = $request->donation; 
        $project->goal = $request->goal; 

        if($project->save()){
          
            if($request->hasfile('images'))
            {
                $images = ProjectImage::where('project_id', $id);

                if ($images->exists()) {

                    $imgList = $images->get();

                    foreach($imgList as $img)
                    {
                       $imgPath = public_path('/assets/uploads/project/'.$img->image);

                        if ($img->image != '' && file_exists($imgPath)) {
                           unlink($imgPath);
                        }
                    }

                    $images->delete();


                }

                foreach($request->file('images') as $file)
                {
                    $name = time().rand(1,100).'.'.$file->extension();
                    $file->move(public_path('/assets/uploads/project/'), $name);  


                    ProjectImage::create(array(
                         'project_id' => $id,
                         'image' => $name,
                    ));
                }
            }

            return redirect()->route('admin.project-list')->with([
              'successful_message' => 'project is updated successfully.', 
            ]);

        }else{

            return redirect()->back()->with([
                  'successful_message' => 'project is not updated.', 
              ]);
        }
    }

    public function donation(Request $request)
    {
    	$donation = Donation::where('project_id', $request->id);

        
    	if (!$donation->exists()) {
    		 return redirect()->back()->with(['error_message' => 'projects not foud']);
    	}

        $donations = $donation->get();
        return view('admin.project.project-donation', compact('donations'));
    }


    public function viewProjects(Request $request)
    {
    	$project = Project::where('user_id', $request->id);

    	if (!$project->exists()) {
    		 return redirect()->back()->with(['error_message' => 'projects not foud of this user']);
    	}

        $projects = $project->get();
        return view('admin.project.user-project', compact('projects'));
    }


    public function show(string $id)
    {
        $project = Project::find($id);
        return view('admin.project.show', compact('project'));
    }

    public function approve(string $id)
    {
        $project = Project::find($id);
        $project->status = 'approved';

        if ($project->save()) {

        	return redirect()->back()->with([
              'successful_message' => 'project is approved successfully.', 
            ]);
        }else{

        	return redirect()->back()->with([
              'error_message' => 'project is not approved.', 
            ]);
        }

        
    }
    
    public function cancel(string $id)
    {
        $project = Project::find($id);
        $project->status = 'cancelled';

        if ($project->save()) {

            return redirect()->back()->with([
              'successful_message' => 'project is successfully cancelled for donations.', 
            ]);
        }else{

            return redirect()->back()->with([
              'error_message' => 'project is not cancelled.', 
            ]);
        }

        
    }



    public function destroy(Request $request){

        $projectId = $request->id;

        $project = Project::find($projectId);

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

        if ($project->delete()) {
            return redirect()->back()->with("successful_message","project is deleted successfully.");
        }else{
            return redirect()->back()->with("error_message","project not deleted something went wrong.");
        }
    }

   
}