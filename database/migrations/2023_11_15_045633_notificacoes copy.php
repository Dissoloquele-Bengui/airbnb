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
      /*  Schema::create('notificacoes', function (Blueprint $table) {
            $table->id();
            $table->string('vc_assunto');
            $table->longText('lt_descricao');
            $table->date('dt_data');
            $table->time('tm_hora');
            $table->unsignedBigInteger("it_id_categoria");
            $table->foreign('it_id_categoria')->references('id')->on('categoria_notificacoes')->onDelete('cascade');

            //$table->unsignedBigInteger("it_id_edificio");
            //$table->foreign('it_id_edificio')->references('id')->on('edificios')->onDelete('cascade')->onUpdate('cascade');

            //$table->unsignedBigInteger("it_id_apartamento");
            //$table->foreign('it_id_apartamento')->references('id')->on('apartamento_unidade_comercial')->onDelete('cascade')->onUpdate('cascade');

            $table->timestamps();
            $table->softDeletes();

        });*/
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notificacoes');
    }
};
