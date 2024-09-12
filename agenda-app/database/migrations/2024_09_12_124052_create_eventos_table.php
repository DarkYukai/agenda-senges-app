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
        Schema::create('eventos', function (Blueprint $table) {
            $table->id();
            //data do evento: tipo data
            $table->date('data');
            //descrição: texto
            $table->text('descricao');
            //hora inicial: hora
            $table->time('inicio');
            //hora final: hora
            $table->time('final');
            //contato: texto
            $table->string('contato');
            //realizado: booleano
            $table->boolean('realizado');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('eventos');
    }
};
