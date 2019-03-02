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

    <div class="d-flex justify-content-between">
        <div>
            <input type="text" class="form-control" id="search" name="search">
        </div>
        <div>
            <a class="btn btn-success" href="{{ route('clients.create') }}">+ Nou Client</a>
        </div>
    </div>

    <br>
    <table class="table table-dark">
        <thead>
            <th>ID</th>
            <th>Nom</th>
            <th>Cognoms</th>
            <th>Email</th>
            <th>DNI</th>
            <th>Cuota</th>
            <th>Num Compte</th>
            <th>Actiu</th>
        </thead>
        <tbody>
            @foreach($clients as $client)
                <tr>
                    <th>{{ $client->id }}</th>
                    <td>{{ $client->name }}</td>
                    <td>{{ $client->surnames }}</td>
                    <td>{{ $client->email }}</td>
                    <td>{{ $client->dni }}</td>
                    <td>{{ $client->cuote->display_name }}</td>
                    <td>{{ $client->numCompte }}</td>
                    <td><input type="checkbox" value="{{ $client->active }}" name="active" {{ $client->active ? 'checked' : '' }}></td>
                </tr>
            @endforeach
        </tbody>
        
    </table>

    <script type="text/javascript">
        $('#search').on('keyup',function(){
            console.log("hola");
            $value=$(this).val();
            $.ajax({
                type : 'get',
                url : '{{URL::to('search')}}',
                data:{'search':$value},
                success:function(data){
                    //console.log(data);
                    $('tbody').html(data);
                }
            });
        })
    </script>
    <script type="text/javascript">
        $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
    </script>

@stop