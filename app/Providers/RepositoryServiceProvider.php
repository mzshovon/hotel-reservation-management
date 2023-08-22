<?php

namespace App\Providers;

use App\Http\Services\Hotels\HotelsService;
use App\Repositories\HotelServiceRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(HotelServiceRepositoryInterface::class, HotelsService::class);
    }
}
