<?php

namespace App\Providers;

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
        //request
        view()->composer('*', function ($view) {
            $aboutMe = \App\Models\AboutMe::active()->first();
            $achievment = \App\Models\Achievment::active()->first();
            $services = \App\Models\Service::active()->get();
            $skills = \App\Models\Skills::all();
            $passions = \App\Models\Passion::active()->get();
            $projects = \App\Models\Project::active()->get();
            $experiences = \App\Models\Experience::active()->get();
            $certificates = \App\Models\Certificate::active()->get();


            $view->with(compact('aboutMe', 'achievment', 'services', 'skills', 'passions', 'projects', 'experiences', 'certificates'));
        });
    }
}
