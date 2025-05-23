<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class DiagnosisResult extends Model
{
    use HasFactory;
    protected $fillable = [
        'patient_id',
        'assesment_id',
        'result',
        'message',
    ];
    public function assesment(): BelongsTo
    {
        return $this->belongsTo(Assesment::class);
    }
    public function doctorDiagnoses(): HasMany
    {
        return $this->hasMany(DoctorDiagnosis::class);
    }
    public function patient(): BelongsTo
    {
        return $this->belongsTo(Patient::class);
    }
}
