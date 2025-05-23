<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Assesment extends Model
{
    use HasFactory;
    protected $fillable = [
        'patient_id',
        'user_id',
        'skin_type',
        'family_history',
        'sun_exposure_history',
        'immune_conditions',
        'removed_nevi_count',
        'lesion_location',
        'lesion_diameter',
        'lesion_shape',
        'skin_changes_description'
    ];
    public function image(): MorphOne
    {
        return $this->morphOne(Image::class, 'imageable');
    }
    public function diagnosisResult(): HasOne
    {
        return $this->hasOne(DiagnosisResult::class);
    }
    public function patient(): BelongsTo
    {
        return $this->belongsTo(Patient::class);
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
