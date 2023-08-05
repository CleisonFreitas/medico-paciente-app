<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('paciente', function (Blueprint $table) {
            $table->id()->comment('Identificador único da tabela paciente');
            $table->string('nome',100)->comment('Nome do paciente');
            $table->string('cpf',20)->comment('Nº do cpf do paciente');
            $table->string('celular',20)->comment('Número de contato do paciente');
            $table->timestamps();
            $table->softDeletes('Data de remoção do paciente');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paciente');
    }
};
