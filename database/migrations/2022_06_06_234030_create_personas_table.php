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
        Schema::create('personas', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->text('lastname');
            $table->text('address');
            $table->date('birth');
            $table->string('gender');
            $table->string('phone');
            $table->string('email')->nullable();
            $table->string('personal_email')->nullable();
            $table->integer('doc');
            $table->foreignId('userType_id')->default(5);
            $table->foreignId('cv_id')->nullable();
            $table->string('Docencia')
                ->nullable()
                ->default('No');
            $table->string('Investigacion')
                ->nullable()
                ->default('No');
            $table->string('Extension')
                ->nullable()
                ->default('No');
            $table->string('Gestion')
                ->nullable()
                ->default('No');
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
        Schema::dropIfExists('personas');
    }
};
