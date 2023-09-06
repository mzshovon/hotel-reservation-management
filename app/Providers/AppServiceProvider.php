<?php

namespace App\Providers;

use App\Http\Logger\Repositories\ActivityLoggerInterface;
use App\Http\Logger\Services\ActivityLoggerService;
use App\Http\Services\Hotels\HotelsService;
use App\Repositories\HotelServiceRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(ActivityLoggerInterface::class,ActivityLoggerService::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //code....
    }
}
