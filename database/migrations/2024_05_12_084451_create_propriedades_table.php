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
        Schema::create('propriedades', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_proprietario');
            $table->unsignedBigInteger('id_tipo');
            $table->string('bairro');
            $table->string('municipio');
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->string('provincia');
            $table->integer('estado');
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('id_tipo')
                ->references('id')
                ->on('tipo_propriedades')
                ->onDelete('cascade');

            $table->foreign('id_proprietario')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('propriedades');
    }
};
