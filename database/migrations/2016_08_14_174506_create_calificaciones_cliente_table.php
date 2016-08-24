<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCalificacionesClienteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_calificaciones_cliente_proveedor', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('serviciocontratado_id');
            $table->integer('cliente_id');
            $table->integer('proveedor_id');
            $table->float('puntuacion');
            $table->string('comentarios');
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
        Schema::drop('tbl_calificaciones_cliente_proveedor');
    }
}
