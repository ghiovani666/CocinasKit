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

<style type="text/css">

.d-flex{
  display:-ms-flexbox!important;
  display:flex!important
}

.flex-row{
  -ms-flex-direction:row!important;
  flex-direction:row!important
}
.flex-column{
  -ms-flex-direction:column!important;
  flex-direction:column!important
}
.flex-row-reverse{
  -ms-flex-direction:row-reverse!important;
  flex-direction:row-reverse!important
}

.shadow-sm{
  box-shadow:0 .125rem .25rem rgba(0,0,0,.075)!important
}



.card{
  position:relative;
  display:-ms-flexbox;
  display:flex;
  -ms-flex-direction:column;
  flex-direction:column;
  min-width:0;
  word-wrap:break-word;
  background-color:#fff;
  background-clip:border-box;
  border:1px solid rgba(0,0,0,.125);
  border-radius:.25rem
}
.card>hr{
  margin-right:0;
  margin-left:0
}
.card>.list-group{
  border-top:inherit;
  border-bottom:inherit
}
.card>.list-group:first-child{
  border-top-width:0;
  border-top-left-radius:calc(.25rem - 1px);
  border-top-right-radius:calc(.25rem - 1px)
}
.card>.list-group:last-child{
  border-bottom-width:0;
  border-bottom-right-radius:calc(.25rem - 1px);
  border-bottom-left-radius:calc(.25rem - 1px)
}
.card>.card-header+.list-group,.card>.list-group+.card-footer{
  border-top:0
}
.card-body{
  -ms-flex:1 1 auto;
  flex:1 1 auto;
  min-height:1px;
  padding:1.25rem
}
.card-title{
  margin-bottom:.75rem
}
.card-subtitle{
  margin-top:-.375rem;
  margin-bottom:0
}
.card-text:last-child{
  margin-bottom:0
}
.card-link:hover{
  text-decoration:none
}
.card-link+.card-link{
  margin-left:1.25rem
}
.card-header{
  padding:.75rem 1.25rem;
  margin-bottom:0;
  background-color:rgba(0,0,0,.03);
  border-bottom:1px solid rgba(0,0,0,.125)
}
.card-header:first-child{
  border-radius:calc(.25rem - 1px) calc(.25rem - 1px) 0 0
}
.card-footer{
  padding:.75rem 1.25rem;
  background-color:rgba(0,0,0,.03);
  border-top:1px solid rgba(0,0,0,.125)
}
.card-footer:last-child{
  border-radius:0 0 calc(.25rem - 1px) calc(.25rem - 1px)
}
.card-header-tabs{
  margin-right:-.625rem;
  margin-bottom:-.75rem;
  margin-left:-.625rem;
  border-bottom:0
}
.card-header-pills{
  margin-right:-.625rem;
  margin-left:-.625rem
}
.card-img-overlay{
  position:absolute;
  top:0;
  right:0;
  bottom:0;
  left:0;
  padding:1.25rem;
  border-radius:calc(.25rem - 1px)
}
.card-img,.card-img-bottom,.card-img-top{
  -ms-flex-negative:0;
  flex-shrink:0;
  width:100%
}
.card-img,.card-img-top{
  border-top-left-radius:calc(.25rem - 1px);
  border-top-right-radius:calc(.25rem - 1px)
}
.card-img,.card-img-bottom{
  border-bottom-right-radius:calc(.25rem - 1px);
  border-bottom-left-radius:calc(.25rem - 1px)
}
.card-deck .card{
  margin-bottom:15px
}
@media (min-width:576px){
  .card-deck{
      display:-ms-flexbox;
      display:flex;
      -ms-flex-flow:row wrap;
      flex-flow:row wrap;
      margin-right:-15px;
      margin-left:-15px
  }
  .card-deck .card{
      -ms-flex:1 0 0%;
      flex:1 0 0%;
      margin-right:15px;
      margin-bottom:0;
      margin-left:15px
  }
}
.card-group>.card{
  margin-bottom:15px
}
@media (min-width:576px){
  .card-group{
      display:-ms-flexbox;
      display:flex;
      -ms-flex-flow:row wrap;
      flex-flow:row wrap
  }
  .card-group>.card{
      -ms-flex:1 0 0%;
      flex:1 0 0%;
      margin-bottom:0
  }
  .card-group>.card+.card{
      margin-left:0;
      border-left:0
  }
  .card-group>.card:not(:last-child){
      border-top-right-radius:0;
      border-bottom-right-radius:0
  }
  .card-group>.card:not(:last-child) .card-header,.card-group>.card:not(:last-child) .card-img-top{
      border-top-right-radius:0
  }
  .card-group>.card:not(:last-child) .card-footer,.card-group>.card:not(:last-child) .card-img-bottom{
      border-bottom-right-radius:0
  }
  .card-group>.card:not(:first-child){
      border-top-left-radius:0;
      border-bottom-left-radius:0
  }
  .card-group>.card:not(:first-child) .card-header,.card-group>.card:not(:first-child) .card-img-top{
      border-top-left-radius:0
  }
  .card-group>.card:not(:first-child) .card-footer,.card-group>.card:not(:first-child) .card-img-bottom{
      border-bottom-left-radius:0
  }
}
.card-columns .card{
  margin-bottom:.75rem
}
@media (min-width:576px){
  .card-columns{
      -webkit-column-count:3;
      -moz-column-count:3;
      column-count:3;
      -webkit-column-gap:1.25rem;
      -moz-column-gap:1.25rem;
      column-gap:1.25rem;
      orphans:1;
      widows:1
  }
  .card-columns .card{
      display:inline-block;
      width:100%
  }
}
.accordion{
  overflow-anchor:none
}
.accordion>.card{
  overflow:hidden
}
.accordion>.card:not(:last-of-type){
  border-bottom:0;
  border-bottom-right-radius:0;
  border-bottom-left-radius:0
}
.accordion>.card:not(:first-of-type){
  border-top-left-radius:0;
  border-top-right-radius:0
}
.accordion>.card>.card-header{
  border-radius:0;
  margin-bottom:-1px
}


