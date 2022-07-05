<h4>COLORES</h4>
<div class="btn-group btn-group-toggle" data-toggle="buttons">
    <div class="select2-purple">
        <select name="nameColor[]" multiple
            class="form-control nameColor <!-- @error('authors') is-invalid @enderror -->">
            @foreach ($cbColores as $items)
            <option value="{{ $items->id }}" {{ $items->id == $items->id_color ? 'selected' : '' }}>
                {{ $items->name_color }}</option>
            @endforeach
        </select>
    </div>
</div>

<h4 class="mt-3">TIRADORES</h4>
<div class="btn-group btn-group-toggle" data-toggle="buttons">
    <div class="select2-purple">
        <select name="nameTirador[]" multiple
            class="form-control nameTirador <!-- @error('authors') is-invalid @enderror -->">
            @foreach ($cbTirador as $items)
            <option value="{{ $items->id }}" {{ $items->id == $items->id_tirador ? 'selected' : '' }}>
                {{ $items->nombre }}</option>
            @endforeach
        </select>
    </div>
</div>

<h4 class="mt-3">ENZIMERAS</h4>
<div class="btn-group btn-group-toggle" data-toggle="buttons">
    <div class="select2-purple">
        <select name="nameEnzimera[]" multiple
            class="form-control nameEnzimera <!-- @error('authors') is-invalid @enderror -->">
            @foreach ($cbEnzimera as $items)
            <option value="{{ $items->id }}" {{ $items->id == $items->id_enzimera ? 'selected' : '' }}>
                {{ $items->nombre }}</option>
            @endforeach
        </select>
    </div>
</div>