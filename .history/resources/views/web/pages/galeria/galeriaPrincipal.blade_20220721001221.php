@extends('web.base')
<!-- Contenido en el Head de la pagina -->
@section('head_page')
<!-- extras -->
<link rel="stylesheet" href="{{ URL::asset('assets/plugins/owl-carousel/owl-carousel/owl.carousel.css') }}">
<link rel="stylesheet"
    href="{{ URL::asset('THIS/assets/plugins/cube-portfolio/cubeportfolio/css/cubeportfolio.min.css') }}">
<link rel="stylesheet"
    href="{{ URL::asset('THIS/assets/plugins/cube-portfolio/cubeportfolio/custom/custom-cubeportfolio.css') }}">

<link rel="stylesheet" href="../../themes/warehouse/cache/v_615_8a6bf2d4042c5d2bd53744de401f69c6_all.css"
    type="text/css" media="all" />
<script type="text/javascript">
var cko_cookie_info = '{"cko_colorInteriorMueble":4,"cko_colorAcabadoPuerta":2,"cko_canto":2,"cko_modeloTirador":5}';
</script>

<link rel="stylesheet" href="{{ URL::asset('css/product_details.css') }}">

@endsection

<!-- Contenido en el Body -->
@section('content')

<!-- <div class="container" style="width: 100%;max-width: 1190px;"> -->
<div class="container" style="width: 100%; max-width: 1080px;">
    <div class="row content-inner">
        <div id="center_column" class="center_column col-xs-12 col-sm-12 col-sm-push-0">
            <div itemscope itemtype="https://schema.org/Product">
                <div class="cocinakit-mueble-general cocinakit-mueble-kit primary_block row ">

                   
                
                </div>
            </div>
        </div>
    </div>


    
</div>

@endsection

@section('footer_page')

<!-- --------------------------------------LISTA DE PRODUCTOS----------- -->
<script src="{{ URL::asset('THIS/assets/plugins/cube-portfolio/cubeportfolio/js/jquery.cubeportfolio.min.js') }}">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-zoom/1.7.20/jquery.zoom.min.js"></script>
<script src="{{ URL::asset('THIS/assets/js/plugins/cube-portfolio/cube-portfolio-4.js') }}"></script>


<script>
$(document).ready(function() {
    App.init();
    App.initScrollBar();
    App.initParallaxBg();
    OwlCarousel.initOwlCarousel();
    RevolutionSlider.initRSfullWidth();

    //====VARIABLES POR DEFAULS



});
</script>
<script>
// Can also be used with $(document).ready()
$(window).load(function() {
    $('.flexslider').flexslider({
        animation: "slide",
        controlNav: "thumbnails"
    });
});



//=============FUNCIONES PARA COLOR Y TIRADOR===========
function imagenFunctionColor(txt_id_medida) {

    $.ajax({
        type: 'get',
        dataType: 'html',
        url: '<?php echo url('/change_imagen_color');?>',
        data: "txt_id_medida=" + txt_id_medida,
        success: function(response) {
            $('#updateDivColor').html(response);
            $('#imagenModalColor').modal(true)
        }
    });
}

function imagenFunctionTirador(txt_id_medida) {
    $.ajax({
        type: 'get',
        dataType: 'html',
        url: '<?php echo url('/change_imagen_tirador');?>',
        data: "txt_id_medida=" + txt_id_medida,
        success: function(response) {
            $('#updateDivTirador').html(response);
            $('#imagenModalTirador').modal(true)
        }
    });
}
// ---------------abrir modal cuando se inserta el producto
($('#txt_modal').val() == 1) ? $('#exampleModalLong').modal(true): ''




$("#id_producto_id_item").change(function() {
    window.location.href = window.location.origin + '/mueble_completo_/' + this.value.split('-')[0] + '/' + this
        .value.split('-')[1];
});

$(document).ready(function() {
    $('#produto').zoom();
});









































$("input[type=radio][name=txt_model_enzimera]").click(function() {
    const txt_id_color = $('input[name="txt_model_enzimera"]:checked').val();
    let total_pre = parseFloat($('#costo_total__').val()) + parseFloat(txt_id_color.split('-')[0]);
    $('#costo_total').val(total_pre);
    getTirador(txt_id_color.split('-')[1]) //Cambiar Imagen

});

