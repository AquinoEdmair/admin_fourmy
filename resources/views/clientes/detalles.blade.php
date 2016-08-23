 @extends('layouts.app')

@section('htmlheader_title')
  Cliente
@endsection


@section('main-content')
<div class="panel panel-primary"> 
  <div class="panel-heading">
   <h3 class="panel-title">Información del cliente</h3>
  </div>
 <div class="panel-body">

<div class="row">
  <div class="col-md-12">
      <ul>
        <div class="col-sm-12">
        <img src='{{asset($cliente->usuario->img_perfil)}}' class="thumb img-responsive" height="42" width="42">
        <br>
        </div>
         <div class="form-group">
           <label class="col-sm-2 control-label">Nombre:</label>
           <div class="col-sm-10">
              <p class="form-control-static">{{ $cliente->usuario->nombre }}</p>
           </div>
         </div>
         <div class="form-group">
           <label class="col-sm-2 control-label">Nacimiento:</label>
           <div class="col-sm-10">
              <p class="form-control-static">{{ $cliente->fecha_nacimiento }}</p>
           </div>
         </div>
         <div class="form-group">
           <label class="col-sm-2 control-label">Genero:</label>
           <div class="col-sm-10">
              <p class="form-control-static">{{ $cliente->genero }}</p>
           </div>
         </div>
         <div class="form-group">
           <label class="col-sm-2 control-label">Email:</label>
           <div class="col-sm-10">
              <p class="form-control-static">{{ $cliente->usuario->email }}</p>
           </div>
         </div>
         <div class="form-group">
           <label class="col-sm-2 control-label">Telefono:</label>
           <div class="col-sm-10">
              <p class="form-control-static">{{ $cliente->telefono }}</p>
           </div>
         </div>
         <div class="form-group">
           <label class="col-sm-2 control-label">Ciudad:</label>
           <div class="col-sm-10">
              <p class="form-control-static">{{ $cliente->ciudad }}</p>
           </div>
         </div>
         <div class="form-group">
           <label class="col-sm-2 control-label">Dirección:</label>
           <div class="col-sm-10">
              <p class="form-control-static">{{ $cliente->direccion }}</p>
           </div>
         </div>
      </ul>
    </div>
</div>

<div style="float: right;">
<a href="{{url('/clientes')}}" class="btn btn-primary">Regresar</a>
</div>
</div>
</div>

    @include('layouts.partials.scripts_auth')


@endsection