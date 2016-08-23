<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProveedorServicio extends Model
{
    protected $table = 'tbl_proveedores_servicios';

    public function servicioscontratados()
    {
        return $this->hasMany('App\ServicioContratado', 'servicio_id', 'servicios_id')->with('cliente','servicio','estatus')->where('estatus_servicio_id', '=', 1);
    }

    public function servicio(){
        return $this->hasOne('App\Servicio','id','servicios_id');
    }
}
