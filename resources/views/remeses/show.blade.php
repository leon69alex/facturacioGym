@extends('base')

@section('contingut')

<div>
        <a class="btn btn-success" href="/remeses/generate-pdf/{{$remesa->id}}">Decarregar PDF</a>
    </div>
    <br>

    @foreach($remesa->clients as $client)

        {{$client->name}} {{$client->surnames}} - {{$client->cuote->display_name}}
        <hr>

    @endforeach

    <div>
        <a class="btn btn-success" href="/remeses/generate-pdf/{{$remesa->id}}">Decarregar PDF</a>
    </div>

@stop