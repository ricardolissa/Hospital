<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMedicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicos', function(Blueprint $table)
        {
            $table->increments('id');
            $table->timestamps();
            $table->integer('persona_id')->unsigned()->nullable()->index();
            $table->string('foto')->nullable();
            $table->integer('legajo')->unique();
            $table->integer('matricula')->unique();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('medicos');
    }
}
