<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{

    public function run(): void
    {
         User::create([
            'role_id' => 1,
            'name' => 'Admin',
            'surname' => 'User',
            'birth' => '1990-01-01',
            'passport' => 'AA1234567',
            'phone' => '+998901112233',
            'gender' => 'Erkak',
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('11111111'),
            'remember_token' => Str::random(10),
        ]);
        User::create([
            'role_id' => 2,
            'name' => 'Doctor',
            'surname' => 'Smith',
            'birth' => '1985-05-05',
            'passport' => 'BB7654321',
            'phone' => '+998909998877',
            'gender' => 'Ayol',
            'email' => 'doctor@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('11111111'),
            'remember_token' => Str::random(10),
        ]);
    }
}
