<?php

namespace App\Providers;

use Illuminate\Support\Facades\Http;
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
        Http::macro('etsy', function () {
            return Http::withHeaders([
                'x-api-key' => config('etsy.api_key'),
            ])->baseUrl('https://openapi.etsy.com/v3/application/');
        });
    }
}
