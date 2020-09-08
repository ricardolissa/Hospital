<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Padministrativo extends Model
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'padministrativos';

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
                  'legajo'
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

  

}
