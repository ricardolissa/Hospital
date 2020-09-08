<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

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
                  'prioridad_id',
                  'padecimiento_actual',
                  'atendido'
              ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [

        'tiempo_consulta',
        'arribo',
        'egreso',


    ];
    
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
    public function medico()
    {
        return $this->belongsTo('App\Models\Medico','medico_id');
    }

    /**
     * Get the guardia for this model.
     */
    public function guardia()
    {
        return $this->belongsTo('App\Models\Guardia','guardia_id');
    }

    /**
     * Get the prioridad for this model.
     */
    public function prioridad()
    {
        return $this->belongsTo('App\Models\Prioridad','prioridad_id');
    }

   



}
