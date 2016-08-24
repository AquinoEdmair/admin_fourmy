@extends('layouts.app')

@section('htmlheader_title')
	Proveedores
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


<a href="{{ url('/proveedores/create') }}" class="btn btn-lg btn-primary"><span class="glyphicon glyphicon-plus"></span> Crear Proveedor</a>
<hr> 

<div class="panel panel-primary">
<div class="panel-heading">
    <h3 class="panel-title">Lista de proveedores</h3>
  </div>
  <div class="panel-body">
  <table class="table table-bordered table-responsive">
    <tr>
    	<td class="info"><strong>Nombre completo</strong></td>
      <td class="info"><strong>E-mail</strong></td>
      <td class="info"><strong>Telefono</strong></td>
      <td class="info"><strong>Calificación</strong></td>
      <td class="info"><strong>Acciones</strong></td>
    </tr>
    @foreach($proveedores as $proveedor)
    <tr>
    <td> {{ $proveedor->usuario->nombre }}</td>
    <td> {{ $proveedor->usuario->email }}</td>
    <td> {{ $proveedor->telefono }}</td>
    <td>
      @if(count($proveedor->promedioCalificaciones)>0)
        {{$proveedor->promedioCalificaciones[0]->puntuacion}}
      @else
        0
      @endif
    </td>
    <td>
      <div class="col-md-6">
        <div class="col-md-6">
        	<a href="{{URL::to('proveedores/'.$proveedor->id.'/edit')}}" class="btn btn-sm btn-success"><span class="glyphicon glyphicon-edit"></span> Editar</a>
        	{!! Form::open(array('url'=>'proveedores/'.$proveedor->id, 'class'=>'edition', 'method'=>'delete')) !!}
        </div>
        <div class="col-md-6">
        	<button type="submit" class="btn btn-sm btn-danger">
            <i class="glyphicon glyphicon-remove"></i> Borrar
        	</button>
          {!! Form::close() !!} 
        </div>
      </div>
    </td>
    </tr>
    @endforeach

  </table>
    
 </div>
 </div>




@endsection
