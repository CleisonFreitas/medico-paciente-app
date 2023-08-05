<?php

namespace App\Providers;

use App\Classes\Contracts\ListCidadeContract;
use App\Classes\Repositories\ListCidadeRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(ListCidadeContract::class, ListCidadeRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
