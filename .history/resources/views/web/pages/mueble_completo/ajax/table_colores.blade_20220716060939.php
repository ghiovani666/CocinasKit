@foreach($rdData as $altImg)
<label class="radio-img" title="{{ $altImg->description }}">
    <input type="radio" name="color_puertas" value="{{$altImg->id}}" />
    <img style="width: 40px;" src="{{$altImg->url_image}}">
</label>
@endforeach

<script type="text/javascript">

    get_color_puerta(35)



//::::::::::::::::::::::3. ACABADOS DE PUERTAS :::::::::::::::
$("input[type=radio][name=color_puertas]").change(function() {
    const txt_id_color = $('input[name="color_puertas"]:checked').val();
    get_color_puerta(txt_id_color)
});

const get_color_puerta = (txt_id_color) => {
    axios.post('/html_imagen_color_puerta_', {
            'txt_id_color': txt_id_color,
        })
        .then(function(response) {
            $('#html_imagen_color').html(response.data);

        }).catch(function(error) {
            if (error.response.status) {
                //alert('No existe la medida.! Gracias')
            }
        })
}
</script>