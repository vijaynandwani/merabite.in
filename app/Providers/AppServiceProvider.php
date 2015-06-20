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
        $categories = array();

        foreach(Category::all() as $category) {
            $categories[$category->id] = $category->name;
        }

        view()->share(compact('categories'));
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
