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

        /*

                        'valor'=>$horario->preco,
                'id_fatura'=>$fatura->id,
                'comprovativo'=>upload($request->comprovativo),
                'guia'=>upload($request->guia),
                'id_horario'=>$id
        */
        Schema::create('pagamentos', function (Blueprint $table) {
            $table->id();
            $table->float('valor');
            $table->unsignedBigInteger('id_fatura');
            $table->unsignedBigInteger('id_horario');
            $table->string('comprovativo');
            $table->string('guia');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pagamentos');
    }
};
