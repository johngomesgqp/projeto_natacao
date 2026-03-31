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
        Schema::create('tarefas_voluntarias', function (Blueprint $table) {
            $table->id();
            $table->foreignId('projeto_id')->constrained()->cascadeOnDelete();
            $table->foreignId('aula_id')->nullable()->constrained()->cascadeOnDelete();
            $table->string('descricao');
            $table->string('responsavel_type')->nullable();
            $table->unsignedBigInteger('responsavel_id')->nullable();
            $table->foreignId('created_by')->nullable()->constrained('users');
            $table->boolean('concluida')->default(false);
            $table->timestamps();
            $table->index('aula_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tarefas_voluntarias');
    }
};
