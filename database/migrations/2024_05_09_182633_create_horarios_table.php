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
        Schema::dropIfExists('horarios');
        Schema::create('horarios', function (Blueprint $table) {
            $table->id();
            $table->date('dia');
            $table->time('hora_inicio');
            $table->time('hora_fim');
            $table->unsignedBigInteger('id_medico');
            $table->unsignedBigInteger('id_tc');

            $table->foreign('id_tc')
                ->references('id')
                ->on('tipo_consultas')
                ->onDelete('cascade');

            $table->foreign('id_medico')
                ->references('id')
                ->on('users')
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
        Schema::dropIfExists('horarios');
    }
};
