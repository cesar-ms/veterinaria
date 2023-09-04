
<div class="form-group">
    {!! Form::label('paciente_id', 'Dueño') !!}
    {!! Form::select('paciente_id',$patient ,null, ['class' => 'form-control', 'placeholder' => 'Seleccione el dueño']) !!}

    @error('paciente_id')
        <small class="text-danger">
            {{ $message }}
        </small>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('descripcion', 'Descripción') !!}
    {!! Form::textArea('descripcion', null, ['class' => 'form-control', 'placeholder' => 'Ingrese una descripción']) !!}

    @error('descripcion')
        <small class="text-danger">
            {{ $message }}
        </small>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('fecha_cita', 'Fecha') !!}
    {!! Form::date('fecha_cita', null, ['class' => 'form-control']) !!}

    @error('fecha_cita')
        <small class="text-danger">
            {{ $message }}
        </small>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('hora', 'Hora') !!}
    {!! Form::time('hora', null, ['class' => 'form-control','step' => 'any']) !!}

    @error('hora')
        <small class="text-danger">
            {{ $message }}
        </small>
    @enderror
</div>

