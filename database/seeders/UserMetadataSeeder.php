<?php

namespace Database\Seeders;

use App\Models\UserMetadata;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserMetadataSeeder extends Seeder
{

    public function run(): void
    {
        UserMetadata::create([
            'user_id' => 1,
            'education' => 'Toshkent Tibbiyot Akademiyasi',
            'specialization' => 'Onkolog',
            'experience_years' => 8,
            'languages' => ['uz', 'en'],
            'address' => 'Toshkent, Chilonzor',
            'last_login' => now(),
            'bio' => 'Teri kasalliklari bo‘yicha tajribali mutaxassis.',
            'sertificate_number' => 'CERT-2025-001',
        ]);

        UserMetadata::create([
            'user_id' => 2,
            'education' => 'Samarqand Tibbiyot Instituti',
            'specialization' => 'Dermotolog',
            'experience_years' => 5,
            'languages' => ['uz', 'en'],
            'address' => 'Samarqand, Registon ko‘chasi',
            'last_login' => now(),
            'bio' => 'Teri saratonini erta aniqlash bo‘yicha mutaxassis.',
            'sertificate_number' => 'CERT-2025-002',
        ]);
    }
}
