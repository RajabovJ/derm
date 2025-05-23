<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ImageSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::all();

        foreach ($users as $user) {
            // Har bir user uchun rasm yaratamiz
            Image::create([
                'url' => 'profile_images/default.png',
                'imageable_id' => $user->id,
                'imageable_type' => User::class,
            ]);
        }
    }
}
