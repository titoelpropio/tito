<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>CONTABILIDAD</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    {!!Html::style('css/bootstrap.min.css')!!}
    <!-- Font Awesome -->
     {!!Html::style('css/font-awesome.min.css')!!}
   
    <!-- Theme style -->
   {!!Html::style('css/AdminLTE.min.css')!!}
    <!-- iCheck -->
    {!!Html::style('css/blue.css')!!}

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="hold-transition login-page">
      @include('alerts.errors')

    <div class="login-box">
      <div class="login-logo">
        <a href="../../index2.html"><b>Sistema Contable</b></a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">Ingrese sus datos de Acceso</p>
       {!!Form::open(['route'=>'login.store', 'method'=>'POST'])!!}
       <input type="hidden" name="_token" value="{{ csrf_token()}}" id="token">
          <div class="form-group has-feedback">
            {!!Form::text('email',null,['class'=>'form-control','placeholder'=>'nick'])!!}
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
           
           {!!Form::password('password',['class'=>'form-control','placeholder'=>'Password'])!!}
           
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
           
            <div class="col-xs-4">
                {!!Form::submit('Ingresar',['class'=>'btn btn-primary btn-block btn-flat'])!!}
            
            </div><!-- /.col -->
          </div>
       
       {!!Form::close()!!}
      
        
      
        

      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

    <!-- jQuery 2.1.4 -->
  {!!Html::script('js/jquery.min.js')!!}
    <!-- Bootstrap 3.3.5 -->
          {!!Html::script('js/bootstrap.min.js')!!}
         
    <!-- iCheck -->
  {!!Html::script('js/login.js')!!}
  </body>
</html>
