<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class PostPolicy
{
    public function viewAny(User $user): bool
    {
    }
    public function view(User $user, Post $post): bool
    {
        if ($user->role->name === 'admin') {
            return true;
        }

        if ($user->role->name === 'doctor') {
            return true;
        }

        return false;
    }
    public function create(User $user): bool
    {
        return in_array($user->role->name, ['admin']);
        return false;
    }
    public function update(User $user, Post $post): bool
    {
        if ($user->role->name === 'admin') {
            return true;
        }
        return false;
    }
    public function delete(User $user, Post $post): bool
    {
        if ($user->role->name === 'admin') {
            return true;
        }
        return false;
    }
    public function restore(User $user, Post $post): bool
    {
        if ($user->role->name === 'admin') {
            return true;
        }
        return false;
    }
    public function forceDelete(User $user, Post $post): bool
    {
        if ($user->role->name === 'admin') {
            return true;
        }
        return false;
    }
}
