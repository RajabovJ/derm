<?php

use App\Http\Controllers\AssesmentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DiagnosisResultController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return Auth::check()
//         ? redirect()->route('dashboard')
//         : redirect()->route('login');
// });
Route::get('/', function () {
    $locale = app()->getLocale();

    return Auth::check()
        ? redirect()->route('dashboard', ['locale' => $locale])
        : redirect()->route('login', ['locale' => $locale]);
});

Route::group(['prefix' => '{locale}', 'middleware' => 'setlocale'], function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->middleware(['auth', 'verified'])->name('dashboard');

    Route::get('/mel-images-view', [ImageController::class, 'melImages'])->name('mel.images');

    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

        Route::resource('assesments', AssesmentController::class);
        Route::resource('diagnosis-results', DiagnosisResultController::class);
        Route::resource('patients', PatientController::class);

        Route::resource('posts', PostController::class);
        Route::get('/posts/{post}/{notificationId?}', [PostController::class, 'show'])->name('posts.show');
        Route::get('/alldiagnoses', [DiagnosisResultController::class, 'alldiagnoses'])->name('alldiagnoses');
        Route::get('/diagnosis/pdf/{id}', [DiagnosisResultController::class, 'downloadPdf'])->name('diagnosis.downloadPdf');

        Route::get('/notifications/read-all', function () {
            auth()->user()->unreadNotifications->markAsRead();
            return back();
        })->name('notifications.readAll');
    });

    Route::middleware('admin')->group(function () {
        Route::resource('users', UserController::class);
        Route::post('/users/{user}/promote-to-admin', [UserController::class, 'promoteToAdmin'])->name('users.promoteToAdmin');
        Route::post('/users/{user}/demote-from-admin', [UserController::class, 'demoteFromAdmin'])->name('users.demoteFromAdmin');
    });
});
// Route::get('/mel-images-view', [ImageController::class, 'melImages'])->name('mel.images');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

//     Route::resource('assesments', AssesmentController::class);
//     Route::resource('diagnosis-results', DiagnosisResultController::class);
//     Route::resource('patients', PatientController::class);

//     Route::resource('posts', PostController::class);
//     Route::get('/posts/{post}/{notificationId?}', [PostController::class, 'show'])->name('posts.show');
//     Route::get('/alldiagnoses', [DiagnosisResultController::class, 'alldiagnoses'])->name('alldiagnoses');
//     Route::get('/diagnosis/pdf/{id}', [DiagnosisResultController::class, 'downloadPdf'])->name('diagnosis.downloadPdf');

//     Route::get('/notifications/read-all', function () {
//         auth()->user()->unreadNotifications->markAsRead();
//         return back();
//     })->name('notifications.readAll');
// });

// Route::middleware('admin')->group(function () {
//     Route::resource('users', UserController::class);
//     Route::post('/users/{user}/promote-to-admin', [UserController::class, 'promoteToAdmin'])->name('users.promoteToAdmin');
//     Route::post('/users/{user}/demote-from-admin', [UserController::class, 'demoteFromAdmin'])->name('users.demoteFromAdmin');
// });


require __DIR__.'/auth.php';
