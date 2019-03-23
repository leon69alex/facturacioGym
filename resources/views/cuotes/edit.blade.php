@extends('base')

@section('contingut')

    <h1>Modificar cuota</h1>

    <form method="POST" action=" {{ route('cuotes.store', $cuote->id) }} ">
        {!! method_field('PUT') !!}
        @include('cuotes.form')
    </form>

@stop