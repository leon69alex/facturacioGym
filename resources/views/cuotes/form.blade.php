{!! csrf_field() !!}
<div class="col-sm-6 offset-sm-3 text-center border-form">
    <div class="md-form md-outline">
        <label for="name">Nom</label>
        <input type="text" name="name" class="form-control" value="{{ $cuote->name ?? old('name') }}">
    </div>
    <div class="md-form md-outline">
        <label for="display_name">Nom complert</label>
        <input type="text" name="display_name" class="form-control" value="{{ $cuote->display_name ?? old('display_name') }}">
    </div>
    <div class="md-form">
        <input class="form-control" type="number" step="any" name="import" id="import" value="{{ $cuote->import ?? old('import') }}">
        <label for="import">Import</label>
    </div>
    <div class="custom-control custom-checkbox">
        <input type="checkbox" name="active" class="custom-control-input" id="defaultChecked2" {{ $cuote->active ? 'checked' : '' }}>
        <label class="custom-control-label" for="defaultChecked2">Actiu</label>
    </div>
    <br>
    <input type="submit" class="btn btn-rounded btn-dark-green" value="{{ $btnText ?? 'Crear Cuota' }}">
    <br>
    <br>
</div>