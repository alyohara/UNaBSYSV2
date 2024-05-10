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
        Schema::create('sede_de_cursadas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('descripcion')->nullable();
            $table->string('direccion');
            $table->foreignId('usuario_alta')->nullable();
            $table->foreignId('usuario_modificacion')->nullable();
            $table->foreignId('usuario_baja')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sede_de_cursadas');
    }
};
