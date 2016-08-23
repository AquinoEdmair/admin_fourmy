 @extends('layouts.app')

@section('htmlheader_title')
	Empresas

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


<div class="panel panel-primary">
<div class="panel-heading">
    <h3 class="panel-title">Lista de clientes</h3>
  </div>
  <div class="panel-body">
  <table class="table table-bordered table-responsive">
    <tr>
    	<td class="info"><strong>Nombre</strong></td>
      <td class="info"><strong>Email</strong></td>
      <td class="info"><strong>Telefono</strong></td>
      <td class="info"><strong>Calificación</strong></td>
      <td class="info"><strong>Imagen</strong></td>      
      <td class="info"><strong>Acción</strong></td>
    </tr>
    @foreach($clientes as $cliente)
    <tr>
    <td> {{ $cliente->usuario->nombre }}</td>
    <td> {{ $cliente->usuario->email }}</td>
    <td> {{ $cliente->telefono }}</td>
    <td> {{ $cliente->promedioCalificaciones[0]->puntuacion }}</td>
    <td class=" last"><img src='{{asset($cliente->usuario->img_perfil)}}' class="thumb img-responsive" height="42" width="42"></td>
    <td>
      <div class="col-md-6"> 
      	<a href="{{URL::to('clientes/'.$cliente->id)}}" class="btn btn-sm btn-success"><span class="glyphicon glyphicon-edit"></span>Detalles</a>
      </div>
    </td>
    </tr>
    @endforeach

  </table>
    
 </div>
 </div>




@endsection  