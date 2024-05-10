<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cargos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('subject_id');
            $table->foreignId('persona_id');
            $table->string('status')->nullable(); //en concurso, ganado, rechazado, fin del consurso
            $table->string('cargo')->nullable();
            $table->string('tipo')->nullable(); //suplente, titular
            $table->string('categoria')->nullable();
            $table->string('dedicacion_horaria')->nullable();
            $table->string('observaciones')->nullable();
            $table->date('fecha_alta')->nullable();
            $table->date('fecha_baja')->nullable();
            $table->string('act_des')->nullable();
            $table->tinyInteger('renovado')->default(0)->nullable();
            $table->date('fecha_renovacion')->nullable();
            $table->foreignId('cargo_anterior_id')->nullable();
            $table->foreignId('persona_que_lo_renovo_id')->nullable();
            $table->date('fecha_validacion')->nullable();
            $table->foreignId('persona_que_lo_valido_id')->nullable();
            $table->text('observaciones_renovacion')->nullable();
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
        Schema::dropIfExists('cargos');
    }
};
