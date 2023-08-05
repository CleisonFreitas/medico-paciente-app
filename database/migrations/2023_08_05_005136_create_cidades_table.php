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
        Schema::create('cidades', function (Blueprint $table) {
            $table->id()->comment('Identificador único da tabela cidades');
            $table->string('nome', 100)->comment('Nome da cidade');
            $table->string('estado', 100)->comment('Nome do estado');
            $table->timestamps();
            $table->softDeletes()->comment('Data de exclusão da cidade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cidades');
    }
};
