@extends('layouts.inicio')
@section('contenido')
<H1>EMPRESA</H1>
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    @include('alerts.request')
	{!!Form::open(['route'=>'empresa.store', 'method'=>'POST'])!!}	
		@include('empresa.forms.empresa')		
	{!!Form::submit('Registrar',['class'=>'btn btn-primary'])!!}
	{!!Form::reset('Cancelar',['class'=>'btn btn-danger'])!!}
	{!!Form::close()!!}
	</div>
</div>
	@endsection