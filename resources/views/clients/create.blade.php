@extends('base')

@section('contingut')

    <h1>Crear nou client</h1>

    <form method="POST" action="{{ route('clients.store') }}">
        {!! csrf_field() !!}
        <div class="form-group row">
            <label class="col-form-label col-sm-1" for="name">Nom:</label>
            <input type="text" name="name" class="form-control col-2" >
            <label class="col-form-label col-sm-1" for="surnames">Cognoms:</label>
            <input type="text" name="surnames" class="form-control col-2" >
        </div>
        <div class="form-group row">
            <label class="col-form-label col-sm-1" for="email">Email:</label>
            <input type="text" name="email" class="form-control col-2" >
        </div>
        <div class="form-group row">
            <label class="col-form-label col-sm-1" for="dni">DNI:</label>
            <input type="text" name="dni" class="form-control col-2" >
        </div>
        <div class="form-group row">
            <label class="col-form-label col-sm-1" for="cuote_id">Cuota:</label>
            <select class="custom-select col-2" name="cuote_id">
                @foreach($cuotes as $cuote)

                <option value={{$cuote->id}}>{{$cuote->display_name}}</option>

                @endforeach
            </select>
        </div>
        
        <div class="form-group row">
            <label class="col-form-label col-sm-1" for="numCompte">Numero de compte:</label>
            <input type="text" name="numCompte" class="form-control col-2" >
        </div>
        <div class="form-group form-check">
            <input type="checkbox" name="active" class="form-check-input" checked>
            <label class="form-check-label" for="active">Actiu</label>
        </div>
        <input type="submit" class="btn btn-primary" value="Crear client">
    </form>
@stop