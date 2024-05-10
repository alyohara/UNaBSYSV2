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
        Schema::create('subjects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code');
            $table->string('name');
            $table->string('abrev_name')->nullable();
            $table->string('type')->nullable();
            $table->string('year')->nullable();
            $table->string('semester')->nullable();
            $table->string('credits')->nullable();
            $table->string('status')->nullable();
            $table->foreignId('coordinador_id')->nullable();
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
        Schema::dropIfExists('subjects');
    }
    public function carreras()
    {
        return $this->belongsToMany(\App\Models\Career::class, 'subject_career');
    }
};
