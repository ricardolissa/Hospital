<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ObraSocial extends Model
{
   protected $table= "obrasociales";//referencia a la tabla

   //campos que van a ser mostrados
   
   protected $fillable = ['numero_socio', 'plan'];

   //Relaciones

    public function pacientes()
  	{
   	return $this->hasMany('App\Paciente');//
	}
}
