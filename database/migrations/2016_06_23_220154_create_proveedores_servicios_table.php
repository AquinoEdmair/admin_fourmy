<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProveedoresServiciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_proveedores_servicios', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('proveedores_id');
            $table->integer('servicios_id');
            $table->unique(array('proveedores_id','servicios_id'));
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
        Schema::drop('tbl_proveedores_servicios');
    }
}
