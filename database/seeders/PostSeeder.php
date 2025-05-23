<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    public function run(): void
    {
        $now = Carbon::now();
        for ($i = 1; $i <= 12; $i++) {
            DB::table('posts')->insert([
                'user_id' => 1,
                'title' => "E'lon nomi №$i",
                'content' => Str::random(200),
                'image_url' => "post_images/default.jpg",
                'views' => rand(0, 1000),
                'visibility' => $i % 3 == 0 ? 'doctor_only' : 'public',
                'created_at' => $now->subDays(12 - $i),
                'updated_at' => $now->subDays(12 - $i),
            ]);
        }
    }
}
