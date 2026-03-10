<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('fazendas', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->float('tamanho', 4, 2);
            $table->string('responsavel');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('fazendas');
    }
};