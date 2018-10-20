<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
     
    protected $tabla= "personas";//referencia a la tabla

    //campos que van a ser mostrados

    protected $fillable = ['nombre','apellido','dni','email','fecha_nacimiento','edad'];

    //Relaciones

    public function telefonos()
    {
        return $this->belongsTo('App\Telefono');
    }
     public function persona()
    {
        return $this->hasOne('App\Persona');
    }
     public function personaladministrativo()
    {
        return $this->hasOne('App\PersonalAdministrativo');
    }
     public function medico()
    {
        return $this->hasOne('App\Medico');
    }
}
