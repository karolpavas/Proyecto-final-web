@extends('layouts.app')

@section('content')

<div class="container">
    <form action="{{ url('/consulta/'.$consulta->codConsulta) }}" method="post" enctype="multipart/form-data">
        @csrf
        {{ method_field('PATCH') }}
        @include('consulta.form',['modo'=>'Editar'])
    </form>
</div>
@endsection