.flex-row {
    -ms-flex-direction: row!important;
    flex-direction: row!important;
}
.text-success {
    color: black;
}


.text-info {
    color: #000000;
}
    </style>
@endsection

<!-- Contenido en el Body -->
@section('content')

<div class="container" style="width: 100%;">



    <div class="row content-inner">
        <div id="center_column" class="center_column col-xs-12 col-sm-12 col-sm-push-0">
            <div itemscope itemtype="https://schema.org/Product">
                <div class="cocinakit-mueble-general cocinakit-mueble-kit primary_block row ">

                    @if(count($Products)!=0)

                    <form action="{{url('/cart/addItem')}}/<?php echo $Products[0]->id; ?>">
                        <input type="hidden" value="{{$Products[0]->id_imagen}}" id="id_imagen__" name="id_imagen__" />

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

                                <div class="txt_modelo">
                                    <?php  
                                        $imagen = DB::select("SELECT * FROM imagen c  WHERE c.id_product=? ORDER BY c.id_imagen ASC", [$Products[0]->id]);                                   
                                    ?>

                                    <div style="display: flex;">
                                        @foreach($imagen as $altImg)
                                        <label class="radio-img" title="{{$altImg->description}}">
                                            <input type="radio" id="txt_slider_imagen" name="txt_slider_imagen"
                                                value="{{$altImg->id_imagen}}"
                                                onclick="imagenPrincipal('{{$altImg->url_image}}')" />
                                            <img style="width: 100px;height: 100px;" src="{{$altImg->url_image}}">
                                        </label>
                                        @endforeach
                                    </div>
                                </div>

                            </div>



                            <div id="cko_producto_bottom">
                                <div id="cko_foto_producto_bottom">
                                    <a id="ver_3D_full" href="#!"
                                        onclick="modalAbrirImagen('{{ $Products[0]->url_image }}','INICIAL')"><i
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
                            <div class="product_attributes margin-bottom-10 ">
                                <h3 class="cko_pb_center_column_title" style="background: #6f6f6f;">TIRADORES</h3>
                                <fieldset style="height: 100px;">
                                    <div class="col-8 col-sm-8">
                                        <div class="txt_modelo_tirador">
                                            <?php  
                                                $tirador = DB::select("SELECT c.* FROM mc_tirador c INNER JOIN mc_tirador_intermedio cin ON c.id=cin.id_tirador WHERE cin.id_producto=?", [$Products[0]->id]);
                                                ?>
                                            <div>
                                                @foreach($tirador as $altImg)
                                                <label class="radio-img" title="{{$altImg->descripcion}}">
                                                    <input type="radio" name="txt_model_tirador"
                                                        value="{{$altImg->precio}}-{{$altImg->id}}" />
                                                    <img style="width: 60px;" src="{{$altImg->url_image}}">
                                                </label>
                                                @endforeach
                                            </div>
                                        </div>


                                        <?php  
                                                $copete = DB::select(" SELECT (SELECT copete FROM medida WHERE id_imagen= im.id_imagen)  AS copete FROM products p INNER JOIN imagen im on p.id=im.id_product WHERE p.id_item=43 AND p.id=? LIMIT 1 ", [$Products[0]->id]);
                                                ?>

                                        @if($copete[0]->copete==1)
                                        <!-- <div class="margin-bottom-10">
                                        <label class="form-check-label" for="patas" style="padding-right: 10px;">
                                            Copete:</label>
                                        <input class="form-check-input" type="checkbox" name="txt_tirador" value="1">
                                    </div> -->
                                        @endif

                                    </div>
                                    <div class="col-4 col-sm-4 hidden-print">
                                        <div id="imagen_tirador" style="text-align: center;"></div>
                                    </div>
                                </fieldset>

                            </div>


                        </div>


                        <!--=== COLUMNA 2 ===-->
                        <div class="col-xs-12 col-md-4 ">

                            <?php  
                                    $modeloPuerta = DB::select("SELECT c.* FROM mc_modelo_puerta c INNER JOIN mc_modelo_puerta_intermedio cin ON c.id=cin.id_modelo_puerta WHERE cin.id_producto=?", [$Products[0]->id]);                                   
                                ?>

                            <div class="product_attributes margin-bottom-10">
                                <h3 class="cko_pb_center_column_title" style="background: #6f6f6f;">MODELOS DE PUERTAS
                                </h3>
                                <fieldset style="height: 290px;">
                                    <div class="col-8 col-sm-8">
                                        <div>
                                            @foreach($modeloPuerta as $item)
                                            <label class="radio-img" title="{{$item->descripcion}}">
                                                <input type="radio" name="modelo_puertas" value="{{$item->id}}" />
                                                <img style="width: 35px;height: 50px;" src="{{$item->url_image}}">
                                            </label>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="col-4 col-sm-4 hidden-print">
                                        <div id="txt_modelo_puerta" style="text-align: center;"></div>
                                    </div>
                                </fieldset>
                            </div>


                            <!--=== ACABADOS DE PUERTAS o colores===-->
                            <div class="product_attributes  margin-bottom-0">
                                <h3 class="cko_pb_center_column_title" style="background: #6f6f6f;">COLORES
                                </h3>
                                <fieldset style="height: 277px;">
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
                                        <div class="col-sm-4 hidden-print" id="html_imagen_color"
                                            style="text-align: center;">
                                        </div>
                                    </div>
                                </fieldset>
                            </div>

                        </div>

                        <!--=== COLUMNA 3 ===-->
                        <div class="col-xs-12 col-md-4">

                            <!--=== DESCRIPCI??N DEL PRODUCTO ===-->
                            <!-- <div class="product_attributes clearfix margin-bottom-10"
                                style="background: #f1f1f0;height: 123px;">
                                <h3 class="cko_pb_center_column_title" style="background: #6f6f6f;">DESCRIPCI??N DEL
                                    PRODUCTO</h3>
                                <div id="attributes" style="margin-left: 12px;margin-right: 12px;">
                                    {{$Products[0]->pro_info}}
                                </div>
                            </div> -->

                            <input type="hidden" id="hidden_imagen_copete" />
                            <input type="hidden" id="hidden_imagen_enzimera" />
                            <!--=== ENZIMERA ===-->
                            <div class="product_attributes margin-bottom-10">
                                <h3 class="cko_pb_center_column_title" style="background: #6f6f6f;">ENZIMERA</h3>
                                <fieldset style="height: 90px;">


                                    <div class="col-8 col-sm-10">
                                        <div class="txt_modelo" style="display: flex;">
                                            <?php  
                                                $encimera = DB::select("SELECT c.* FROM mc_enzimera c INNER JOIN mc_enzimera_intermedio cin ON c.id=cin.id_enzimera WHERE cin.id_producto=?", [$Products[0]->id]);
                                                ?>

                                            @foreach($encimera as $altImg)
























                                            <div>

                                                <label class="radio-img"
                                                    style="display: inline-grid;padding-right: 5px;">
                                                    <input type="radio" name="txt_model_enzimera"
                                                        onclick="setImagenEnzimera('{{$altImg->url_image}}')"
                                                        value="{{$altImg->precio}}-{{$altImg->id}}" />
                                                    <img class="product-img" style="width: 50px;height: 40px;"
                                                        src="{{$altImg->url_image}}" onmouseover="animateImg(this)"
                                                        onmouseout="normalImg(this)">


                                                    <p style="display: none;" class="product-name">{{$altImg->nombre}}
                                                    </p>
                                                    <p style="display: none;" class="product-price">{{$altImg->precio}}
                                                    </p>
                                                    <button type="button" style="margin-top: 4px;"
                                                        data-action="add-to-cart">A??adir</button>

                                                </label>
                                            </div>
























                                            @endforeach

                                        </div>
                                    </div>
                                    <div class="col-4 col-sm-2">
                                        <label style="text-align: center;margin-top: 14px;font-size: 14px;">
                                            <strong id="valorEnzimera_"> ??? 00.00</strong> </label>
                                        <!-- <label class="radio-img hide_imagens1" style="display:none;">
                                            <input type="radio" name="radio_enzimera" />
                                            <img style="width: 40px;" id="valorEnzimera_imagen"
                                                onclick="openModalEnzimera()" src="#">
                                        </label> -->
                                    </div>
                                </fieldset>
                            </div>

                            <!--=== COPETE ===-->
                            <div class="product_attributes margin-bottom-10">
                                <h3 class="cko_pb_center_column_title" style="background: #6f6f6f;">COPETE</h3>
                                <fieldset style="height: 50px;">
                                    <div class="col-8 col-sm-9">
                                        <div class="txt_modelo">
                                            <?php  
                                                $copete = DB::select("SELECT c.* FROM mc_copete c INNER JOIN mc_copete_intermedio cin ON c.id=cin.id_copete WHERE cin.id_producto=?", [$Products[0]->id]);
                                                ?>
                                            <div>

                                                @foreach($copete as $altImg)
                                                <label class="radio-img" title="{{$altImg->nombre}}">
                                                    <input type="radio" name="txt_model_copete"
                                                        onclick="setImagenCopete('{{$altImg->url_image}}')"
                                                        value="{{$altImg->precio}}-{{$altImg->id}}" />
                                                    <img style="width: 40px;" src="{{$altImg->url_image}}">
                                                </label>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-4 col-sm-3">
                                        <label style="text-align: center;margin-top: 14px;font-size: 14px;">
                                            <strong id="valorCopete_"> ??? 00.00</strong> </label>
                                        <!-- <label class="radio-img hide_imagens2" style="display:none;">
                                            <input type="radio" name="radio_copete" />
                                            <img style="width: 40px;" id="valorCopete_imagen"
                                                onclick="openModalCopete()" src="#">
                                        </label> -->
                                    </div>

                                </fieldset>

                            </div>

                            <!--=== PAGOS ===-->
                            <div class="product_attributes clearfix margin-bottom-30">
                                <h3 class="cko_pb_center_column_title" style="background: #6f6f6f;">PAGO </h3>
                                <h3 class="cko_pb_right_column_title">Procesar pedido</h3>
                                <div class="cko_procesar_pedido">















  


                                </div>
                            </div>












































                            <div class="cart"></div>




