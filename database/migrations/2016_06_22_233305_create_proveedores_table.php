<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProveedoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_proveedores', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('usuarios_id');
            $table->integer('empresa_id');
            $table->string('telefono');
            $table->string('direccion');
            $table->string('fecha_nacimiento');
            $table->string('genero');
            $table->string('ciudad');
            $table->string('rfc');
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
        Schema::drop('tbl_proveedores');
    }
}
