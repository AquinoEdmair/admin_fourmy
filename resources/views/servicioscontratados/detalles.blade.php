 @extends('layouts.app')

@section('htmlheader_title')
  Servicio contratado
    @include('layouts.partials.scripts')
@endsection


@section('main-content')
<div class="panel panel-primary"> 
  <div class="panel-heading">
   <h3 class="panel-title">Información del servicio contratado</h3>
  </div>
 <div class="panel-body">

<div class="row">
  <div class="col-md-12">
      <ul>
        <form class="form-horizontal">
         <div class="form-group">
           <label class="col-sm-2 control-label">Servicio:</label>
           <div class="col-sm-10">
              <p class="form-control-static">{{ $serviciocontratado->servicio->servicio }}</p>
           </div>
         </div>
         <div class="form-group">
           <label class="col-sm-2 control-label">Dirección:</label>
           <div class="col-sm-10">
              <p class="form-control-static">{{ $serviciocontratado->direccion }}</p>
           </div>
         </div>
         <div class="form-group">
           <label class="col-sm-2 control-label">Precio:</label>
           <div class="col-sm-10">
              <p class="form-control-static">{{ $serviciocontratado->precio }}</p>
           </div>
         </div>
         <div class="form-group">
           <label class="col-sm-2 control-label">Fecha contratación:</label>
           <div class="col-sm-10">
              <p class="form-control-static">{{ $serviciocontratado->fecha_contratacion }}</p>
           </div>
         </div>
         <div class="form-group">
           <label class="col-sm-2 control-label">Hora contratación:</label>
           <div class="col-sm-10">
              <p class="form-control-static">{{ $serviciocontratado->hora_contratacion }}</p>
           </div>
         </div>
         <div class="form-group">
           <label class="col-sm-2 control-label">Estatus:</label>
           <div class="col-sm-10">
              <p class="form-control-static">{{ $serviciocontratado->estatus->estatus_servicio }}</p>
           </div>
         </div>
         <div class="form-group">
           <label class="col-sm-2 control-label">Cliente:</label>
           <div class="col-sm-10">
              <p class="form-control-static">{{ $serviciocontratado->cliente->usuario->nombre }}</p>
           </div>
         </div>
         <div class="form-group">
           <label class="col-sm-2 control-label">Proveedor:</label>
           <div class="col-sm-10">
              <p class="form-control-static">
                @if($serviciocontratado->proveedor!=null)
                  {{ $serviciocontratado->proveedor->usuario->nombre }}
                @else
                  Ninguno
                @endif
              </p>
           </div>
         </div>
         <div class="form-group">
           <label class="col-sm-2 control-label">Observaciones:</label>
           <div class="col-sm-12">
              <p class="form-control-static">{{ $serviciocontratado->observaciones }}</p>
           </div>
         </div>
         </form>
      </ul>
    </div>
</div>

<div style="float: right;">
<a href="{{url('/servicioscontratados')}}" class="btn btn-primary">Regresar</a>
</div>
</div>
</div>

    @include('layouts.partials.scripts_auth')


@endsection