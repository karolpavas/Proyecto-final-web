@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card" style="width: 50&">
            <div class="card-body">
                <h5 class="card-title d-flex justify-content-between align-items-center py-3">
                  <span><b>Codigo: </b>{{$factura->codFactura}}</span>
                  <span><b>Fecha: </b>{{$factura->fechaGeneracion}}</span>
                </h5>
                <span class="py-3"><b>Paciente: </b>{{$factura->nombrePaciente}} {{$factura->apellidoPaciente}}</span>
                <div class="d-flex justify-content-between align-items-center py-3">
                  <span><b>Consulta: </b>
                    {{$factura->codConsulta}} - 
                    <i> 
                      @if ($consulta->tipoConsulta == "1")Cita Psicologica 
                      @elseif ($consulta->tipoConsulta == "2")Terapia Cognitiva
                      @elseif ($consulta->tipoConsulta == "3")Control Psiquiatria 
                      @else N/A @endif
                    </i>
                  </span>
                  <span><b>Valor: </b>{{$factura->valor}}</span>
                </div>

                <span class="py-3"><b>Responsable: </b>{{$factura->nombreEmpleado}} {{$factura->apellidoEmpleado}}</span>
            </div>
        </div>
        <div class="form-group my-3">
          <a  class="btn btn-primary" href="{{ url('consulta/') }}">Regresar</a>
       </div>
    </div>
@endsection
