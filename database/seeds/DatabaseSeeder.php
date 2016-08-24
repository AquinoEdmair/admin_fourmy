<?php

use Illuminate\Database\Seeder;
use App\TipoUsuario;
use App\EstatusServicio;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   

        $estatus = new EstatusServicio();
        $estatus->estatus_servicio = "Contratado";
        $estatus->save();

        $estatus = new EstatusServicio();
        $estatus->estatus_servicio = "En Ejecución";
        $estatus->save();

        $estatus = new EstatusServicio();
        $estatus->estatus_servicio = "Cancelado";
        $estatus->save();

        $estatus = new EstatusServicio();
        $estatus->estatus_servicio = "Finalizado";
        $estatus->save();


        $tipousuario = new TipoUsuario();
        $tipousuario->tipo_usuario = 'Cliente';
        $tipousuario->save();

        $tipousuario = new TipoUsuario();
        $tipousuario->tipo_usuario = 'Proveedor';
        $tipousuario->save();

        $usuario = new User();
        $usuario->name = 'Administrador';
        $usuario->email = 'admin@aquisar.com';
        $usuario->password = 'admin182.';
        $usuario->save();
    }
}
