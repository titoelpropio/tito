@extends('layouts.inicio')
	@section('contenido')
	@include('alerts.request')
		{!!Form::model($categoria,['route'=>['categoria.update',$categoria],'method'=>'PUT'])!!}
			@include('categoria.forms.cat')
			{!!Form::submit('Actualizar',['class'=>'btn btn-primary'])!!}
		{!!Form::close()!!}

		{!!Form::open(['route'=>['categoria.destroy', $categoria], 'method' => 'DELETE'])!!}
			{!!Form::submit('Eliminar',['class'=>'btn btn-danger'])!!}
		{!!Form::close()!!}
	@endsection