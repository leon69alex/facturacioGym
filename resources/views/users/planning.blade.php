@extends('base')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.0/fullcalendar.css">

@stop
@section('contingut')


<div id='calendar'></div>


@stop

@section('javascript')
<script src="/js/planning.js"></script>
@stop