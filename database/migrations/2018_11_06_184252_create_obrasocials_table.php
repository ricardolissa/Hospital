<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateObrasocialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('obrasocials', function(Blueprint $table)
        {
            $table->increments('id');
            $table->timestamps();
            $table->string('nombre')->unique();
            $table->integer('numero_socio')->unique();
            $table->integer('plan')->nullable();


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('obrasocials');
    }
}
