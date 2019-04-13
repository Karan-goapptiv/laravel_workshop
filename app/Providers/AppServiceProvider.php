<?php

namespace App\Providers;

use App\Http\Services\AuthorizationService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider {

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register() {
        // singleton UserService class binding
        $this->app->singleton(AuthorizationService::class, function ($app) {
            return new AuthorizationService(app(Request::class));
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot() {
        Schema::defaultStringLength(191);
    }
}
