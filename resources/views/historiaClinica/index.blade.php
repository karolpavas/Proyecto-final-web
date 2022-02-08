@extends('layouts.app')

@section('content')

<div class="container text-center">
    
    @if(Session::has('mensaje'))
        <div class="alert alert-success alert-dismissible" role="alert">
            {{ Session::get('mensaje') }}
        </div>  
    @endif
    
    <a href="{{ url('historiaClinica/create') }}" class="btn btn-success">Registrar nueva historia</a>
    <br>
    <br>

    <h1>Listado de Historias</h1>
    <br> 


    <table class="table table-light text-center">
        <thead class="thead-light">
            <tr>
                <th>Codigo</th>
                <th>Paciente</th>
                <th>Profesional</th>
                <th>Fecha generacion</th>
                <th>Anamnesis</th>
                <th> exploracionFisica</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($historia_clinicas as $historiaClinica)
                <tr>
                    <td>{{$historiaClinica->codHistoria}}</td>
                    <td>{{ $historiaClinica->cedulaPaciente}}</td>
                    <td>{{ $historiaClinica->codEmpleado}}</td>
                    <td>{{ $historiaClinica->fechaCreacion}}</td>
                    <td>{{ $historiaClinica->anamnesis}}</td>
                    <td>{{ $historiaClinica->exploracionFisica}}</td>
                    <td>
                        <a href="{{ url('/historiaClinica/'.$historiaClinica->codHistoria.'/edit') }}" class="btn btn-warning">
                            Editar 
                        </a>
                        | 
                        <form action="{{ url('/historiaClinica/'.$historiaClinica->codHistoria) }}" method="post" class="d-inline">
                            @csrf
                            {{ method_field('DELETE') }}
                            <input type="submit" class="btn btn-danger" onclick="return confirm('¿Quieres Borrar?')" value="Borrar">
                        </form> 
                        |
                        <a href="{{ url('/historiaClinica/'.$historiaClinica->codHistoria.'/edit') }}" class="btn btn-success">
                            Imprimir 
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

