@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{ url('/historiaClinica') }}" method="post" enctype="multipart/form-data">
        @csrf
        @include('historiaClinica.form',['modo'=>'Crear'])
    </form>
</div>
@endsection