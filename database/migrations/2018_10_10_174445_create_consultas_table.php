<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConsultasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consultas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('paciente_id')->unsigned();
            $table->integer('medico_id')->unsigned();
            $table->integer('guardia_id')->unsigned();
            $table->string('diagnostico');
            $table->string('receta');
            $table->date('fecha');
            $table->dateTime('arribo');
            $table->dateTime('egreso');
            $table->time('tiempo_consulta');
          
             $table->foreign('paciente_id')->references('id')->on('pacientes')->onDelete('cascade');
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
        Schema::dropIfExists('consultas');
    }
}
