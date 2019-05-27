<!DOCTYPE html>
<html>
<head>
    <title>{{$title}}</title>
    <style>
        table {
            border-collapse: collapse;
        }   
    
        table, th, td {
            border: 1px solid black;
            width: 100%;
        }
        .title {
            color: #10B09D;
            text-align: center;
        }
        table tr:nth-child(odd) td {
             background-color:#E1DFDF; 
        }  
        table tr:nth-child(even) td {
            background-color:#ffffff; 
        }
    </style>
</head>
<body>
    <h1 class="title"><img src="storage\images\logo-gym - copia.png" alt="Logo" width="100px" height="100px">GIMNÀS PALACE - {{ $title }}</h1>
    <table>
        <thead style="background-color:yellow">
            <tr>
                <th>ID Client</th>
                <th>Nom</th>
                <th>Email</th>
                <th>DNI</th>
                <th>Import</th>
            </tr>
        </thead>
        <tbody>
            @foreach($remesa->clients as $client)
                <tr>
                    <td><b>{{ $client->id }}</b></td>
                    <td>{{ $client->name }} {{$client->surnames}}</td>
                    <td>{{ $client->email }}</td>
                    <td>{{ $client->dni }}</td>
                    <td>{{ $client->cuote->import }}€</td>
                </tr>
            @endforeach
            <tr>
                <td colspan="5" style="text-align: center"><b>IMPORT TOTAL: {{$import_total}}€</b></td>
            </tr>
        </tbody>
    </table>
</body>
</html>