<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
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

        Gate::define('admin', function(User $user) {
            return $user->role === 'admin';
        });
        Gate::define('pegawai', function(User $user) {
            return $user->role === 'pegawai';
        });
        Gate::define('ketua', function(User $user) {
            return ($user->role === 'ketua' || $user->role === 'admin');
        });
        Gate::define('kepala', function(User $user) {
            return ($user->role === 'kepala' || $user->role === 'admin');
        });
    }
}
