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
        Schema::create('medico', function (Blueprint $table) {
            $table->id()->comment('Identificador único da tabela medico');
            $table->string('nome',100)->comment('Nome do médico');
            $table->string('especialidade',100)->comment('Especialidade do médico');
            $table->unsignedBigInteger('cidade_id')->comment('Identificador único da tabela cidades');
            $table->timestamps();
            $table->softDeletes()->comment('Data de remoção do médico');

            $table->foreign('cidade_id')
                ->references('id')
                ->on('cidades')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medico');
    }
};
