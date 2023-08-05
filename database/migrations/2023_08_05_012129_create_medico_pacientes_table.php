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
        Schema::create('medico_paciente', function (Blueprint $table) {
            $table->id()->comment('Identificador primário da tabela medico_paciente');
            $table->unsignedBigInteger('medico_id')->comment('Identificador único da tabela medico');
            $table->unsignedBigInteger('paciente_id')->comment('Identificador único da tabela paciente');
            $table->timestamps();
            $table->softDeletes()->comment('Data de remoção da relação entre médico e paciente');

            $table->foreign('medico_id')
                ->references('id')
                ->on('medico')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('paciente_id')
                ->references('id')
                ->on('paciente')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medico_paciente');
    }
};
