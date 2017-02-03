@extends('layouts.inicio')
@section('contenido')
@if(Session::has('message'))
<div class="alert alert-success alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    {{Session::get('message')}}
</div>
@endif
@include('alerts.request')
@include('alerts.cargando')
@include('cuenta.modal')



<div class="row">	
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="table-responsive">
            <H1>LISTA CUENTA</H1>
            {!! Form::open(['route'=> 'cuenta.index','method'=>'GET','class'=>'navbar-from navbar-left pull-right','role' =>'search'])!!}
            <div class="form-group ">
                {!!Form::text('cuenta',null,['class'=>'form-control','placeholder'=>'Cuenta'])!!}
            </div>
            <button class="btn btn-default " type="submit" > 
                <i class="fa fa-search" aria-hidden="true"></i>
            </button>
            {!!Form::close()!!}
            <table class="table table-striped table-bordered table-condensed table-hover">
                <thead>
                <th><CENTER>NOMBRE</CENTER></th>
                <th><CENTER>EMPRESA</CENTER></th>

                <th><CENTER>CODIGO</CENTER></th>
                <th><CENTER>HIJO</CENTER></th>
                <th><CENTER>ID_PADRE</CENTER></th>
                <th><CENTER>ESTADO</CENTER></th>
                <th><CENTER>UTILIZABLE</CENTER></th>
                <th><CENTER>OPERADOR</CENTER></th>



                </thead>
                @foreach($resultado as $result)
                <TR>
                    <td><CENTER>{{ $result->nombre_cuenta}}</CENTER></td>
                <td><CENTER>{{ $result->nombre}}</CENTER></td>
                <td><CENTER>{{ $result->codigo}}</CENTER></td>
                <td><CENTER>{{ $result->hijo}}</CENTER></td>
                <td><CENTER>{{ $result->id_padre}}</CENTER></td>
                <td><CENTER>{{ $result->estado}}</CENTER></td>
                <td><CENTER>{{ $result->utilizable}}</CENTER></td>

                <td><CENTER>
                    <button class="btn btn-primary" onclick="{{$result->id_cuenta}}" data-toggle='modal' data-target='#myModaledit'>Editar</button>
                    </CENTER></td>
                </TR>
                @endforeach
            </table>

        </div>
    </div>
</div>
@endsection