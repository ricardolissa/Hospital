<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTelefonosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('telefonos', function(Blueprint $table)
        {
            $table->increments('id');
            $table->timestamps();
            $table->integer('numero')->nullable();
            $table->integer('persona_id')->unsigned()->nullable()->index();
            $table->foreign('persona_id')->references('id')->on('personas');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('telefonos');
    }
}