//-------------- CAMBIOS DE IMAGENS -------------

const imagenPrincipal = (url_image) => {
    $('#txt_imagenPrincipal').attr('src', url_image);
    $('.zoomImg').attr('src', url_image);
    $('#zoomImgModal').attr('src', url_image);
}





















//:::::::::::::::::::::: DEFAULD :::::::::::::::

$(document).ready(function() {

    getTirador(1)
    getModuloPuerta(<?php echo (!empty($modeloPuerta) ?$modeloPuerta[0]->id:'');?>) //Para puertas
    getModuloPuertaColor(<?php echo (!empty($modeloPuerta) ?$modeloPuerta[0]->id:'');?>) //Para colores

    $(".txt_modelo_tirador").show();
    $(".txt_modelo_tirador_unero").hide();
})

//::::::::::::::::::::::1. TIRADORES :::::::::::::::

$("#txt_tirador_unero1").on('change', function() {
    $(".txt_modelo_tirador").show();
    $(".txt_modelo_tirador_unero").hide();
    if (this.value == 0) {
        //  $('#costo_total__,#costo_total').val($('#costo_total__').val())
    }

    // $("input[type=radio][name=txt_model_tirador]").prop('checked', false); 
    // $('#costo_total__,#costo_total').val(); 

})

$('#txt_tirador_unero2').on('change', function() {
    $(".txt_modelo_tirador").hide();
    $(".txt_modelo_tirador_unero").show();
});

$("input[type=radio][name=txt_model_tirador]").click(function() {
    const txt_id = $('input[name="txt_model_tirador"]:checked').val();
    getTirador(txt_id.split('-')[1])
});

const getTirador = (txt_id) => {
    axios.post('/html_imagen_tirador', {
            'txt_id': txt_id,
        })
        .then(function(response) {
            $('#imagen_tirador').html(response.data);
        }).catch(function(error) {
            if (error.response.status) {
                // alert('No existe la medida.! Gracias')
            }
        })
}

$("input[type=radio][name=txt_model_tiradorUnero]").click(function() {
    const txt_id = $('input[name="txt_model_tiradorUnero"]:checked').val();
    getTiradorUnero(txt_id.split('-')[1])
});

const getTiradorUnero = (txt_id) => {
    axios.post('/html_imagen_tirador_unero', {
            'txt_id': txt_id,
        })
        .then(function(response) {
            $('#imagen_tirador').html(response.data);
        }).catch(function(error) {
            if (error.response.status) {
                // alert('No existe la medida.! Gracias')
            }
        })
}



//::::::::::::::::::::: MODAL IMAGENES ::::::::::::::::::::
function modalAbrirImagen(url_image) {
    $('#imagenModal').modal(true)
    $('#zoomImgModal').attr('src', url_image);
}


$("input[type=radio][name=txt_model_tirador]").click(function() {
    const txt_id_color = $('input[name="txt_model_tirador"]:checked').val();
    let total_pre = parseFloat($('#costo_total__').val()) + parseFloat(txt_id_color.split('-')[0]);
    $('#costo_total').val(total_pre);
    // getTirador(txt_id_color.split('-')[1]) //Cambiar Imagen

});

//::::::::::::::::::::::2. MODELOS DE PUERTAS :::::::::::::::
$("input[type=radio][name=modelo_puertas]").change(function() {
    const id_modelo_puerta = $('input[name="modelo_puertas"]:checked').val();
    getModuloPuerta(id_modelo_puerta)
    getModuloPuertaColor(id_modelo_puerta)
});

const getModuloPuerta = (id_modelo_puerta) => {
    axios.post('/html_imagen_modelo_puerta', {
            'txt_id': id_modelo_puerta,
        })
        .then(function(response) {
            $('#txt_modelo_puerta').html(response.data);
        }).catch(function(error) {
            if (error.response.status) {
                // alert('No existe la medida.! Gracias')
            }
        })
}

const getModuloPuertaColor = (id_modelo_puerta) => {
    $.ajax({
        type: 'get',
        dataType: 'html',
        url: '/html_imagen_colores',
        data: {
            id_modelo_puerta: id_modelo_puerta,
            id_producto: <?php echo (count($Products)!=0?$Products[0]->id:'');?>
        },
        success: function(response) {
            // console.log(response)
            $('#modelo_colores').html(response);
        }
    });
}
































