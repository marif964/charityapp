<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Project;
use App\Models\ProjectImage;
use App\Models\Category;
use App\Models\Donation;

class ProjectController extends Controller
{
    public function index()
    {
    	$user = Auth::user();
        $projects = Project::where('user_id', $user->id)->orderBy('id', 'desc')->get();

        return view('projects.index', compact('projects'));
    }


     /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    	$categories = Category::get();
        return view('projects.create', compact('categories'));
        // return view('projects.fundraiser');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      
      $project = new Project();

      $project->user_id = auth()->user()->id; 
      $project->category_id = $request->category; 
      $project->title = $request->title; 
      $project->url = $request->url; 
      $project->description = $request->description; 
      $project->summary = $request->summary; 
      $project->challenge = $request->challenge; 
      $project->solution = $request->solution; 
      $project->donation_usage = $request->donation; 
      $project->goal = $request->goal; 
     
      if($projectId = $project->save()){

        
        if($request->hasfile('images'))
         {
            foreach($request->file('images') as $file)
            {
                $name = time().rand(1,100).'.'.$file->extension();
                $file->move(public_path('/assets/uploads/project/'), $name);  
 

                ProjectImage::create(array(
                     'project_id' => $projectId,
                     'image' => $name,
                ));
            }
         }

         return redirect()->route('projects')->with([
              'successful_message' => 'project is added successfully.', 
          ]);

           // if ($request->hasfile('images')) {

           //      $name = time().rand(1,100).'.'.$request->file('image')->extension();
           //      $request->file('image')->move(public_path('/assets/uploads/project/'), $name);

           //      $tlmMaterialDetail['image'] = $name;

           //      $path = public_path('/assets/uploads/tlm-material/'.$tlmImage);

           //      if ($tlmImage != '' && file_exists($path)) {
           //         unlink($path);
           //      }

           //  }

      }else{
        return redirect()->back()->with([
              'successful_message' => 'project is not added.', 
          ]);
      }


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $project = Project::find($id);
        return view('projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        $categories = Category::get();
        $project = Project::find($request->id);
        return view('projects.edit', compact('project', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $projectId = $id;
        $project = Project::find($projectId);

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
                $images = ProjectImage::where('project_id', $projectId);

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
                         'project_id' => $projectId,
                         'image' => $name,
                    ));
                }
            }

            return redirect()->route('projects')->with([
              'successful_message' => 'project is updated successfully.', 
            ]);

        }else{

            return redirect()->back()->with([
                  'successful_message' => 'project is not updated.', 
              ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
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
