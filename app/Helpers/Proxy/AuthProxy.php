<?php

namespace App\Helpers\Proxy;

use App\Database\Models\User;
use Illuminate\Contracts\Auth\Authenticatable;
use Laravel\Sanctum\Sanctum;
use Laravel\Sanctum\SanctumServiceProvider;

class AuthProxy
{
    private string $guard;

    public function __construct()
    {
        $this->guard = config('sanctum.guard');
        \Auth::setDefaultDriver($this->guard);
    }

    public function login(Authenticatable $user, bool $rememberMe = false): void
    {
        \Auth::guard($this->guard)->login($user, $rememberMe);
    }

    public function attempt(array $credentials): bool
    {
        return \Auth::guard($this->guard)->attempt($credentials);
    }

    public function check(): bool
    {
        return \Auth::check();
    }

    public function user(): User
    {
        return \Auth::user();
    }

    public function logout(): void
    {
        \Auth::guard($this->guard)->logout();
    }
}