<!-- 
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Cantidad</th>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Precio</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td>@mdo</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>Jacob</td>
                                        <td>Thornton</td>
                                        <td>@fat</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">3</th>
                                        <td>Larry</td>
                                        <td>the Bird</td>
                                        <td>@twitter</td>
                                    </tr>
                                </tbody>
                            </table> -->


                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label for="qty">Cantidad</label>
                                        <input type="number" name="txt_cantidad_precio" class="form-control" size="2"
                                            value="1" id="txt_cantidad_precio" autocomplete="off" MIN="1" MAX="30">
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="formGroupExampleInput">TOTAL ???</label>
                                        <input style="text-align: center;pointer-events: none;" name="costo_total"
                                            id="costo_total" type="text" class="form-control" />
                                        <input type="hidden" name="costo_total__" id="costo_total__" />
                                    </div>
                                </div>
                            </div>
                            <button style="background: #13756f" class="btn btn-primary btn-lg btn-block" id="addToCart">
                                <i class="fa fa-shopping-cart"></i>
                                A??adir al Carrito
                            </button><br />
                            <input type="hidden" value="<?php echo $Products[0]->id; ?>" id="proDum" />
                        </div>
                </div>
            </div>

            </form>


            <!-- Modal iMAGENES -->
            <div class="modal fade" id="imagenModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">VISTA DE IMAGEN</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body" id="updateDivPrincipal">
                            <img src="#" id="zoomImgModal" />
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="button" class="btn btn-primary">A??adir pedido</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal detalle del producto -->
            <div class="modal fade" id="detalleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
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
                                class="bi bi-check-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                <path fill-rule="evenodd"
                                    d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.236.236 0 0 1 .02-.022z" />
                            </svg> <label for="" style="padding-left: 12px;font-size: 16px;color: white;">Producto
                                agregado al
                                carro</label>
                        </div>
                        <div class="modal-body">
                            <p>??Quieres agregar un servicio de armado o instalaci??n?</p><br>
                            <p class="margin-bottom-30">Seleccione la opci??n "Ir al carro de compras" y agregue
                                los servicios de armado o instalaci??n.
                                Arma tu presupuesto de inmediato y lo gestionaremos en breve.
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
                    {!! (count($Products)!=0?$Products[0]->info_descripcion:'') !!}
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
//:::::::::::::::::::::: DEFAULD :::::::::::::::

