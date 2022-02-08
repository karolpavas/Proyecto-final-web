<div class=" container text-center ">

    <div class="row justify-content-between">
        <a class="btn btn-primary col-md-2 offset-md-10" href="{{ url('consulta/') }}">Regresar</a>
        <h1>{{ $modo }} Historia Clinica</h1>
    </div>

    <div class="container col-5">
        <div class="form-group">
            <label for="cedulaPaciente">Paciente:</label>
            <select @if ($modo == 'Editar') disabled @endif name="cedulaPaciente" id="cedulaPaciente"
                value="{{ isset($historiaClinica->cedulaPaciente) ? $historiaClinica->cedulaPaciente : old('cedulaPaciente') }}">
                @foreach ($pacientes as $paciente)
                    <option value="{{ $paciente->cedulaPaciente }}">{{ $paciente->cedulaPaciente }}</option>
                @endforeach
            </select>
        </div>
        <br>
        <div class="form-group">
            <label for="codEmpleado">Profesional:</label>
            <select name="codEmpleado" id="codEmpleado"
                value="{{ isset($historiaClinica->codEmpleado) ? $historiaClinica->codEmpleado : old('codEmpleado') }}">
                @foreach ($empleados as $empleado)
                    <option value="{{ $empleado->codEmpleado }}">{{ $empleado->codEmpleado }}</option>
                @endforeach
            </select>
        </div>
        <br>
        <div class="form-group">
            <label for="fechaCreacion">Fecha modificación:</label>
            <input type="date" class="form-control" name="fechaCreacion" id="fechaCreacion"
                value="{{ isset($historiaClinica->fechaCreacion) ? $historiaClinica->fechaCreacion : old('fechaCreacion') }}">
        </div>
        <br>
        <div class="form-group">
            <label for="anamnesis">Anamnesis</label>
            <input type="text" class="form-control" name="anamnesis" id="anamnesis"
                value="{{ isset($historiaClinica->anamnesis) ? $historiaClinica->anamnesis : old('anamnesis') }}">
        </div>
        <br>
        <div class="form-group">
            <label for="exploracionFisica">Exploracion Fisica:</label>
            <input type="text" class="form-control" name="exploracionFisica" id="exploracionFisica"
                value="{{ isset($historiaClinica->exploracionFisica) ? $historiaClinica->exploracionFisica : old('exploracionFisica') }}">
        </div>
        <br>
        <div class="form-group">
            <input type="submit" class="btn btn-success" value="{{ $modo }} historia clinica">
        </div>
    </div>
    @if (count($errors) > 0)
        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li> {{ $error }} </li>
                @endforeach
            </ul>
        </div>
    @endif
</div>
