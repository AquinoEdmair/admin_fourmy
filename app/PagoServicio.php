<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PagoServicio extends Model
{
	use SoftDeletes;

    protected $table = 'tbl_pagos_servicios';
    protected $dates = ['deleted_at'];

}
