<?php

namespace App\Http\Controllers\User;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Donation;
use App\Models\Project;

class DonationController extends Controller
{
    public function index()
    {
    	$user = Auth::user();
        $projects = Project::where('user_id', $user->id)->has('donations')->get();

        // dd($projects[0]->donations);

        // $donations = Donation::with('project')
        //                 ->whereHas('project', function (Builder $query) use($id){
        //                     $query->where('user_id', 'like', '%'.$user->id.'%');
        //                 })
        //                 ->get()
        //                 ->toArray();
        // dd($donations);                

        return view('donation.index', compact('projects'));
    }

    public function show(Request $reuest)
    {
        $donations = Donation::where('project_id', $reuest->id);

        if (!$donations->exists()) {
            return redirect()->back()->with(['error_message' => 'not found any donations of this projects']);
        }

        $donations = $donations->get();
        return view('donation.show', compact('donations'));
    }
}
