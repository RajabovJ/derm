<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class DoctorDiagnosis extends Model
{
    use HasFactory;
    protected $fillable = [
        'doctor_id',
        'diagnosis_result_id',
        'diagnosis_text',
        'comments',
    ];
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function diagnosisResult(): BelongsTo
    {
        return $this->belongsTo(DiagnosisResult::class);
    }
    public function prescriptions(): HasMany
    {
        return $this->hasMany(Prescription::class);
    }
}
