<?php

namespace App\Http\Controllers;

use App\Models\DoctorDiagnosis;
use App\Http\Requests\StoreDoctorDiagnosisRequest;
use App\Http\Requests\UpdateDoctorDiagnosisRequest;

class DoctorDiagnosisController extends Controller
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
    public function store(StoreDoctorDiagnosisRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(DoctorDiagnosis $doctorDiagnosis)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DoctorDiagnosis $doctorDiagnosis)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDoctorDiagnosisRequest $request, DoctorDiagnosis $doctorDiagnosis)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DoctorDiagnosis $doctorDiagnosis)
    {
        //
    }
}
