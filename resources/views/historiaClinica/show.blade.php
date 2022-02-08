@extends('plantillas.navbar')

@section('content')
    <div class="container">
        <div class="card" style="width: 50&">
            <div class="card-body">
                <h5 class="card-title d-flex justify-content-between align-items-center py-3">
                  <span><b>Codigo historia: </b>{{$historiaClinica->codHistoria}}</span>
                  <span><b>Fecha: </b>{{$historiaClinica->fechaCreacion}}</span>
                </h5>
                
                <div class="d-flex justify-content-between align-items-center py-3">
                  <span class="py-3"><b>Profesional que atendió: </b>{{$historiaClinica->nombreEmpleado}} {{$historiaClinica->apellidoEmpleado}}</span>
                  <span class="py-3"><b>Paciente: </b>{{$paciente->nombrePaciente}} {{$paciente->apellidoPaciente}}</span>
                </div>
                
                <span class="py-3"><b>Anamnesis: </b>{{$historiaClinica->anamnesis}}</span>
                <br>
                <span class="py-3"><b>Examen fisico: </b>{{$historiaClinica->exploracionFisica}}</span>
            </div>
        </div>
        <div class="form-group my-3">
          <a  class="btn btn-primary" href="{{ url('paciente/') }}">Regresar</a>
       </div>
    </div>
@endsection
