<?php

namespace App\Providers;

use App\Models\job;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Model::preventLazyLoading();

        // Gate::define('edit-job', function (User $user, job $job) {

        //     return $job->employer->User->is($user);
        // });


        // Gate::define('delete-job', function (User $user, job $job) {

        //     return $job->employer->User->is($user);
        // });

        // Paginator::useBootstrap();
    }
}