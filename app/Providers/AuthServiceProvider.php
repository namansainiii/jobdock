<?php

namespace App\Providers;

use App\Models\Job;
use App\Policies\JobPolicy;
// use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;


class AuthServiceProvider extends ServiceProvider
{

    protected $policies = [
        Job::class => JobPolicy::class
    ];

    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //it will register the job policy we created in job model
        // $this->registerPolicices();
        // in laravel 11,12,13 no need it automates registration
    }
}
