<?php

namespace App\Policies;

use App\Models\DiagnosisResult;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class DiagnosisResultPolicy
{
    public function viewAny(User $user): bool
    {
        //
    }
    public function view(User $user, DiagnosisResult $diagnosisResult): bool
    {
        if ($user->role->name === 'admin') {
            return true;
        }

        if ($user->role->name === 'doctor') {
            return $diagnosisResult->assesment->user_id === $user->id;
        }

        return false;
    }
    public function create(User $user): bool
    {
        //
    }
    public function update(User $user, DiagnosisResult $diagnosisResult): bool
    {
        //
    }
    public function delete(User $user, DiagnosisResult $diagnosisResult): bool
    {
        //
    }
    public function restore(User $user, DiagnosisResult $diagnosisResult): bool
    {
        //
    }
    public function forceDelete(User $user, DiagnosisResult $diagnosisResult): bool
    {
        //
    }
}
