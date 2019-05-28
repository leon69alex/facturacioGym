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
            <a class="btn btn-success" href="{{ route('clients.create') }}"><i class="fas fa-plus-square"></i> Nou Client</a>
            <a class="btn btn-success" href="importClients"><i class="fas fa-file-excel"></i> Importar massivament</a>

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
        <tbody>
                
            @foreach($clients as $client)
                <tr>
                    <th>{{ $client->id }}</th>
                    <td>
                        <a href="{{ route('clients.edit', $client->id)}}" style="color:green">
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
                            <input  type="checkbox" class="switch btnAjax" id="switch-{{$client->id}}" value="{{ $client->active }}" name="active" {{ $client->active ? 'checked' : '' }}/>
                            <label for="switch-{{$client->id}}"></label>
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

<script type="text/javascript">
    $(document).ready( function () {
        $(".btnAjax").on('click', function(e){

            var id = $(this).attr('id');
    
            id = id.substring(id.indexOf('-')+1);     
    
            $.ajax({
    
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
    
                type:'POST',
    
                url:'clients/ajaxRequest',
    
                data:{id:id},
    
                success:function(data){
                    //alert(data.success);
    
                }
            });
        });
    });
</script>
    
@stop

@section('javascript')

    <script src="http://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    
    <script src="\js\DataTables\customDatatables.js"></script>
@stop

