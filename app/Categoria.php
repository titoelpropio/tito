<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Auth\Passwords\CanResetPassword;


use Illuminate\Contracts\Auth\Access\Authorizable ;

class Categoria extends Model 
{
   protected $table = 'categoria';
   //holi como ta
//gfgfgf
   //BBBBB
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id','nombre'];
    protected $dates=['deleted_at'];
}
