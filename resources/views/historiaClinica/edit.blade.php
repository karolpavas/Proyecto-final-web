@extends('layouts.app')

@section('content')

<div class="container">
    <form action="{{ url('/historiaClinica/'.$historiaClinica->codHistoria) }}" method="post" enctype="multipart/form-data">
        @csrf
        {{ method_field('PATCH') }}
        @include('historiaClinica.form',['modo'=>'Editar'])
    </form>
</div>
@endsection