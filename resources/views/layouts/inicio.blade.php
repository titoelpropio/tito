<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>SISTEMA CONTABLE</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.5 -->

      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <!-- Font Awesome -->
        {!!Html::style('css/font-awesome.min.css')!!}
        <!-- Theme style -->
        {!!Html::style('css/AdminLTE.min.css')!!}
        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        {!!Html::style('css/_all-skins.min.css')!!}
        {!!Html::style('css/bootstrap-select.min.css')!!}



        <link rel="apple-touch-icon" href="img/apple-touch-icon.png">
        <link rel="shortcut icon" href="img/favicon.ico">

    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">

            <header class="main-header">

                <!-- Logo -->
                <a href="{!!URL::to('empresa')!!}" class="logo">
                    <!-- mini logo for sidebar mini 50x50 pixels -->

                    <!-- logo for regular state and mobile devices -->
                    <span class="logo-lg"><b>CONTABILIDAD</b></span>
                </a>

                <!-- Header Navbar: style can be found in header.less -->
                <nav class="navbar navbar-static-top" role="navigation">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                        <span class="sr-only">Navegación</span>
                    </a>
                    <!-- Navbar Right Menu -->
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <!-- Messages: style can be found in dropdown.less-->

                            <!-- User Account: style can be found in dropdown.less -->
                            <li class="dropdown user user-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <small class="bg-red">Online</small>
                                    <span class="hidden-xs">{{Auth::user()->name}}</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <!-- User image -->
                                    <li class="user-header">

                                        <p>
                                            Desarrollando Software
                                            <small>CASA DE TITO</small>
                                        </p>

                                    </li>

                                    <!-- Menu Footer-->
                                    <li class="user-footer">

                                        <div class="pull-right">
                                            <a href="{!!URL::to('logout')!!}" class="btn btn-danger">CERRAR SESION</a>
                                        </div>
                                    </li>
                                </ul>
                            </li>

                        </ul>
                    </div>

                </nav>
            </header>
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="main-sidebar">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->

                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <li class="header"></li>

                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-cog"></i>
                                <span>Administrar</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                 @if(Auth::user()->privilegio==1)       
                                <li><a href="{!!URL::to('empresa')!!}"><i class="fa fa-building-o" aria-hidden="true"></i></i>Registrar Empresa</a></li>
                                <li><a href="{!!URL::to('usuario')!!}"><i class="fa fa-user"></i> Registrar Usuario</a></li>
                               
                                      @endif  
                            </ul>

                        </li>
                           <li class="treeview">
                            <a href="#">
                               <i class="fa fa-building" aria-hidden="true"></i></i>
                                <span>EMPRESA</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul  class="treeview-menu">
                                 <li><a href="{!!URL::to('categoria')!!}"><i class="fa fa-tasks"></i> Registrar Categoria</a></li>
                                <li><a href="{!!URL::to('moneda')!!}"  ><i class="fa fa-eur"></i> Registrar Moneda</a></li>
                                <li><a href="{!!URL::to('gestion')!!}"  > Registrar Gestion</a></li>
                                <li><a href="{!!URL::to('ufv')!!}"  > Registrar ufv</a></li>
                                <li><a href="{!!URL::to('depreciacion')!!}"  >Registrar Depresiacion</a></li>
                                <li><a href="{!!URL::to('plan_cuenta')!!}"  ><i class="fa fa-sort-amount-asc" aria-hidden="true"></i> Plan de Cuentas</a></li>
                                <li><a href="{!!URL::to('cuenta')!!}"  ><i class="fa fa-bars" aria-hidden="true"></i>Lista de Cuentas</a></li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa-calculator"></i>
                                <span>Asientos</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul id="listacategoria" class="treeview-menu">
                            </ul>
                       <li class="treeview">
                            <a href="#">
                                <i class="fa-calculator"></i>
                                <span>Asientos por gestion</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul  id="gestiones" class="treeview-menu">
                                  <li><a href="{!!URL::to('lista_asiento')!!}">Lista de Asientos</a></li>
                                   <li><a href="{!!URL::to('estado_resultado')!!}">Estado Resultado</a></li>
                                   <li><a href="{!!URL::to('sumas_saldos')!!}">SUMAS Y SALDO</a></li>
                                 <li><a href="{!!URL::to('libro_mayor')!!}"><i class="fa fa-book" aria-hidden="true"></i>  Libro Mayor</a></li>
                                 <li><a href="{!!URL::to('libro_diario')!!}"><i class="fa fa-book" aria-hidden="true"></i> Libro Diario</a></li>
                            </ul>
                        </li>
                        <!--            <li class="treeview">
                                      <a href="#">
                                        <i class="fa fa-user"></i>
                                        <span>Usuario</span>
                                        <i class="fa fa-angle-left pull-right"></i>
                                      </a>
                                      <ul class="treeview-menu">
                                        <li><a href="{!!URL::to('usuario')!!}"><i class="fa fa-circle-o"></i> Lista Usuario</a></li>
                                        <li><a href="{!!URL::to('usuario/create')!!}"><i class="fa fa-circle-o"></i> Crear Usuario</a></li>
                                      </ul>
                                    </li>
                                
                                    <li class="treeview">
                                      <a href="#">
                                        <i class="fa fa-shopping-cart"></i>
                                        <span>Categoria</span>
                                         <i class="fa fa-angle-left pull-right"></i>
                                      </a>
                                      <ul class="treeview-menu">
                                        <li><a href="ventas/venta"><i class="fa fa-circle-o"></i> Ventas</a></li>
                                        <li><a href="ventas/cliente"><i class="fa fa-circle-o"></i> Clientes</a></li>
                                      </ul>
                                    </li>
                                               
                                    <li class="treeview">
                                      <a href="#">
                                        <i class="fa fa-folder"></i> <span>Acceso</span>
                                        <i class="fa fa-angle-left pull-right"></i>
                                      </a>
                                      <ul class="treeview-menu">
                                        <li><a href="configuracion/usuario"><i class="fa fa-circle-o"></i> Usuarios</a></li>
                                        
                                      </ul>
                                    </li>
                                     <li>
                                      <a href="#">
                                        <i class="fa fa-plus-square"></i> <span>Ayuda</span>
                                        <small class="label pull-right bg-red">PDF</small>
                                      </a>
                                    </li>
                                    <li>
                                      <a href="#">
                                        <i class="fa fa-info-circle"></i> <span>Acerca De...</span>
                                        <small class="label pull-right bg-yellow">IT</small>
                                      </a>
                                    </li>-->

                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>





            <!--Contenido-->
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">

                <!-- Main content -->
                <section class="content">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="box">
                                <div class="box-header with-border">
                                    <h3 class="box-title">CONTABILIDAD </h3>
                                    <div class="box-tools pull-right">

                                    </div>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <!--Contenido-->

                                            @yield('contenido')
                                        </div>
                                    </div>

                                </div>
                            </div><!-- /.row -->
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
            </div><!-- /.col -->
        </div><!-- /.row -->


        <!--Fin-Contenido-->
        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                <b>Version</b> 1
            </div>
            <strong>MODESTO SALDAÑA MICHALEC</strong>   TODOS LOS DERECHOS RESERVADOS
        </footer>


        <!-- jQuery 2.1.4 -->

        {!!Html::script('js/jquery.min.js')!!}
        {!!Html::script('js/categoriaasientos.js')!!}
        <!-- Bootstrap 3.3.5 -->
        {!!Html::script('js/bootstrap.min.js')!!}
        {!!Html::script('js/bootstrap-select.min.js')!!}

        <!-- AdminLTE App -->
        <script src="{{asset('js/app.js')}}"></script>


    </body>
</html>
