<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;

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
        // Mengirim data pengaturan toko ke layout admin
        View::composer('layouts.admin', function ($view) {

            $settings = DB::table('store_settings')
                ->where('id', 1)
                ->first();

            $view->with('settings', $settings);

        });
    }
}
