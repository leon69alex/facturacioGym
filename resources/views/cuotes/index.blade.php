@extends('base')

@section('contingut')


@if(session()->has('info'))
<div class="alert alert-success">
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        {{ session('info') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
</div>

@endif
<a class="btn btn-success" href="{{ route('cuotes.create') }}">+ Nova cuota</a>
<br>
<br>
<table class="table table-dark">
<thead>
    <th>ID</th>
    <th>Nom</th>
    <th>Nom complert</th>
    <th>Import</th>
    <th>Active</th>
</thead>
<tbody>
    @foreach($cuotes as $cuote)
        <tr>
            <th>{{ $cuote->id }}</th>
            <td>{{ $cuote->name }}</td>
            <td>{{ $cuote->display_name }}</td>
            <td>{{ $cuote->import }}€</td>
            <td>{{ $cuote->active }}</td>
        </tr>
    @endforeach
</tbody>

</table>

@stop