<?php

namespace App\Providers;

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
        //'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        Gate::before(function ($user) {
            if ($user->role_id === config('number_status_post.author')) {
                return true;
            }
        });

        Gate::allows('create_post', function ($user) {
            if ($user->role_id === config('number_status_post.author')) {
                return true;
            }
        });

        Gate::allows('become_author', function ($user) {
            if ($user->role_id === config('number_status_post.user')) {
                return true;
            }
        });
    }
}
