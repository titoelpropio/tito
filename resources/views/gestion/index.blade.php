@extends('layouts.inicio')
	
	@section('contenido')
        @if(Session::has('message'))
<div class="alert alert-success alert-dismissible" role="alert">
	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	{{Session::get('message')}}
</div>
@endif

@include('alerts.errors')
@include('alerts.cargando')
                @include('gestion.modal')
                 <button class="btn btn-success" data-toggle='modal' data-target='#myModal'>
                    <i class="fa fa-plus-square" aria-hidden="true"></i>     
                </button>
               
  <div class="row">	
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	<div class="table-responsive">
		<H1>Gestion</H1>
                <input type="hidden" class="" id="token" value="{{csrf_token()}}" >
		<table class="table table-striped table-bordered table-condensed table-hover">
		<thead>
		<th><CENTER>Gestion</CENTER></th>
                
		<th><CENTER>Fecha inicio</CENTER></th>
		<th><CENTER>Fecha fin</CENTER></th>
		<th><CENTER>Operacion</CENTER></th>
		
		
		</thead>
		 @foreach ($gestion as $ges)
			<TR>
			<td><CENTER>{{$ges->nombre_gestion}}</CENTER></td>
			<td><CENTER>{{$ges->fecha_inicio}}</CENTER></td>
		
			<td><CENTER>{{$ges->fecha_fin}}</CENTER></td>
           
		
			
			<td><CENTER>
			{!!link_to_route('gestion.edit', $title = 'Editar', $parameters = $ges->id, $attributes = ['class'=>'btn btn-primary'])!!}
                       <?php 
                if ($ges->estado==1) {
                    echo "<button data-status=0 class='btn btn-danger' onclick=desactivar_gestion(".$ges->id.",this)>DESACTIVAR</button>";
                }
                ?>
			</CENTER></td>
		</TR>
		@endforeach 
		</table>
	{!!$gestion->render()!!}
	</div>
</div>
</div>
                <script src="{{asset('js/gestion.js')}}">
    
                </script>
	@endsection