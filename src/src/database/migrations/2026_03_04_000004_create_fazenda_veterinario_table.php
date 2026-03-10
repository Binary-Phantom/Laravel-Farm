<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('fazenda_veterinario', function (Blueprint $table) {
            $table->id();
            $table->foreignId('fazenda_id')->constrained('fazendas')->cascadeOnDelete();
            $table->string('veterinario_crmv', 5);
            $table->foreign('veterinario_crmv')
                ->references('crmv')
                ->on('veterinarios')
                ->cascadeOnDelete();
            $table->timestamps();

            $table->unique(['fazenda_id', 'veterinario_crmv']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('fazenda_veterinario');
    }
};