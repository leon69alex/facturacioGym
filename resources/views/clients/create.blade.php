@extends('base')

@section('contingut')

    <h1>Crear nou client</h1>

    <form method="POST" action="{{ route('clients.store') }}">
        @include('clients.form')
    </form>
@stop

@section('javascript')
    <script src="\js\IbanCalculator.js"></script>
    <script src="\js\jquery.maskedinput.min.js"></script>
@stop