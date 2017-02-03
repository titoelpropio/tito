
<div class="form-group" >
    <label>Cuenta:</label>
    <select name="id_cuenta" class="form-control selectpicker" id="idcuenta" data-live-search="true">


        <?php
        foreach ($cuenta as $key => $value) {
            echo ' <option value="' . $value->id . '">' . $value->nombre . '</option>';
        }
        ?>
    </select>
</div>
<div class="form-group">
    {!!Form::label('nombre','Vida Util:')!!}
    {!!Form::text('vida_util',null,['class'=>'form-control ','placeholder'=>'Ingresa su vida util'])!!}
</div>
<div class="form-group">
    {!!Form::label('nombre','Depreciacion anual:')!!}
    {!!Form::number('depreciacion_anual',null,['class'=>'form-control ','placeholder'=>'Ingresa la depreciacion anual'])!!}
</div>