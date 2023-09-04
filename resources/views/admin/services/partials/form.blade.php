<div class="form-group">
    <div class="d-flex flex-column bd-highlight mb-3">
        <strong>Dueño</strong>
        <input class="form-control" type="text"disabled value="{{$service->servicePatient[0]->nombre}}">
    </div>
</div>

<div class="form-group">
    <div class="d-flex flex-column bd-highlight mb-3">
        <strong>Mascota</strong>
        <input class="form-control" type="text"disabled value="{{$service->servicePatient[0]->nombre_mascota}}">
    </div>
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
   {!! Form::number('costo', null, ['class' => 'form-control','step' => 'any', 'min' => '0']) !!}

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
    {!! Form::time('hora', null, ['class' => 'form-control','step' => 'any']) !!}

    @error('hora')
        <small class="text-danger">
            {{ $message }}
        </small>
    @enderror
</div>

