<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ServicioContratado extends Model
{
	use SoftDeletes;

    protected $table = 'tbl_servicios_contratados';
    protected $dates = ['deleted_at'];

    public function servicio(){
        return $this->hasOne('App\Servicio','id','servicio_id');
    }

    public function estatus(){
        return $this->hasOne('App\EstatusServicio','id','estatus_servicio_id');
    }

    public function proveedor(){
        return $this->hasOne('App\Proveedor','id','proveedor_id')->with('usuario','empresa');
    }

    public function cliente(){
        return $this->hasOne('App\Cliente','id','cliente_id')->with('usuario');
    }
    public function usuario(){
        return $this->hasOne('App\Usuario','id','usuarios_id');
    }
}
 