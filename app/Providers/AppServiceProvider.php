<?php

namespace App\Providers;

use App\Models\ProfileModel;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('*', function ($view) {
        $appprofile = ProfileModel::first();
        $tahunIni = now()->year;


        $view->with([
            'appprofile' => $appprofile,
            'tahunIni' => $tahunIni,
        ]);
    });
    }
}
