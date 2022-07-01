<?php


namespace App\Providers;


use App\Repositories\Contracts\ProgramRepositoryContract;
use App\Repositories\ProgramRepository;
use Illuminate\Support\ServiceProvider;

class ProgramServiceProvider extends ServiceProvider
{
    public function boot()
    {

    }

    public function register()
    {
        $this->app->bind(ProgramRepositoryContract::class, ProgramRepository::class);
 
    }

}