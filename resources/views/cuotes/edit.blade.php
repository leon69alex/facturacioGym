@extends('base')

@section('contingut')

    <h1 class="title">Modificar cuota</h1>
    <hr>
    <br>
    <form method="POST" action=" {{ route('cuotes.update', $cuote->id) }} ">
        {!! method_field('PUT') !!}
        @include('cuotes.form', [
            'btnText' => 'Actualitzar Cuota'
        ])
    </form>

@stop