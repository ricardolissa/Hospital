<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'consultas';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
                  'diagnostico',
                  'receta',
                  'fecha',
                  'arribo',
                  'egreso',
                  'tiempo_consulta',
                  'paciente_id',
                  'medico_id',
                  'guardia_id',
                  'prioridad_id'
              ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [];
    
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [];
    
    /**
     * Get the paciente for this model.
     */
    public function paciente()
    {
        return $this->belongsTo('App\Models\Paciente','paciente_id');
    }

    /**
     * Get the medico for this model.
     */
   /* public function medico()
    {
        return $this->belongsTo('App\Models\Medicos','medico_id');
    }

    /**
     * Get the guardium for this model.
     */
    /*public function guardium()
    {
        return $this->belongsTo('App\Models\Guardium','guardia_id');
    }*/

    /**
     * Get the prioridad for this model.
     */
    public function prioridads()
    {
        return $this->belongsTo('App\Models\Prioridad','prioridad_id');
    }

    /**
     * Get the pacientes for this model.
     */
    public function pacientes()
    {
        return $this->belongsTo('App\Models\Paciente','paciente_id','id');
    }

    /**
     * Get the medicos for this model.
     */
    public function medicos()
    {
        return $this->belongsTo('App\Models\Medicos','medico_id','id');
    }

    /**
     * Get the guardias for this model.
     */
    public function guardias()
    {
        return $this->belongsTo('App\Models\Guardia','guardia_id','id');
    }



}
