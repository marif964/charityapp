<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Listing;

class FundRaiserController extends Controller
{
    public function index()
    {
        $listings = Listing::get();
        return view('home', compact('listings'));
    }
}
