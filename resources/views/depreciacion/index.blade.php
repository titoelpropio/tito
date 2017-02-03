@extends('layouts.inicio')
	
	@section('contenido')
        @if(Session::has('message'))
<div class="alert alert-success alert-dismissible" role="alert">
	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	{{Session::get('message')}}
</div>
@endif
@include('alerts.request')
                @include('depreciacion.modal')
                 <button class="btn btn-success" data-toggle='modal' data-target='#myModal'>
                    <i class="fa fa-plus-square" aria-hidden="true"></i>     
                </button>
               
  <div class="row">	
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	<div class="table-responsive">
		<H1>Depreciaciones</H1>
		<table class="table table-striped table-bordered table-condensed table-hover">
		<thead>
		<th><CENTER>CUENTA</CENTER></th>
                
		<th><CENTER>VIDA UTIL</CENTER></th>
		<th><CENTER>DEPRECIACION ANUAL</CENTER></th>
		<th><CENTER>OPERACION</CENTER></th>
		
		
		</thead>
		 @foreach ($depreciacion as $depre)
			<TR>
			<td><CENTER>{{$depre->nombre}}</CENTER></td>
			<td><CENTER>{{$depre->vida_util}}</CENTER></td>
			<td><CENTER>{{$depre->depreciacion_anual}}</CENTER></td>
		
			
			<td><CENTER>
			{!!link_to_route('depreciacion.edit', $title = 'Editar', $parameters = $depre->id, $attributes = ['class'=>'btn btn-primary'])!!}
			</CENTER></td>
		</TR>
		@endforeach 
		</table>
	
	</div>
</div>
</div>
	@endsection