<tbody>
    <tr>
        <?php  
            $altImgs = DB::table('color_image')->get();
            $color_category = DB::table('color_category')->get();
            ?>
        <!-- ---------------------------1. BRILLO------------ -->
        <td>
            <label for="group_1" class="attribute_label">
                <!-- {{$color_category[3]->names}} -->
            </label>
            <div style="display: flex;">
                @foreach($altImgs as $altImg)

                @if($altImg->id_cat==4)
                <label class="radio-img" data-toggle="tooltip" data-placement="top" title="{{$altImg->description}}">
                    <input type="radio" name="color_puerta_unero"  value="{{$altImg->id}}"/>
                    <img style="width: 40px;" src="{{$altImg->url_image}}">
                </label>
                @endif

                @endforeach
            </div>
        </td>

        <!-- ---------------------------2. MAT------------ -->
        <td>
            <label for="group_1" class="attribute_label">
                <!-- {{$color_category[4]->names}} -->
            </label>
            <div style="display: flex;">
                @foreach($altImgs as $altImg)

                @if($altImg->id_cat==5)
                <label class="radio-img" data-toggle="tooltip" data-placement="top" title="{{$altImg->description}}">
                    <input type="radio" name="color_puerta_unero"  value="{{$altImg->id}}"/>
                    <img style="width: 40px;" src="{{$altImg->url_image}}">
                </label>
                @endif

                @endforeach
            </div>
        </td>


        <!-- ---------------------------3. MADERA------------ -->
        <td>
            <label for="group_1" class="attribute_label">
                <!-- {{$color_category[5]->names}} -->
            </label>
            <div style="display: flex;">
                @foreach($altImgs as $altImg)

                @if($altImg->id_cat==6)
                <label class="radio-img" data-toggle="tooltip" data-placement="top" title="{{$altImg->description}}">
                    <input type="radio" name="color_puerta_unero" value="{{$altImg->id}}"/>
                    <img style="width: 40px;" src="{{$altImg->url_image}}">
                </label>
                @endif

                @endforeach
            </div>
        </td>

    </tr>
</tbody>

<script>

$("input[type=radio][name=color_puerta_unero]").click(function() {
    const txt_id = $('input[name="color_puerta_unero"]:checked').val();
    handleTiradorEncimera(txt_id) //Cambiar Imagen
});

const handleTiradorEncimera = (txt_id) => {
    axios.post('/change_tirador_encimera', {
            'id': txt_id,
        })
        .then(function(response) {
            $('#txt_caracteristica_tirador').html(response.data);
        }).catch(function(error) {
            if (error.response.status) {
                alert('No existe la medida.! Gracias')
            }
        })
}

</script>