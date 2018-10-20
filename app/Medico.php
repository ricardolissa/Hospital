<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medico extends Model
{
   
   protected $table="medicos";//referencia a la tabla

    //campos que van a ser mostrados

   protected $fillable = ['foto','legajo','matricula','persona_id'];

   //Relaciones

   public function persona()
    {	
 	return $this->belongsTo('App\Persona');
 	}

  public function consultas()
    {
 	return $this->hasmany('App\Consulta');
	}

  public function guardias()
    {
    return $this->belongsToMany('App\Guardia');
	}
  
  public function especialidades()
    {	
 	return $this->belongsToMany('App\Especialidad');
 	}

    
    

}
