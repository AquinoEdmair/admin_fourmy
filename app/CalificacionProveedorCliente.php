<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CalificacionProveedorCliente extends Model
{
    use SoftDeletes;

    protected $table = 'tbl_calificaciones_proveedor_cliente';
    protected $dates = ['deleted_at'];
    
}
