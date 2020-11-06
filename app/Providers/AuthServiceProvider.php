<?php

namespace App\Providers;

use App\Enums\Role;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('onlyAdmin', function ($user)  {
            return $user->role === Role::ADMIN;
        });

        Gate::define('onlySupplier', function ($user) {
            return $user->role === Role::SUPPLIER;
        });

        Gate::define('onlyClient', function ($user) {
            return $user->role === Role::CLIENT;
        });
    }
}
