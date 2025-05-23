<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;

class UserPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->role->name === 'admin';
    }
    public function view(User $user, User $model): bool
    {
    }
    public function create(User $user): bool
    {
    }
    public function update(User $user, User $model): bool
    {
        if ($user->id === $model->id && request()->has('role_id')) {
            return false;
        }

        return $user->id === $model->id || ($user->role && $user->role->name === 'admin');
    }


    public function delete(User $user, User $model): bool
    {
        return $user->id !== $model->id && $user->role && $user->role->name === 'admin';
    }
    public function restore(User $user, User $model): bool
    {
    }
    public function forceDelete(User $user, User $model): bool
    {
    }
}
