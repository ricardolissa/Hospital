<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePersonasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personas', function(Blueprint $table)
        {
            $table->increments('id');
            $table->timestamps();
            $table->string('nombre')->nullable();
            $table->string('apellido')->nullable();
            $table->integer('dni')->unique();
            $table->string('email')->nullable();
            $table->date('fecha_nacimiento');
            $table->integer('edad')->nullable();
           //se agregan campos multivaluados para eliminar la entidad telefono
            $table->integer('telefono1')->nullable();
            $table->integer('telefono2')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('personas');
    }
}
