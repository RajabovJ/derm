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
// try {
//     $response = Http::timeout(1000)
//         ->attach(
//             'image',
//             file_get_contents($image->getPathname()),
//             $image->getClientOriginalName()
//         )
//         ->post('https://007f-34-21-30-179.ngrok-free.app/api/predict/');

//     if ($response->successful()) {
//         $responseData = $response->json();
//         $diagnosisResult = DiagnosisResult::create([
//             'patient_id' => $patient->id,
//             'assesment_id' => $assesment->id,
//             'result' => $responseData['class'],
//             'segmentation_mask' => $responseData['segmentation_mask'],
//             'probabilities' => $responseData['probabilities'],
//             'message' => $responseData['description'] ?? null,

//         ]);

//         return redirect()->to(localized_route('diagnosis-results.show', [
//             'diagnosis_result' => $diagnosisResult->id,
//             ]))
//             ->with('success', __('Ma\'lumotlar muvaffaqiyatli saqlandi!'));
//     } else {
//         return redirect()->back()->with('error', 'Modeldan javob kelmadi. Keyinroq yana urinib ko‘ring.');
//     }
// } catch (\Exception $e) {
//     Log::error('Render.com API xatosi: ' . $e->getMessage());

//     return redirect()->back()->with('error', 'Model ishga tushmagan yoki hozircha mavjud emas. Iltimos, biroz kutib qayta urinib ko‘ring.');
// }

try {
    $response = Http::timeout(30)
        ->attach(
            'image',
            file_get_contents($image->getRealPath()),
            $image->getClientOriginalName()
        )
        ->post('http://127.0.0.1:8000/api/predict/');

    if ($response->successful()) {
        $data = $response->json();

        $diagnosisResult = DiagnosisResult::create([
            'patient_id'        => $patient->id,
            'assesment_id'      => $assesment->id,
            'result'            => $data['class'] ?? null,
            'segmentation_mask' => $data['segmentation_mask'] ?? null,
            'extracted_lesion' => $data['extracted_lesion'] ?? null,
            'probabilities'     => json_encode($data['probabilities'] ?? []),
            'message'           => $data['description'] ?? null,
        ]);

        return redirect()->to(localized_route('diagnosis-results.show', [
            'diagnosis_result' => $diagnosisResult->id,
        ]))
        ->with('success', __('Ma\'lumotlar muvaffaqiyatli saqlandi!'));

    }

    Log::warning('FastAPI javob bermadi: ' . $response->body());

    return redirect()->back()->with(
        'error',
        __('Modeldan javob olinmadi. Iltimos, keyinroq urinib ko‘ring.')
    );
} catch (\Throwable $e) {
    Log::error('Model API chaqiruvida xatolik: ' . $e->getMessage());

    return redirect()->back()->with(
        'error',
        __('Model ishga tushmagan yoki hozircha mavjud emas. Iltimos, birozdan so‘ng yana urinib ko‘ring.')
    );
}


        // $responseData = $response->json();
        // $diagnosisResult = DiagnosisResult::create([
        //     'patient_id' => $patient->id,
        //     'assesment_id' => $assesment->id,
        //     'result' => $responseData['class'],
        //     'segmentation_mask' => $responseData['segmentation_mask'],
        //     'probabilities' => $responseData['probabilities'],
        //     'message' => $responseData['description'] ?? null,
        // ]);
        // return redirect()->to(localized_route('diagnosis-results.show', [ 'diagnosis_result' => $diagnosisResult->id,
        // 'labels' => ['akiec', 'bcc', 'bkl', 'df', 'nv', 'vasc', 'mel'],]))
        // ->with('success', __('Maʼlumotlar muvaffaqiyatli saqlandi!'));

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
