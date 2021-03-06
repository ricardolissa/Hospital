<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePadministrativosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('padministrativos', function(Blueprint $table)
        {
            $table->increments('id');
            $table->timestamps();
            $table->integer('persona_id')->unsigned()->nullable()->index()->unique();
            $table->string('foto')->nullable();
            $table->integer('legajo')->unique();
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
        Schema::drop('padministrativos');
    }
}
