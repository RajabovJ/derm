<?php

namespace App\Http\Controllers;

use App\Models\UserMetadata;
use App\Http\Requests\StoreUserMetadataRequest;
use App\Http\Requests\UpdateUserMetadataRequest;

class UserMetadataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StoreUserMetadataRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(UserMetadata $userMetadata)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UserMetadata $userMetadata)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserMetadataRequest $request, UserMetadata $userMetadata)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserMetadata $userMetadata)
    {
        //
    }
}
