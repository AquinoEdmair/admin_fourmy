@extends('layouts.app')

@section('htmlheader_title')
    Editar empresa
@endsection


@section('main-content')
 <h2>Editar empresa</h2>
 <hr>
<div class="panel-body">
<div class="col-md-8">
@include('errors.error')
{!! Form::open(array('url'=>'empresas/'.$empresa->id, 'class'=>'form-horizontal', 'method'=>'put', 'files' => true)) !!}
{!! Form::token() !!}
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" placeholder="Nombre empresa" name="empresa" value="{{ $empresa->empresa }}"/>
                    <span class="fa fa-building form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" placeholder="Email" name="email" value="{{ $empresa->email }}"/>
                    <span class="fa fa-building form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" placeholder="Ciudad" name="ciudad" value="{{ $empresa->ciudad }}"/>
                    <span class="fa fa-building form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" placeholder="Direccion" name="direccion" value="{{ $empresa->direccion }}"/>
                    <span class="fa fa-building form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" placeholder="Telefono" name="telefono" value="{{ $empresa->telefono }}"/>
                    <span class="fa fa-building form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" placeholder="Persona contacto" name="persona_contacto" value="{{ $empresa->persona_contacto }}"/>
                    <span class="fa fa-building form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" placeholder="Website" name="website" value="{{ $empresa->website }}"/>
                    <span class="fa fa-building form-control-feedback"></span>
                </div>
                <div class="row">
                    <div class="form-group has-feedback">
                    <label class="control-label col-sm-3" for="imagenactual">Imagen:</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                        <img src='{{asset($empresa->imagen)}}' class="thumb" height="100" width="100" alt="a picture" id="blah">
                        </div>
                    </div>
                    <div class="form-group has-feedback">
                       <label class="control-label col-md-3" for="imagen">Seleccionar Imagen:</label>
                       <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="file" name="imagen" class="form-control col-md-7 col-xs-12" id="imgInp">
                        </div>
                    </div>
                </div>

                <br>


                <div class="row">
                 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                <div style="width: 200px; margin: 0 auto;"> 
                    <div class="col-xs-12 col-md-12">
                        <button type="submit" class="btn btn-primary btn-block btn-flat pull-right">Actualizar</button>
                    </div><!-- /.col -->
                </div>
                </div> 
            </div>
            </div>

    @include('layouts.partials.scripts_auth')
    <script type="text/javascript" src="{{URL::asset('js/InputFile.js')}}"></script>


@endsection