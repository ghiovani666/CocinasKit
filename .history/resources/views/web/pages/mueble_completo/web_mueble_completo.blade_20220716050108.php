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

                    @if(count($Products)!=0)

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
                                <a id="ver_3D_full" href="#!"
                                    onclick="modalAbrirImagen('{{ $Products[0]->url_image }}')"><i
                                        class="icon-plus"></i></a>
                                <div class="zoomsection"> ZOOM <i class="fa fa-search-plus" aria-hidden="true"></i>
                                </div>
                            </div>
                            <div id="short_description_block" style="margin-top: 20px;">
                                <div id="short_description_content" class="align_justify" itemprop="description">
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#detalleModal">
                                        Ver m??s detalles
                                    </button>
                                </div>
                            </div>
                            <ul id="usefull_link_block" class="clearfix no-print" style="margin-top: 20px;">
                                <li class="print"> <a href="javascript:print();"> Imprimir </a></li>
                            </ul>
                        </div>
                        <!--=== TIRADORES ===-->
                        <div class="product_attributes margin-bottom-10">
                            <h3 class="cko_pb_center_column_title" style="background: #6f6f6f;">TIRADORES</h3>
                            <fieldset style="height: 190px;">
                                <div class="col-12">
                                    <div class="col-8 col-sm-8">
                                        <div class="margin-bottom-10">
                                            <input class="form-check-input" type="radio" id="txt_tirador_unero1"
                                                name="txt_tirador" value="1" checked>
                                            <label class="form-check-label" for="patas">
                                                Con Tirador
                                            </label>
                                            <input style="margin-left: 47px;" class="form-check-input" type="radio"
                                                id="txt_tirador_unero2" name="txt_tirador" value="0">
                                            <label class="form-check-label" for="patas">
                                                Con U??ero
                                            </label>
                                        </div>

                                        <?php  
                                                $tirador = DB::select("SELECT c.* FROM mc_tirador c INNER JOIN mc_tirador_intermedio cin ON c.id=cin.id_tirador WHERE cin.id_producto=?", [$Products[0]->id]);
                                                ?>
                                        <div class="txt_modelo_tirador">
                                            <label for="layout">SELECIONE TIRADOR </label><br />
                                            <div>
                                                @if(count($tirador)!=0)
                                                @foreach($tirador as $altImg)
                                                <label class="radio-img" title="{{$altImg->descripcion}}">
                                                    <input type="radio" name="txt_model_tirador" id="txt_model_tirador"
                                                        value="{{$altImg->precio}}-{{$altImg->id}}" />
                                                    <img style="width: 40px;" src="{{$altImg->url_image}}">
                                                </label>
                                                @endforeach
                                                @endif
                                            </div>
                                        </div>
                                        <div class="txt_modelo_tirador_unero">
                                            <label for="layout">SELECIONE U??ERO </label><br />
                                            <?php  
                                                $tiradorUnero = DB::select("SELECT c.* FROM mc_tirador_unero c INNER JOIN mc_tirador_unero_intermedio cin ON c.id=cin.id_tirador_unero WHERE cin.id_producto=?", [$Products[0]->id]);
                                                ?>
                                            <div>
                                                @if(count($tiradorUnero)!=0)
                                                @foreach($tiradorUnero as $altImg)
                                                <label class="radio-img" title="{{$altImg->descripcion}}">
                                                    <input type="radio" name="txt_model_tiradorUnero"
                                                        id="txt_model_tiradorUnero"
                                                        value="{{$altImg->precio}}-{{$altImg->id}}" />
                                                    <img style="width: 40px;" src="{{$altImg->url_image}}">
                                                </label>
                                                @endforeach
                                                @endif
                                            </div>
                                        </div>


                                    </div>
                                    <div class="col-4 col-sm-4">
                                        <div id="imagen_tirador" style="text-align: center;"></div>
                                    </div>
                                </div>
                            </fieldset>
                        </div>

                    </div>

                    <form action="{{url('/cart/addItem')}}/<?php echo $Products[0]->id; ?>">

                        <input type="hidden" value="{{$Products[0]->id_imagen}}" id="id_imagens" name="id_imagens" />
                        <?php  
                            $modeloPuerta = DB::select("SELECT * FROM mc_modelo_puerta c INNER JOIN mc_modelo_puerta_intermedio cin ON c.id=cin.id_modelo_puerta WHERE cin.id_producto=?", [$Products[0]->id]);                                   
                        ?>
                        <!--=== COLUMNA 2 ===-->
                        <div class="col-xs-12 col-md-4 ">
                            <div class="product_attributes margin-bottom-10">
                                <h3 class="cko_pb_center_column_title" style="background: #6f6f6f;">MODELOS DE PUERTAS
                                </h3>
                                <fieldset style="height: 290px;">
                                    <div class="col-8 col-sm-8">
                                        <div>
                                            @if(count($modeloPuerta)!=0)
                                            @foreach($modeloPuerta as $item)
                                            <label class="radio-img" title="{{$item->descripcion}}">
                                                <input type="radio" name="modelo_puertas" value="{{$item->id}}" />
                                                <img style="width: 35px;height: 50px;" src="{{$item->url_image}}">
                                            </label>
                                            @endforeach
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-4 col-sm-4">
                                        <div id="txt_modelo_puerta" style="text-align: center;"></div>
                                    </div>
                                </fieldset>
                            </div>

                            <!--=== ACABADOS DE PUERTAS o colores===-->
                            <div class="product_attributes  margin-bottom-0">
                                <h3 class="cko_pb_center_column_title" style="background: #6f6f6f;">COLORES
                                </h3>
                                <fieldset style="height: 265px;">
                                    <div id="attributes">
                                        <div class="col-sm-8 margin-bottom-10" style="background: #f1f1f0;">
                                            <div class="panel-body"
                                                style="width: 250px !important;padding: unset !important;">
                                                <tbody>
                                                    <tr>
                                                        <div id="modelo_colores"></div>
                                                    </tr>
                                                </tbody>
                                            </div>

                                        </div>
                                        <div class="col-sm-4" id="imagen_acabadoPuerta" style="text-align: center;">
                                        </div>
                                    </div>
                                </fieldset>
                            </div>

                        </div>

                        <!--=== COLUMNA 3 ===-->
                        <div class="col-xs-12 col-md-4">

                            <!--=== ACABADO DEL MUEBLE ===-->
                            <div class="product_attributes clearfix margin-bottom-10">
                                <h3 class="cko_pb_center_column_title" style="background: #6f6f6f;">ACABADO DEL MUEBLE
                                </h3>
                                <div id="attributes">
                                    <fieldset class="attribute_fieldset" style="height: 290px;">
                                        <div class="row col-sm-12 margin-bottom-30">
                                            <label for="size">OPCIONES DEL MUEBLE </label>
                                            <?php  
                                            $sizes = DB::select("
                                                        SELECT 
                                                        p.id, 
                                                        p.id_item, 
                                                        p.pro_name
                                                        FROM  menu_items mi  
                                                        INNER JOIN products p on mi.id_item=p.id_item
                                                        WHERE p.id_item = ? ORDER BY p.id asc", [$Products[0]->id_item]);  
                                            ?>
                                            @if(count($sizes)!=0)
                                            <select name="txt_composicion" id="txt_composicion" class="form-control">
                                                @foreach ($sizes as $size)
                                                <option value="{{$size->id_item}}-{{$size->id}}"
                                                    {{ $size->id == $Products[0]->id ? 'selected' : '' }}>
                                                    {{$size->pro_name}}
                                                </option>
                                                @endforeach
                                            </select>
                                            @endif
                                        </div>
                                        <div id="attributes">
                                            <div class="row margin-bottom-30">
                                                <div class="col-sm-3">
                                                    <label for="size" style="display: flex;">Ancho<em
                                                            class="cocinakit_help_icon icon-question circle-icon"></em></label>
                                                    <p class="cocinakit_help_text" style="display: none;">
                                                        <img
                                                            src="https://www.cocinaskitonline.com/modules/cocinakit_configurador/img/ayudas/medidas.jpg">-
                                                        Se toma como ancho del mueble la medida
                                                        EXTERIOR del
                                                        mismo.<br /><br />- En caso de que se
                                                        quiera
                                                        un
                                                        mueble
                                                        con un ancho diferente a los est??ndares
                                                        que
                                                        se
                                                        ofrecen
                                                        en el desplegable, puede dirigirse al
                                                        apartado CORTE
                                                        A
                                                        MEDIDA en la parte derecha de la
                                                        pantalla e
                                                        introducir
                                                        la medida deseada.
                                                    </p>
                                                    <?php
                                                    $sizes = DB::select("
                                                            SELECT 
                                                            DISTINCT(md.ancho) AS ancho
                                                            FROM  medida as md
                                                            WHERE md.id_imagen =? ORDER BY md.id_medida asc", [$Products[0]->id_imagen]);  
                                                    ?>

                                                    @if(count($sizes)!=0)
                                                    <select name="txt_ancho" id="txt_ancho" class="form-control">
                                                        @foreach ($sizes as $size)
                                                        <option value="{{$size->ancho}}">{{$size->ancho}}</option>
                                                        @endforeach
                                                    </select>
                                                    @endif
                                                </div>
                                                <div class="col-sm-3">
                                                    <label for="size">Alto</label>
                                                    <?php
                                                    $sizes = DB::select("
                                                            SELECT 
                                                            DISTINCT(md.alto) AS alto
                                                            FROM  medida as md
                                                            WHERE md.id_imagen  =?  ORDER BY md.id_medida asc", [$Products[0]->id_imagen]);  
                                                    ?>

                                                    @if(count($sizes)!=0)
                                                    <select name="txt_alto" id="txt_alto" class="form-control">
                                                        @foreach ($sizes as $size)
                                                        <option value="{{$size->alto}}">{{$size->alto}}</option>
                                                        @endforeach
                                                    </select>
                                                    @endif
                                                </div>

                                                <div class="col-sm-3">
                                                    <label for="size">Fondo</label>
                                                    <?php
                                                    $sizes = DB::select("
                                                    SELECT 
                                                    DISTINCT(md.fondo) AS fondo
                                                    FROM  medida as md
                                                    WHERE md.id_imagen  =?  ORDER BY md.id_medida asc", [$Products[0]->id_imagen]);  
                                                    ?>
                                                    @if(count($sizes)!=0)
                                                    <select name="txt_fondo" id="txt_fondo" class="form-control">
                                                        @foreach ($sizes as $size)
                                                        <option value="{{$size->fondo}}">{{$size->fondo}}</option>
                                                        @endforeach
                                                    </select>
                                                    @endif
                                                </div>
                                            </div>


                                            <div class="margin-bottom-40">
                                                <label for="layout" style="color: #000000;font-weight: bold;">APERTURA
                                                    <em class="cocinakit_help_icon icon-question circle-icon"
                                                        original-title=""></em></label><br />
                                                <p class="cocinakit_help_text" style="display: none;"><img
                                                        src="https://www.cocinaskitonline.com/modules/cocinakit_configurador/img/ayudas/apertura.jpg">-
                                                    Las opciones de apertura a izquierta o
                                                    derecha s??lo
                                                    ser??n seleccionables mientras el mueble
                                                    no
                                                    supere una
                                                    anchura de 70 cm, ya que a partir de esa
                                                    medida la
                                                    configuraci??n del mueble ser?? de 2
                                                    puertas.<br><br>- La
                                                    opci??n de apertura doble s??lo ser??
                                                    seleccionable a
                                                    partir de una anchura de mueble de 50
                                                    cm, ya
                                                    que por
                                                    debajo de esa medida la configuraci??n
                                                    del
                                                    mueble ser?? de
                                                    1 puerta.</p>
                                                <div class="col-sm-12" style="display: flex;">
                                                    @if($Products[0]->apert_izquierda==1)
                                                    <input class="form-check-input" type="radio" name="txt_apertura"
                                                        style="margin-right: 10px;" value="1" checked>
                                                    <label class="form-check-label" for="txt_apertura" style="padding-top: 5px;">
                                                        Izquierda
                                                    </label>
                                                    @endif

                                                    @if($Products[0]->apert_derecha==1)
                                                    <input style="margin-left: 47px;" class="form-check-input"
                                                        style="margin-right: 10px;" type="radio" name="txt_apertura"
                                                        value="2">
                                                    <label class="form-check-label" style="margin-left: 10px;padding-top: 5px" 
                                                        for="txt_apertura">
                                                        Derecha
                                                    </label>
                                                    @endif

                                                    @if($Products[0]->apert_doble==1)
                                                    <div style="display: flex;">
                                                        <input style="margin-left: 11px;" class="form-check-input"
                                                            style="margin-right: 10px;" type="radio" name="txt_apertura"
                                                            value="3">
                                                        <label class="form-check-label" style="margin-left: 10px;padding-top: 5px"
                                                            for="txt_apertura">
                                                            2 Puertas
                                                        </label>
                                                    </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>

                            <!--=== PAGOS ===-->
                            <div class="product_attributes clearfix margin-bottom-30">
                                <h3 class="cko_pb_center_column_title" style="background: #6f6f6f;">PAGO </h3>
                                <h3 class="cko_pb_right_column_title">Procesar pedido</h3>
                                <div class="cko_procesar_pedido" style="height:120px;">

                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <label for="qty">Cantidad</label>
                                                <input type="number" name="txt_cantidad_precio" class="form-control"
                                                    size="2" value="1" id="txt_cantidad_precio" autocomplete="off"
                                                    MIN="1" MAX="30">
                                            </div>
                                            <div class="col-sm-6">
                                                <label for="formGroupExampleInput">TOTAL ???</label>
                                                <input style="text-align: center;pointer-events: none;"
                                                    name="costo_total" id="costo_total" type="text"
                                                    class="form-control" />
                                                <input type="hidden" name="cost_total_hide" id="cost_total_hide" />

                                            </div>
                                        </div>
                                    </div>
                                    <button style="background: #13756f" class="btn btn-primary btn-lg btn-block"
                                        id="addToCart"> <i class="fa fa-shopping-cart"></i>
                                        A??adir al Carrito
                                    </button><br />
                                    <input type="hidden" value="<?php echo $Products[0]->id; ?>" id="proDum" />
                                </div>
                            </div>
                        </div>

                    </form>


                    <!-- Modal iMAGENES -->
                    <div class="modal fade" id="imagenModal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">VISTA DE IMAGEN</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body" id="updateDivPrincipal" style="text-align: center;">
                                    <img src="#" id="zoomImgModal" />
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                    <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
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

                    <!-- Modal de Tirador -->
                    <div class="modal fade" id="imagenModalTirador" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Visualizar Imagen </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body" id="updateDivTirador"></div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal de Color -->
                    <div class="modal fade" id="imagenModalColor" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Visualizar Imagen </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body" id="updateDivColor"></div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
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
                                    <p>??Quieres agregar un servicio de instalaci??n?</p><br>
                                    <p class="margin-bottom-30">Servicio de Armado y/o Instalaci??n ??? 26.90
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
                                            -Espa??a</label>
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Ver m??s
                                        Productos</button>
                                    <a class="btn btn-danger" href="{{url('/cart')}}"><i class="fa fa-shopping-cart"
                                            aria-hidden="true"></i> Ir al Carro de Compras</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    @endif
                </div>
            </div>
        </div>
    </div>

    <!--=== DESCRIPCION Y7 QUE INCLUYE ===-->
    <div class="tab-v5">
        <ul class="nav nav-tabs" role="tablist">
            <li class="active"><a href="#description" role="tab" data-toggle="tab">Ficha T??cnica</a></li>
        </ul>
        <div class="tab-content">
            <!-- Description -->
            <div class="tab-pane fade in active" id="description" style="border: unset !important;">

                <section class="page-product-box tab-pane active" id="descriptionTab">
                    <div class="rte">
                    {!!  (count($Products)!=0?$Products[0]->info_descripcion:'') !!}
                    </div>
                </section>

            </div>
            <!-- End Description -->
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

$("input[type=radio][name=color_puertas_change]").change(function() {
    const txt_id_color = $('input[name="color_puertas_change"]:checked').val();

    // handleSecundario(txt_id_color)
});


$('#txt_cantidad_precio').on('change keyup', function() {
    const valor = parseFloat($('#cost_total_hide').val()).toFixed(2)
    const total = this.value * valor
    $('#costo_total').val(parseFloat(total).toFixed(2))
});


$("#txt_composicion").change(function() {
    window.location.href = window.location.origin + '/mueble_completo_/' + this.value.split('-')[0] + '/' + this
        .value.split('-')[1];
});

$(document).ready(function() {
    $('#produto').zoom();
});

//----------------------PRECIOS--------------
$('#txt_ancho,#txt_alto,#txt_fondo').on('change', function() {

    console.log($('#txt_ancho').val());



    axios.post('/change_price', {
            'txt_id_imagen': '<?php echo (count($Products)!=0?$Products[0]->id_imagen:''); ?>',
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
                // alert('No existe la medida.! Gracias')
            }
            //https://stackoverflow.com/questions/56577124/how-to-handle-500-error-message-with-axios/56577273
        })

});



$("input[type=radio][name=txt_model_enzimera]").click(function() {
    const txt_id_color = $('input[name="txt_model_enzimera"]:checked').val();
    let total_pre = parseFloat($('#cost_total_hide').val()) + parseFloat(txt_id_color.split('-')[0]);
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
    getAcabadoPuerta(1)
    getModuloPuerta(1)
    // getModuloPuertaColor(<=$modeloPuerta[0]->id_modelo_puerta;?>)

    $(".txt_modelo_tirador").show();
    $(".txt_modelo_tirador_unero").hide();
})

//::::::::::::::::::::::1. TIRADORES :::::::::::::::

$("#txt_tirador_unero1").on('change', function() {
    $(".txt_modelo_tirador").show();
    $(".txt_modelo_tirador_unero").hide();
    if (this.value == 0) {
        //  $('#cost_total_hide,#costo_total').val($('#cost_total_hide').val())
    }

    // $("input[type=radio][name=txt_model_tirador]").prop('checked', false); 
    // $('#cost_total_hide,#costo_total').val(); 

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











//::::::::::::::::::::::3. ACABADOS DE PUERTAS :::::::::::::::
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

//::::::::::::::::::::: MODAL IMAGENES ::::::::::::::::::::
function modalAbrirImagen(url_imagen) {
    $('#imagenModal').modal(true)
    $('#zoomImgModal').attr('src', url_imagen);

}








































$("input[type=radio][name=txt_model_tirador]").click(function() {
    const txt_id_color = $('input[name="txt_model_tirador"]:checked').val();
    let total_pre = parseFloat($('#cost_total_hide').val()) + parseFloat(txt_id_color.split('-')[0]);
    $('#costo_total').val(total_pre);
    // getTirador(txt_id_color.split('-')[1]) //Cambiar Imagen

});




//::::::::::::::::::::::2. MODELOS DE PUERTAS :::::::::::::::
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
</script>

<!--flex slider-->
<script src="{{ URL::asset('THIS/assets_2/js/jquery.flexslider.js') }}"></script>
<script src="{{ URL::asset('themes/warehouse/cache/v_726_15810251d95ac88cec9fad9fb952e72e.js') }}"></script>

@endsection