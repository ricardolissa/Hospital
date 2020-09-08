<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePacientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pacientes', function(Blueprint $table)
        {
            $table->increments('id');
            $table->timestamps();
            $table->integer('persona_id')->unsigned()->nullable()->index()->unique();
            $table->integer('obrasocial_id')->unsigned()->nullable()->index();
            $table->string('antecedentes_familiares')->nullable();
            $table->string('antecedentes_patologico')->nullable();
            $table->string('antecedentes_nopatologico')->nullable();
            $table->string('padecimiento_actual')->nullable();
             $table->foreign('persona_id')->references('id')->on('personas');
             $table->foreign('obrasocial_id')->references('id')->on('obrasociales');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('pacientes');
    }
}
