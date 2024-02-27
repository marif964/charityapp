<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorelistingRequest;
use App\Http\Requests\UpdatelistingRequest;
use App\Models\listing;

class ListingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $listings = Listing::get();
        return view('home', compact('listings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorelistingRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(listing $listing)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(listing $listing)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatelistingRequest $request, listing $listing)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(listing $listing)
    {
        //
    }
}