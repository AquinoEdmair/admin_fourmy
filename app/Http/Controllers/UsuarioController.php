<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\TipoUsuario;
use Auth;
use Validator;

class UsuarioController extends Controller
{
    /** 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */ 
    public function __construct()
    { 
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return Response
     */
    public function index()
    {
        $users = User::all();
        return view('usuarios.inicio', compact('users'));
    }

    /**
     * Show the form for creating a new resource. 
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('usuarios.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $rules = [
                'name' => 'required|min:3|max:100|regex:/^[A-Za-z \t]*$/i|',
                'email' => 'required|unique:users',
                'password' => 'required|min:6|max:20|',
                'password_confirmation' => 'required|min:6|max:20|same:password',
            ];

            $data = [
                'name.required' => 'El campo nombre no debe estar vacio',
                'name.min' => 'El nombre debe ser mayor a 3 caracteres',
                'name.max' => 'El nombre no debe ser mayor a 100 caracteres',
                'name.regex' => 'El nombre es invalido',
                'email.required' => 'El campo email no debe estar vacio',
                'email.unique' => 'El email ya existe',
                'password.required' => 'El campo password no debe estar vacio',
                'password.min' => 'El password debe ser mayor a 5 caracteres',
                'password.max' => 'El password no debe ser menor a 20 caracteres',
                'password.regex' => 'El password es invalido',
                'password_confirmation.same' => 'La contraseña debe ser igual en ambos campos',
            ];

            $validar = Validator::make($request->all(),$rules,$data);

            if($validar->fails())
            {
                return redirect()->back()
                ->withErrors($validar->errors())->withInput();
            }else{

                    $user = new User();
                    $user->name = $request->name;
                    $user->email = $request->email;
                    $user->password = $request->password;
                    $user->save();

                return redirect('/usuarios');
            }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('usuarios.editar',['user' => $user]);
    } 

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $rules = [
                'name' => 'required|min:3|max:100|regex:/^[A-Za-z \t]*$/i|',
                'email' => 'required|unique:users,email,'.$id,
                'password' => 'min:6|max:20|',
                'password_confirmation' => 'min:6|max:20|same:password',
            ];

            $data = [
                'name.required' => 'El nombre no debe de ser vacio',
                'name.min' => 'El nombre debe ser mayor a 3 caracteres',
                'name.max' => 'El nombre no debe ser mayor a 100 caracteres',
                'name.regex' => 'El nombre es invalido',
                'email.required' => 'El email no debe estar vacio',
                'email.unique' => 'El email ya existe',
                'password.min' => 'El password debe ser mayor a 5 caracteres',
                'password.max' => 'El password no debe ser menor a 20 caracteres',
                'password_confirmation.same' => 'La contraseña debe ser igual en ambos campos',
            ];

            $validar = Validator::make($request->all(),$rules,$data);

            if($validar->fails())
            {
                return redirect()->back()
                ->withErrors($validar->errors())->withInput();
            }else{

                $user = User::find($id);
                $user->name = $request->name;
                $user->email = $request->email;
                if (isset($request->password)) {
                    $user->password = $request->password;
                }
                $user->save();

                return redirect('usuarios');
            }
        
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);
        return redirect('usuarios');
    
    }
}
