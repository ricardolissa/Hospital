<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Especialidad;

class Medico extends Model
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
        return $this->belongsToMany(Guardia::class,'guardia_medico');
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
    public function especialidades()
    {
        return $this->belongsToMany(Especialidad::class,'especialidad_medico');

    }

 public function scopeId($query, $medico_id)
   
    {

    if($medico_id)

       return $query->where('medico_id', $medico_id);
      
    }

}
