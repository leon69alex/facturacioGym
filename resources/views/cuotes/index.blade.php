@extends('base')

@section('contingut')


@if(session()->has('info'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('info') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

@endif
<a class="btn btn-rounded btn-dark-green" href="{{ route('cuotes.create') }}"><i class="fas fa-plus-square"></i>  Nova quota</a>
<br>
<br>
<table class="table table-dark">
<thead>
    <th>ID</th>
    <th>Nom</th>
    <th>Nom complert</th>
    <th>Import</th>
    <th>Actiu</th>
    <th>Accions</th>

</thead>
<tbody>
    @foreach($cuotes as $cuote)
        <tr>
            <th>{{ $cuote->id }}</th>
            <td>
                <a href="{{ route('cuotes.edit', $cuote->id)}}" style="color:green">
                    {{ $cuote->name }}
                </a>
            </td>
            <td>{{ $cuote->display_name }}</td>
            <td>{{ $cuote->import }}€</td>
            <td>{{ $cuote->active }}</td>
            <td>
                    <a class="btn btn-info" href=" {{ route('cuotes.edit', $cuote->id) }}">
                        <i class="fas fa-edit"></i>
                           Editar
                    </a>
                    <form style="display: inline" method="POST" class="formRemoveCuote" action=" {{ route('cuotes.destroy', $cuote->id) }}">
                        {!! csrf_field() !!}
                        {!! method_field('DELETE') !!}
                        
                        <button class="btn btn-danger removeCuote" type="button" ><i class="fa fa-trash"></i>  Eliminar</button>
                    
                    </form>
                </td>
        </tr>
    @endforeach
</tbody>

</table>

@stop
@section('javascript')
    
@stop