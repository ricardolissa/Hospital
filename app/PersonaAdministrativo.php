<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PersonaAdministrativo extends Model
{
    
	protected $table= 'padministrativos';//referencia a la tabla

    //campos que van a ser mostrados

	protected $fillable = ['foto','legajo','persona_id'];


    //Relaciones

    public function persona()
    {	
 	return $this->belongsTo('App\Persona');
 	}
}
