<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'personas';

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
                  'nombre',
                  'apellido',
                  'dni',
                  'email',
                  'fecha_nacimiento',
                  'edad'
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
    

//Scope
   
 /*   public function scopeApellido($query, $apellido)
   
    {

    if($apellido)
        return $query->where('apellido','LIKE',"%$apellido%");
    }
*/
    public function scopeDni($query, $dni)
   
    {

    if($dni)

       return $query->where('dni', $dni);
      // return $query->where('dni','LIKE',"%$dni%");
    }

}
