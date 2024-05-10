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
        Schema::create('cuatrimestres', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->nullable();
            $table->string('descripcion')->nullable();
            $table->date('fecha_inicio')->nullable();
            $table->date('fecha_fin')->nullable();
            $table->string('estado')->nullable();
            $table->date('fecha_creacion')->nullable();
            $table->date('fecha_actualizacion')->nullable();
            $table->date('fecha_eliminacion')->nullable();
            $table->string('usuario_creacion')->nullable();
            $table->string('usuario_actualizacion')->nullable();
            $table->string('usuario_eliminacion')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cuatrimestres');
    }
};
