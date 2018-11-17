<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateConsultasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consultas', function(Blueprint $table)
        {
            $table->increments('id');
            $table->timestamps();
            $table->string('diagnostico')->nullable();
            $table->string('receta')->nullable();
            $table->string('fecha')->nullable();
            $table->string('arribo')->nullable();
            $table->string('egreso')->nullable();
            $table->string('tiempo_consulta')->nullable();
            $table->integer('paciente_id')->unsigned();
            $table->integer('medico_id')->unsigned();
            $table->integer('guardia_id')->unsigned();
            $table->integer('prioridad_id')->unsigned();

            $table->foreign('paciente_id')->references('id')->on('pacientes')->onDelete('cascade');
              $table->foreign('medico_id')->references('id')->on('medicos')->onDelete('cascade');
               $table->foreign('guardia_id')->references('id')->on('guardias')->onDelete('cascade');
               $table->foreign('prioridad_id')->references('id')->on('prioridades')->onDelete('cascade');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('consultas');
    }
}
