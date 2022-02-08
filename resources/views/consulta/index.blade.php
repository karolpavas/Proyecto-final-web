@extends('layouts.app')

@section('content')

<div class="container text-center">
    
    @if(Session::has('mensaje'))
        <div class="alert alert-success alert-dismissible" role="alert">
            {{ Session::get('mensaje') }}
        </div>  
    @endif


    <div class="row justify-content-between">
        <a href="{{ url('consulta/create') }}" class="btn btn-success col-2">Agendar cita</a>
        <a href="{{ url('/') }}" class="btn btn-primary col-2">Volver a página de inicio</a>
        <h1>MODULO CITAS</h1>
    </div>
    <br>

    <h2>Historico de citas</h2>
    <br> 


    <table class="table table-light text-center">
        <thead class="thead-light">
            <tr>
                <th>Codigo Consulta</th>
                <th>Empleado</th>
                <th>Paciente</th>
                <th>Estado</th>
                <th>Fecha</th>
                <th>Tipo Consulta</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($consultas as $consulta)
                <tr>
                    <td>{{$consulta->codConsulta}}</td>
                    <td>{{ $consulta->nombreEmpleado}}</td>
                    <td>{{ $consulta->nombrePaciente}}</td>
                    <td>{{ $consulta->estado}}</td>
                    <td>{{ $consulta->fecha}}</td>
                    <td>
                        @if ($consulta->tipoConsulta == "1")
                        Cita Psicologica 
                        @elseif ($consulta->tipoConsulta == "2")
                        Terapia Cognitiva
                        @elseif ($consulta->tipoConsulta == "3")
                        Control Psiquiatria
                        @else 
                        N/A
                        @endif
                    </td>


                    <td>
                        <a href="{{ url('/consulta/'.$consulta->codConsulta.'/edit') }}" class="btn btn-warning">
                            Editar 
                        </a>
                        | 
                        <form action="{{ url('/consulta/'.$consulta->codConsulta) }}" method="post" class="d-inline">
                            @csrf
                            {{ method_field('DELETE') }}
                            <input type="submit" class="btn btn-danger" onclick="return confirm('¿Quieres Borrar?')" value="Borrar">
                        </form> 
                        |
                        @if (!isset($consulta->codFactura))
                        <a href="{{ url('/factura/'.$consulta->codConsulta.'/facturar') }}" class="btn btn-success">
                            Ver factura
                        </a>
                        @endif
                        |
                        <a href="{{ url('/historiaClinica/'.$consulta->cedulaPaciente.'/edit') }}" class="btn btn-dark">
                            Atender
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{-- {!! $pacientes->links() !!} --}}
    </div>
@endsection

<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    setTimeout(function() {
        $(".alert").fadeOut(700);
    },3000);
});
</script>

