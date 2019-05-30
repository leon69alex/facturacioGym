@extends('base')

@section('contingut')

    <h1 class="title">Crear nova quota</h1>
    <hr>
    <br>
    <form method="POST" action=" {{route('cuotes.store')}} ">
        @include('cuotes.form')
    </form>

@stop