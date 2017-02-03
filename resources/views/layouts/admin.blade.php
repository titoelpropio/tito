
<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title></title>
        {!!Html::style('css/bootstrap.min.css')!!}
        {!!Html::style('css/metisMenu.min.css')!!}
        {!!Html::style('css/sb-admin-2.css')!!}
        {!!Html::style('css/font-awesome.min.css')!!}
        {!!Html::style('css/AdminLTE.min.css')!!}
        {!!Html::style('css/style.css')!!}

        {!!Html::script('js/jquery.min.js')!!}
                {!!Html::script('js/bootstrap.min.js')!!}
         {!!Html::style('css/toastr.css')!!}
         {!!Html::script('js/toastr.min.js')!!}
       
    </head>

    <body>
        <div id="wrapper">
            <div id="page-wrapper">
                <nav class="navbar navbar-inverse">
                    <div class="container-fluid">

                        <ul class="nav navbar-nav">

                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown"><B>GALLINAS PONEDORAS</B>
                                    <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="{!!URL::to('galpon')!!}"><B>POSTURA DE HUEVOS</B></a></li>
                                    <li><a href="{!!URL::to('alimentop')!!}"><B>ALIMENTO PONERAS</B></a></li>
                                </ul>
                            </li> 

                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown"><B>CRIAS RECRIAS</B>
                                    <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="{!!URL::to('criarecria')!!}"><B>CRIA RECRIA</B></a></li>
                                    <li><a href="{!!URL::to('alimentocria')!!}"><B>ALIMENTO CRIA RECRIA</B></a></li>
                                </ul>
                            </li> 

                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown"><B>GALPON</B>
                                    <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="{!!URL::to('galpon/create')!!}"><B>REGISTRAR GALPON</B></a></li>
                                    <li><a href="{!!URL::to('listagalpon')!!}"><B>LISTA DE GALPONES</B></a></li>
                                </ul>
                            </li> 

                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown"><B>EDAD</B>
                                    <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="{!!URL::to('edad/create')!!}"><B>REGISTRAR EDAD</B></a></li>
                                    <li><a href="{!!URL::to('edad')!!}"><b>LISTA DE EDADES</b></a></li>
                                </ul>
                            </li> 

                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown"><B>SILOS</B>
                                    <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="{!!URL::to('silo/create')!!}"><B>REGISTRAR SILO</B></a></li>
                                    <li><a href="{!!URL::to('silo')!!}"><B>LISTA DE SILOS</B></a></li>
                                </ul>
                            </li>

                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown"><B>GRANOS</B>
                                    <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="{!!URL::to('alimento/create')!!}"><B>REGISTRAR GRANO</B></a></li>
                                    <li><a href="{!!URL::to('alimento')!!}"><B>LISTA DE GRANOS</B></a></li>
                                </ul>
                            </li> 
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown"><B>VACUNAS</B>
                                    <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="{!!URL::to('vacuna/create')!!}"><B>REGISTRAR VACUNA</B></a></li>
                                    <li><a href="{!!URL::to('vacuna')!!}"><B>LISTA DE VACUNAS</B></a></li>
                                    <li><a href="{!!URL::to('vacunagalpon')!!}"><B>VACUNAR GALPON</B></a></li>
                                    <li><a href="{!!URL::to('vacuna-galpon')!!}"><B>GALPON VACUNADO</B></a></li>
                                </ul>
                            </li> 
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown"><B>REPORTES</B>
                                    <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="{!!URL::to('reporteponedoras')!!}"><B>REPORTE DE POSTURA HUEVO</B></a></li>
                                </ul>
                            </li> 

                        </ul>
                    </div>
                </nav>
                @yield('content')
            </div>
        </div>

  
      
  
        {!!Html::script('js/moment.js')!!}
        {!!Html::script('js/metisMenu.min.js')!!}
        {!!Html::script('js/sb-admin-2.js')!!}
        
    
        
     
     
    

    </body>

</html>
