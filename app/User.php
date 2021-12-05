<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;


class User extends Model implements Authenticatable
{
    
use AuthenticableTrait;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

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
      'name',
      'email',
      'password',
      'role_id',
      'persona_id'
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
     * Get the role for this model.
     */
    public function role()
    {
        return $this->belongsTo('App\Models\Role','role_id');
    }

    /**
     * Get the roles for this model.
     */
    public function roles()
    {
        return $this->belongsTo('App\Models\Role','role_id','id');
    }

    public function authorizeRoles($roles)

    {
        if ($this->hasAnyRole($roles)) {
            return true;
        }
        abort(401, 'Esta acción no está autorizada.');
        
    }

    public function hasAnyRole($roles)
    
    {
        if (is_array($roles)) {
            foreach ($roles as $role) {
                if ($this->hasRole($role)) {
                    return true;
                }
            }
        } else {
            if ($this->hasRole($roles)) {
                return true;
            }


        }
        return false;
    }

    public function hasRole($role)
    {
        if ($this->roles()->where('name', $role)->first()) {
            return true;
        }
        return false;
    }

    public function setPasswordAttribute($password)
{
    $this->attributes['password'] = bcrypt($password);
}
  public function persona()
    {
        return $this->belongsTo('App\Models\Persona','persona_id');
    }

}
