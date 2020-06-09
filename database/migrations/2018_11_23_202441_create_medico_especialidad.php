<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMedicoEspecialidad extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medico_especialidads', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('medico_id')->unsigned();
            $table->integer('especialidad_id')->unsigned();
            
            //
            $table->foreign('medico_id')->references('id')->on('medicos')->onDelete('cascade');
            $table->foreign('especialidad_id')->references('id')->on('especialidads')->onDelete('cascade');
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
        Schema::dropIfExists('medico_especialidads');
    }
}
