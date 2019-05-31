@extends('base')

@section('contingut')

    <h1 class="title">Crear nou client</h1>
    <hr>
    <br>
    <form method="POST" action="{{ route('clients.store') }}">
        @include('clients.form', [
            'client' => new App\Client
            ])
    </form>
@stop

@section('javascript')
    <script src="\js\IbanCalculator.js"></script>
    <script src="\js\jquery.maskedinput.min.js"></script>
@stop