<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'pacientes';

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
                  'persona_id',
                  'obrasocial_id',
                  'antecedentes_familiares',
                  'antecedentes_patologico',
                  'antecedentes_nopatologico'
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
     * Get the persona for this model.
     */
    public function persona()
    {
        return $this->belongsTo('App\Models\Persona','persona_id');
    }

    /**
     * Get the obrasocial for this model.
     */
    public function obrasocial()
    {
        return $this->belongsTo('App\Models\Obrasocial','obrasocial_id');
    }

    /**
     * Get the consultas for this model.
     */
    public function consultas()
    {
        return $this->hasMany('App\Models\Consulta');
    }

    /**
     * Get the obrasocials for this model.
     */
    public function obrasocials()
    {
        return $this->belongsTo('App\Models\Obrasocial','obrasocial_id','id');
    }

    /**
     * Get the personas for this model.
     */
    public function personas()
    {
        return $this->belongsTo('App\Models\Persona','persona_id','id');
    }



}
