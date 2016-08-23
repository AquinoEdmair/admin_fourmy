<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServiciosContratadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_servicios_contratados', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cliente_id');
            $table->integer('proveedor_id');
            $table->integer('servicio_id');
            $table->integer('estatus_servicio_id');
            $table->decimal('precio');
            $table->string('observaciones');
            $table->date('fecha_contratacion');
            $table->time('hora_contratacion');
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
        Schema::drop('tbl_proveedores_servicios_contratados');
    }
}
