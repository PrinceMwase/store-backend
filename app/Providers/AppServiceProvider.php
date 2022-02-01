<?php

namespace App\Providers;

use App\Http\Controllers\web\UserController;
use Illuminate\Support\ServiceProvider;
use TCG\Voyager\Http\Controllers\VoyagerUserController;

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
        $this->app->bind(VoyagerUserController::class, UserController::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
