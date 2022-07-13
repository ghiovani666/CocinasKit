<tbody>

    <tr>
        <div>
            @foreach($rdData as $altImg)
            <label class="radio-img" title="{{ $altImg->description }}">
                <input type="radio" name="color_puertas" value="{{$altImg->id}}" />
                <img style="width: 40px;" src="{{$altImg->url_image}}">
            </label>
            @endforeach
        </div>
    </tr>
</tbody>


<script>
// $("input[type=radio][name=color_puerta_unero]").click(function() {
//     const txt_id = $('input[name="color_puerta_unero"]:checked').val();
//     handleTiradorEncimera(txt_id) //Cambiar Imagen
// });

// const handleTiradorEncimera = (txt_id) => {
//     axios.post('/change_tirador_encimera', {
//             'id': txt_id,
//         })
//         .then(function(response) {
//             $('#txt_caracteristica_tirador').html(response.data);
//         }).catch(function(error) {
//             if (error.response.status) {
//                 alert('No existe la medida.! Gracias')
//             }
//         })
// }
</script>