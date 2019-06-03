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

    <h1 class="title">El meu perfil</h1>
    <hr>
    <br>
    <div class="col-sm-6 offset-sm-3 text-center border-form">
        <form method="POST" action=" {{ route('users.update', $user->id) }} " enctype="multipart/form-data" accept="image/*">
            {!! method_field('PUT') !!}
            {!! csrf_field() !!}
            <div class="md-form md-outline">
                <label for="name">Nom</label>
                <input type="text" name="name" class="form-control" value="{{ $user->name ?? old('name') }}">
            </div>
            <div class="md-form md-outline">
                <label for="surnames">Cognoms</label>
                <input type="text" name="surnames" class="form-control" value="{{ $user->surnames ?? old('surnames') }}">
            </div>
            <div class="md-form md-outline">
                <label for="email">Email</label>
                <input type="text" name="email" class="form-control" value="{{ $user->email ?? old('email') }}">
            </div>
            <div class="md-form md-outline">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control">
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
                
            <input type="submit" class="btn btn-rounded btn-dark-green" value="Actualitzar perfil">
        </form>
    </div>
@stop