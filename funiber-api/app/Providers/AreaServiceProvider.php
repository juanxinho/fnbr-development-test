<?php


namespace App\Providers;

use App\Repositories\AreaRepository;
use App\Repositories\Contracts\AreaRepositoryContract;
use Illuminate\Support\ServiceProvider;

class AreaServiceProvider extends ServiceProvider
{
    public function boot()
    {

    }

    public function register()
    {
        $this->app->bind(AreaRepositoryContract::class, AreaRepository::class);
 
    }

}