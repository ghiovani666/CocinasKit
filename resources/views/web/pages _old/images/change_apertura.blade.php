
    <ul>
       @foreach ($Medida as $size)
        <li style="display: flex;">
            <div class=""><span><input type="radio" class="attribute_radio" name="txt_apertura_two" value="{{ $size->apertura }}"  

            ></span></div>
            <span style="margin-left: 12px;">{{ $size->names }}</span>
        </li>
        @endforeach
    </ul>


<script>
$("input[name='txt_apertura_two']").on('change', function() {
    const txt_apertura = this.value
    //-------------------MUESTRA EL LIST LAS MEDIDAS
    $.ajax({
        type: 'get',
        dataType: 'html',
        url: '<?php echo url('/change_listbox');?>',
        data: "txt_apertura=" + txt_apertura + "&txt_id_color=" + <?php echo $Medida[0]->id_color; ?>+ "&txt_id_product=" + <?php echo $Medida[0]->id_product; ?>+ "&txt_valor=" + true,
        success: function(response) {
            $('#txt_id_medida').html(response);
        }
    });
    //-----------------MUESTRA LA IMAGEN

    $.ajax({
        type: 'get',
        dataType: 'html',
        url: '<?php echo url('/change_imagen');?>',
        data: "txt_apertura=" + txt_apertura + "&txt_id_color=" + <?php echo $Medida[0]->id_color; ?>+ "&txt_id_product=" + <?php echo $Medida[0]->id_product; ?>,
        success: function(response) {
            $('#updateDiv').html(response);
        }
    });

});
</script>