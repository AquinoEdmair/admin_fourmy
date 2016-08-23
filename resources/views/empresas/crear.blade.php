@extends('layouts.app')

@section('htmlheader_title')
    Agregar Empresa
@endsection


@section('main-content')
 <h2>Agregar nueva empresa</h2>
 <hr>
<div class="panel-body">
<div class="col-md-12">
@include('errors.error')
<form action="{{ url('/empresas') }}" method="post" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" placeholder="Nombre de la empresa" name="empresa" value="{{ old('empresa') }}"/>
                    <span class="fa fa-building form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}"/>
                    <span class="fa fa-building form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" placeholder="Ciudad" name="ciudad" value="{{ old('ciudad') }}"/>
                    <span class="fa fa-building form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" placeholder="Direccion" name="direccion" value="{{ old('direccion') }}"/>
                    <span class="fa fa-building form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" placeholder="Telefono" name="telefono" value="{{ old('telefono') }}"/>
                    <span class="fa fa-building form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" placeholder="Persona contacto" name="persona_contacto" value="{{ old('persona_contacto') }}"/>
                    <span class="fa fa-building form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" placeholder="Website" name="website" value="{{ old('website') }}"/>
                    <span class="fa fa-building form-control-feedback"></span>
                </div>
                <div class="row">
                    <div class="form-group has-feedback">
                        <label class="control-label col-sm-3" for="imagenactual">Imagen empresa:</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <img src='{{asset('/img/boxed-bg.jpg')}}' class="thumb" height="100" width="100" alt="a picture" id="blah">
                        </div>
                    </div>
                    <div class="form-group has-feedback">
                       <label class="control-label col-md-3"  for="imagen">Seleccionar Imagen:</label>
                       <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="file" name="imagen" value="{{ old('imagen') }} required="required" class="form-control col-md-7 col-xs-12" id="imgInp"/>
                        </div>
                    </div>
                </div>
                <br>
                &nbsp; 
                <div class="row">
                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                    <div style="width: 200px; margin: 0 auto;"> 
                        <div class="col-xs-12 col-md-12">
                            <button type="submit" class="btn btn-primary btn-block btn-flat pull-right">Agregar Empresa</button>
                        </div><!-- /.col -->
                    </div>
                </div>
            </form>
            </div>
            </div>

    @include('layouts.partials.scripts_auth')
    <script type="text/javascript" src="{{URL::asset('js/InputFile.js')}}"></script>


@endsection