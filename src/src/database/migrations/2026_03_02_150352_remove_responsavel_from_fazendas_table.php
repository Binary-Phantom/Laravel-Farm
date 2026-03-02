<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveResponsavelFromFazendasTable extends Migration
{
    public function up(): void
    {
        Schema::table('fazendas', function (Blueprint $table) {
            $table->dropColumn('responsavel');
        });
    }

    public function down(): void
    {
        Schema::table('fazendas', function (Blueprint $table) {
            $table->string('responsavel');
        });
    }
}
