<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Medicos extends Model
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'medicos';

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
                  'foto',
                  'legajo',
                  'matricula'
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
     * Get the guardias for this model.
     */
    public function guardias()
    {
        return $this->belongsToMany('App\Models\Guardia','guardia_id','id');
    }

    /**
     * Get the consultas for this model.
     */
    public function consultas()
    {
        return $this->hasMany('App\Models\Consulta');
    }

    /**
     * Get the especialidads for this model.
     */
    public function especialidads()
    {
        return $this->belongsToMany('App\Models\Especialidad','especialidad_id','id');
    }



}
