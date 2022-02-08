@extends('layouts.app')

@section('content')

<div class="container text-center">
    
    @if(Session::has('mensaje'))
        <div class="alert alert-success alert-dismissible" role="alert">
            {{ Session::get('mensaje') }}
        </div>  
    @endif
    
    <div class="row justify-content-between">
        <a href="{{ url('paciente/create') }}" class="btn btn-success col-2">Registrar nuevo paciente</a>
        <a href="{{ url('/') }}" class="btn btn-primary col-2">Volver a página de inicio</a>
        <h1 >MODULO PACIENTES</h1>
    </div>
    <br>

    <h2>Pacientes registrados</h2>
    <br> 

    <div class="table-responsive">
        <table class="table table-light text-center">
            <thead class="thead-light">
                <tr>
                    <th>cedula</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Correo</th>
                    <th>Celular</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @php
                /*echo json_encode($pacientes);
                die();*/
                @endphp
                
                @foreach ($pacientes as $paciente)
                    <tr>
                        <td>{{ $paciente->cedulaPaciente}}</td>
                        <td>{{ $paciente->nombrePaciente}}</td>
                        <td>{{ $paciente->apellidoPaciente}}</td>
                        <td>{{ $paciente->emailPaciente}}</td>
                        <td>{{ $paciente->celularPaciente}}</td>
                        <td>
                            <a href="{{ url('/paciente/'.$paciente->cedulaPaciente.'/edit') }}" class="btn btn-warning">
                                Editar 
                            </a>
                            | 
                            <form action="{{ url('/paciente/'.$paciente->cedulaPaciente) }}" method="post" class="d-inline">
                                @csrf
                                {{ method_field('DELETE') }}
                                <input type="submit" class="btn btn-danger" onclick="return confirm('¿Quieres Borrar?')" value="Borrar">
                            </form>
                            |
                            <a href="{{ url('/historiaClinica/'.$paciente->cedulaPaciente.'/show') }}" class="btn btn-secondary">
                                Historia Clinica 
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
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
