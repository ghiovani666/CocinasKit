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

<div class="container" style="width: 100%;">

    <!--=== Shop Product ===-->

    <div class="row content-inner">
        <div id="center_column" class="center_column col-xs-12 col-sm-12 col-sm-push-0">
            <div itemscope itemtype="https://schema.org/Product">
                <div class="cocinakit-mueble-general cocinakit-mueble-kit primary_block row ">

                    <input type="hidden" value="{{session()->has('message') ? session()->get('message') : false}}"
                        id="txt_modal" name="txt_modal" />
                    <!--=== COLUMNA 1 ===-->
                    <div class="col-xs-12 show-right-info col-md-4">
                        <div class="product-title">
                            <h1 itemprop="name" style="background-color: #6f6f6f !important;">
                                <?php echo ucwords($Products[0]->pro_name); ?></h1>
                        </div>
                        <!-- Master Slider -->
                        <div class="master-slider ms-skin-default" id="masterslider">
                            <div class="flexslider" id="updateDiv">
                                <div class="zoom" id="produto">
                                    <img src="{{ $Products[0]->url_image }}" id="txt_imagenPrincipal" width="500px"
                                        style="height: 287px;" />
                                </div>
                            </div>
                        </div>

                        <div id="cko_producto_bottom">
                            <div id="cko_foto_producto_bottom">
                                <a id="ver_3D_full" href="#!" onclick="imagenFunction()"><i class="icon-plus"></i></a>
                                <div class="zoomsection"> ZOOM <i class="fa fa-search-plus" aria-hidden="true"></i>
                                </div>
                            </div>
                            <div id="short_description_block" style="margin-top: 20px;">
                                <div id="short_description_content" class="align_justify" itemprop="description">
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#detalleModal">
                                        Ver más detalles
                                    </button>
                                </div>
                            </div>
                            <ul id="usefull_link_block" class="clearfix no-print" style="margin-top: 20px;">
                                <li class="print"> <a href="javascript:print();"> Imprimir </a></li>
                            </ul>
                        </div>
                    </div>

                    <form action="{{url('/cart/addItem')}}/<?php echo $Products[0]->id; ?>">
                        <input type="hidden" value="{{$Products[0]->id_imagen}}" id="id_imagens" name="id_imagens" />
                        <!--=== COLUMNA 2 ===-->
                        <div class="col-xs-12 col-md-4 ">
                            <div class="product_attributes clearfix margin-bottom-30"
                                style="background: #f1f1f0;height: 325px;">
                                <h3 class="cko_pb_center_column_title" style="background: #6f6f6f;">DESCRIPCIÓN DEL
                                    PRODUCTO</h3>
                                <div id="attributes" style="margin-left: 12px;margin-right: 12px;">
                                    {{$Products[0]->pro_info}}
                                </div>

                                <div id="attributes" style="margin-top: 25px;margin-left: 12px;">
                                    <div class="row margin-bottom-30">
                                        <div class="col-sm-3">
                                            <label for="size">Largo</label>
                                            <?php 
                                                $sizes = DB::select("
                                                        SELECT 
                                                        m.id_medida,
                                                        m.largo
                                                        FROM   medida m WHERE  m.id_imagen = ? ORDER BY m.id_medida asc", [$Products[0]->id_imagen]);
                                                ?>
                                            @if(count($sizes)!=0)
                                            <select name="txt_alto" id="txt_alto" class="form-control">
                                                @foreach ($sizes as $size)
                                                <option value="{{$size->id_medida}}">{{$size->largo}}</option>
                                                @endforeach
                                            </select>
                                            @endif
                                        </div>

                                        <div class="col-sm-3">
                                            <label for="size">Alto</label>
                                            <?php 
                                                $sizes = DB::select("
                                                        SELECT 
                                                        m.id_medida,
                                                        m.alto
                                                        FROM   medida m WHERE  m.id_imagen = ? ORDER BY m.id_medida asc", [$Products[0]->id_imagen]);
                                                ?>
                                            @if(count($sizes)!=0 && $sizes[0]->alto!=0)
                                            <select name="txt_alto" id="txt_alto" class="form-control">
                                                @foreach ($sizes as $size)
                                                <option value="{{$size->id_medida}}">{{$size->alto}}</option>
                                                @endforeach
                                            </select>
                                            @endif
                                        </div>

                                    </div>
                                </div>

                                <div class="txt_modelo">
                                    <?php  
                                            $imagen = DB::select("
                                                        SELECT 
                                                        m.id_imagen,
                                                        m.url_image
                                                        FROM  menu_items mi  
                                                        INNER JOIN products p on mi.id_item=p.id_item
                                                        INNER JOIN imagen m on p.id=m.id_product
                                                        WHERE p.id_item in (34,35) AND p.id = ? ORDER BY m.id_imagen asc", [$Products[0]->id]) ;
                                            ?>
                                    <div style="display: flex;margin-left: 12px;">
                                        @foreach($imagen as $altImg)
                                        <label class="radio-img" >
                                            <input type="radio" id="txt_imagen" name="txt_imagen" value="{{$altImg->id_imagen}}"
                                                onclick="imagenPrincipal('{{$altImg->url_image}}')" />
                                            <img style="width: 100px;" src="{{$altImg->url_image}}">
                                        </label>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!--=== COLUMNA 3 ===-->
                        <div class="col-xs-12 col-md-4">
                            <div class="product_attributes clearfix margin-bottom-30">
                                <h3 class="cko_pb_center_column_title" style="background: #6f6f6f;">PAGO </h3>
                                <h3 class="cko_pb_right_column_title">Procesar pedido</h3>
                                <div class="cko_procesar_pedido" style="height: 120px;">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <label for="qty">Cantidad</label>
                                                <input type="number" name="txt_cantidad_precio" class="form-control"
                                                    size="2" value="1" id="txt_cantidad_precio" autocomplete="off"
                                                    MIN="1" MAX="30">
                                            </div>
                                            <div class="col-sm-6">
                                                <label for="formGroupExampleInput">TOTAL €</label>
                                                <input style="text-align: center;pointer-events: none;"
                                                    name="costo_total" id="costo_total" type="text"
                                                    class="form-control" />
                                                <input type="hidden" name="cost_total_hide" id="cost_total_hide" />
                                            </div>
                                        </div>
                                    </div>
                                    <button style="background: #13756f" class="btn btn-primary btn-lg btn-block"
                                        id="addToCart"> <i class="fa fa-shopping-cart"></i>
                                        Añadir al Carrito
                                    </button><br />
                                    <input type="hidden" value="<?php echo $Products[0]->id; ?>" id="proDum" />
                                </div>
                            </div>
                        </div>
                    </form>

                    <!-- Modal producto -->
                    <div class="modal fade" id="imagenModal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Imagen del Producto</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body" id="updateDivPrincipal">
                                    <img src="{{ $Products[0]->url_image }}" id="zoomImgModal" width="500px" />
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal detalle del producto -->
                    <div class="modal fade" id="detalleModal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Detalle del Producto</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    {{$Products[0]->pro_info}}
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                    <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content" style="border: unset !important;">
                                <div class="alert" role="alert" style="display: flex;background: #13756f;color: white;">
                                    <svg style="font-size: 30px;" width="1em" height="1em" viewBox="0 0 16 16"
                                        class="bi bi-check-circle" fill="currentColor"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                        <path fill-rule="evenodd"
                                            d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.236.236 0 0 1 .02-.022z" />
                                    </svg> <label for=""
                                        style="padding-left: 12px;font-size: 16px;color: white;">Producto agregado al
                                        carro</label>
                                </div>
                                <div class="modal-body">
                                    <p>¿Quieres agregar un servicio de instalación?</p><br>
                                    <p class="margin-bottom-30">Servicio de Armado y/o Instalación € 26.90
                                    </p>

                                    <div class="alert alert-primary" role="alert"
                                        style="display: flex;color: #ffffff;background: #808080;">

                                        <svg style="font-size: 30px;" width="1em" height="1em" viewBox="0 0 16 16"
                                            class="bi bi-exclamation-circle" fill="currentColor"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                            <path
                                                d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z" />
                                        </svg>
                                        <label for="" style="padding-left: 12px;font-size: 16px;color:#ffffff;">
                                            Programa el servicio escribiendo a:
                                            programatuservicio@tucocinakit.es Cobertura: Madrid
                                            -España</label>
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Ver más
                                        Productos</button>
                                    <a class="btn btn-danger" href="{{url('/cart')}}"><i class="fa fa-shopping-cart"
                                            aria-hidden="true"></i> Ir al Carro de Compras</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--=== DESCRIPCION Y7 QUE INCLUYE ===-->
    @include('web.pages.accesorios.component.details_information')

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

    $('#id_imagens').val(<?=$Products[0]->id_imagen;?>);

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

function imagenFunction() {
    $('#imagenModal').modal(true)
}



// ---------------abrir modal cuando se inserta el producto
($('#txt_modal').val() == 1) ? $('#exampleModalLong').modal(true): ''
$("input[type=radio][name=color_puertas_change]").change(function() {
    const txt_id_color = $('input[name="color_puertas_change"]:checked').val();
    console.log(txt_id_color);
    handleSecundario(txt_id_color)
});
$("input[type=radio][name=color_puertas]").change(function() {
    const txt_id_color = $('input[name="color_puertas"]:checked').val();
    handleSecundario(txt_id_color)
});
//--------------END - CAMBIOS DE IMAGENS-------------
const handleSecundario = (txt_id_color) => {
    axios.post('/change_imagen_select_color', {
            'txt_id_color': txt_id_color,
        })
        .then(function(response) {
            $('#txt_caracteristica').html(response.data);
        }).catch(function(error) {
            if (error.response.status) {
                alert('No existe la medida.! Gracias')
            }
        })
}
$('#txt_cantidad_precio').on('change keyup', function() {
    const valor = parseFloat($('#cost_total_hide').val()).toFixed(2)
    const total = this.value * valor
    $('#costo_total').val(parseFloat(total).toFixed(2))
});
$("#txt_composicion").change(function() {
    const id_producto = this.value;
    window.location.href = window.location.origin + '/product_details_/' + id_producto;
});
$(document).ready(function() {
    $('#produto').zoom();
});
//----------------------PRECIOS--------------
$('#txt_ancho,#txt_alto,#txt_fondo').on('change', function() {
    console.log($('#txt_ancho').val());
    axios.post('/change_price', {
            'txt_id_imagen': '<?php echo $Products[0]->id_imagen; ?>',
            'txt_ancho': $('#txt_ancho').val(),
            'txt_alto': $('#txt_alto').val(),
            'txt_fondo': $('#txt_fondo').val(),
        })
        .then(function(response) {
            if (response.data[1] != null) {
                $('#cost_total_hide,#costo_total').val(response.data[0])
                imagenPrincipal(response.data[1])
            } else {
                $('#cost_total_hide,#costo_total').val(response.data[0])
            }
        }).catch(function(error) {
            if (error.response.status) {
                alert('No existe la medida.! Gracias')
            }
            //https://stackoverflow.com/questions/56577124/how-to-handle-500-error-message-with-axios/56577273
        })
});
$("input[type=radio][name=txt_tirador]").on('change', function() {
    $(".txt_modelo").toggle();
    if (this.value == 0) {
        $('#cost_total_hide,#costo_total').val($('#cost_total_hide').val())
    }
    $("input[type=radio][name=txt_model_tirador]").prop('checked', false); // Unchecks it
    $('#cost_total_hide,#costo_total').val(); //Muestra por defecto el precio
    //========================OCULTA LA LISTA DE ENCIMERA- MUEBLES COMPLETOS
    axios.get('/hide_tirador_encimera').then(function(response) {
        $('.list_encimera').html("");
    }).catch(function(error) {
        if (error.response.status) {
            console.log(error)
        }
    })
})
$("input[type=radio][name=txt_model_tirador]").click(function() {
    const txt_id_color = $('input[name="txt_model_tirador"]:checked').val();
    let total_pre = parseFloat($('#cost_total_hide').val()) + parseFloat(txt_id_color.split('-')[0]);
    $('#costo_total').val(total_pre);
    handleTirador(txt_id_color.split('-')[1]) //Cambiar Imagen
});
$("input[type=radio][name=txt_model_enzimera]").click(function() {
    const txt_id_color = $('input[name="txt_model_enzimera"]:checked').val();
    let total_pre = parseFloat($('#cost_total_hide').val()) + parseFloat(txt_id_color.split('-')[0]);
    $('#costo_total').val(total_pre);
    handleTirador(txt_id_color.split('-')[1]) //Cambiar Imagen
});

const imagenPrincipal = (url_image) => {
    $('#txt_imagenPrincipal').attr('src', url_image);
    $('.zoomImg').attr('src', url_image);
    $('#zoomImgModal').attr('src', url_image);
}
//========================CAMBIA LA IMAGEN DE ENCIMERA - MUEBLES COMPLETOS
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

<!--flex slider-->
<script src="{{ URL::asset('THIS/assets_2/js/jquery.flexslider.js') }}"></script>
<script src="{{ URL::asset('themes/warehouse/cache/v_726_15810251d95ac88cec9fad9fb952e72e.js') }}"></script>

@endsection