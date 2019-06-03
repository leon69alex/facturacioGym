@extends('base')

@section('contingut')

    <div>
        <a class="btn btn-rounded btn-dark-green" href="/remeses/generate-pdf/{{$remesa->id}}"><i class="fas fa-file-pdf"></i> Decarregar PDF</a>
    </div>
    <br>

    <table class="table-sm table-striped table-hover" id="dataTable" >
        <thead>
            <tr>
                <th>Nom</th>
                <th>Quota</th>
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
        <a class="btn btn-rounded btn-dark-green" href="/remeses/generate-pdf/{{$remesa->id}}"><i class="fas fa-file-pdf"></i>Decarregar PDF</a>
    </div>

    

@stop

@section('javascript')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.19/css/jquery.dataTables.min.css"></script>
    
    <script src="\js\DataTables\customDatatables.js"></script>
@stop