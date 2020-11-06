<?php

namespace App\Database\Queries;

use App\Database\Models\User;
use Illuminate\Support\Collection;

class UserQueries
{
    public function findByEmail(string $email): ?User
    {
        return User::query()->where('email', $email)->first();
    }

    public function getByRoles(array $roles): Collection
    {
        return User::query()->whereIn('role', $roles)->get();
    }

    public function load(User $user, array $load): User
    {
        $user->load($load);

        return $user;
    }
}
