 @extends('layouts.app')

@section('htmlheader_title')
	Servicios Contratados
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
    <h3 class="panel-title">Lista de servicios contratados</h3>
  </div>
  <div class="panel-body">
  <table class="table table-bordered table-responsive">
    <tr>
    	<td class="info"><strong>Servicio</strong></td>
      <td class="info"><strong>Dirección</strong></td>
      <td class="info"><strong>Precio</strong></td>
      <td class="info"><strong>Fecha de contratación</strong></td>
      <td class="info"><strong>Estatus</strong></td>
      <td class="info"><strong>Cliente</strong></td>
      <td class="info"><strong>Proveedor</strong></td>
      <td class="info"><strong>Acción</strong></td>
    </tr>
    @foreach($servicioscontratados as $serviciocontratado)
    <tr>
    <td> {{ $serviciocontratado->servicio->servicio }}</td>
    <td> {{ $serviciocontratado->direccion }}</td>
    <td> {{ $serviciocontratado->precio }}</td>
    <td> {{ $serviciocontratado->fecha_contratacion }}</td>
    <td> Servicio {{ $serviciocontratado->estatus->estatus_servicio }}</td>
    <td> {{ $serviciocontratado->cliente->usuario->nombre }}</td>
    <td>
      @if($serviciocontratado->proveedor!=null)
        {{ $serviciocontratado->proveedor->usuario->nombre }}
      @else
        Ninguno
      @endif
    </td>
    <td>
      <div class="col-md-6"> 
      	<a href="{{URL::to('servicioscontratados/'.$serviciocontratado->id)}}" class="btn btn-sm btn-success"><span class="glyphicon glyphicon-edit"></span>Detalles</a>
      </div>
    </td>
    </tr>
    @endforeach

  </table>
    
 </div>
 </div>




@endsection  