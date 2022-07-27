<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use App\Models\Category;
use App\Models\Location;
use App\Models\Banner;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();

        // get all category from database 
        // $this->category = Category::get();
        // view()->composer('layouts.page', function($view) {
        //     $view->with(['categories' => $this->category]);
        // });

        // get all location from database
        // $this->location = Location::get();
        // view()->composer('layouts.page', function($view) {
        //     $view->with(['locations' => $this->location]);
        // });

        // get all banner data from database
        $this->banner_1 = Banner::where('id',1)->get();
        view()->composer('layouts.page', function($view) {
            $view->with(['banner_1' => $this->banner_1]);
        });


        $this->banner_2 = Banner::where('id',2)->get();
        view()->composer('layouts.page', function($view) {
            $view->with(['banner_2' => $this->banner_2]);
        });


        $this->banner_3 = Banner::where('id',3)->get();
        view()->composer('layouts.page', function($view) {
            $view->with(['banner_3' => $this->banner_3]);
        });


    }
}
