<?php

namespace App\Http\Controllers;

use App\Models\DiagnosisResult;
use App\Http\Requests\StoreDiagnosisResultRequest;
use App\Http\Requests\UpdateDiagnosisResultRequest;
use Illuminate\Support\Facades\Auth;

use Barryvdh\DomPDF\Facade\Pdf;
class DiagnosisResultController extends Controller
{

    public function downloadPdf($id)
{
    $diagnosisResult = DiagnosisResult::findOrFail($id);
    $patient = $diagnosisResult->patient;
    $assesment = $diagnosisResult->assesment;
    $user = auth()->user();

    $pdf = Pdf::loadView('pdf.diagnosis_result', compact('diagnosisResult', 'patient', 'assesment', 'user'));

    return $pdf->download('diagnosis_result.pdf');
}



    public function alldiagnoses()
    {
        $user = Auth::user();
        $diagnosisResults = DiagnosisResult::orderBy('created_at', 'desc')->paginate(25);
        switch ($user->role->name) {
            case 'admin':
                return view('admin.diagnosis_results.index', [
                    'diagnosisResults' => $diagnosisResults,
                    'user' => $user
                ]);
            default:
            abort(403, 'Sizga bu sahifani ko‘rishga ruxsat berilmagan.');

        }


    }
    public function index()
    {
        $user = Auth::user();
        $diagnosisResults = DiagnosisResult::whereHas('assesment', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })->latest()->paginate(10);

        switch ($user->role->name) {
            case 'doctor':
                return view('doctor.diagnosis_results.index', [
                    'diagnosisResults' => $diagnosisResults,
                    'user' => $user
                ]);
                break;
            case 'admin':
                return view('admin.diagnosis_results.index', [
                    'diagnosisResults' => $diagnosisResults,
                    'user' => $user
                ]);
            default:
            abort(403, 'Sizga bu sahifani ko‘rishga ruxsat berilmagan.');
        }


    }
    public function create()
    {
    }
    public function store(StoreDiagnosisResultRequest $request)
    {
    }
    public function show(DiagnosisResult $diagnosisResult)
    {
        $user = Auth::user();
        $patient = $diagnosisResult->patient;
        $assesment = $diagnosisResult->assesment;
        $this->authorize('view', $diagnosisResult);
        switch ($user->role->name) {
            case 'doctor':
                return view('doctor.diagnosis_results.show', [
                    'diagnosisResult' => $diagnosisResult,
                    'patient' => $patient,
                    'assesment' => $assesment,
                    'user' => $user,
                ]);

            case 'admin':
                return view('admin.diagnosis_results.show', [
                    'diagnosisResult' => $diagnosisResult,
                    'patient' => $patient,
                    'assesment' => $assesment,
                    'user' => $user,
                ]);

            default:
                abort(403, 'Sizga bu sahifani ko‘rishga ruxsat berilmagan.');
        }

    }
    public function edit(DiagnosisResult $diagnosisResult)
    {
    }
    public function update(UpdateDiagnosisResultRequest $request, DiagnosisResult $diagnosisResult)
    {
    }
    public function destroy(DiagnosisResult $diagnosisResult)
    {
    }
}
