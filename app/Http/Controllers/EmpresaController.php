<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;
use App\Empresa;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Auth;

class EmpresaController extends Controller
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
        $empresas = Empresa::all();
        return view('empresas.inicio', compact('empresas'));
    }

    /**
     * Show the form for creating a new resource. 
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('empresas.crear');
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
                'empresa' => 'required|unique:tbl_empresas|',
                'email' => 'required|unique:tbl_empresas|',
                'ciudad' => 'required|',
                'direccion' => 'required|',
                'telefono' => 'required|numeric|',
                'persona_contacto' => 'required|',
                'website' => 'required|',
                'imagen' => 'required|image',
            ];

            $data = [
                'empresa.required' => 'El nombre de la empresa no debe estar vacio',
                'empresa.regex' => 'El nombre es invalido',
                'empresa.unique' => 'El nombre de la empresa ya existe',
                'email.required' => 'El email no debe estar vacio',
                'email.unique' => 'El correo ya esta en uso',
                'ciudad.required' => 'El campo ciudad no debe estar vacio',
                'direccion.required' => 'El campo direccion no debe estar vacio',
                'telefono.required' => 'El campo telefono no debe estar vacio',
                'telefono.numeric' => 'El telefono deben ser numeros',
                'persona_contacto.required' => 'El campo telefono no debe estar vacio',
                'website.required' => 'El campo website no debe estar vacio',
                'imagen.required' => 'Debe seleccionar una imagen',
                'imagen.image' => 'El archivo no es valido', 
            ];

            $validar = Validator::make($request->all(),$rules,$data);

            if($validar->fails())
            {
                return redirect()->back()
                ->withErrors($validar->errors())->withInput();
            }else{
                
                $file = Input::file('imagen');
                $destinationPath = 'imagenes/empresas/';
                $filename =uniqid().".".$file->getClientOriginalExtension();

                $imagename =$destinationPath.$filename;

                if($file->move($destinationPath,$filename))
                {
                    $empresa = new Empresa();
                    $empresa->empresa = $request->empresa;
                    $empresa->email = $request->email;
                    $empresa->ciudad = $request->ciudad;
                    $empresa->direccion = $request->direccion;
                    $empresa->telefono = $request->telefono;
                    $empresa->website = $request->website;
                    $empresa->persona_contacto = $request->persona_contacto;
                    $empresa->imagen = $imagename;
                    $empresa->save();
                }
                return redirect('/empresas');
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
        $empresa = Empresa::find($id);
        return view('empresas.editar',['empresa' => $empresa]);

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
                'empresa' => 'required|unique:tbl_empresas,empresa,'.$id,
                'email' => 'required|unique:tbl_empresas,empresa,'.$id,
                'ciudad' => 'required|',
                'direccion' => 'required|',
                'telefono' => 'required|numeric|',
                'persona_contacto' => 'required|',
                'website' => 'required|',
                'imagen' => 'image',
            ];

            $data = [
                'empresa.required' => 'El nombre de la empresa no debe estar vacio',
                'empresa.regex' => 'El nombre es invalido',
                'empresa.unique' => 'El nombre de la empresa ya existe',
                'email.required' => 'El email no debe estar vacio',
                'email.unique' => 'El correo ya esta en uso',
                'ciudad.required' => 'El campo ciudad no debe estar vacio',
                'direccion.required' => 'El campo direccion no debe estar vacio',
                'telefono.required' => 'El campo telefono no debe estar vacio',
                'telefono.numeric' => 'El telefono deben ser numeros',
                'persona_contacto.required' => 'El campo telefono no debe estar vacio',
                'website.required' => 'El campo website no debe estar vacio',
                'imagen.image' => 'El archivo no es valido',
            ];

            $validar = Validator::make($request->all(),$rules,$data);

            if($validar->fails())
            {
                return redirect()->back()
                ->withErrors($validar->errors())->withInput();
            }else{

                    $empresa = Empresa::find($id);
                    $empresa->empresa = $request->empresa;
                    $empresa->email = $request->email;
                    $empresa->ciudad = $request->ciudad;
                    $empresa->direccion = $request->direccion;
                    $empresa->telefono = $request->telefono;
                    $empresa->website = $request->website;
                    $empresa->persona_contacto = $request->persona_contacto;
                    $empresa->save();
                        
                    $destinationPath = 'imagenes/empresas/';


                    $file = Input::file('imagen');
                    if($file){
                        $filename =uniqid().".".$file->getClientOriginalExtension();
                        $imagename =$destinationPath.$filename;
                        if($file->move($destinationPath,$filename))
                        {
                            $empresa->imagen = $imagename;
                        }
                    }

                    $empresa->save();
                    

                return redirect('/empresas');
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
        Empresa::destroy($id);
        return redirect('empresas');
    }
}