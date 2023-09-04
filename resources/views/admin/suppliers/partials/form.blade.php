<div class="form-group">
    {!! Form::label('razon_social', 'Razón social') !!}
    {!! Form::text('razon_social', null, ['class' => 'form-control']) !!}

    @error('razon_social')
        <small class="text-danger">
            {{ $message }}
        </small>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('fabricante', 'Fabricante') !!}
    {!! Form::text('fabricante', null, ['class' => 'form-control']) !!}

    @error('fabricante')
        <small class="text-danger">
            {{ $message }}
        </small>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('telefono', 'Teléfono') !!}
    {!! Form::tel('telefono', null, ['class' => 'form-control']) !!}

    @error('telefono')
        <small class="text-danger">
            {{ $message }}
        </small>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('correo', 'Correo') !!}
    {!! Form::email('correo', null, ['class' => 'form-control']) !!}

    @error('correo')
        <small class="text-danger">
            {{ $message }}
        </small>
    @enderror
</div>


