@extends('layouts.app')

@section('htmlheader_title')
    Crear servicio
@endsection


@section('main-content')
 <h2>Crear nuevo servicio</h2>
 <hr>
<div class="panel-body">
<div class="col-md-12">
@include('errors.error')
<form action="{{ url('/servicios') }}" method="post" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" placeholder="Nombre servicio" name="servicio"/>
                    <span class="glyphicon glyphicon-shopping-cart form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" placeholder="Precio normal" name="precio_normal"/>
                    <span class="glyphicon glyphicon-usd form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" placeholder="Precio express" name="precio_express"/>
                    <span class="glyphicon glyphicon-usd form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" placeholder="Horas de servicio" name="horas_servicio"/>
                    <span class="glyphicon glyphicon-dashboard form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" placeholder="observaciones" name="observaciones"/>
                    <span class="glyphicon glyphicon-eye-open form-control-feedback"></span>
                </div>

                <div class="row">
                    <div class="form-group has-feedback">
                        <label class="control-label col-sm-3" for="imagenactual">Imagen:</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <img src='{{asset('/img/boxed-bg.jpg')}}' class="thumb" height="100" width="100" alt="a picture" id="blah">
                        </div>
                    </div>
                    <div class="form-group has-feedback">
                       <label class="control-label col-md-3" for="imagen">Seleccionar Imagen:</label>
                       <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="file" name="imagen" required="required" class="form-control col-md-7 col-xs-12" id="imgInp"/>
                        </div>
                    </div>
                </div>

                <br>
                &nbsp; 
                <div class="row">
                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                    <div style="width: 200px; margin: 0 auto;"> 
                        <div class="col-xs-12 col-md-12">
                            <button type="submit" class="btn btn-primary btn-block btn-flat pull-right">Crear servicio</button>
                        </div><!-- /.col -->
                    </div>
                </div>
            </form>
            </div>
            </div>

    @include('layouts.partials.scripts_auth')
    <script type="text/javascript" src="{{URL::asset('js/InputFile.js')}}"></script>


@endsection