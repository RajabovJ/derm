<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Patient extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'surname',
        'birth',
        'passport',
        'phone',
        'gender',
    ];
    public function diagnosisResults(): HasMany
    {
        return $this->hasMany(DiagnosisResult::class);
    }
    public function assesments(): HasMany
    {
        return $this->hasMany(Assesment::class);
    }
}
