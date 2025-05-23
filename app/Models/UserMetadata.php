<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserMetadata extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'education',
        'specialization',
        'experience_years',
        'languages',
        'address',
        'last_login',
        'bio',
        'sertificate_number',
    ];
    protected $casts = [
        'languages' => 'array',   // bu juda muhim!
        'last_login' => 'datetime', // tavsiya qilinadi
    ];
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
