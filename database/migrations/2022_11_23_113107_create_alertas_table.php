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
        Schema::create('alertas', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->string('descripcion');
            $table->string('tipo'); // 1: alta, 2: baja, 3: modificacion
            $table->string('origen'); // 1: sistemas, 2: usuario
            $table->string('status'); // 1: leído, 2: noleido
            $table->foreignId('user_id')->nullable();
            $table->foreignId('cargo_id')->nullable();
            $table->foreignId('materia_id')->nullable();
            $table->foreignId('usuario_alta')->nullable();
            $table->foreignId('usuario_baja')->nullable();
            $table->foreignId('usuario_modificacion')->nullable();

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
        Schema::dropIfExists('alertas');
    }
};
