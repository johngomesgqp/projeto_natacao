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
        Schema::create('aulas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('projeto_id')->constrained()->cascadeOnDelete();
            $table->foreignId('turma_id')->constrained()->cascadeOnDelete();
            $table->foreignId('turma_horario_id')->nullable()->constrained('turma_horarios')->cascadeOnDelete();
            $table->date('data');
            $table->time('hora_inicio');
            $table->time('hora_fim')->nullable();
            $table->smallInteger('tipo'); // normal, reposicao
            $table->smallInteger('status'); // agendada, cancelada, realizada
            $table->text('motivo_cancelamento')->nullable();
            $table->dateTime('realizada_em')->nullable();
            $table->boolean('gerada_automaticamente')->default(false);
            $table->timestamps();
            $table->unique(['turma_id', 'data', 'hora_inicio']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aulas');
    }
};
