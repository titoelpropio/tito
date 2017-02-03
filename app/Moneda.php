<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Moneda extends Model
{
 protected $table = 'moneda';



 protected $fillable = ['id','tipo_cambio','fecha'];

protected $dates = ['deleted_at'];
}
