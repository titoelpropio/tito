@extends ('layouts.inicio')
@section ('contenido')
@if(Session::has('message'))
<div class="alert alert-success alert-dismissible" role="alert">
	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	{{Session::get('message')}}
</div>
@endif
@include('alerts.request')
                @include('empresa.modal')
                <button class="btn btn-success" data-toggle='modal' data-target='#myModal'>
                    <i class="fa fa-plus-square" aria-hidden="true"></i>     
                </button>
               
		<div class="row">	
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="table-responsive">	
			<H1>EMPRESA</H1>
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th><center>ID</center></th>
						<th><center>NOMBRE</center></th>
						<th><center>DIRECCION</center></th>
						<th><center>TELEFONO</center></th>
						<th><center>CORREO</center></th>
					</thead>
					@foreach($empresa as $ed)
					<tr>
						<td><center>{{ $ed->id}}</center></td>
						<td><center>{{ $ed->nombre}}</center></td>
						<td><center>{{ $ed->direccion}}</center></td>
						<td><center>{{ $ed->telefono}}</center></td>
						<td><center>{{ $ed->correo}}</center></td>
						<td><CENTER>
						{!!link_to_route('empresa.edit', $title = 'Editar', $parameters = $ed->id, $attributes = ['class'=>'btn btn-primary'])!!}
						</CENTER></td>
					</tr>
					@endforeach
				</table>
	{!!$empresa->render()!!}
			</div>

		</div>
	</div>

@endsection
