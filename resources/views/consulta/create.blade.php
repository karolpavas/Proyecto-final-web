@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{ url('/consulta') }}" method="post" enctype="multipart/form-data">
        @csrf
        @include('consulta.form',['modo'=>'Crear'])
    </form>
</div>
@endsection