$(document).ready(function() {
    App.init();
    App.initScrollBar();
    App.initParallaxBg();
    OwlCarousel.initOwlCarousel();
    RevolutionSlider.initRSfullWidth();

    //====VARIABLES POR DEFAULS



    getTirador(1)
    getModuloPuerta(<?php echo (!empty($modeloPuerta) ?$modeloPuerta[0]->id:'');?>) //Para puertas
    getModuloPuertaColor(<?php echo (!empty($modeloPuerta) ?$modeloPuerta[0]->id:'');?>) //Para colores

    $(".txt_modelo_tirador").show();
    $(".txt_modelo_tirador_unero").hide();

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
    console.log(txt_id_color);

});


$('#txt_cantidad_precio').on('change keyup', function() {
    const valor = parseFloat($('#costo_total__').val()).toFixed(2)
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

//::::::::::::::::::::: MODAL IMAGENES ::::::::::::::::::::
function modalAbrirImagen(url_imagen, isValues) {
    $('#imagenModal').modal(true)

    if (isValues == "PUERTA") {
        $('#zoomImgModal').attr('src', url_imagen);
    } else if (isValues == "INICIAL") {
        $('#zoomImgModal').attr('src', url_imagen);
    } else if (isValues == "COLOR") {
        $('#zoomImgModal').attr('src', url_imagen);
    } else if (isValues == "TIRADOR") {
        $('#zoomImgModal').attr('src', url_imagen);
    } else if (isValues == "ENZIMERA") {
        $('#zoomImgModal').attr('src', url_imagen);
    } else if (isValues == "UNERO") {
        $('#zoomImgModal').attr('src', url_imagen);
    }
}

const imagenPrincipal = (url_image) => {
    $('#txt_imagenPrincipal').attr('src', url_image);
    $('.zoomImg').attr('src', url_image);
    $('#zoomImgModal').attr('src', url_image);
}

// ::::::::::::::::::::::::::::::::::: CALCULAR PRECIOS ::::::::::::::::::::::::::

precioTotal();

function precioTotal() {
    axios.post('/calcular_total_precio_medida__', {
            'id_imagen': '<?php echo (count($Products)!=0?$Products[0]->id_imagen:''); ?>',
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

// ::::::::::::::::::::::::::::::::::: CALCULAR PRECIO ENZIMERA ::::::::::::::::::::::::::
$("input[type=radio][name=txt_model_enzimera]").click(function() {
    const valorEnzimera = $('input[name="txt_model_enzimera"]:checked').val();
    const valor1 = parseFloat(valorEnzimera.split('-')[0])
    //console.log(valor1)
    $('#valorEnzimera_').text(' ??? ' + valor1)
    //let total_pre = parseFloat($('#cost_total_hide').val()) + parseFloat(valorEnzimera.split('-')[0]);
    //$('#costo_total').val(total_pre);
    //getTirador(txt_id_color.split('-')[1]) //Cambiar Imagen

});

$("input[type=radio][name=txt_model_copete]").click(function() {
    const valorCopete = $('input[name="txt_model_copete"]:checked').val();
    const valor2 = parseFloat(valorCopete.split('-')[0])
    $('#valorCopete_').text(' ??? ' + valor2)
});


function setImagenEnzimera(url_image) {
    $('#valorEnzimera_imagen').attr('src', url_image);
    $('#zoomImgModal').attr('src', url_image);
    $('#hidden_imagen_enzimera').val(url_image);
    $('.hide_imagens1').show();
    $('#imagenModal').modal(true)
}

function setImagenCopete(url_image) {
    $('#valorCopete_imagen').attr('src', url_image);
    $('#zoomImgModal').attr('src', url_image);
    $('#hidden_imagen_copete').val(url_image);
    $('.hide_imagens2').show();
    $('#imagenModal').modal(true)
}

// function openModalEnzimera() {
//     $('#zoomImgModal').attr('src', $('#hidden_imagen_enzimera').val());
//     $('#imagenModal').modal(true)
// }

// function openModalCopete() {
//     $('#zoomImgModal').attr('src', $('#hidden_imagen_copete').val());
//     $('#imagenModal').modal(true)
// }



// const button = document.getElementById('txt_model_copete')
// var timer
// button.addEventListener('click', event => {
//   if (event.detail === 1) {
//     timer = setTimeout(() => {
//       console.log('click')
//     }, 200)
//   }
// })
// button.addEventListener('dblclick', event => {
//   clearTimeout(timer)
//   console.log('dblclick')
// })








// $("input[type=radio][name=txt_model_tirador]").click(function() {
//     const txt_id = $('input[name="txt_model_tirador"]:checked').val();
//     getTirador(txt_id.split('-')[1])
// });

// $("input[type=radio][name=txt_model_tiradorUnero]").click(function() {
//     const txt_id = $('input[name="txt_model_tiradorUnero"]:checked').val();
//     getTiradorUnero(txt_id.split('-')[1])
// });



// $("input[type=radio][name=txt_model_tirador]").click(function() {
//     const txt_id_color = $('input[name="txt_model_tirador"]:checked').val();
//     let total_pre = parseFloat($('#cost_total_hide').val()) + parseFloat(txt_id_color.split('-')[0]);
//     $('#costo_total').val(total_pre);
//     // getTirador(txt_id_color.split('-')[1]) //Cambiar Imagen

// });
</script>













<script>
"use strict";                        
let cart = [];
let cartTotal = 0;
const cartDom = document.querySelector(".cart");
const addtocartbtnDom = document.querySelectorAll('[data-action="add-to-cart"]');

addtocartbtnDom.forEach(addtocartbtnDom => {
  addtocartbtnDom.addEventListener("click", () => {
    const productDom = addtocartbtnDom.parentNode.parentNode;
    const product = {
      img: productDom.querySelector(".product-img").getAttribute("src"),
      name: productDom.querySelector(".product-name").innerText,
      price: productDom.querySelector(".product-price").innerText,
      quantity: 1
   };

const IsinCart = cart.filter(cartItem => cartItem.name === product.name).length > 0;
if (IsinCart === false) {
  cartDom.insertAdjacentHTML("beforeend",`
  <div class="d-flex flex-row shadow-sm card cart-items mt-2 mb-3 animated flipInX">
    <div class="p-2">
        <img src="${product.img}" alt="${product.name}" style="max-width: 50px;"/>
    </div>
    <div class="p-2 mt-3">
        <p class="text-info cart_item_name">${product.name}</p>
    </div>
    <div class="p-2 mt-3">
        <p class="text-success cart_item_price">${product.price}</p>
    </div>
    <div class="p-2 mt-3 ml-auto">
        <button class="btn badge badge-secondary" type="button" data-action="increase-item">&plus;
    </div>
    <div class="p-2 mt-3">
      <p class="text-success cart_item_quantity">${product.quantity}</p>
    </div>
    <div class="p-2 mt-3">
      <button class="btn badge badge-info" type="button" data-action="decrease-item">&minus;
    </div>
    <div class="p-2 mt-3">
      <button class="btn badge badge-danger" type="button" data-action="remove-item">&times;
    </div>
  </div> 
  
  
  
  
  
  
  <div id="quantity_wanted_p">


  <div class="p-2">
        <img src="${product.img}" alt="${product.name}" style="max-width: 50px;"/>
    </div>
    <div class="p-2 mt-3">
        <p class="text-info cart_item_name">${product.name}</p>
    </div>
    <div class="p-2 mt-3">
        <p class="text-success cart_item_price">${product.price}</p>
    </div>
        
            
    
        
    </div>
    <div class="content_prices clearfix">
        <div class="p-2 mt-3">
        <p class="text-success cart_item_price">${product.price}</p>
    </div>
    <div class="p-2 mt-3 ml-auto">
        <button class="btn badge badge-secondary" type="button" data-action="increase-item">&plus;
    </div>
    <div class="p-2 mt-3">
      <p class="text-success cart_item_quantity">${product.quantity}</p>
    </div>
    </div>
  
  
  
  
  
  
  
  
  `);

  if(document.querySelector('.cart-footer') === null){
    cartDom.insertAdjacentHTML("afterend",  `
      <div class="d-flex flex-row shadow-sm card cart-footer mt-2 mb-3 animated flipInX">
        <div class="p-2">
          <button class="btn badge-danger" type="button" data-action="clear-cart">Clear Cart
        </div>
        <div class="p-2 ml-auto">
          <button class="btn badge-dark" type="button" data-action="check-out">Pay <span class="pay"></span> 
            &#10137;
        </div>
      </div>`); }

    addtocartbtnDom.innerText = "In cart";
    addtocartbtnDom.disabled = true;
    cart.push(product);

    const cartItemsDom = cartDom.querySelectorAll(".cart-items");
    cartItemsDom.forEach(cartItemDom => {

    if (cartItemDom.querySelector(".cart_item_name").innerText === product.name) {

      cartTotal += parseInt(cartItemDom.querySelector(".cart_item_quantity").innerText) 
      * parseInt(cartItemDom.querySelector(".cart_item_price").innerText);
      document.querySelector('.pay').innerText = cartTotal + " Rs.";

      // increase item in cart
      cartItemDom.querySelector('[data-action="increase-item"]').addEventListener("click", () => {
        cart.forEach(cartItem => {
          if (cartItem.name === product.name) {
            cartItemDom.querySelector(".cart_item_quantity").innerText = ++cartItem.quantity;
            cartItemDom.querySelector(".cart_item_price").innerText = parseInt(cartItem.quantity) *
            parseInt(cartItem.price) + " Rs.";
            cartTotal += parseInt(cartItem.price)
            document.querySelector('.pay').innerText = cartTotal + " Rs.";
          }
        });
      });

      // decrease item in cart
      cartItemDom.querySelector('[data-action="decrease-item"]').addEventListener("click", () => {
        cart.forEach(cartItem => {
          if (cartItem.name === product.name) {
            if (cartItem.quantity > 1) {
              cartItemDom.querySelector(".cart_item_quantity").innerText = --cartItem.quantity;
              cartItemDom.querySelector(".cart_item_price").innerText = parseInt(cartItem.quantity) *
              parseInt(cartItem.price) + " Rs.";
              cartTotal -= parseInt(cartItem.price)
              document.querySelector('.pay').innerText = cartTotal + " Rs.";
            }
          }
        });
      });

      //remove item from cart
      cartItemDom.querySelector('[data-action="remove-item"]').addEventListener("click", () => {
        cart.forEach(cartItem => {
          if (cartItem.name === product.name) {
              cartTotal -= parseInt(cartItemDom.querySelector(".cart_item_price").innerText);
              document.querySelector('.pay').innerText = cartTotal + " Rs.";
              cartItemDom.remove();
              cart = cart.filter(cartItem => cartItem.name !== product.name);
              addtocartbtnDom.innerText = "Add to cart";
              addtocartbtnDom.disabled = false;
          }
          if(cart.length < 1){
            document.querySelector('.cart-footer').remove();
          }
        });
      });

      //clear cart
      document.querySelector('[data-action="clear-cart"]').addEventListener("click" , () => {
        cartItemDom.remove();
        cart = [];
        cartTotal = 0;
        if(document.querySelector('.cart-footer') !== null){
          document.querySelector('.cart-footer').remove();
        }
        addtocartbtnDom.innerText = "Add to cart";
        addtocartbtnDom.disabled = false;
      });

      document.querySelector('[data-action="check-out"]').addEventListener("click" , () => {
        if(document.getElementById('paypal-form') === null){
          checkOut();
        }
      });
    }
  });
}
});
});

function animateImg(img) {
  img.classList.add("animated","shake");
}

function normalImg(img) {
  img.classList.remove("animated","shake");
}

function checkOut() {
  let paypalHTMLForm = `
  <form id="paypal-form" action="https://www.paypal.com/cgi-bin/webscr" method="post" >
    <input type="hidden" name="cmd" value="_cart">
    <input type="hidden" name="upload" value="1">
    <input type="hidden" name="business" value="gmanish478@gmail.com">
    <input type="hidden" name="currency_code" value="INR">`;
   
  cart.forEach((cartItem,index) => {
   ++index;
   paypalHTMLForm += ` <input type="hidden" name="item_name_${index}" value="${cartItem.name}">
    <input type="hidden" name="amount_${index}" value="${cartItem.price.replace("Rs.","")}">
    <input type="hidden" name="quantity_${index}" value="${cartItem.quantity}">`;
  });
   
  paypalHTMLForm += `<input type="submit" value="PayPal" class="paypal">
  </form><div class="overlay">Please wait...</div>`;
  document.querySelector('body').insertAdjacentHTML("beforeend", paypalHTMLForm);
  document.getElementById("paypal-form").submit();
}
</script>  





























<!--flex slider-->
<script src="{{ URL::asset('THIS/assets_2/js/jquery.flexslider.js') }}"></script>
<script src="{{ URL::asset('themes/warehouse/cache/v_726_15810251d95ac88cec9fad9fb952e72e.js') }}"></script>

<style type="text/css">
@media print {
    .hidden-print {
        display: none !important;
        height: 0;
    }
}
</style>
@endsection