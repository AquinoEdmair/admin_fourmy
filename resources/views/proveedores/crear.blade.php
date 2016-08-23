@extends('layouts.app')
@include('layouts.partials.scripts')

@section('htmlheader_title')
	Crear proveedor

@endsection


@section('main-content')
 <h2>Crear nuevo proveedor</h2>
 <hr>
@include('errors.error')
<div class="panel-body">
<form action="{{ url('/proveedores') }}" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group has-feedback col-md-8">
                    <input type="text" class="form-control" placeholder="Escribir nombre completo" name="nombre_completo" value="{{ old('nombre_completo') }}"/>
                </div>
                <div class="form-group has-feedback col-md-8">
                    <input type="text" class="form-control" placeholder="Escribir email" name="email" value="{{ old('email') }}"/>
                </div>
                <div class="form-group has-feedback col-md-8">
                    <input type="password" class="form-control" placeholder="Escribir contraseña" name="password"/>
                </div>
                <div class="form-group has-feedback col-md-8">
                    <input type="password" class="form-control" placeholder="Repetir contraseña" name="password_confirmation"/>
                </div>
                <div class="form-group has-feedback col-md-8">
                    <input type="text" class="form-control" placeholder="Escribir número de telefono" name="telefono" value="{{ old('telefono') }}"/>
                </div>
                <div class="form-group has-feedback col-md-8">
                    <input type="text" class="form-control" placeholder="Escribir dirección" name="direccion" value="{{ old('direccion') }}"/>
                </div>
                <div class="form-group has-feedback col-md-8">
                    <input type="text" class="form-control" placeholder="Escribir ciudad" name="ciudad" value="{{ old('ciudad') }}"/>
                </div>
                <div class="form-group has-feedback col-md-8">
                    <input type="text" class="form-control" placeholder="Escribir RFC" name="rfc" value="{{ old('rfc') }}"/>
                </div>
                <div class="col-md-8 col-sm-6 col-xs-12">
                        <div class="form-group">
                        <br/>
                     <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nombre">Fecha de nacimiento:</label>
                            <div class="input-group">
                                <input type="text" class="form-control datepicker" name="fecha_nacimiento" value="{{ old('fecha_nacimiento') }}">
                                <div class="input-group-addon">
                                    <span class="glyphicon glyphicon-th"></span>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="form-group has-feedback col-md-8">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nombre">Seleccionar genero:</label>
                <label class="checkbox-inline"><input type="checkbox" value="hombre" name="genero">Hombre</label>
                <label class="checkbox-inline"><input type="checkbox" value="mujer" name="genero">Mujer</label>
                </div>
                <div class="form-group has-feedback col-md-8">
                     
                     <label class="control-label col-md-4 col-sm-3 col-xs-12" for="nombre">Seleccionar servicio(s):</label>
                     <select id="example-multiple-selected" name="servicios[]" multiple="multiple">
                       @foreach($servicios as $servicio)
                           <option value="{{ $servicio->id }}">{{ $servicio->servicio }}</option>
                           @endforeach
                     </select>
                </div>
                <br>
                <br>
                <div class="form-group has-feedback col-md-8">

                {!!Form::open(array('url' => 'empresas', 'class' => 'form-horizontal form-label-left', 'files' => true))!!}

                <label class="control-label col-md-2" for="empresa">Empresa:
                </label>
                <div class="col-md-5 col-sm-10">
                    <select name="empresa" value="{{ old('empresa') }}" class="form-control">
                        <option>Seleccionar Empresa</option>
                        @foreach($empresas as $empresa)
                        @if(old('empresa')==$empresa->id)
                        <option value="{{$empresa->id}}" selected>{{$empresa->empresa}}</option>
                          @else
                            <option value="{{$empresa->id}}">{{$empresa->empresa}}</option>
                          @endif
                        @endforeach
                    </select>
                </div>
                </div>



                <div class="form-group col-md-8">
                <div style="width: 200px; margin: 0 auto; padding-top:20px;"> 
                    <div class="col-xs-12 col-md-12">
                        <button type="submit" class="btn btn-primary btn-block btn-flat pull-right">Crear proveedor</button>
                    </div><!-- /.col -->
                </div>
                </div>
</form>
</div>

@include('layouts.partials.scripts_auth')

@endsection