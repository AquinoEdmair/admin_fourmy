@extends('layouts.app')

@section('htmlheader_title')
	FourMY
@endsection


@section('main-content')
<h1>Hola {{ Auth::user()->name }}!</h1>
<h1>Bienvenido a FourMY </h1> 
@endsection
