<?php

use App\Models\Assesment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::get('/mel-images', function () {
    $melAssesments = Assesment::with('image', 'diagnosisResult')
        ->whereHas('diagnosisResult', function ($query) {
            $query->where('result', 'mel');
        })
        ->get();

    $images = $melAssesments->map(function ($assesment) {
        return asset('storage/' . $assesment->image->url);
    });

    return response()->json([
        'mel_images' => $images,
        'count' => $images->count(),
    ]);
});
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
