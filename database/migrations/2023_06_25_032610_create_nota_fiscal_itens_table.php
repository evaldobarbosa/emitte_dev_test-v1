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
        Schema::create('nota_fiscal_itens', function (Blueprint $table) {
            $table->id();
            $table->string('produto', 255);
            $table->integer('quantidade');
            $table->float('valor');
            $table->json('informacoes')->default('{}');
            $table->foreignId('nota_fiscal_id')->constrained('notas_fiscais');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nota_fiscal_itens');
    }
};
