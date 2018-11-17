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
            $table->date('fecha')->nullable();
            $table->dateTime('arribo')->nullable();
            $table->dateTime('egreso')->nullable();
            $table->time('tiempo_consulta')->nullable();
            $table->integer('paciente_id')->unsigned()->nullable()->index();
            $table->integer('medico_id')->unsigned()->nullable()->index();
            $table->integer('guardia_id')->unsigned()->nullable()->index();
            $table->integer('prioridad_id')->unsigned()->nullable()->index();

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
