<div class="col-12" style="display: flex;margin-top: 12px;">
    <label for="lbl_name">
        <h5>COLORES</h5>
    </label>
    <label for="lbl_name" class="check_ShowHide" style="margin-left: 20px;margin-top: 2px;">Todos:</label>
    <input type="checkbox" class="check_ShowHide" id="check_1" name="check_1" style="width: 17px;height: 33px;margin-left: 10px;" value="1">
</div>

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

<div class="col-12" style="display: flex;margin-top: 12px;">
    <label for="lbl_name">
        <h5>TIRADORES</h5>
    </label>
    <label for="lbl_name" class="check_ShowHide" style="margin-left: 20px;margin-top: 2px;">Todos:</label>
    <input type="checkbox" class="check_ShowHide" id="check_2" name="check_2" style="width: 17px;height: 33px;margin-left: 10px;" value="2">
</div>
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

<div class="col-12" style="display: flex;margin-top: 12px;">
    <label for="lbl_name">
        <h5>ENZIMERAS</h5>
    </label>
    <label for="lbl_name" class="check_ShowHide" style="margin-left: 20px;margin-top: 2px;">Todos:</label>
    <input type="checkbox" class="check_ShowHide" id="check_3" name="check_3" style="width: 17px;height: 33px;margin-left: 10px;" value="3">
</div>

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

<script>
//:::::::::::: CRUD SERVICIOS :::::::::::::::::::::::::::::
$('.nameColor,.nameTirador,.nameEnzimera').select2()
</script>

