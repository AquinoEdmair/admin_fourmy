<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServiciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('tbl_servicios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('servicio')->unique();
            $table->decimal('precio_normal');
            $table->decimal('precio_express');
            $table->integer('horas_servicio');
            $table->string('observaciones');
            $table->string('imagen');
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
        Schema::drop('tbl_servicios');
    }
}
