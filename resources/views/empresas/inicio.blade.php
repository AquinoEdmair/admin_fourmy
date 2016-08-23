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

<a href="{{ url('/empresas/create') }}" class="btn btn-lg btn-primary"><span class="glyphicon glyphicon-plus"></span> Agregar Empresa</a>
<hr> 

<div class="panel panel-primary">
<div class="panel-heading">
    <h3 class="panel-title">Lista de empresas</h3>
  </div>
  <div class="panel-body">
  <table class="table table-bordered table-responsive">
    <tr>
    	<td class="info"><strong>Empresa</strong></td>
      <td class="info"><strong>Logo</strong></td>
      <td class="info"><strong>Acciones</strong></td>
    </tr>
    @foreach($empresas as $empresa)
    <tr>
    <td> {{ $empresa->empresa }}</td>
    <td class=" last"><img src='{{asset($empresa->imagen)}}' class="thumb img-responsive" height="42" width="42"></td>
    <td>
      <div class="col-md-6"> 
      	<a href="{{URL::to('empresas/'.$empresa->id.'/edit')}}" class="btn btn-sm btn-success"><span class="glyphicon glyphicon-edit"></span> Editar</a>
      	{!! Form::open(array('url'=>'empresas/'.$empresa->id, 'class'=>'edition', 'method'=>'delete')) !!}
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