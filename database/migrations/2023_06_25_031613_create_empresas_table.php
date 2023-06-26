<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Cria a tabela de empresas.
     */
    public function up(): void
    {
        Schema::create('empresas', function (Blueprint $table) {
            $table->id();
            $table->string('razao_social', 255);
            $table->string('cnpj', 14);
            $table->timestamps();
        });
    }

    /**
     * Reverte a criação da tabela, no caso excluindo a tabela e os dados contido nela.
     */
    public function down(): void
    {
        Schema::dropIfExists('empresas');
    }
};
