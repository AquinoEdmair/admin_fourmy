<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\TipoUsuario;
use App\Usuario;
use App\Cliente;
use App\Servicio;
use App\Proveedor;
use App\ServicioContratado;
use App\PagoServicio;
use App\EstatusServicio;
use App\ProveedorServicio;
use App\CalificacionProveedorCliente;
use App\CalificacionClienteProveedor;
use App\Restablecer;

use Hash;
use DB;
use Mail;

class MovilController extends Controller
{

    public function iniciarSesion(Request $request){

        $usuario = Usuario::where('email',$request->email)->first();


        if (!empty($usuario)){

            $tipousuario = TipoUsuario::find($usuario->tipo_usuarios_id);

            if(strcmp($tipousuario->tipo_usuario, "Cliente") == 0){
                $cliente = Cliente::where('usuarios_id',$usuario->id)->where('confirmed',1)->first();
                if(!empty($cliente)){
                    if (Hash::check($request->password, $usuario->password)){
                        $usuario->regId =  $request->regId;
                        $usuario->save();
                        return \Response::json(['error' => 'false', 'msg' => $usuario, 'usuario' => $cliente, 'status' => '200'], 200);
                    }
                    return \Response::json(['error' => 'true', 'msg' => 'Contraseña incorrecta!', 'status' => '200'], 200);
                }else{
                    return \Response::json(['error' => 'true', 'msg' => 'No ha confirmado la dirección de correo!', 'status' => '200'], 200);
                }
            }else if (strcmp($tipousuario->tipo_usuario, "Proveedor") == 0) {

                $proveedor = Proveedor::where('usuarios_id',$usuario->id)->first();
                if(!empty($proveedor)){
                    if (Hash::check($request->password, $usuario->password)){
                        $usuario->regId =  $request->regId;
                        $usuario->save();
                        return \Response::json(['error' => 'false', 'msg' => $usuario, 'usuario' => $proveedor, 'status' => '200'], 200);
                    }
                    return \Response::json(['error' => 'true', 'msg' => 'Contraseña incorrecta!', 'status' => '200'], 200);
                }
                return \Response::json(['error' => 'true', 'msg' => 'El correo no se encuentra registrado!', 'status' => '200'], 200);
            }else{
                return \Response::json(['error' => 'true', 'msg' => 'Datos incorrectos!', 'status' => '200'], 200);
            }
        }else{
            return \Response::json(['error' => 'true', 'msg' => 'El correo no se encuentra registrado!', 'status' => '200'], 200);
        }
    }

    public function obtieneServicios(){
        $Servicios = Servicio::all();
        return compact('Servicios');
    }


    public function actualizaCliente(Request $request){

        $cliente = Cliente::find($request->id);
        $usuario = Usuario::find($cliente->usuarios_id);

        $usuario->email = $request->email;
        $usuario->nombre= $request->nombre;

        $imagen = $request->img_perfil;
        if(isset($imagen)){
            define('UPLOAD_DIR', 'imagenes/perfiles/');
            $img = $request->img_perfil;
            $img = str_replace('data:image/png;base64,', '', $img);
            $img = str_replace(' ', '+', $img);
            $data = base64_decode($img);
            $file = UPLOAD_DIR . uniqid() . '.png';
            $success = file_put_contents($file, $data);

            $usuario->img_perfil= $file;
        }

        $usuario->save();

        $cliente->ciudad = $request->ciudad;
        $cliente->direccion = $request->direccion;
        $cliente->telefono = $request->telefono;
        $cliente->genero = $request->genero;
        $cliente->fecha_nacimiento = $request->fecha;
        $cliente->save();

        return \Response::json(['error' => 'false', 'msg' => "Los datos se han actualizado correctamente", 'perfil' => $usuario->img_perfil ,'status' => '200'], 200);
    }


    public function actualizaProveedor(Request $request){

        $proveedor = Proveedor::find($request->id);

        $usuario = Usuario::find($proveedor->usuarios_id);
        $usuario->email = $request->email;
        $usuario->nombre= $request->nombre;


        $imagen = $request->img_perfil;
        if(isset($imagen)){
            define('UPLOAD_DIR', 'imagenes/perfiles/');
            $img = $request->img_perfil;
            $img = str_replace('data:image/png;base64,', '', $img);
            $img = str_replace(' ', '+', $img);
            $data = base64_decode($img);
            $file = UPLOAD_DIR . uniqid() . '.png';
            $success = file_put_contents($file, $data);

            $usuario->img_perfil= $file;
        }

        $usuario->save();

        $proveedor->ciudad = $request->ciudad;
        $proveedor->direccion = $request->direccion;
        $proveedor->telefono = $request->telefono;
        $proveedor->genero = $request->genero;
        $proveedor->fecha_nacimiento = $request->fecha;
        $proveedor->save();

        return \Response::json(['error' => 'false', 'msg' => "Los datos se han actualizado correctamente", 'perfil' => $usuario->img_perfil, 'status' => '200'], 200);
    }


    public function contratarServicio(Request $request){

        $estatusservicio = EstatusServicio::where('estatus_servicio', 'Contratado')->first();

        $serviciocontratado = new ServicioContratado();
        $serviciocontratado->cliente_id = $request->id;
        $serviciocontratado->servicio_id = $request->servicio_id;
        $serviciocontratado->estatus_servicio_id = $estatusservicio->id;
        $serviciocontratado->precio = $request->precio;
        $serviciocontratado->fecha_contratacion = $request->fecha;
        $serviciocontratado->hora_contratacion = $request->hora;
        $serviciocontratado->observaciones = $request->observaciones;
        $serviciocontratado->direccion = $request->direccion;
        $serviciocontratado->save();

        $pagoservicio = new PagoServicio();
        $pagoservicio->serviciocontratado_id = $serviciocontratado->id;
        $pagoservicio->precio = $request->precio;
        $pagoservicio->paypal_pago_id = $request->pagoId;
        $pagoservicio->cliente_id = $request->id;
        $pagoservicio->estatus_pago = $request->estatusPago;
        $pagoservicio->save();

        $servicio = ServicioContratado::with('servicio','estatus','proveedor','cliente')->find($serviciocontratado->id);


        return \Response::json(['error' => 'false', 'msg' => "La solicitud fue recibida!", 'servicio' => $servicio, 'status' => '200'], 200);
    }


