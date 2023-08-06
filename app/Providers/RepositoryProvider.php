<?php

namespace App\Providers;

use App\Classes\Contracts\ListCidadeContract;
use App\Classes\Contracts\ListCidadeMedicoContract;
use App\Classes\Contracts\ListMedicoContract;
use App\Classes\Contracts\ListMedicoPacienteContract;
use App\Classes\Contracts\ListUserContract;
use App\Classes\Contracts\StoreMedicoContract;
use App\Classes\Contracts\StorePacienteContract;
use App\Classes\Contracts\SyncMedicoPacienteContract;
use App\Classes\Contracts\UpdatePacienteContract;
use App\Classes\Repositories\ListCidadeMedicoRepository;
use App\Classes\Repositories\ListCidadeRepository;
use App\Classes\Repositories\ListMedicoPacienteRepository;
use App\Classes\Repositories\ListMedicoRepository;
use App\Classes\Repositories\ListUserRepository;
use App\Classes\Repositories\StoreMedicoRepository;
use App\Classes\Repositories\StorePacienteRepository;
use App\Classes\Repositories\SyncMedicoPacienteRepository;
use App\Classes\Repositories\UpdatePacienteRepository;
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
        $this->app->bind(StorePacienteContract::class, StorePacienteRepository::class);
        $this->app->bind(UpdatePacienteContract::class, UpdatePacienteRepository::class);
        $this->app->bind(ListCidadeMedicoContract::class, ListCidadeMedicoRepository::class);
        $this->app->bind(SyncMedicoPacienteContract::class, SyncMedicoPacienteRepository::class);
        $this->app->bind(ListMedicoPacienteContract::class, ListMedicoPacienteRepository::class);
        $this->app->bind(ListUserContract::class, ListUserRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
