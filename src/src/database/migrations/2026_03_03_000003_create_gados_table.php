<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('gados', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('codigo')->unique();
            $table->decimal('leite_semana', 4, 1)->default(0);
            $table->bigInteger('racao_semana')->default(0);
            $table->float('peso', 5, 1)->default(0);
            $table->date('nascimento');
            $table->dateTime('abatido_em')->nullable();
            $table->foreignId('fazenda_id')->constrained('fazendas')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('gados');
    }
};
