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
        Schema::create('tipo_consulta_hospitals', function (Blueprint $table) {
            $table->id();
            
            $table->float('preco');

            $table->unsignedBigInteger('id_hospital');

            $table->unsignedBigInteger('id_tc');

            $table->foreign('id_hospital')
                ->references('id')
                ->on('hospitals')
                ->onDelete('cascade');

            $table->foreign('id_tc')
                ->references('id')
                ->on('tipo_consultas')
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
        Schema::dropIfExists('tipo_consulta_hospitals');
    }
};
