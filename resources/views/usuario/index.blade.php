@extends('layouts.inicio')
	
	@section('contenido')
        @if(Session::has('message'))
<div class="alert alert-success alert-dismissible" role="alert">
	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	{{Session::get('message')}}
</div>
@endif
 @include('alerts.errors')
                @include('usuario.modal')
                 <button class="btn btn-success" data-toggle='modal' data-target='#myModal'>
                    <i class="fa fa-plus-square" aria-hidden="true"></i>     
                </button>
               
  <div class="row">	
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	<div class="table-responsive">
		<H1>Usuario</H1>
		<table class="table table-striped table-bordered table-condensed table-hover">
		<thead>
		<th><CENTER>ID</CENTER></th>
		<th><CENTER>Nombre</CENTER></th>
		<th><CENTER>Nick</CENTER></th>
		<th><CENTER>Empresa</CENTER></th>
		
		<th><CENTER>PRIVILEGIOS</CENTER></th>
		<th><CENTER>ESTADO</CENTER></th>
                <th><CENTER>Operacion</CENTER></th>
		
		</thead>
		 @foreach ($users as $tra)
			<TR>
			<td><CENTER>{{$tra->id}}</CENTER></td>
			<td><CENTER>{{$tra->name}}</CENTER></td>
			<td><CENTER>{{$tra->email}}</CENTER></td>
			<td><CENTER>{{$tra->id_empresa}}</CENTER></td>
			<td><CENTER><?php  
      if ($tra->privilegio==1) {
    echo "ADMINISTRADOR";
}  
ELSE  if ($tra->privilegio==2) echo   "CONTADOR";
else echo   "ANDROID";

                                                
                    ?> </CENTER></td>
                <td><CENTER> <?php  
      if ($tra->estado==1) {
    echo "ACTIVO";
} 
ELSE echo   "INACTIVO";
                                               
                    ?>    </CENTER></td>
			
			<td><CENTER>
			{!!link_to_route('usuario.edit', $title = 'Editar', $parameters = $tra, $attributes = ['class'=>'btn btn-primary'])!!}
			</CENTER></td>
		</TR>
		@endforeach 
		</table>
	{!!$users->render()!!}
	</div>
</div>
</div>
	@endsection