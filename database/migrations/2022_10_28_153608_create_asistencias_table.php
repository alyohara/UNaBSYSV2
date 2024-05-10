<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asistencias', function (Blueprint $table) {
            $table->id();
            $table->foreignId('profesor_id');
            $table->foreignId('bedel_id');
            $table->foreignId('subject_id');
            $table->string('status'); //presente, ausente, justificado
            $table->date('fecha')->nullable();
            $table->date('fecha_inicio')->nullable();
            $table->date('fecha_fin')->nullable();
            $table->string('tipo')->nullable();
            $table->foreignId('sede_de_cursada')->nullable();
            $table->foreignId('usuario_alta')->nullable();
            $table->foreignId('usuario_modificacion')->nullable();
            $table->foreignId('usuario_baja')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('asistencias');
    }
};
