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
        Schema::table('medicos', function (Blueprint $table) {

            $table->unsignedBigInteger('id_hospital');
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_especialidade');

            $table->foreign('id_hospital')
                ->references('id')
                ->on('hospitals')
                ->onDelete('cascade');

            $table->foreign('id_user')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->foreign('id_especialidade')
                ->references('id')
                ->on('especialidades')
                ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('medicos', function (Blueprint $table) {
            //
        });
    }
};
