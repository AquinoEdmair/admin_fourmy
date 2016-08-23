<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\ServicioContratado;
use App\Usuario;
use App\Cliente;
use App\Proveedor;
use App\Servicio;
use App\EstatusServicio;
use Validator;
use Mail;

class SContratadoController extends Controller
{
    
    public function index()
    {
        $servicioscontratados = ServicioContratado::with('cliente', 'usuario', 'servicio', 'estatus', 'proveedor')->get(); 
        return view('servicioscontratados.inicio', compact('servicioscontratados'));
    }

    public function show($id)
    {
        $servicioscontratado = ServicioContratado::with('cliente', 'usuario', 'servicio', 'estatus', 'proveedor')->find($id); 
        return view('servicioscontratados.detalles',['serviciocontratado' => $servicioscontratado]); 
    }

    public function store(Request $request)
    {
        //
    }

    public function confirmar($confirmation_code)
    {
    //    
    }
    

}
