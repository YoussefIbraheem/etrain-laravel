<?php

namespace App\Providers;

use App\Models\Course;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class CoursesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        View::composer('*', function ($view) {
            $view->with(['showCourses'=>Course::all()]);
        }); 
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
      
    }
}
