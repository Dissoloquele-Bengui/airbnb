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
        Schema::create('mensagens', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_remetente');
            $table->unsignedBigInteger('id_receptor');
            $table->longText('conteudo');
            $table->timestamps();
            $table->foreign('id_remetente')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->foreign('id_receptor')
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
        Schema::dropIfExists('mensagens');
    }
};
