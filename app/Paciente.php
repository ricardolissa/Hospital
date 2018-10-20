<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    
    protected $table= "pacientes";//referencia a la tabla

    //campos que van a ser mostrados

    protected $fillable = ['antecedentes_familiares','antecedentes_patologico','antecedentes_nopatologico','padecimiento_actual','persona_id','obrasocial_id'];
    
    //Relaciones

    public function persona()
    {	
 	return $this->belongsTo('App\Persona');
 	}

    public function obrasociales()
	{
	return $this->belongsTo('App\ObraSocial');
	}

	public function consultas()
	{
 	return $this->hasMany('App\Consulta');
	}

	
}
