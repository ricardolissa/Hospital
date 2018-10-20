<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
    
    protected $table= "consultas"; //referencia a la tabla

    //campos que van a ser mostrados

    protected $fillable = ['diagnostico', 'receta' , 'fecha' , 'arribo', 'egreso', 'tiempo_consulta','paciente_id','medico_id','guardia_id'];

    
    //Relaciones
    public function pacientes()
    {
    	return $this->belongto('App\Paciente');
    }
    
    public function medicos()
    {
    	return $this->belongto('App\Medico');
    }
    
    public function guardias()
    {
		return $this->belongto('App\Guardia');
    }


}
