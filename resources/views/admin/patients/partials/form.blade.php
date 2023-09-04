<center><b>
        <h5 style="font-weight: bold; color: red">EDITAR PACIENTE</h5>
    </b></center>
<div>
    <strong>Medico</strong>
    <input type="text" disabled value="{{ $patient->user[0]->name }} {{ $patient->user[0]->apellidoP }}">
</div>
<p></p>

<div class="card border border-secondary" style="">
    <div class="d-flex flex-row bd-highlight pt-4 d-flex justify-content-center">
        <div class="p-2 bd-highlight">
            <div class="container text-center">{!! Form::label('nombre', 'Nombre') !!}</div>
            <div class="form-group">
                {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
                @error('nombre')
                    <small class="text-danger">
                        {{ $message }}
                    </small>
                @enderror
            </div>
        </div>
        <div class="p-2 bd-highlight">
            <div class="container text-center">{!! Form::label('ap_paterno', 'Apellido Paterno') !!}</div>
            <div class="form-group">
                {!! Form::text('ap_paterno', null, ['class' => 'form-control']) !!}
                @error('ap_paterno')
                    <small class="text-danger">
                        {{ $message }}
                    </small>
                @enderror
            </div>
        </div>
        <div class="p-2 bd-highlight">
            <div class="container text-center">{!! Form::label('ap_materno', 'Apellido Materno') !!}</div>
            <div class="form-group">
                {!! Form::text('ap_materno', null, ['class' => 'form-control']) !!}

                @error('ap_materno')
                    <small class="text-danger">
                        {{ $message }}
                    </small>
                @enderror
            </div>
        </div>
    </div>

    <div class="d-flex flex-row bd-highlight mb-3 d-flex justify-content-center">
        <div class="p-2 bd-highlight">
            <div class="container text-center">{!! Form::label('correo', 'Correo') !!}</div>
            <div class="form-group">
                {!! Form::email('correo', null, [
                    'class' => 'form-control',
                    'placeholder' => 'Ej: correo@gmail.com',
                    'step' => '.01',
                    'min' => '0.00',
                ]) !!}

                @error('correo')
                    <small class="text-danger">
                        {{ $message }}
                    </small>
                @enderror
            </div>
        </div>

        <div class="p-2 bd-highlight">
            <div class="container text-center">{!! Form::label('telefono', 'Teléfono') !!}</div>
            <div class="form-group">
                {!! Form::tel('telefono', null, ['class' => 'form-control', 'placeholder' => 'Ej: 5517824183']) !!}

                @error('telefono')
                    <small class="text-danger">
                        {{ $message }}
                    </small>
                @enderror
            </div>
        </div>
    </div>

    <div class="d-flex flex-row bd-highlight mb-3 d-flex justify-content-center">
        <div class="p-2 bd-highlight">
            <div class="container text-center">{!! Form::label('nombre_mascota', 'Nombre de la mascota') !!}</div>
            <div class="form-group">
                {!! Form::text('nombre_mascota', null, ['class' => 'form-control']) !!}

                @error('nombre_mascota')
                    <small class="text-danger">
                        {{ $message }}
                    </small>
                @enderror
            </div>
        </div>

        <div class="p-2 bd-highlight">
            <div class="container text-center">{!! Form::label('edad_mascota', 'Edad de la mascota') !!}</div>
            <div class="form-group">
                {!! Form::number('edad_mascota', null, ['class' => 'form-control', 'placeholder' => 'Ej: 4']) !!}

                @error('edad_mascota')
                    <small class="text-danger">
                        {{ $message }}
                    </small>
                @enderror
            </div>

        </div>

        <div class="p-2 bd-highlight">
            <div class="container text-center">{!! Form::label('tmp_nacimiento', 'Tiempo') !!}</div>
            <div class="form-group">
                {!! Form::select('tmp_nacimiento', ['dias' => 'Días', 'meses' => 'Meses', 'años' => 'Años'], null, [
                    'class' => 'form-control',
                    'placeholder' => 'Seleccione el tiempo de nacimiento',
                ]) !!}
                @error('tmp_nacimiento')
                    <small class="text-danger">
                        {{ $message }}
                    </small>
                @enderror
            </div>
        </div>
    </div>

    <div class="d-flex flex-row bd-highlight mb-3 d-flex justify-content-around">
        <div class="p-2 bd-highlight">
            <div class="container text-center">{!! Form::label('tipo', 'Tipo') !!}</div>
            <div class="form-group">
                {!! Form::text('tipo', null, ['class' => 'form-control', 'placeholder' => 'Ingrese Gato/Perro/Ave/etc']) !!}

                @error('tipo')
                    <small class="text-danger">
                        {{ $message }}
                    </small>
                @enderror
            </div>
        </div>

        <div class="p-2 bd-highlight">
            <div class="container text-center">{!! Form::label('raza', 'Raza') !!}</div>
            <div class="form-group">
                {!! Form::text('raza', null, ['class' => 'form-control', 'placeholder' => 'Ej: pitbull']) !!}

                @error('raza')
                    <small class="text-danger">
                        {{ $message }}
                    </small>
                @enderror
            </div>
        </div>

        <div class="p-2 bd-highlight">
            <div class="container text-center">{!! Form::label('peso_mascota', 'Peso') !!}</div>
            <div class="form-group">
                {!! Form::number('peso_mascota', null, [
                    'class' => 'form-control',
                    'placeholder' => 'Ej: 5.70',
                    'step' => '.01',
                    'min' => '0.00',
                ]) !!}

                @error('peso_mascota')
                    <small class="text-danger">
                        {{ $message }}
                    </small>
                @enderror
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-center">
        <div class="p-2 bd-highlight" style="width: 700px">
            <div class="form-group">
                <div class="text-center">{!! Form::label('diagnostico', 'Diagnóstico') !!}</div>
                {!! Form::textarea('diagnostico', null, [
                    'class' => 'form-control',
                    'placeholder' => 'Escriba el diagnóstico del paciente',
                ]) !!}

                @error('diagnostico')
                    <small class="text-danger">
                        {{ $message }}
                    </small>
                @enderror
            </div>
        </div>
    </div>
    <div class="card-footer">
        <div class="d-flex justify-content-between">
            <ul class="list-group list-group-horizontal">
                <li class="list-group-item border border-danger"><strong>ID {{ $patient->id }}</strong></li>
            </ul>
            <div>
                {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
            </div>
        </div>       
    </div>
</div>