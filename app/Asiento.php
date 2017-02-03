<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asiento extends Model
{
 
   protected $table = 'asiento';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id','nro_asiento','glosa','fecha','estado','cambio_tipo','id_categoria','id_gestion','id_usuario','id_moneda','id_usuario'];
    protected $dates=['deleted_at'];
}
