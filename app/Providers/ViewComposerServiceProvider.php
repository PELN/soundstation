<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */

    // render categories for header view, using the nest
    public function boot()
    {
        View::composer(['layouts.partials.mobile_header', 'layouts.partials.header'], function ($view) {
            $view->with('categories', Category::orderByRaw('-category ASC')->where('menu', 1)->get()->nest());
        });
    }
}
