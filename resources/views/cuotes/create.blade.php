@extends('base')

@section('contingut')

    <h1>Crear nova cuota</h1>

    <form method="POST" action=" {{route('cuotes.store')}} ">
        @include('cuotes.form')
    </form>

@stop