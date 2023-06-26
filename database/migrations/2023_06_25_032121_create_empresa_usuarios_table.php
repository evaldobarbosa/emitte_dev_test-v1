<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Cria a tabela de empresa do usuario.
     */
    public function up(): void
    {
        Schema::create('empresa_usuarios', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('empresa_id')->constrained('empresas');
            $table->timestamps();
        });
    }

    /**
     * Apaga a tabela e apaga os dados dela.
     */
    public function down(): void
    {
        Schema::dropIfExists('empresa_usuarios');
    }
};
