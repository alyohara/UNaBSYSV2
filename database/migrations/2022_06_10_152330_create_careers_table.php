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
        Schema::create('careers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->date('dateInit')->nullable();
            $table->text('data')->nullable();
            $table->foreignId('college_id')->nullable();
            $table->float('years')->nullable();
            $table->string('CodigoSIU');
            $table->string('DenominacionCarrera');
            $table->string('Titulo');
            $table->string('ResolucionAprobacionCS')->nullable();
            $table->string('ResolucionCorrelativasCS')->nullable();
            $table->string('ResolucionMinisterial')->nullable();
            $table->foreignId('coordinador_id')->nullable();
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
        Schema::dropIfExists('careers');
    }
};
