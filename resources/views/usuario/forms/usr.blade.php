<div class="form-group">
    {!!Form::label('nombre','Nombre:')!!}
    {!!Form::text('name',null,['class'=>'form-control ','placeholder'=>'Ingresa el Nombre del usuario'])!!}
</div>
<div class="form-group">
    {!!Form::label('nick','Nick:')!!}
    {!!Form::text('email',null,['class'=>'form-control','placeholder'=>'Ingresa el Nombre del usuario'])!!}
</div>
<div class="form-group">
    {!!Form::label('password','Contraseña:')!!}
    {!!Form::password('password',['class'=>'form-control','placeholder'=>'Ingresa el Nombre del usuario'])!!}
</div>
<div class="form-group">
    {!!Form::label('empresa','Empresa:')!!}
    {!!Form::select('id_empresa',$empresa,null,array('class'=>'form-control'))!!}
</div>
<div class="form-group">
    {!!Form::label('empresa','Privilegio:')!!}
    {!!Form::select('privilegio', array( '1' => 'ADMINISTRADOR','2' => 'CONTADOR', '3' => 'ANDROID'),null,array('id'=>'tipo_gallina','class'=>'form-control'))!!}
</div>
<div class="form-group">
    {!!Form::label('empresa','Estado:')!!}
    {!!Form::select('estado', array('1' => 'ACTIVO', '0' => 'INACTIVO'),null,array('id'=>'tipo_gallina','class'=>'form-control'))!!}

</div>