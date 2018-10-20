<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Telefono extends Model
{
    //
    protected $table = 'telefonos';//referencia a la tabla

    //campos que van a ser mostrados

    protected $fillable = ['numero','persona_id'];

    //Relaciones

    public function pesonas()
    {
        return $this->hasMany('App\Pesona');
    }
}
