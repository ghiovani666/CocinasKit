@foreach ($Medida as $size)
<tr>
    <th>
        <input type="radio" class="attribute_radio" name="txt_id_medida" value="{{$size->id_medida}}" 
        {{ $size->id_medida == $IdMedi ? 'checked' : ''}}
        />
    </th>
    <td>{{$size->ancho}}</td>
    <td>{{$size->alto}}</td>
    <td>{{$size->fondo}}</td>
    <td>
        <label class="radio-img" data-toggle="tooltip" data-placement="top" title="{{$size->name_color}}" > 
            <input type="radio" name="txt_imagen_1" value="{{$size->id_medida}}" />
            <img style="width: 40px;" src="{{$size->color_imagen}}">
        </label>
    </td>
    <td>{{$size->name_apertura}}</td>
    <td> <label class="radio-img" data-toggle="tooltip" data-placement="top" title="{{$size->name_tirador}}">
            <input type="radio" name="txt_imagen_2" value="{{$size->id_medida}}" />
            <img style="width: 40px;" src="{{$size->tirador_imagen}}">
        </label></td>
</tr>
@endforeach

<script>
    // $("input:radio").attr("checked", false);
//---------------TABLA QUE CAMBIA LAS IMAGENES
$('input[name=txt_id_medida]').on('change', function() {
    const txt_id_medida = this.value
    $.ajax({
        type: 'get',
        dataType: 'html',
        url: '<?php echo url('/change_imagen');?>',
        data: "txt_id_medida=" + txt_id_medida,
        success: function(response) {
            $('#updateDiv').html(response);
            $('#updateDivPrincipal').html(response);
        }
    });
});

$('input[name=txt_imagen_1]').on('click', function() {
    const txt_id_medida = this.value
    imagenFunctionColor(txt_id_medida) 
});

$('input[name=txt_imagen_2]').on('click', function() {
    const txt_id_medida = this.value
    imagenFunctionTirador(txt_id_medida) 
});
</script>