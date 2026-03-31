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
        Schema::create('reposicoes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('aula_original_id')->constrained('aulas')->cascadeOnDelete();
            $table->foreignId('aula_reposicao_id')->constrained('aulas')->cascadeOnDelete();
            $table->text('motivo')->nullable();
            $table->timestamps();
            $table->unique('aula_reposicao_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reposicoes');
    }
};
