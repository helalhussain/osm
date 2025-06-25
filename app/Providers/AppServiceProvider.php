<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use App\Models\Setting;
use App\Models\Course;
use App\Models\Classroom;
use App\Models\Section;
use App\Models\User;
use App\Models\Message;
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
        // view()->share('courses', $courses = Course::all());
        // view()->share('logoIcon', $logoIcon = Setting::first());
        // view()->share('site', $site= Setting::first());
        // view()->share('site', $site= Setting::first());
        // view()->share('setting', $setting = Setting::first());

        // view()->share('courses', $courses = Course::all());
        view()->share('logoIcon', $logoIcon = Setting::first());
        view()->share('site', $site= Setting::first());
        view()->share('setting', $setting = Setting::first());
        view()->share('student_data', $student_data = User::all());

        // $student_data = User::all();W
        // view()->share('m_count_administration',$m_count_administration = Message
        // ::where('administator_id','=',auth()->user()->id)
        // ->where('administrator','=','send')->where('m_type','=','administator')->get());
        Paginator::useBootstrap();
    }
}
