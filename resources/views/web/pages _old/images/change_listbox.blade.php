<div class="col-sm-12">
    <label for="size">SELECCIONE MEDIDAS</label>
        <select name="txt_ancho" id="txt_ancho" class="form-control">
            @foreach ($Medida as $size)
            <option  value="{{$size->id_medida}}"> Ancho: {{$size->ancho}} x Alto: {{$size->alto}} x Fondo: {{$size->fondo}}</option>
            @endforeach
        </select>

</div>

<script>
$('#txt_ancho').on('change', function() {
    const txt_id_medida = this.value

    $.ajax({
        type: 'get',
        dataType: 'html',
        url: '<?php echo url('/change_imagen');?>',
        data: "txt_id_medida=" + txt_id_medida + "&txt_valor=" + true,
        success: function(response) {
            $('#updateDiv').html(response);
        }
    });

    $.ajax({
        type: 'get',
        dataType: 'html',
        url: '<?php echo url('/change_ficha');?>',
        data: "txt_id_medida=" + txt_id_medida + "&txt_valor=" + true,
        success: function(response) {
            $('#txt_fichas').html(response);
        }
    });
});
</script>