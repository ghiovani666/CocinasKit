@foreach($rdData as $altImg)
<label class="radio-img" title="{{ $altImg->description }}">
    <input type="radio" name="color_puertas" value="{{$altImg->id}}" />
    <img style="width: 40px;" src="{{$altImg->url_image}}">
</label>
@endforeach

<script type="text/javascript">

$("input[type=radio][name=color_puertas]").change(function() {
    const txt_id_color = $('input[name="color_puertas"]:checked').val();
    console.log(txt_id_color)
    getAcabadoPuerta(txt_id_color)
});

const getAcabadoPuerta = (txt_id_color) => {
    axios.post('/html_imagen_acabado_puertas', {
            'txt_id_color': txt_id_color,
        })
        .then(function(response) {
            $('#imagen_acabadoPuerta').html(response.data);
        }).catch(function(error) {
            if (error.response.status) {
                //alert('No existe la medida.! Gracias')
            }
        })
}


    </script>