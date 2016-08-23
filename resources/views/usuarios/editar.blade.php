@extends('layouts.app')

@section('htmlheader_title')
	Usuarios
@endsection


@section('main-content')
 <h2>Editar usuario</h2>
 <hr>
@include('errors.error')
{!! Form::open(array('url'=>'usuarios/'.$user->id, 'class'=>'form-horizontal', 'method'=>'put')) !!}
{!! Form::token() !!}
 <div class="col-md-8">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" placeholder="" name="name" value="{{ $user->name }}"/>
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="email" class="form-control" placeholder="" name="email" value="{{ $user->email }}"/>
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" placeholder="Nueva contraseña" name="password"/>
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" placeholder="Repetir nueva contraseña" name="password_confirmation"/>
                    <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                </div>
                <div class="row">
                <div style="width: 200px; margin: 0 auto;"> 
                    <div class="col-xs-12 col-md-12">
                        <button type="submit" class="btn btn-primary btn-block btn-flat pull-right">Actualizar</button>
                    </div><!-- /.col -->
                </div>
                </div>
                </div>
            {!! Form::close() !!}
            
            

    @include('layouts.partials.scripts_auth')



@endsection