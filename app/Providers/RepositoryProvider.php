<?php

namespace App\Providers;

use App\Classes\Contracts\ListCidadeContract;
use App\Classes\Contracts\ListMedicoContract;
use App\Classes\Repositories\ListCidadeRepository;
use App\Classes\Repositories\ListMedicoRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(ListCidadeContract::class, ListCidadeRepository::class);
        $this->app->bind(ListMedicoContract::class, ListMedicoRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
