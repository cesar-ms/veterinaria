<div class="form-group">
    {!! Form::label('pzas_venta', 'Piezas') !!}
    {!! Form::number('pzas_venta', null, [
        'class' => 'form-control',
        'placeholder' => 'Ingrese la cantidad de piezas','step' => 'any', 'min' => '0'
    ]) !!}

    @error('pzas_venta')
        <small class="text-danger">{{ $message }}</small>
    @enderror

</div>

<div class="form-group">
    {!! Form::label('costo', 'Costo') !!}
    {!! Form::number('costo', null, ['class' => 'form-control','step' => 'any', 'min' => '0']) !!}

    @error('costo')
        <small class="text-danger">{{ $message }}</small>
    @enderror

</div>
<div class="form-group">
    {!! Form::label('fecha_venta', 'Fecha') !!}
    {!! Form::datetime('fecha_venta', null, ['class' => 'form-control']) !!}

    @error('fecha_venta')
        <small class="text-danger">{{ $message }}</small>
    @enderror

</div>
