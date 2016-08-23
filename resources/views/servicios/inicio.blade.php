@extends('layouts.app')

@section('htmlheader_title')
	Servicios

@endsection


@section('main-content')
    <style media="screen">
        .edition{
          margin: 0;
          width: 100px !important;
          float: left;
          padding-top: 10px;
        }
    </style>

<a href="{{ url('/servicios/create') }}" class="btn btn-lg btn-primary"><span class="glyphicon glyphicon-plus"></span> Crear Servicio</a>
<hr> 

<div class="panel panel-primary">
<div class="panel-heading">
    <h3 class="panel-title">Lista de servicios</h3>
  </div>
  <div class="panel-body">
  <table class="table table-bordered table-responsive">
    <tr>
    	<td class="info"><strong>Servicio</strong></td>
      <td class="info"><strong>Precio normal</strong></td>
      <td class="info"><strong>Precio express</strong></td>
      <td class="info"><strong>Horas</strong></td>
      <td class="info"><strong>Observaciones</strong></td>
      <td class="info"><strong>Acciones</strong></td>
    </tr>
    @foreach($servicios as $servicio)
    <tr>
    <td> {{ $servicio->servicio }}</td>
    <td> {{ $servicio->precio_normal }}</td>
    <td> {{ $servicio->precio_express }}</td>
    <td> {{ $servicio->horas_servicio }}</td>
    <td> {{ $servicio->observaciones }}</td>
    <td>
      <div class="col-md-6"> 
      	<a href="{{URL::to('servicios/'.$servicio->id.'/edit')}}" class="btn btn-sm btn-success edition"><span class="glyphicon glyphicon-edit"></span> Editar</a>
      	{!! Form::open(array('url'=>'servicios/'.$servicio->id, 'class'=>'edition', 'method'=>'delete')) !!}
      </div>
      <div class="col-md-6"> 
    	  <button type="submit" class="btn btn-sm btn-danger">
          <i class="glyphicon glyphicon-remove"></i> Borrar
    	  </button>
        {!! Form::close() !!} 
      </div>
    </td>
    </tr>
    @endforeach

  </table>
    
 </div>
 </div>




@endsection