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
        $this->banner = Banner::get();
        view()->composer('layouts.page', function($view) {
            $view->with(['banners' => $this->banner]);
        });


    }
}
