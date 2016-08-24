<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_clientes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('usuarios_id');
            $table->string('telefono');
            $table->date('fecha_nacimiento');
            $table->string('genero');
            $table->string('ciudad');   
            $table->string('direccion');                    
            $table->boolean('confirmed')->default(0);
            $table->string('confirmation_code')->nullable();
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
        Schema::drop('tbl_clientes');
    }
}
