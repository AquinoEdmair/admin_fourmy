<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_usuarios', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tipo_usuarios_id');
            $table->string('nombre');
            $table->string('img_perfil');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('regId');
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
        Schema::drop('tbl_usuarios');
    }
}
