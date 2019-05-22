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

    <h1>El meu perfil</h1>
    <form method="POST" action=" {{ route('users.update', $user->id) }} " enctype="multipart/form-data">
        {!! method_field('PUT') !!}
        {!! csrf_field() !!}
        <div class="form-group row">
            <label class="col-form-label col-sm-1" for="name">Nom:</label>
            <input type="text" name="name" class="form-control col-2" value="{{ $user->name ?? old('name') }}">
        </div>
        <div class="form-group row">
            <label class="col-form-label col-sm-1" for="surnames">Cognoms:</label>
            <input type="text" name="surnames" class="form-control col-2" value="{{ $user->surnames ?? old('surnames') }}">
        </div>
        <div class="form-group row">
            <label class="col-form-label col-sm-1" for="email">Email:</label>
            <input type="text" name="email" class="form-control col-2" value="{{ $user->email ?? old('email') }}">
        </div>
        <div class="form-group row">
            <label class="col-form-label col-sm-1" for="password">Password:</label>
            <input type="password" name="password" class="form-control col-2">
        </div>

        @if(empty(auth()->user()->password))
            <img src="{{auth()->user()->avatar}}" class="avatar" width="100" height="100" alt="Avatar">
        @else
            <img src="/storage/{{auth()->user()->avatar}}" class="avatar" width="100" height="100" alt="Avatar">
        @endif
        <div class="form-group row">
            
            <label class="col-form-label col-sm-1" for="avatar">Avatar:</label>
            <input type="file" step="any" name="avatar" class="form-control-file col-2">
        </div>
               
        <input type="submit" class="btn btn-success" value="Actualitzar perfil">
    </form>
@stop