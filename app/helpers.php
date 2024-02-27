<?php
use App\Models\Project;
use Illuminate\Support\Facades\Auth;

function human_date($date)
{
	return date('j M, Y', strtotime($date));
}

function getProjectsByRank($rank){
    $projects = Project::where('status', '!=', 'pending')->where('ranked', $rank)->get();
    return $projects;
}


function getCategoryProjectsByRank($categoryId, $rank){
    $projects = Project::where('status', '!=', 'pending')->where('category_id', $categoryId)->where('ranked', $rank)->get();
    return $projects;
}

function userProjects($status = ''){
	$user = Auth::user();
	$projects = Project::where('user_id', $user->id)->orderBy('id', 'desc');
	                   
	if($status != ''){
	    $projects = $projects->where('status', $status);
	}
	 return $projects;
}

function countProjectsByStatus($status = ''){
	$user = Auth::user();
	$projects = Project::orderBy('id', 'desc');
	
	if($status != ''){
	    $projects = $projects->where('status', $status);
	}
	 return $projects;
}