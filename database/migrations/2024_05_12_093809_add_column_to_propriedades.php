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
        Schema::table('propriedades', function (Blueprint $table) {
            $table->integer('qtd_quartos');
            $table->integer('qtd_salas')->nullable();
            $table->integer('qtd_banheiros')->nullable();
            $table->integer('largura');
            $table->integer('comprimento');
            $table->integer('andar');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('propriedades', function (Blueprint $table) {
            //
        });
    }
};
