<div class="form-group">
    {!! Form::label('patient_id', 'Dueño') !!}
    {!! Form::select('patient_id',$patient, null, ['class' => 'form-control','placeholder' => 'Seleccione al dueño de la mascota']) !!}

    @error('patient_id')
        <small class="text-danger">
            {{ $message }}
        </small>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('nombre_servicio', 'Servicio') !!}
    {!! Form::text('nombre_servicio', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre del servicio']) !!}

    @error('nombre_servicio')
        <small class="text-danger">
            {{ $message }}
        </small>
    @enderror
</div>
{{-- /* array('0' => 'Consulta', '1' => 'Estética') */ --}}
<div class="form-group">
    {!! Form::label('tipo', 'Tipo') !!}
    {!! Form::select('tipo',['Consulta' => 'Consulta', 'Estética' => 'Estética'], null, ['class' => 'form-control']) !!}

    @error('tipo')
        <small class="text-danger">
            {{ $message }}
        </small>
    @enderror
</div>


<div class="form-group">
    {!! Form::label('costo', 'Costo') !!}
   {!! Form::number('costo', null, ['class' => 'form-control', 'step' => '.01', 'min' => '0']) !!}

    @error('costo')
        <small class="text-danger">
            {{ $message }}
        </small>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('fecha_servicio', 'Fecha') !!}
    {!! Form::date('fecha_servicio', null, ['class' => 'form-control']) !!}

    @error('fecha_servicio')
        <small class="text-danger">
            {{ $message }}
        </small>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('hora', 'Hora') !!}
    {!! Form::time('hora', null, ['class' => 'form-control']) !!}

    @error('hora')
        <small class="text-danger">
            {{ $message }}
        </small>
    @enderror
</div>

