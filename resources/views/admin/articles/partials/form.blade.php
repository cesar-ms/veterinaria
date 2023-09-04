<div class="form-group">
    <div class="d-flex flex-column bd-highlight mb-3">
        <strong>Responsable</strong>
        <input class="form-control" type="text"disabled value="{{$article->user->name}} {{$article->user->apellidoP}} {{$article->user->apellidoP}} ">
    </div>
</div>

<div class="form-group">
    {!! Form::label('nombre', 'Nombre') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Nombre del artículo']) !!}

    @error('nombre')
        <small class="text-danger">
            {{ $message }}
        </small>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('tipo_articulo', 'Tipo de artículo') !!}
    {!! Form::select('tipo_articulo',['venta' => 'Venta', 'insumo' => 'Insumo'],null, ['class' => 'form-control']) !!}

    @error('tipo_articulo')
        <small class="text-danger">
            {{ $message }}
        </small>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('categoria', 'Categoría') !!}
    {!! Form::select('categoria',['medicamento' => 'Medicamento', 'accesorio' => 'Accesorio','alimento' => 'Alimento'],null, ['class' => 'form-control']) !!}

    @error('categoria')
        <small class="text-danger">
            {{ $message }}
        </small>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('descripcion', 'Descripción') !!}
    {!! Form::textarea('descripcion', null, ['class' => 'form-control','placeholder' => 'Nombre del artículo']) !!}

    @error('descripcion')
        <small class="text-danger">
            {{ $message }}
        </small>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('fecha_caducidad', 'Caducidad') !!}
    {!! Form::date('fecha_caducidad', null, ['class' => 'form-control']) !!}

    @error('fecha_caducidad')
        <small class="text-danger">
            {{ $message }}
        </small>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('num_pzas', 'Número de piezas') !!}
    {!! Form::number('num_pzas', null, ['class' => 'form-control', 'step' => '1.0', 'min' => '0']) !!}

    @error('num_pzas')
        <small class="text-danger">
            {{ $message }}
        </small>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('costo_pzas', 'Costo por pieza') !!}
    {!! Form::number('costo_pzas', null, ['class' => 'form-control', 'step' => 'any', 'min' => '0']) !!}

    @error('costo_pzas')
        <small class="text-danger">
            {{ $message }}
        </small>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('fecha_llegada', 'Fecha de llegada') !!}
    {!! Form::date('fecha_llegada', null, ['class' => 'form-control']) !!}

    @error('fecha_llegada')
        <small class="text-danger">
            {{ $message }}
        </small>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('codigo_barras', 'Código de barras') !!}
    {!! Form::text('codigo_barras', null, ['class' => 'form-control']) !!}

    @error('codigo_barras')
        <small class="text-danger">
            {{ $message }}
        </small>
    @enderror
</div>


