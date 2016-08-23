<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CalificacionClienteProveedor extends Model
{
    use SoftDeletes;

    protected $table = 'tbl_calificaciones_cliente_proveedor';
    protected $dates = ['deleted_at'];
    
}
