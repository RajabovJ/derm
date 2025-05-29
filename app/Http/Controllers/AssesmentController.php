<?php

namespace App\Http\Controllers;

use App\Models\Assesment;
use App\Http\Requests\StoreAssesmentRequest;
use App\Http\Requests\UpdateAssesmentRequest;
use App\Models\DiagnosisResult;
use App\Models\Patient;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class AssesmentController extends Controller
{

    public function index()
    {

    }

    public function create()
    {
        $user = Auth::user();
        $latestPatient = Patient::latest()->first();
        $otherPatients = Patient::where('id', '!=', $latestPatient->id)
                                ->orderBy('name')
                                ->orderBy('surname')
                                ->get();
        $patients = collect([$latestPatient])->merge($otherPatients);
        switch ($user->role->name)
        {
            case 'doctor':
                return view('doctor.assesments.create', [
                    'user' => $user,
                    'patients' => $patients,
                ]);
            case 'admin':
                return view('admin.assesments.create', [
                    'user' => $user,
                    'patients' => $patients,
                ]);

            default:
                abort(403, 'Sizga bu sahifani ko‘rishga ruxsat berilmagan.');
        }

    }




    public function store(StoreAssesmentRequest $request)
    {
        $data = $request->validated();
        $patient = Patient::find($data['patient_id']);
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
        try {
            $response = Http::timeout(100)
            ->attach(
                'image',
                file_get_contents($image->getPathname()),
                $image->getClientOriginalName()
            )
            ->post('https://scm.itorda.uz/api/predict/');

            if ($response->successful()) {
                $responseData = $response->json();

                $diagnosisResult = DiagnosisResult::create([
                    'patient_id' => $patient->id,
                    'assesment_id' => $assesment->id,
                    'result' => $responseData['class'],
                    'message' => $responseData['description'] ?? null,
                ]);

                return redirect()->route('diagnosis-results.show', ['diagnosis_result' => $diagnosisResult->id])
                    ->with('success', 'Ma’lumotlar muvaffaqiyatli saqlandi!');
            } else {
                return redirect()->back()->with('error', 'Modeldan javob kelmadi. Keyinroq yana urinib ko‘ring.');
            }
        } catch (\Illuminate\Http\Client\RequestException $e) {
            Log::error('Render.com API xatosi: ' . $e->getMessage());

            return redirect()->back()->with('error', 'Model ishga tushmagan yoki hozircha mavjud emas. Iltimos, biroz kutib qayta urinib ko‘ring.');
        }

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
