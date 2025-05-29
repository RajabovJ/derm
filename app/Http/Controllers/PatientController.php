<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Http\Requests\StorePatientRequest;
use App\Http\Requests\UpdatePatientRequest;
use App\Models\Assesment;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;

class PatientController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $assessments = Assesment::where('user_id', $user->id)
            ->with('patient')
            ->orderBy('created_at', 'desc')
            ->get();
        $uniquePatients = collect();
        $seenPatientIds = collect();

        foreach ($assessments as $assessment) {
            $patient = $assessment->patient;
            if ($patient && !$seenPatientIds->contains($patient->id)) {
                $uniquePatients->push($patient);
                $seenPatientIds->push($patient->id);
            }
        }
        $page = request()->get('page', 1);
        $perPage = 10;
        $offset = ($page - 1) * $perPage;

        $patients = new LengthAwarePaginator(
            $uniquePatients->slice($offset, $perPage),
            $uniquePatients->count(),
            $perPage,
            $page,
            ['path' => request()->url(), 'query' => request()->query()]
        );
        switch ($user->role->name) {
            case 'doctor':
                return view('doctor.patients.index', [
                    'patients'=>$patients,
                    'user'=>$user,
                ]);
            case 'admin':
                return view('admin.patients.index', [
                    'patients'=>$patients,
                    'user'=>$user,
                ]);

            default:
                abort(403, 'Sizga bu sahifani ko‘rishga ruxsat berilmagan.');
            }
    }
    public function create()
    {
        $user = Auth::user();
        switch ($user->role->name)
        {
            case 'doctor':
                return view('doctor.patients.create', [
                    'user'=>$user]);
            case 'admin':
                return view('admin.patients.create', [
                    'user'=>$user]);

            default:
                abort(403, 'Sizga bu sahifani ko‘rishga ruxsat berilmagan.');
        }
    }
    public function store(StorePatientRequest $request)
    {
        $data = $request->validated();
        $patient = Patient::firstOrCreate(
            [
                'passport' => $data['passport'],
                'phone' => $data['phone'],
            ],
            [
                'name' => $data['name'],
                'surname' => $data['surname'],
                'birth' => $data['birth'],
                'gender' => $data['gender'],
            ]
    );
    return redirect()->route('assesments.create')->with('success', 'Bemor muvaffaqiyatli saqlandi!');
    }
    public function show(Patient $patient)
    {
        $user = Auth::user();
        $assesments = Assesment::where('patient_id', $patient->id)
            ->orderBy('created_at', 'desc')
            ->get();
        return view('doctor.patients.show', [
            'user'=>$user,
            'patient'=>$patient,
            'assesments'=>$assesments,

    ]);
    }
    public function edit(Patient $patient)
    {
    }
    public function update(UpdatePatientRequest $request, Patient $patient)
    {
    }
    public function destroy(Patient $patient)
    {
    }
}
