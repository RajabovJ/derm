<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        $this->authorize('viewAny', User::class);
        $search = $request->input('search');
        $users = User::query()
            ->when($search, function ($query, $search) {
                $query->where('name', 'like', "%{$search}%")
                      ->orWhere('email', 'like', "%{$search}%");
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('admin.users.index', [
            'users'=>$users,
            'user'=>$user,
        ]);
    }



    public function create()
    {
    }
    public function store(Request $request)
    {
    }
    public function show(string $id)
    {
        return redirect()->back();
    }
    public function edit(string $id)
    {
    }
    public function update(Request $request, string $id)
    {
    }
    public function destroy(string $id)
    {
        $authUser = Auth::user();
        $user=User::findorFail($id);
        if ($authUser->id === $user->id) {
            return redirect()->back()->with('error', 'O\'zingizni bazadan o\'chira olmaysiz.');
        }

        $this->authorize('delete', $user);

        $user->delete();

        return redirect()->route('users.index')->with('success', 'Foydalanuvchi muvaffaqiyatli o‘chirildi.');
    }


    public function promoteToAdmin(User $user)
    {
        $this->authorize('update', $user);
        if ($user->role && $user->role->name === 'doctor') {
            $adminRole = Role::where('name', 'admin')->first();
            if (!$adminRole) {
                return redirect()->back()->with('error', 'Admin roli topilmadi.');
            }
            $user->role()->associate($adminRole);
            $user->save();
            return redirect()->back()->with('success', 'Foydalanuvchi admin sifatida tanlandi.');
        }
        return redirect()->back()->with('error', 'Faqat doctorlar admin qilinishi mumkin.');
    }

    public function demoteFromAdmin(User $user)
    {
        $this->authorize('update', $user);
        if ($user->id === auth()->id()) {
            return redirect()->back()->with('error', 'O\'zingizning adminlik darajangizni olib tashlay olmaysiz.');
        }
        if ($user->role && $user->role->name === 'admin') {
            $doctorRole = Role::where('name', 'doctor')->first();
            if (!$doctorRole) {
                return redirect()->back()->with('error', 'Doctor roli topilmadi.');
            }
            $user->role()->associate($doctorRole);
            $user->save();
            return redirect()->back()->with('success', 'Adminlik olib tashlandi.');
        }
        return redirect()->back()->with('error', 'Faqat adminlar demote qilinishi mumkin.');
    }
}