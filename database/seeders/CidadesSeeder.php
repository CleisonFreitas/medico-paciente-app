<?php

namespace Database\Seeders;

use App\Models\Cidade\Cidade;
use Illuminate\Database\Seeder;

class CidadesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Cidade::factory()->count(10)->create();
    }
}
