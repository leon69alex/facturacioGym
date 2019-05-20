@extends('base')

@section('contingut')

    <h1>El meu perfil</h1>
    <form method="POST" action=" {{ route('users.update', $cuote->id) }} ">
        {!! method_field('PUT') !!}
        {!! csrf_field() !!}
        <div class="form-group row">
            <label class="col-form-label col-sm-1" for="name">Nom:</label>
            <input type="text" name="name" class="form-control col-2" value="{{ $user->name ?? old('name') }}">
        </div>
        <div class="form-group row">
            <label class="col-form-label col-sm-1" for="display_name">Cognoms:</label>
            <input type="text" name="display_name" class="form-control col-2" value="{{ $user->surnames ?? old('display_name') }}">
        </div>
        <div class="form-group row">
            <label class="col-form-label col-sm-1" for="import">Avatar:</label>
            <input type="number" step="any" name="import" class="form-control col-2" value="{{ $user->import ?? old('import') }}">
        </div>
        <div class="form-group form-check">
            <input type="checkbox" name="active" class="form-check-input" checked>
            <label class="form-check-label" for="active">Actiu</label>
        </div>
        
        <input type="submit" class="btn btn-primary" value="Crear cuota">
    </form>



    <p>{{$user->name}}</p>







@stop