<?php

namespace App\Http\Controllers;

use App\Models\Assesment;
use App\Http\Requests\StoreAssesmentRequest;
use App\Http\Requests\UpdateAssesmentRequest;
use App\Models\DiagnosisResult;
use App\Models\Patient;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;

class AssesmentController extends Controller
{

    public function index()
    {

    }

    public function create()
    {
        //
    }

    public function store(StoreAssesmentRequest $request)
    {
        $data = $request->validated();

        $patientData = Arr::only($data, [
            'name',
            'surname',
            'birth',
            'passport',
            'phone',
            'gender',
        ]);

        $patient = Patient::firstOrCreate(
            ['passport' => $patientData['passport']],
            $patientData
        );
        $assesment = Assesment::create([
            'patient_id' => $patient->id,
            'user_id' => auth()->id(),
            'skin_type' => $data['skin_type'],
            'family_history' => $data['family_history'],
            'sun_exposure_history' => $data['sun_exposure_history'],
            'removed_nevi_count' => $data['removed_nevi_count'],
            'immune_conditions' => $data['immune_conditions'],
            'lesion_location' => $data['lesion_location'],
            'lesion_diameter' => $data['lesion_diameter'],
            'lesion_shape' => $data['lesion_shape'],
            'skin_changes_description' => $data['skin_changes_description'],
        ]);

        if ($request->hasFile('lesion_photo')) {
            $image = $request->file('lesion_photo');

            $originalName = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
            $extension = $image->getClientOriginalExtension();
            $dateTime = date('Ymd_His');
            $milliseconds = round(microtime(true) * 1000) % 1000;
            $fileName = $originalName . '_' . $dateTime . '_' . $milliseconds . '.' . $extension;
            $path = $image->storeAs('lesion_photos', $fileName, 'public');
            $assesment->image()->create([
                'url' => $path
            ]);
        }
        $image = $request->file('lesion_photo');
        $response = Http::attach(
            'image',
            file_get_contents($image->getPathname()),
            $image->getClientOriginalName()
        )->post('https://pythonapi-ufnp.onrender.com/api/predict/');

        $responseData = $response->json();
        $diagnosisResult = DiagnosisResult::create([
            'patient_id' => $patient->id,
            'assesment_id' => $assesment->id,
            'result' => $responseData['class'],
            'message' => $responseData['description'] ?? null,
        ]);
        return redirect()->route('diagnosis-results.show', ['diagnosis_result' => $diagnosisResult->id])
        ->with('success', 'Maʼlumotlar muvaffaqiyatli saqlandi!');

    }

    public function show(Assesment $assesment)
    {

    }


    public function edit(Assesment $assesment)
    {
        //
    }

    public function update(UpdateAssesmentRequest $request, Assesment $assesment)
    {
        //
    }

    public function destroy(Assesment $assesment)
    {
        //
    }
}
