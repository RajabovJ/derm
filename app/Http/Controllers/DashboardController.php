<?php

namespace App\Http\Controllers;

use App\Models\DiagnosisResult;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $posts = Post::where('visibility', 'public')
        ->orderBy('created_at', 'desc')
        ->limit(5)
        ->get();
        $diagnosisResults = DiagnosisResult::whereHas('assesment', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })
        ->latest()
        ->take(5)
        ->get();

        switch ($user->role->name) {
            case 'admin':
                return view('admin.dashboard', [
                    'user' => $user,
                    'posts' => $posts,
                    'diagnosisResults' => $diagnosisResults,
                ]);
            case 'doctor':
                return view('doctor.dashboard', [
                    'user' => $user,
                    'posts' => $posts,
                    'diagnosisResults' => $diagnosisResults,
                ]);
            case 'user':
                return view('user.dashboard', [
                    'user' => $user,
                    'posts' => $posts,

                ]);
            default:
                abort(403, 'Ruxsat yo‘q');
        }
    }
}
