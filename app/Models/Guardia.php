<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Guardia extends Model
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'guardias';

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
                  'fecha'
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
     * Get the medicos for this model.
     */
    public function medicos()
    {
        return $this->belongsToMany(Medico::class,'guardia_medico');
    }

    /**
     * Get the consultas for this model.
     */
    public function consultas()
    {
        return $this->hasMany('App\Models\Consulta');
    }



}
