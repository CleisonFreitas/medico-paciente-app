<?php

namespace App\Providers;

use App\Classes\Contracts\ListCidadeContract;
use App\Classes\Contracts\ListCidadeMedicoContract;
use App\Classes\Contracts\ListMedicoContract;
use App\Classes\Contracts\StoreMedicoContract;
use App\Classes\Repositories\ListCidadeMedicoRepository;
use App\Classes\Repositories\ListCidadeRepository;
use App\Classes\Repositories\ListMedicoRepository;
use App\Classes\Repositories\StoreMedicoRepository;
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
        $this->app->bind(StoreMedicoContract::class, StoreMedicoRepository::class);
        $this->app->bind(ListCidadeMedicoContract::class, ListCidadeMedicoRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
