{!! csrf_field() !!}
        <div class="form-group row">
            <label class="col-form-label col-sm-1" for="name">Nom:</label>
            <input type="text" name="name" class="form-control col-2" value="{{ $client->name ?? old('name') }}">
            <label class="col-form-label col-sm-1" for="surnames">Cognoms:</label>
            <input type="text" name="surnames" class="form-control col-2" value="{{ $client->surnames ?? old('surnames') }}">
            
        </div>
        {!! $errors->first('name', '<span class=form-error>:message</span>') !!}
        {!! $errors->first('surnames', '<span class=form-error>:message</span>') !!}
        <div class="form-group row">
            <label class="col-form-label col-sm-1" for="email">Email:</label>
            <input type="text" name="email" class="form-control col-2" value="{{ $client->email ?? old('email') }}">
            {!! $errors->first('email', '<span class=form-error>:message</span>') !!}
        </div>
        <div class="form-group row">
            <label class="col-form-label col-sm-1" for="dni">DNI:</label>
            <input type="text" name="dni" class="form-control col-2" value="{{ $client->dni ?? old('dni') }}">
            {!! $errors->first('dni', '<span class=form-error>:message</span>') !!}
        </div>
        <div class="form-group row">
            <label class="col-form-label col-sm-1" for="cuote_id">Cuota:</label>
            <select class="custom-select col-2" name="cuote_id" selected="{{ $client->cuote_id ?? old('cuote_id') }}">
                @foreach($cuotes as $cuote)

                <option value={{$cuote->id}}>{{$cuote->display_name}}</option>

                @endforeach
            </select>
        </div>
        
        <div class="form-group row">
            <label class="col-form-label col-sm-1" for="CCC">Compte Corrent:</label>
            <input type="text" name="CCC" id="ccc" class="form-control col-2" value="{{ $client->CCC ?? old('CCC') }}">
            <button class="form-control col-1 btn btn-primary ml-md-2" id="calc" disabled>Validar</button>
            {!! $errors->first('CCC', '<span class=form-error>:message</span>') !!}
        </div>
        <div class="form-group row">
            <label class="col-form-label col-sm-1" for="iban">IBAN / SWIFT:</label>
            <input type="text" id="iban" name="IBAN" class="form-control col-2" value="{{ $client->IBAN ?? old('IBAN') }}" readonly>
            <input type="text" id="swift" name="SWIFT" class="form-control col-2 ml-md-2" value="{{ $client->SWIFT ?? old('SWIFT') }}" readonly>
        </div>
        
        <div class="form-group form-check">
            <input type="checkbox" name="active" class="form-check-input" checked>
            <label class="form-check-label" for="active">Actiu</label>
        </div>
        <input type="submit" class="btn btn-primary" value="Crear client">

