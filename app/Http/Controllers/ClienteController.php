<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Usuario;
use App\Cliente;
use App\TipoUsuario;
use App\Restablecer;

use Validator;
use Mail;
use DB;

class ClienteController extends Controller
{

    public function index()
    {
        $clientes = Cliente::with('promedioCalificaciones')->with('usuario')->get();
        return view('clientes.inicio', compact('clientes'));
    }

    public function show($id)
    {
        $cliente = Cliente::with('usuario')->find($id);
        return view('clientes.detalles',['cliente' => $cliente]);
    }

    public function store(Request $request)
    {

        $rules = [
            'nombre' => 'required',
            'email' => 'required|email|unique:tbl_usuarios',
            'password' => 'required|min:6'
        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails())
        {
            return \Response::json(['error' => 'true', 'msg' => $validator->errors()->all(), 'status' => '200'], 200);
        }

        $confirmation_code = str_random(30);

        $tipousuario = TipoUsuario::where('tipo_usuario','Cliente')->first();

        $usuario =  new Usuario();
        $usuario->nombre = $request->nombre;
        $usuario->email = $request->email;
        $usuario->tipo_usuarios_id = $tipousuario->id;
		$usuario->password = bcrypt($request->password);

        $data["nombre"] = $request->nombre;
        $data["email"] =  $request->email;
        $data["confirmation_code"] = $confirmation_code;

        if($usuario->save())
        {

        	$cliente = new Cliente();
        	$cliente->confirmation_code = $confirmation_code;
        	$cliente->usuarios_id = $usuario->id;
        	$cliente->save();

        	Mail::send('mail.verify',['data' => $data], function ($message) use ($data){
				    $message->to($data["email"])->subject('Verifica tu direccion de email');
				});
        }else{
        	return \Response::json(['error' => 'true','msg' => 'Error al crear usuario', 'status' => '200'], 200);
        }

        return \Response::json(['error' => 'false', 'msg' => 'Por favor confirme su registro a traves de nuestro correo!', 'status' => '200'], 200);
    }

    public function confirmar($confirmation_code)
    {
    	if(!$confirmation_code)
        {
            throw new InvalidConfirmationCodeException;
        }
        $cliente = Cliente::where('confirmation_code', $confirmation_code)->where('confirmed',0)->first();

        if(!$cliente){
        	throw new InvalidConfirmationCodeException;
        }

        $cliente->confirmed = 1;
        $cliente->confirmation_code = null;

        if(!$cliente->save()){
        	throw new InvalidConfirmationCodeException;
        }

        return  view('mail.success');
    }

    public function cambiarRestablecerPassword($token){
      $restablecer = Restablecer::where("token",$token)->where('confirmado',0)->first();
      if($restablecer){
        return view('restablecer.nueva', compact('token'));
      }
      return  view('restablecer.failed');
    }

    public function cambiarPassword(Request $request){
      $rules = [
          '_token_reset' => 'required',
          'password' => 'required|min:6|confirmed',
          'password_confirmation' => 'required|min:6'
      ];

      $data = [
          'password.required' => 'La contraseña es necesaria',
          'password.min' => 'La contraseña debe tener minimo 3 caracteres',
          'password.confirmed' => 'Las contraseñas no coinciden ',
      ];

      $validator = Validator::make($request->all(), $rules, $data);
      if($validator->fails())
      {
        return redirect()->back()
        ->withErrors($validator->errors());
      }
      $restablecer = Restablecer::where("token",$request->_token_reset)->first();
      if($restablecer->confirmado==0){
        $restablecer->confirmado=1;
        $restablecer->save();
        $usuario = Usuario::find($restablecer->user_id);
        $usuario->password = bcrypt($request->password);
        $usuario->save();

      }else{
        return  view('restablecer.failed');
      }
      return  view('restablecer.success');
    }


}
