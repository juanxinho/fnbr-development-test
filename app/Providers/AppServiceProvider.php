<?php

namespace App\Providers;

use App\Services\Areas\AreaServiceManager;
use App\Services\Areas\Contract\AreaService;
use App\Services\Info\Contract\InfoService;
use App\Services\Info\InfoServiceManager;
use App\Services\Programs\Contract\ProgramService;
use App\Services\Programs\ProgramServiceManager;
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
      $this->app->bind(AreaService::class, AreaServiceManager::class);
      $this->app->bind(ProgramService::class, ProgramServiceManager::class);
      $this->app->bind(InfoService::class, InfoServiceManager::class);
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
