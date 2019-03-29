@extends('base')

@section('contingut')

    <h1>Modificar cuota</h1>

    <form method="POST" action=" {{ route('cuotes.update', $cuote->id) }} ">
        {!! method_field('PUT') !!}
        @include('cuotes.form')
    </form>

@stop