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
        Schema::create('imagems', function (Blueprint $table) {
            $table->id();
            $table->string('caminho');
            $table->string('tipo');
            $table->unsignedBigInteger('id_propriedade');
            $table->foreign('id_propriedade')
                ->references('id')
                ->on('propriedades')
                ->onDelete('cascade');

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('imagems');
    }
};
