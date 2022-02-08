@extends('layouts.app')

@section('content')

<div class="container text-center">
    
    @if(Session::has('mensaje'))
        <div class="alert alert-success alert-dismissible" role="alert">
            {{ Session::get('mensaje') }}
        </div>  
    @endif
    

    <div class="row justify-content-between">
        <a href="{{ url('/') }}" class="btn btn-primary col-2">Volver a página de inicio</a>
        <h1 >FACTURAS</h1>
    </div>

    <table class="table table-light text-center">
        <thead class="thead-light">
            <tr>
                <th>Codigo Factura</th>
                <th>Codigo Consulta</th>
                <th>Paciente</th>
                <th>fecha</th>
                <th>valor</th>
                <th>Ver</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($facturas as $factura)
                <tr>
                    <td>{{$factura->codFactura}}</td>
                    <td>{{ $factura->codConsulta}}</td>
                    <td>{{ $factura->cedulaPaciente}}</td>
                    <td>{{ $factura->fechaGeneracion}}</td>
                    <td>{{ $factura->valor}}</td>
                    <td>
                        <a href="{{ url('/factura/'.$factura->codConsulta.'/facturar') }}" class="btn btn-warning">
                            Ver 
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

