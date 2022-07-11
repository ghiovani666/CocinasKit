<div class="col-3" style="display: flex;">
    <label for="lbl_name">
        <h4>COLORES</h4>
    </label>
    <label for="lbl_name" style="margin-left: 20px;margin-top: 2px;">Todos:</label>
    <input type="checkbox" id="check_1" name="check_1" style="width: 17px;height: 33px;margin-left: 10px;" value="1">
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

<div class="col-3" style="display: flex;">
    <label for="lbl_name">
        <h4>TIRADORES</h4>
    </label>
    <label for="lbl_name" style="margin-left: 20px;margin-top: 2px;">Todos:</label>
    <input type="checkbox" id="check_2" name="check_2" style="width: 17px;height: 33px;margin-left: 10px;" value="2">
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

<div class="col-3" style="display: flex;">
    <label for="lbl_name">
        <h4>UÑEROS</h4>
    </label>
    <label for="lbl_name" style="margin-left: 20px;margin-top: 2px;">Todos:</label>
    <input type="checkbox" id="check_3" name="check_3" style="width: 17px;height: 33px;margin-left: 10px;" value="3">
</div>
<div class="btn-group btn-group-toggle" data-toggle="buttons">
    <div class="select2-purple">
        <select name="nameUnero[]" multiple
            class="form-control nameUnero <!-- @error('authors') is-invalid @enderror -->">
            @foreach ($cbTiradorUnero as $items)
            <option value="{{ $items->id }}" {{ $items->id == $items->id_tirador_unero ? 'selected' : '' }}>
                {{ $items->nombre }}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="col-3" style="display: flex;">
    <label for="lbl_name">
        <h4>MODELOS DE PUERTAS</h4>
    </label>
    <label for="lbl_name" style="margin-left: 20px;margin-top: 2px;">Todos:</label>
    <input type="checkbox" id="check_4" name="check_4" style="width: 17px;height: 33px;margin-left: 10px;" value="4">
</div>
<div class="btn-group btn-group-toggle" data-toggle="buttons">
    <div class="select2-purple">
        <select name="nameModelo[]" multiple
            class="form-control nameModelo <!-- @error('authors') is-invalid @enderror -->">
            @foreach ($cbModelo as $items)
            <option value="{{ $items->id }}" {{ $items->id == $items->id_modelo_puerta ? 'selected' : '' }}>
                {{ $items->nombre }}</option>
            @endforeach
        </select>
    </div>
</div>
<script>
//:::::::::::: CRUD SERVICIOS :::::::::::::::::::::::::::::
$('.nameColor,.nameTirador,.nameUnero,.nameModelo').select2()
</script>