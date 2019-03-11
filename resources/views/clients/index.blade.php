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
    <table class="table table-dark" id="dataTable" >
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
                    <td>      
                        <span class="switch">
                            <input type="checkbox" class="switch" id="switch-id" value="{{ $client->active }}" name="active" {{ $client->active ? 'checked' : '' }}/>
                            <label for="switch-id"></label>
                        </span>
                    </td>
                </tr>
            @endforeach
            {{-- {!! $clients->links() !!} --}}
        </tbody>
        
    </table>

    {{-- <script type="text/javascript">
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
    </script> --}}


    <script>
        $(document).ready( function () {
            $('#dataTable').DataTable();
        } );
        </script>



    {{-- <script>
        $(document).ready(function() {
            $('#dataTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('serverSide') }}",
                columnDefs: [{
                    targets: [0, 1, 2],
                    className: 'mdl-data-table__cell--non-numeric'
                }]
            });
        });
    </script> --}}

@stop