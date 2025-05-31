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
        $chartData = [
            'epochs' => range(0, 9),
            'train_accuracy' => [0.65, 0.70, 0.74, 0.78, 0.81, 0.84, 0.86, 0.88, 0.89, 0.91],
            'val_accuracy' => [0.63, 0.68, 0.72, 0.75, 0.77, 0.80, 0.83, 0.85, 0.86, 0.87],
            'train_loss' => [0.9, 0.8, 0.7, 0.6, 0.52, 0.45, 0.38, 0.32, 0.28, 0.25],
            'val_loss' => [1.0, 0.9, 0.8, 0.72, 0.66, 0.6, 0.54, 0.5, 0.47, 0.45],
        ];
        $diagnosisResult = DiagnosisResult::findOrFail($id);
        $patient = $diagnosisResult->patient;
        $assesment = $diagnosisResult->assesment;
        $user = auth()->user();

        $pdf = Pdf::loadView('pdf.diagnosis_result', compact('diagnosisResult', 'patient', 'assesment', 'user','chartData'));

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
                    'user' => $user,

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




        $chartData = [
            'epochs' => range(0, 9),
            'train_accuracy' => [0.65, 0.70, 0.74, 0.78, 0.81, 0.84, 0.86, 0.88, 0.89, 0.91],
            'val_accuracy' => [0.63, 0.68, 0.72, 0.75, 0.77, 0.80, 0.83, 0.85, 0.86, 0.87],
            'train_loss' => [0.9, 0.8, 0.7, 0.6, 0.52, 0.45, 0.38, 0.32, 0.28, 0.25],
            'val_loss' => [1.0, 0.9, 0.8, 0.72, 0.66, 0.6, 0.54, 0.5, 0.47, 0.45],
        ];
        switch ($user->role->name) {
            case 'doctor':
                return view('doctor.diagnosis_results.show', [
                    'diagnosisResult' => $diagnosisResult,
                    'patient' => $patient,
                    'assesment' => $assesment,
                    'user' => $user,
                    'chartData' => $chartData,
                ]);

            case 'admin':
                return view('admin.diagnosis_results.show', [
                    'diagnosisResult' => $diagnosisResult,
                    'patient' => $patient,
                    'assesment' => $assesment,
                    'user' => $user,
                    'chartData' => $chartData,


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
