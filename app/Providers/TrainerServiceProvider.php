<?php

namespace App\Providers;

use App\Models\Trainer;
use Illuminate\Support\ServiceProvider;

class TrainerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        view()->composer('*',function($view){
            $view->with('trainerList',Trainer::all());
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
