<!-- <div class="col-12" style="display: flex;margin-top: 12px;">
    <label for="lbl_name">
        <h5>COLORES</h5>
    </label>
    <label for="lbl_name" class="check_ShowHide" style="margin-left: 20px;margin-top: 2px;">Todos:</label>
    <input type="checkbox" class="check_ShowHide" id="check_1" name="check_1" style="width: 17px;height: 33px;margin-left: 10px;" value="1">
</div>

<div class="btn-group btn-group-toggle" data-toggle="buttons">
    <div class="select2-purple">
        <select name="nameColor[]" multiple
            class="form-control nameColor">
            @foreach ($cbColores as $items)
            <option value="{{ $items->id }}" {{ $items->id == $items->id_color ? 'selected' : '' }}>
                {{ $items->name_color }}</option>
            @endforeach
        </select>
    </div>
</div> -->
<!-- 
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
            class="form-control nameTirador">
            @foreach ($cbTirador as $items)
            <option value="{{ $items->id }}" {{ $items->id == $items->id_tirador ? 'selected' : '' }}>
                {{ $items->nombre }}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="col-12" style="display: flex;margin-top: 12px;">
    <label for="lbl_name">
        <h5>UÑEROS</h5>
    </label>
    <label for="lbl_name" class="check_ShowHide" style="margin-left: 20px;margin-top: 2px;">Todos:</label>
    <input type="checkbox" class="check_ShowHide" id="check_3" name="check_3" style="width: 17px;height: 33px;margin-left: 10px;" value="3">
</div>
<div class="btn-group btn-group-toggle" data-toggle="buttons">
    <div class="select2-purple">
        <select name="nameUnero[]" multiple
            class="form-control nameUnero">
            @foreach ($cbTiradorUnero as $items)
            <option value="{{ $items->id }}" {{ $items->id == $items->id_tirador_unero ? 'selected' : '' }}>
                {{ $items->nombre }}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="col-12" style="display: flex;margin-top: 12px;">
    <label for="lbl_name">
        <h5>MODELOS DE PUERTAS</h5>
    </label>
    <label for="lbl_name" class="check_ShowHide" style="margin-left: 20px;margin-top: 2px;">Todos:</label>
    <input type="checkbox" class="check_ShowHide" id="check_4" name="check_4" style="width: 17px;height: 33px;margin-left: 10px;" value="4">
</div>
<div class="btn-group btn-group-toggle" data-toggle="buttons">
    <div class="select2-purple">
        <select name="nameModelo[]" multiple
            class="form-control nameModelo">
            @foreach ($cbModelo as $items)
            <option value="{{ $items->id }}" {{ $items->id == $items->id_modelo_puerta ? 'selected' : '' }}>
                {{ $items->nombre }}</option>
            @endforeach
        </select>
    </div>
</div> -->


<div class="col-12" style="display: flex;margin-top: 12px;">
    <label for="lbl_name">
        <h5>COLOR COSTADO</h5>
    </label>
    <label for="lbl_name" class="check_ShowHide" style="margin-left: 20px;margin-top: 2px;">Todos:</label>
    <input type="checkbox" class="check_ShowHide" id="check_5" name="check_5"
        style="width: 17px;height: 33px;margin-left: 10px;" value="2">
</div>
<div class="btn-group btn-group-toggle" data-toggle="buttons">
    <div class="select2-purple">
        <select name="nameColorCostado[]" multiple class="form-control nameColorCostado">
            @foreach ($cbColorCostado as $items)
            <option value="{{ $items->id }}" {{ $items->id == $items->id_color ? 'selected' : '' }}>
                {{ $items->name_color }}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="col-12" style="display: flex;margin-top: 12px;">
    <label for="lbl_name">
        <h5>COLOR REGLETA</h5>
    </label>
    <label for="lbl_name" class="check_ShowHide" style="margin-left: 20px;margin-top: 2px;">Todos:</label>
    <input type="checkbox" class="check_ShowHide" id="check_6" name="check_6"
        style="width: 17px;height: 33px;margin-left: 10px;" value="2">
</div>
<div class="btn-group btn-group-toggle" data-toggle="buttons">
    <div class="select2-purple">
        <select name="nameColorRegleta[]" multiple class="form-control nameColorRegleta">
            @foreach ($cbColorRegleta as $items)
            <option value="{{ $items->id }}" {{ $items->id == $items->id_color ? 'selected' : '' }}>
                {{ $items->name_color }}</option>
            @endforeach
        </select>
    </div>
</div>

<script>
//:::::::::::: CRUD SERVICIOS :::::::::::::::::::::::::::::
$('.nameColor,.nameTirador,.nameUnero,.nameModelo,.nameColorCostado,.nameColorRegleta').select2()

// $("input[name=check_1]").val(null);
// $("input[name=check_2]").val(null);
// $("input[name=check_3]").val(null);
// $("input[name=check_4]").val(null);

$('.nameColorCostado').on('change', function(e) {
    // e.preventDefault();
    $('.nameColorCostado').hide();

    console.log("dddddddddddd")
});
</script>