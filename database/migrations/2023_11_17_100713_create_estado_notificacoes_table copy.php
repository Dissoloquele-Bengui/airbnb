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
        Schema::dropIfExists('estado_notificacoes');
        Schema::create('estado_notificacoes', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('it_id_usuario');
            $table->unsignedBigInteger('it_id_destinatario');
            $table->unsignedBigInteger('it_id_notificacoe')->nullable();
            $table->Integer('it_estado');
            $table->foreign('it_id_usuario')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('it_id_destinatario')->references('id')->on('destinatarios')->onDelete('cascade');
            $table->foreign('it_id_notificacoe')->references('id')->on('notificacoes')->onDelete('cascade');


            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estado_notificacoes');
    }
};
