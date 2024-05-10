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
    { Schema::create('subject_career', function (Blueprint $table) {
        $table->integer('subject_id')->unsigned();
        $table->integer('career_id')->unsigned();
        $table->foreign('subject_id')->references('id')->on('subjects');
        $table->foreign('career_id')->references('id')->on('careers');
    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subject_career');
    }
};
