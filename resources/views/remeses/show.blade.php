@extends('base')

@section('contingut')

    <div>
        <a class="btn btn-success" href="/remeses/generate-pdf/{{$remesa->id}}"><i class="fas fa-file-pdf"></i> Decarregar PDF</a>
    </div>
    <br>

    <table class="table-sm table-striped table-hover" id="dataTable" >
        <thead>
            <tr>
                <th>Nom</th>
                <th>Cuota</th>
                <th>Import</th>
            </tr>
        </thead>
        <tbody>   
            @foreach($remesa->clients as $client)
                <tr>
                    <th>{{$client->name}} {{$client->surnames}}</th>
                    <td>{{$client->cuote->display_name}}</td>
                    <td>{{$client->cuote->import}}€</td>
                </tr>
            @endforeach
        </tbody>
        
    </table>
    <h2><b style="color:brown">IMPORT TOTAL: {{$import_total}}€</b></h2>
    <div>
        <a class="btn btn-success" href="/remeses/generate-pdf/{{$remesa->id}}"><i class="fas fa-file-pdf"></i>Decarregar PDF</a>
    </div>

    

@stop

@section('javascript')

    <script src="http://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    
    <script src="\js\DataTables\customDatatables.js"></script>
@stop