<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Usuario;
use App\Cliente;
use App\Servicio;
use App\Empresa;
use App\Proveedor;
use App\TipoUsuario;
use App\ProveedorServicio;
use Validator;
use Auth;
use DB;

class ProveedorController extends Controller
{
    public function index()
    {
        $proveedores = Proveedor::with('promedioCalificaciones')->with('usuario')->get();
        return view('proveedores.inicio', compact('proveedores'));
    }

    public function create()
    {
        $servicios = Servicio::all();
        $empresas = Empresa::all();
        return view('proveedores.crear')->with(compact('servicios'))->with(compact('empresas'));
    }

    public function store(Request $request)
    {

        $rules = [
                'nombre_completo' => 'required|',
                'email' => 'required|unique:tbl_usuarios|',
                'password' => 'required|min:6|max:20|',
                'password_confirmation' => 'required|min:6|max:20|same:password|',
                'telefono' => 'required|numeric|',
                'direccion' => 'required|',
                'fecha_nacimiento' => 'required|',
                'genero' => 'required|',
                'ciudad' => 'required|',
                'rfc' => 'required|max:12|min:10',
            ]; 

            $data = [
                'nombre_completo.required' => 'El nombre completo debe escribirse',
                'email.required' => 'El email es necesario',
                'email.unique' => 'El email ya existe',
                'password.required' => 'La contraseña es necesaria',
                'password.min' => 'La contraseña debe tener minimo 3 caracteres',
                'password.max' => 'La contraseña debe tener maximo 20 caracteres',
                'password_confirmation.same' => 'La contraseña debe ser igual en ambos campos',
                'telefono.required' => 'El campo telefono no debe estar vacio',
                'telefono.numeric' => 'El telefono deben ser numeros',
                'direccion.required' => 'El campo direccion no debe estar vacio',
                'fecha_nacimiento.required' => 'La fecha de nacimiento debe seleccionarse',
                'genero.required' => 'Se debe seleccionar un genero',
                'ciudad.required' => 'El campo ciudad no debe estar vacio',
                'rfc.required' => 'Se debe seleccionar un genero',
                'rfc.max' => 'Se debe poner 12 caracteres',
                'rfc.min' => 'Se debe poner 12 caracteres',
            ];

            $validar = Validator::make($request->all(),$rules,$data);

            if($validar->fails())
            {
                return redirect()->back()
                ->withErrors($validar->errors())->withInput();
            }else
            {

                $tipousuario = TipoUsuario::where('tipo_usuario','Proveedor')->first();

                $usuario = new Usuario();
                $usuario->nombre = $request->nombre_completo;
                $usuario->email = $request->email;
                $usuario->password = bcrypt($request->password);
                $usuario->tipo_usuarios_id = $tipousuario->id;
                $usuario->save();

                $proveedor = new Proveedor();
                $proveedor->usuarios_id = $usuario->id;
                $proveedor->telefono = $request->telefono;
                $proveedor->direccion = $request->direccion;
                $proveedor->fecha_nacimiento = $request->fecha_nacimiento;
                $proveedor->genero = $request->genero;
                $proveedor->ciudad = $request->ciudad;
                $proveedor->rfc = $request->rfc;
                $proveedor->empresa_id = $request->empresa;
                $proveedor->save();

                for ($i=0; $i < count($request->servicios) ; $i++) 
                { 
                    $proser = new ProveedorServicio();
                    $proser->proveedores_id = $proveedor->id;
                    $proser->servicios_id=$request->servicios[$i];
                    $proser->save();
                };

                return redirect('/proveedores');
            }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $servicios = Servicio::all();
        $empresas = Empresa::all();
        $proveedor = Proveedor::with('proveedorServicio')->with('usuario')->find($id);
        return view('proveedores.editar')->with(compact('proveedor','empresas','servicios')); 
    } 

    public function update(Request $request, $id)
    {
        $proveedor = Proveedor::find($id);

        $proveedor_servicio = ProveedorServicio::where('proveedores_id', $proveedor->id)->get();
        $proveedor->telefono = $request->telefono;
        $proveedor->direccion = $request->direccion;
        $proveedor->fecha_nacimiento = $request->fecha_nacimiento;
        $proveedor->genero = $request->genero;
        $proveedor->ciudad = $request->ciudad;
        $proveedor->rfc = $request->rfc;
        $proveedor->empresa_id=$request->empresa;
        if($proveedor->save()){
            $usuario = Usuario::find($proveedor->usuarios_id);
            $usuario->nombre = $request->nombre_completo;
            $usuario->email = $request->email;
            if($request->password!=null || $request->password!=""){
                $usuario->password = $request->password;
            }            
            $usuario->save(); 
            $nuevo_servicio =  array();
            for($i=0; $i < count($request->servicios); $i++){
                $temp = true;
                foreach ($proveedor_servicio as $value) 
                {
                    if(intval($value->servicios_id)==intval($request->servicios[$i]))
                    {
                        $temp=false;
                        break;
                    }
                }
                if($temp)
                {
                    array_push($nuevo_servicio,intval($request->servicios[$i]));
                }
            }
            for($i=0; $i<count($nuevo_servicio);$i++){
                $proser = new ProveedorServicio();
                $proser->proveedores_id = $proveedor->id;
                $proser->servicios_id=$nuevo_servicio[$i];
                $proser->save();
            }
            $proveedor_servicio = ProveedorServicio::where('proveedores_id', $proveedor->id)->get();
            foreach ($proveedor_servicio as $value) 
            {
                $temp = true;
                for($i=0; $i < count($request->servicios); $i++){
                    if(intval($value->servicios_id)==intval($request->servicios[$i]))
                    {
                        $temp=false;
                        break;
                    }
                }
                if($temp){
                    ProveedorServicio::destroy($value->id);
                }
            }
        }
       return redirect('/proveedores');
    }

    public function destroy($id)
    {
    	//
    }
}
