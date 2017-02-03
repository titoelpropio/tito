@extends ('layouts.inicio')
@section ('contenido')
@if(Session::has('message'))
<div class="alert alert-success alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    {{Session::get('message')}}
</div>
@endif
@include('alerts.cargando')
<center><H1><strong>SUMAS Y SALDOS</strong></H1></center>  
<span style="font-size:15pt ">Empresa: <span style="font-size: 20pt">{{$id_empresa[0]->nombre}}</span></span>
<div class="row">	
    <div class="col-lg-3 col-md-3 col-sm-5 col-xs-12">
        <div class="form-group" >
            <button class="btn btn-primary" onclick="sumas_saldos(1)"> Buscar</button>
        <input type="date" id="fecha" class="form-control">
         <input type="date" id="fecha1" class="form-control">
        </div>
      
    </div>
   <div class="col-lg-3 col-md-3 col-sm-5 col-xs-12 pull-right">
        <span style="font-size: 15pt ">Gestion Actual: <span style="font-size:20pt ">{{$gestion[0]->nombre_gestion}}</span></span><br>
        <input id="fecha_inicial" type="hidden" value="{{$gestion[0]->fecha_inicio}}">
            <div class="form-group" >
                
                <button class="btn btn-success" onclick="sumas_saldos(0)">Gestion actual</button>
            </div>
        </div>
    </div>
    <div class="row">	
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="table-responsive">	
               

                <table class="table table-striped table-bordered table-condensed table-hover">
                    <thead style='background-color: #8CDF33'>
                    <th ><CENTER>Codigo</CENTER></th>
                    <th><CENTER>Nombre</CENTER></th>
                  <th><CENTER>Debe Bs</CENTER></th>	
                    <th><CENTER>Haber Bs</CENTER></th>
                  <th><CENTER>Deudor</CENTER></th>
                    <th><CENTER>Acreedor</CENTER></th>
                    </thead>

                    <tbody id="tabla_e">
                        
                    </tbody>
                        
                </table>

            </div>

        </div>
    </div>
<script src="{{asset('js/reportes.js')}}">  
</script>
    @endsection

