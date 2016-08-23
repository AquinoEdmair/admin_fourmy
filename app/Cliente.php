<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cliente extends Model
{
    use SoftDeletes;

    protected $table = 'tbl_clientes';
    protected $dates = ['deleted_at'];

    public function usuario(){
        return $this->hasOne('App\Usuario','id','usuarios_id');
    }

    public function calificaciones(){
        return $this->hasMany('App\CalificacionProveedorCliente','cliente_id','id');
    }

    public function promedioCalificaciones(){
    return $this->calificaciones()
      ->selectRaw('avg(puntuacion) as puntuacion, cliente_id')
      ->groupBy('cliente_id');
    }
}
