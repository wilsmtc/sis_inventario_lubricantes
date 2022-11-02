<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Admin\Menu;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    public function boot()
    {
        view()->composer('theme.lte.aside', function ($view) {
            $menus=Menu::getMenu(true);
            $view->with('menusComposer',$menus);
        });
        View::share('theme', 'lte');
    }
    public function register()
    {
        //
    }
}
