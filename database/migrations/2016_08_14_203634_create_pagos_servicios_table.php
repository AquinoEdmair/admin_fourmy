<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagosServiciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_pagos_servicios', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('serviciocontratado_id');
            $table->integer('cliente_id');
            $table->string('estatus_pago');
            $table->decimal('precio');
            $table->string('paypal_pago_id');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tbl_pagos_servicios');
    }
}
