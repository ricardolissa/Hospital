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
    

// Query Scope


    public function scopeId($query, $persona_id)
   
    {

    if($persona_id)

       return $query->where('persona_id', $persona_id);
      
    }

    public function scopeDni($query, $dni)
   
    {

    if($dni)
        
      
       return $query->where('dni', $dni);
      
    }

    public function scopeNombre($query, $nombre)
   
    {

    if($nombre)

       return $query->where('nombre', $nombre);
     
    }

    public function scopeApellido($query, $apellido)
   
    {

    if($apellido)

       return $query->where('apellido', $apellido);
      
    }

     public function scopeEmail($query, $email)
   
    {

    if($email)

       return $query->where('email', $email);
      
    }

   
 public function scopeEdad($query, $edad)
   {
    if($edad)

       return $query->where('edad', $edad);
      
    }



}
