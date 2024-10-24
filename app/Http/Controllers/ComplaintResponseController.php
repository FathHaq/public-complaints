<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreComplaintResponseRequest;
use App\Http\Requests\UpdateComplaintResponseRequest;
use App\Models\ComplaintResponse;

class ComplaintResponseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.response-complaints.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.response-complaints.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreComplaintResponseRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ComplaintResponse $complaintResponse)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ComplaintResponse $complaintResponse)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateComplaintResponseRequest $request, ComplaintResponse $complaintResponse)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ComplaintResponse $complaintResponse)
    {
        //
    }
}
