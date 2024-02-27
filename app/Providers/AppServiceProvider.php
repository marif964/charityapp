<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use App\Models\Module;

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
        
        View::composer('*', function ($view) {

           
            $whModuleCard = Module::where('status', 'active')
                                  ->where('heading', 'How It Works')->get();

            $newsModuleCard = Module::where('status', 'active')
                                  ->where('heading', 'News')->get();

            $view->with('whModuleCard', $whModuleCard)
                 ->with('newsModuleCard', $newsModuleCard);
           
        });
    }
}