//:::::::::::::::::::::: HALLAMOS EL PRECIO TOTAL ::::::::::::::::::::::::::::::::::
//<form action="{{url('/cart/addItem')}}/< echo $Products[0]->id; ?>">
precioTotal();

function precioTotal() {
    axios.post('/calcular_total_precio_medida', {
            'id_imagen': '<?php echo (count($Products)!=0?$Products[0]->id_imagen:''); ?>',
            'ancho': $('#txt_ancho').val(),
            'alto': $('#txt_alto').val(),
            'fondo': $('#txt_fondo').val(),
        })
        .then(function(response) {
            if (response.data[1] != null) {
                $('#costo_total__,#costo_total').val(response.data[0])
                imagenPrincipal(response.data[1])
            } else {
                $('#costo_total__,#costo_total').val(response.data[0])
            }

        }).catch(function(error) {
            if (error.response.status) {
                // alert('No existe la medida.! Gracias')
            }
            //https://stackoverflow.com/questions/56577124/how-to-handle-500-error-message-with-axios/56577273
        })
}
// ::::::::::::::::: CAMBIA LA CANTIDAD ::::::::::::::::::::::
$('#txt_cantidad_precio').on('change keyup', function(e) {
    const cantidad = e.target.value;
    axios.post('/calcular_total_precio_medida', {
            'id_imagen': '<?php echo (count($Products)!=0?$Products[0]->id_imagen:''); ?>',
            'ancho': $('#txt_ancho').val(),
            'alto': $('#txt_alto').val(),
            'fondo': $('#txt_fondo').val(),
        })
        .then(function(response) {
            let monto = parseFloat(response.data[0])*cantidad
            $('#costo_total__,#costo_total').val(monto)
        }).catch(function(error) {
            console.log(error)
        })  
});


// ::::::::::::::::: CAMBIO DE PRECIO ANCHO ::::::::::::::::::::::
$('#txt_ancho').on('change', function(e) {
     const txt_ancho = e.target.value;
     axios.post('/calcular_total_precio_medida', {
            'id_imagen': '<?php echo (count($Products)!=0?$Products[0]->id_imagen:''); ?>',
            'ancho': txt_ancho,
            'alto': $('#txt_alto').val(),
            'fondo': $('#txt_fondo').val(),
        })
        .then(function(response) {
            const cantidad=parseInt($('#txt_cantidad_precio').val())
            let monto = parseFloat(response.data[0])*cantidad
            $('#costo_total__,#costo_total').val(monto)
        }).catch(function(error) {
            console.log(error)
            toastr.error("No tiene memdida")
        })       
});

$('#txt_alto').on('change', function(e) {
     const txt_alto = e.target.value;
     axios.post('/calcular_total_precio_medida', {
            'id_imagen': '<?php echo (count($Products)!=0?$Products[0]->id_imagen:''); ?>',
            'ancho': $('#txt_ancho').val(),
            'alto': txt_alto,
            'fondo': $('#txt_fondo').val(),
        })
        .then(function(response) {
            const cantidad=parseInt($('#txt_cantidad_precio').val())
            let monto = parseFloat(response.data[0])*cantidad
            $('#costo_total__,#costo_total').val(monto)
        }).catch(function(error) {
            console.log(error)
            toastr.error("No tiene memdida")
        })       
});

$('#txt_fondo').on('change', function(e) {
     const txt_fondo = e.target.value;
     axios.post('/calcular_total_precio_medida', {
            'id_imagen': '<?php echo (count($Products)!=0?$Products[0]->id_imagen:''); ?>',
            'ancho': $('#txt_ancho').val(),
            'alto': $('#txt_alto').val(),
            'fondo': txt_fondo,
        })
        .then(function(response) {
            const cantidad=parseInt($('#txt_cantidad_precio').val())
            let monto = parseFloat(response.data[0])*cantidad
            $('#costo_total__,#costo_total').val(monto)
        }).catch(function(error) {
            console.log(error)
            toastr.error("No tiene memdida")
        })       
});









</script>

<!--flex slider-->
<script src="{{ URL::asset('THIS/assets_2/js/jquery.flexslider.js') }}"></script>
<script src="{{ URL::asset('themes/warehouse/cache/v_726_15810251d95ac88cec9fad9fb952e72e.js') }}"></script>

@endsection