<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guardia extends Model
{
    
	protected $table= "guardias";//referencia a la tabla

    //campos que van a ser mostrados

	protected $fillable = ['fecha'];

    //Relaciones

    public function medicos()
    {
    	return $this->belongsToMany('App\Medico');
    }
    
    public function consultas()
    {
    	return $this->hasMany('App\Consulta');
    }
    
}
