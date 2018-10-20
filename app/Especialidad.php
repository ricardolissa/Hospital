<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Especialidad extends Model
{
    
    protected $table= "especialidades";//referencia a la tabla

    //campos que van a ser mostrados

    protected $fillable = ['nombre'];

    //Relaciones
    public function medicos()
    {
    	return $this->belongsToMany('App\Medico');
    }
    
}
