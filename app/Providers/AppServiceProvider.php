<?php

namespace App\Providers;

use App\Services\languageService;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(languageService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrap();
       
        View::composer('*', function ($view) {
            
            $languageService = app(LanguageService::class);
            $view->with(
                ['addCources' => $languageService->getcources()]
               
        );
        });
    }
}
