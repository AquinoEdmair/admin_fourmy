<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Usuario extends Model
{
	use SoftDeletes;

    protected $table = 'tbl_usuarios';
    protected $dates = ['deleted_at'];

    public function proveedor(){
        return $this->hasOne('App\Proveedor','usuarios_id','id');
    }
}
