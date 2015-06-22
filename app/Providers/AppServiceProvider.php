<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Category;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $categoriesnavbar = array();

        foreach(Category::all() as $category) {
            $categoriesnavbar[$category->id] = $category->name;
        }

        view()->share(compact('categoriesnavbar'));
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
