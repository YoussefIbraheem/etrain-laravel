<?php

namespace App\Providers;

use App\Models\Course;
use App\Models\Student;
use App\Models\Trainer;
use App\Models\Category;
use App\Models\Testomnial;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class CategoriesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */

     

    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    { 
        
        View::composer('*', function ($view) {
            $view->with(['showCategories'=>Category::all()]);
        });
    }
}
