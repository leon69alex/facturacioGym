{!! csrf_field() !!}
<div class="form-group row">
    <label class="col-form-label col-sm-1" for="name">Nom:</label>
    <input type="text" name="name" class="form-control col-2" value="{{ $cuote->name ?? old('name') }}">
</div>
<div class="form-group row">
    <label class="col-form-label col-sm-1" for="display_name">Nom complert:</label>
    <input type="text" name="display_name" class="form-control col-2" value="{{ $cuote->display_name ?? old('display_name') }}">
</div>
<div class="form-group row">
    <label class="col-form-label col-sm-1" for="import">Import:</label>
    <input type="number" step="any" name="import" class="form-control col-2" value="{{ $cuote->import ?? old('import') }}">
</div>
<div class="form-group form-check">
    <input type="checkbox" name="active" class="form-check-input" checked>
    <label class="form-check-label" for="active">Actiu</label>
</div>

<input type="submit" class="btn btn-primary" value="Crear cuota">