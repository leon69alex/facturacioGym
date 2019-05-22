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
            <a class="btn btn-success" href="{{ route('clients.create') }}">+ Nou Client</a>
        </div>
    </div>

    <br>
    <table class="table-sm table-dark table-striped table-hover" id="dataTable" >
        <thead>
            <th>ID</th>
            <th>Nom</th>
            <th>Cognoms</th>
            <th>Email</th>
            <th>DNI</th>
            <th>Cuota</th>
            <th>IBAN</th>
            <th>SWIFT</th>
            <th>Actiu</th>
            <th>Impagament</th>
        </thead>
        <tbody {{$n = 0}}>
                
            @foreach($clients as $client)
                <tr>
                    <th>{{ $client->id }}</th>
                    <td>
                        <a href="{{ route('clients.edit', $client->id)}}">
                            {{ $client->name }}
                        </a>
                    </td>
                    <td>{{ $client->surnames }}</td>
                    <td>{{ $client->email }}</td>
                    <td>{{ $client->dni }}</td>
                    <td>{{ $client->cuote->display_name }}</td>
                    <td>{{ $client->IBAN }}</td>
                    <td>{{ $client->SWIFT }}</td>
                    <td>      
                        <span class="switch">
                            
                            <input type="checkbox" class="switch" id="switch-{{$n}}" value="{{ $client->active }}" name="active" {{ $client->active ? 'checked' : '' }}/>
                            <label for="switch-{{$n}}" {{$n=$n+1}}></label>
                            
                        </span>
                    </td>
                    <td>
                        <a class="btn btn-warning" href="clients/send/email/{{$client->id}} }}">
                                <i class="fas fa-envelope"></i>
                                    Enviar correu
                        </a>
                    </td>
                </tr>
            @endforeach
            {{-- {!! $clients->links() !!} --}}
        </tbody>
        
    </table>
    <script>

    </script>
@stop
@section('javascript')
    <script src="http://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="\js\Datatables\customDatatables.js"></script>
@stop