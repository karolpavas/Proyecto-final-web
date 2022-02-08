@extends('layouts.app')

@section('content')

<div class="container text-center">
    
    @if(Session::has('mensaje'))
        <div class="alert alert-success alert-dismissible" role="alert">
            {{ Session::get('mensaje') }}
        </div>  
    @endif

    <div class="row justify-content-between">
        <a href="{{ url('empleado/create') }}" class="btn btn-success col-3">Registrar nuevo empleado</a>
        <a href="{{ url('/') }}" class="btn btn-primary col-2">Volver a página de inicio</a>
        <h1>MODULO EMPLEADOS</h1>
    </div>

    <br>
    <h2>Empleados activos</h2>
    <br> 


    <table class="table table-light text-center">
        <thead class="thead-light">
            <tr>
                <th>Cargo</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Correo</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($empleados as $empleado)
                <tr>
                    <td>{{$empleado->nombreCargo}}</td>
                    <td>{{ $empleado->nombreEmpleado}}</td>
                    <td>{{ $empleado->apellidoEmpleado}}</td>
                    <td>{{ $empleado->emailEmpleado}}</td>
                    <td>
                        <a href="{{ url('/empleado/'.$empleado->codEmpleado.'/edit') }}" class="btn btn-warning">
                            Editar 
                        </a>
                        | 
                        <form action="{{ url('/empleado/'.$empleado->codEmpleado) }}" method="post" class="d-inline">
                            @csrf
                            {{ method_field('DELETE') }}
                            <input type="submit" class="btn btn-danger" onclick="return confirm('¿Quieres Borrar?')" value="Borrar">
                        </form> 
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

