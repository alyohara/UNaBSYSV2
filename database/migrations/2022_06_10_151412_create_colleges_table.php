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
        Schema::create('colleges', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('address');
            $table->string('email');
            $table->date('dateInit');
            $table->text('data')->nullable();
            $table->string('phone')->nullable();
            $table->string('website')->nullable();
            $table->foreignId('coordinador_id')->nullable();
            $table->string('tipo_de_sede')->default('Presencial');
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
        Schema::dropIfExists('colleges');
    }
};
