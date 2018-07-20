<?php

namespace App\Providers;

use App\Request\Contracts\AddLotRequest;
use App\Service\Contracts\MarketService;
use App\Service\DbMarketService;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(MarketService::class, DbMarketService::class);
        $this->app->bind(AddLotRequest::class, DbAddLotRequest::class);
    }
}
