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
        Schema::create('turma_aluno', function (Blueprint $table) {
            $table->id();
            $table->foreignId('turma_id')->constrained()->cascadeOnDelete();
            $table->foreignId('aluno_id')->constrained()->cascadeOnDelete();
            $table->date('data_inicio');
            $table->date('data_fim')->nullable(); // null = ativo
            $table->timestamps();
            $table->index(['aluno_id', 'data_fim']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aluno_turma');
    }
};
