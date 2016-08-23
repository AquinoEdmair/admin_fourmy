<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;
use App\Servicio;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class ServiciosController extends Controller
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
        $servicios = Servicio::all();
        return view('servicios.inicio', compact('servicios'));
    }

    /**
     * Show the form for creating a new resource. 
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('servicios.crear');
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
                'servicio' => 'required|unique:tbl_servicios|',
                'precio_normal' => 'required|numeric|',
                'precio_express' => 'required|numeric|',
                'horas_servicio' => 'required|integer|',
                'observaciones' => 'required|',
                'imagen' => 'required|image',
            ];

            $data = [
                'servicio.required' => 'El nombre del servicio no debe estar vacio',
                'servicio.regex' => 'El nombre es invalido',
                'servicio.unique' => 'El nombre del servicio ya existe',
                'precio_normal.required' => 'El campo precio normal no debe estar vacio',
                'precio_normal.numeric' => 'Precio no valido',
                'precio_express.required' => 'El precio express no debe estar vacio',
                'precio_express.numeric' => 'Precio no valido',
                'horas_servicio.required' => 'El campo horas de servicio no debe estar vacio',
                'horas_servicio.integer' => 'Las horas de servicio deben ser en horas enteras',
                'observaciones.required' => 'El campo observaciones no debe estar servicio',
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
                $destinationPath = 'imagenes/servicios/';
                $filename =uniqid().".".$file->getClientOriginalExtension();
                $imagename =$destinationPath.$filename;

                if($file->move($destinationPath,$filename))
                {
                    $servicio = new Servicio();
                    $servicio->servicio = $request->servicio;
                    $servicio->precio_normal = $request->precio_normal;
                    $servicio->precio_express = $request->precio_express;
                    $servicio->horas_servicio = $request->horas_servicio;
                    $servicio->observaciones = $request->observaciones;
                    $servicio->imagen = $imagename;
                    $servicio->save();
                }
                return redirect('/servicios');
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
        $servicio = Servicio::find($id);
        return view('servicios.editar',['servicio' => $servicio]);

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
                'servicio' => 'required|unique:tbl_servicios,servicio,'.$id,
                'precio_normal' => 'required|numeric|',
                'precio_express' => 'required|numeric|',
                'horas_servicio' => 'required|integer|',
                'observaciones' => 'required|',
                'imagen' => 'image',
            ];

            $data = [
                'servicio.required' => 'El nombre del servicio no debe estar vacio',
                'servicio.regex' => 'El nombre es invalido',
                'servicio.unique' => 'El nombre del servicio ya existe',
                'precio_normal.required' => 'El campo precio normal no debe estar vacio',
                'precio_normal.numeric' => 'Precio no valido',
                'precio_express.required' => 'El precio express no debe estar vacio',
                'precio_express.numeric' => 'Precio no valido',
                'horas_servicio.required' => 'El campo horas de servicio no debe estar vacio',
                'horas_servicio.integer' => 'Las horas de servicio deben ser en horas enteras',
                'observaciones.required' => 'El campo observaciones no debe estar servicio',
                'imagen.image' => 'El archivo no es valido',
            ];

            $validar = Validator::make($request->all(),$rules,$data);

            if($validar->fails())
            {
                return redirect()->back()
                ->withErrors($validar->errors())->withInput();
            }else{

                    $servicio = Servicio::find($id);
                    $servicio->servicio = $request->servicio;
                    $servicio->precio_normal = $request->precio_normal;
                    $servicio->precio_express = $request->precio_express;
                    $servicio->horas_servicio = $request->horas_servicio;
                    $servicio->observaciones = $request->observaciones;
                    $servicio->save();
                        
                    $destinationPath = 'imagenes/servicios/';


                    $file = Input::file('imagen');
                    if($file){
                        $filename =uniqid().".".$file->getClientOriginalExtension();
                        $imagename =$destinationPath.$filename;
                        if($file->move($destinationPath,$filename))
                        {
                            $servicio->imagen = $imagename;
                        }
                    }

                    $servicio->save();
                    

                return redirect('/servicios');
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
        Servicio::destroy($id);
        return redirect('servicios');
    }
}