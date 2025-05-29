<?php

namespace App\Http\Controllers;

use App\Models\DiagnosisResult;
use App\Models\Post;
use Carbon\Carbon;
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

        $labels = [];
        $thisWeek = [];
        $lastWeek = [];

        // Haftaning kunlari lotin yozuvda
        $weekDaysUz = ['Dushanba', 'Seshanba', 'Chorshanba', 'Payshanba', 'Juma', 'Shanba', 'Yakshanba'];

        for ($i = 0; $i < 7; $i++) {
            $thisDay = Carbon::now()->startOfWeek()->addDays($i);
            $lastWeekDay = Carbon::now()->subWeek()->startOfWeek()->addDays($i);

            // Lotin yozuvdagi kun nomlarini qo‘shamiz
            $labels[] = $weekDaysUz[$i];

            $thisWeek[] = DiagnosisResult::where('result', 'mel')
                            ->whereDate('created_at', $thisDay->toDateString())->count();

            $lastWeek[] = DiagnosisResult::where('result', 'mel')
                            ->whereDate('created_at', $lastWeekDay->toDateString())->count();
        }


        switch ($user->role->name) {
            case 'admin':
                return view('admin.dashboard', [
                    'user' => $user,
                    'posts' => $posts,
                    'diagnosisResults' => $diagnosisResults,
                    'labels' => $labels,
                    'this_week' => $thisWeek,
                    'last_week' => $lastWeek,
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
