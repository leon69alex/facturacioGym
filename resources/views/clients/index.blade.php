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
        <div class="form-group has-search">
            <span class="fa fa-search form-control-feedback"></span>
            <input type="text" id="search" class="form-control" placeholder="Search">
          </div>
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
            <th>Num Compte</th>
            <th>Actiu</th>
        </thead>
        <tbody {{$n = 0}}>
                
            @foreach($clients as $client)
                <tr>
                    <th>{{ $client->id }}</th>
                    <td>{{ $client->name }}</td>
                    <td>{{ $client->surnames }}</td>
                    <td>{{ $client->email }}</td>
                    <td>{{ $client->dni }}</td>
                    <td>{{ $client->cuote->display_name }}</td>
                    <td>{{ $client->numCompte }}</td>
                    <td>      
                        <span class="switch">
                            
                            <input type="checkbox" class="switch" id="switch-{{$n}}" value="{{ $client->active }}" name="active" {{ $client->active ? 'checked' : '' }}/>
                            <label for="switch-{{$n}}" {{$n=$n+1}}></label>
                            
                        </span>
                    </td>
                </tr>
            @endforeach
            {{-- {!! $clients->links() !!} --}}
        </tbody>
        
    </table>
    <script>
        $(document).ready( function () {
            $('#dataTable').DataTable({
                "language": {
                    "url": "/js/datatables-spanish.json"
                },
        
                "dom": '<"#buscador.float-left form-group has-search"f><"float-right"l><<t>ip>'
                
            });
            $("#buscador").append("<p>HOLA</p>");
        });

    </script>
@stop