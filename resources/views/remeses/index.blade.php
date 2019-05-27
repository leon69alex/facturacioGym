@extends('base')

@section('contingut')

    <div class="d-flex justify-content-between">
            <div>
                <a class="btn btn-success" href="/remeses/generate">+ Generar Remesa</a>
            </div>
        </div>
    
        <br>
        <table class="table-sm table-dark table-striped table-hover" id="dataTable" >
            <thead>
                <th>ID</th>
                <th>Nom</th>
                <th>Descripció</th>
                <th>Creada per</th>
            </thead>
            <tbody>
                    
                @foreach($remeses as $remesa)
                    <tr>
                        <th>{{ $remesa->id }}</th>
                        <td>
                            <a href="show/{{$remesa->id}}">
                                {{ $remesa->name }}
                            </a>
                        </td>
                        <td>{{ $remesa->description }}</td>
                        <td>{{ $remesa->user->name }}</td>
                    </tr>
                @endforeach
            </tbody>
            
        </table>

@stop

@section('javascript')

    <script src="http://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    
    <script src="\js\Datatables\customDatatables.js"></script>
@stop