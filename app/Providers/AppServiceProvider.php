<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use App\Models\Setting;
use App\Models\Course;
use App\Models\Classroom;
use App\Models\Section;
use App\Models\User;
use auth;

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
        

        view()->share('courses', $courses = Course::all());
        view()->share('logoIcon', $logoIcon = Setting::first());
        view()->share('site', $site= Setting::first());
        Paginator::useBootstrap();
    }
}
