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
    Schema::create('gados', function (Blueprint $table) {
        $table->id();
        $table->string('codigo');
        $table->decimal('leite_semana', 8, 2);
        $table->decimal('racao_semana', 8, 2);
        $table->decimal('peso', 8, 2);
        $table->date('nascimento');
        $table->foreignId('fazenda_id')->constrained()->onDelete('cascade');
        $table->timestamp('abatido_em')->nullable();
        $table->timestamps();

        $table->unique(['codigo', 'abatido_em']);
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gados');
    }
};
