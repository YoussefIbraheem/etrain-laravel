<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Testomnial;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class TestmonialsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
       
        View::composer('*', function ($view) {
            $testimonials = [];
            $data['testimonialCount'] = (Testomnial::count());
            for($i=0;$i<=(Testomnial::count()/2);$i++){
               $testimonials[]= Testomnial::select('*')->orderBy('id','desc')->offset($i*2)->take(2)->get();
            }
            $view->with(['testimonials'=>$testimonials]);
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
