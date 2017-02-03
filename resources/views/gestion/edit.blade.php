@extends('layouts.inicio')
	@section('contenido')
	@include('alerts.request')
        <div class="col-lg-4 col-sm-4 col-md-4 col-xs-4" >
		{!!Form::model($gestion,['route'=>['gestion.update',$gestion],'method'=>'PUT'])!!}
			@include('gestion.forms.ges')
			{!!Form::submit('Actualizar',['class'=>'btn btn-primary'])!!}
		{!!Form::close()!!}
</div>

		
	@endsection