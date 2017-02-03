@extends('layouts.inicio')
	@section('contenido')
	@include('alerts.request')
		{!!Form::model($depreciacion,['route'=>['depreciacion.update',$depreciacion],'method'=>'PUT'])!!}
			@include('depreciacion.forms.cat')
			{!!Form::submit('Actualizar',['class'=>'btn btn-primary'])!!}
		{!!Form::close()!!}

		{!!Form::open(['route'=>['depreciacion.destroy', $depreciacion], 'method' => 'DELETE'])!!}
			{!!Form::submit('Eliminar',['class'=>'btn btn-danger'])!!}
		{!!Form::close()!!}
	@endsection