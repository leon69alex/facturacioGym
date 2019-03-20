@extends('base')

@section('contingut')

    <h1>Crear nou client</h1>

    <form method="POST" action="{{ route('clients.store') }}">
        {!! csrf_field() !!}
        @include('clients.form')
    </form>
@stop