<?php

namespace App\Http\Controllers;
use App\Models\Organization;
use Illuminate\Http\Request;

class OrgController extends Controller
{
   
    public function index()
    {
        $organizations = Organization::get();

        return view('org.index', compact('organizations'));
    }

    
}