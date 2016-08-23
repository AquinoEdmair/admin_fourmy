<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Proveedor extends Model
{
    use SoftDeletes;

    protected $table = 'tbl_proveedores';
    protected $dates = ['deleted_at'];

    public function usuario(){
        return $this->hasOne('App\Usuario','id','usuarios_id');
    }

    public function proveedorServicio(){
    	return $this->hasMany('App\ProveedorServicio','proveedores_id','id')->with('servicio');
    }

    public function empresa(){
        return $this->hasOne('App\Empresa','id','empresa_id');
    }

    public function calificaciones(){
        return $this->hasMany('App\CalificacionClienteProveedor','proveedor_id','id');
    }

    public function promedioCalificaciones(){
    return $this->calificaciones()
      ->selectRaw('avg(puntuacion) as puntuacion, proveedor_id')
      ->groupBy('proveedor_id');
    }


}
