{!! csrf_field() !!}
<div class="col-sm-6 offset-sm-3 text-center border-form">

    <div class="md-form md-outline">
        <label for="name">Nom</label>
        <input type="text" name="name" class="form-control" value="{{ $client->name ?? old('name') }}">
    </div>
    <div class="md-form md-outline">
        <label for="surnames">Cognoms</label>
        <input type="text" name="surnames" class="form-control" value="{{ $client->surnames ?? old('surnames') }}">
        
    </div>
    {!! $errors->first('name', '<span class=form-error>:message</span>') !!}
    {!! $errors->first('surnames', '<span class=form-error>:message</span>') !!}
    <div class="md-form md-outline">
        <label for="email">Email</label>
        <input type="text" name="email" class="form-control" value="{{ $client->email ?? old('email') }}">
        {!! $errors->first('email', '<span class=form-error>:message</span>') !!}
    </div>
    <div class="md-form md-outline">
        <label for="dni">DNI</label>
        <input type="text" name="dni" class="form-control" value="{{ $client->dni ?? old('dni') }}">
        {!! $errors->first('dni', '<span class=form-error>:message</span>') !!}
    </div>
    <div class="form-group">
        <label class="col-form-label" for="cuote_id">Quota</label>
        <select class="custom-select" name="cuote_id" selected="{{ $client->cuote_id ?? old('cuote_id') }}">
            @foreach($cuotes as $cuote)

            <option value={{$cuote->id}}>{{$cuote->display_name}}</option>

            @endforeach
        </select>
    </div>
    
    <div class="md-form md-outline">
        <label for="CCC">Compte Corrent</label>
        <input type="text" name="CCC" id="ccc" class="form-control" value="{{ $client->CCC ?? old('CCC') }}">
        <button class="form-control btn btn-primary" id="calc" disabled>Validar</button>
        {!! $errors->first('CCC', '<span class=form-error>:message</span>') !!}
    </div>
    <div class="md-form md-outline">
        <label for="iban">IBAN</label>
        <input type="text" id="iban" name="IBAN" class="form-control" value="{{ $client->IBAN ?? old('IBAN') }}" readonly>
    </div>
    <div class="md-form md-outline">
        <label for="iban">SWIFT</label>
        <input type="text" id="swift" name="SWIFT" class="form-control" value="{{ $client->SWIFT ?? old('SWIFT') }}" readonly>
    </div>


    <div class="form-group form-check">
        <input type="checkbox" name="active" class="form-check-input" {{ $client->active ? 'checked' : '' }}>
        <label class="form-check-label" for="active">Actiu</label>
    </div>
    <input type="submit" class="btn btn-rounded btn-dark-green" value="{{ $btnText ?? 'Crear Client' }}">
    <br>
    <br>
</div>
