@extends('base')

@section('contingut')

    <h1 class="title">Modificar quota</h1>
    <hr>
    <br>
    <form method="POST" action=" {{ route('cuotes.update', $cuote->id) }} ">
        {!! method_field('PUT') !!}
        @include('cuotes.form', [
            'btnText' => 'Actualitzar Quota'
        ])
    </form>

@stop