    public function realizarServicio(Request $request){


        $estatusservicio = EstatusServicio::where('estatus_servicio', 'En Ejecución')->first();

        $serviciocontratado = ServicioContratado::find($request->servicio_contratado_id);

        if(is_null($serviciocontratado->proveedor_id)){
            $serviciocontratado->proveedor_id = $request->proveedor_id;
            $serviciocontratado->estatus_servicio_id = $estatusservicio->id;
            $serviciocontratado->save();

            return \Response::json(['error' => 'false', 'msg' => "La solicitud fue recibida!", 'status' => '200'], 200);
        }else{
            return \Response::json(['error' => 'true', 'msg' => "El servicio ya fue aceptado por otro proveedor!", 'status' => '200'], 200);
        }

    }


    public function finalizarServicio(Request $request){

        $estatusservicio = EstatusServicio::where('estatus_servicio', 'Finalizado')->first();

        $serviciocontratado = ServicioContratado::find($request->servicio_contratado_id);

        $serviciocontratado->estatus_servicio_id = $estatusservicio->id;
        $serviciocontratado->calificacion_proveedor = 1;
        $serviciocontratado->save();

        $calificacionproveedor = new CalificacionProveedorCliente();
        $calificacionproveedor->serviciocontratado_id = $request->servicio_contratado_id;
        $calificacionproveedor->proveedor_id = $request->proveedor_id;
        $calificacionproveedor->cliente_id = $request->cliente_id;
        $calificacionproveedor->puntuacion = $request->puntuacion;
        $calificacionproveedor->comentarios = $request->comentarios;
        $calificacionproveedor->save();

        return \Response::json(['error' => 'false', 'msg' => "Se ha finalizado el servicio!", 'status' => '200'], 200);

    }


    public function calificarServicio(Request $request){

        $serviciocontratado = ServicioContratado::find($request->servicio_contratado_id);
        $serviciocontratado->calificacion_cliente = 1;
        $serviciocontratado->save();

        $calificacioncliente = new CalificacionClienteProveedor();
        $calificacioncliente->serviciocontratado_id = $request->servicio_contratado_id;
        $calificacioncliente->proveedor_id = $request->proveedor_id;
        $calificacioncliente->cliente_id = $request->cliente_id;
        $calificacioncliente->puntuacion = $request->puntuacion;
        $calificacioncliente->comentarios = $request->comentarios;
        $calificacioncliente->save();

        return \Response::json(['error' => 'false', 'msg' => "Se ha calificado el servicio!", 'status' => '200'], 200);

    }


    public function cancelarServicio(Request $request){

        $estatusservicio = EstatusServicio::where('estatus_servicio', 'Cancelado')->first();

        $serviciocontratado = ServicioContratado::find($request->servicio_contratado_id);

        $serviciocontratado->estatus_servicio_id = $estatusservicio->id;
        $serviciocontratado->save();

        return \Response::json(['error' => 'false', 'msg' => "Se ha cancelado el servicio!", 'status' => '200'], 200);

    }


    public function obtieneServiciosusuario(Request $request){
        $servicioscontratados = ServicioContratado::where('cliente_id', $request->id)->with('servicio','estatus','proveedor')->orderBy('created_at','DESC')->get();

        return \Response::json(['error' => 'false', 'msg' => $servicioscontratados, 'status' => '200'], 200);
    }


    public function obtieneServiciosproveedorhistorial(Request $request){
        $servicioscontratados = ServicioContratado::where('proveedor_id', $request->id)->with('servicio','estatus','cliente')->get();

        return \Response::json(['error' => 'false', 'msg' => $servicioscontratados, 'status' => '200'], 200);
    }


    public function obtieneServiciosproveedor(Request $request){

        $proveedor = Proveedor::find($request->id);

        $serviciosactivos = ProveedorServicio::where('proveedores_id',$proveedor->id)->with('servicioscontratados')->get();

        return \Response::json(['error' => 'false', 'msg' => $serviciosactivos, 'status' => '200'], 200);
    }

    public function enviarRestablecerPassword(Request $request){
      $usuario = Usuario::where('email',$request->email)->where('tipo_usuarios_id', 1)->first();
      if ($usuario){
        //Cambia el estatus de los otros registros como ya confirmado, para que solo valide el actual
        Restablecer::where('user_id',$usuario->id)->update(['confirmado' => 1]);
        //creacion del token
        $token_reset= str_random(30);
        //Crea nuevo registro
        $restablecer = new Restablecer();
        $restablecer->user_id = $usuario->id;
        $restablecer->token = $token_reset;
        $restablecer->save();

        $data["nombre"] = $usuario->nombre;
        $data["email"] =  $usuario->email;
        $data["token_reset"] = $token_reset;

        Mail::send('restablecer.verify',['data' => $data], function ($message) use ($data){
          $message->to($data["email"])->subject('Restablecer contraseña');
        });
      }
       return \Response::json(['error' => 'false', 'msg' => 'Por favor restablesca su contraseña a traves de nuestro correo!', 'status' => '200'], 200);
    }    



}
