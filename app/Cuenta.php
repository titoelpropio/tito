<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cuenta extends Model implements AuthenticatableContract, AuthorizableContract, CanResetPasswordContract {

    use Authenticatable,
        Authorizable,
        CanResetPassword;

use SoftDeletes;
//fgsfgsfgsfg
    /**fdadfadfa
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'cuenta';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id_empresa', 'nombre', 'codigo', 'id_padre', 'hijo', 'nombre', 'estado', 'utilizable'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    public function scopeName($query, $name) {
        
        if ($name!="") {
                $query->where('nombre', $name);
        }
    
    }

}
