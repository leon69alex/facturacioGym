@extends('base')

@section('contingut')

    <h1>Editar client</h1>

    <form method="POST" action="{{ route('clients.update', $client->id) }}">
        {!! method_field('PUT') !!}
        @include('clients.form', [
            'btnText' => 'Actualitzar Client'
        ])
    </form>
@stop

@section('javascript')
    <script src="\js\IbanCalculator.js"></script>
    <script src="\js\jquery.maskedinput.min.js"></script>
@stop