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

        //Gate checks if the user is an admin
        Gate::define('accessAdmin', function($user){
            return $user->user_rights(['admin']);
        });

        //Gate checks if user is registered
        Gate::define('accessUser', function($user){
            return $user->user_rights('user');
        });
    }
}