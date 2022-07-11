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

               
                            <div class="txt_modelo">
                                <?php  
                                        $imagen = DB::table('imagen')
                                        ->leftJoin('medida', 'imagen.id_imagen', '=', 'medida.id_imagen')
                                        ->where('imagen.id_product', '=',$Products[0]->id)
                                        ->get();
                                        ?>
                                <!-- ---------------------------LISTA DE IMAGENES------------ -->
                                <div style="display: flex;">
                                    @foreach($imagen as $altImg)
                                    <label class="radio-img" data-toggle="tooltip" data-placement="top"
                                        title="{{$altImg->description}}">
                                        <input type="radio" value="{{$altImg->price}}-{{$altImg->id_imagen}}"
                                            onclick="imagenPrincipal('{{$altImg->url_image}}')" />
                                        <img style="width: 70px;" src="{{$altImg->url_image}}">
                                    </label>
                                    @endforeach
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
 

<!--flex slider-->
<script src="{{ URL::asset('THIS/assets_2/js/jquery.flexslider.js') }}"></script>
<script src="{{ URL::asset('themes/warehouse/cache/v_726_15810251d95ac88cec9fad9fb952e72e.js') }}"></script>

@endsection