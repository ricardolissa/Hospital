<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class GuardiaMedico extends Migration

   {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guardia_medico', function (Blueprint $table) {
             $table->bigIncrements('id');
             $table->integer('medico_id')->unsigned();
             $table->integer('guardia_id')->unsigned();

            $table->foreign('medico_id')->references('id')->on('medicos')->onDelete('cascade');
            $table->foreign('guardia_id')->references('id')->on('guardias')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('guardia_medico');
    }
}

