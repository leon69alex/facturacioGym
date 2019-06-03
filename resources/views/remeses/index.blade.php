@extends('base')

@section('contingut')

    <div class="d-flex justify-content-between">
            <div>
                <a class="btn btn-rounded btn-dark-green" href="/remeses/generate"><i class="fas fa-plus-square"></i> Generar Remesa</a>
            </div>
        </div>
        <b style="color:brown">La remesa es generarà a partir dels clients actius actuals del sistema</b>
        
        <br>
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
                            <a style="color:green" href="remeses/show/{{$remesa->id}}">
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.19/css/jquery.dataTables.min.css"></script>
    
    <script src="\js\DataTables\customDatatables.js"></script>
@stop