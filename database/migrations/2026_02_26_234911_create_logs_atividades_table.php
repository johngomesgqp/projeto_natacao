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
        Schema::create('logs_atividades', function (Blueprint $table) {
            $table->id();
            $table->foreignId('projeto_id')->constrained()->cascadeOnDelete();
            $table->foreignId('user_id')->nullable()->constrained('users');
            $table->string('acao');
            $table->string('entidade_type');
            $table->unsignedBigInteger('entidade_id');
            $table->json('dados')->nullable();
            $table->timestamps();
            $table->index(['projeto_id', 'created_at']);
            $table->index(['entidade_type', 'entidade_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('logs_atividades');
    }
};
