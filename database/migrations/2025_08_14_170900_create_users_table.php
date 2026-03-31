<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('projeto_id')->constrained()->cascadeOnDelete();
            $table->string('nome');
            $table->string('email');
            $table->string('password');
            $table->boolean('ativo')->default(true);
            $table->timestamp('email_verified_at')->nullable();
            $table->softDeletes(); // deleted_at
            $table->timestamps();
            $table->unique(['projeto_id', 'email']); // garante email único por projeto
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
};
