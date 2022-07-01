@extends('web.base')

<!-- Titulo de la página -->
@section('title_page')
<title>Cocinas Innova</title>
@endsection

<!-- Contenido en el Head de la pagina -->
@section('head_page')
<!-- extras -->
<link rel="stylesheet" href="{{ URL::asset('assets/plugins/owl-carousel/owl-carousel/owl.carousel.css') }}">
<link rel="stylesheet" href="{{ URL::asset('assets/plugins/revolution-slider/rs-plugin/css/settings.css') }}">
<link rel="stylesheet" href="{{ URL::asset('THIS/assets/css/style.css') }}">
<link rel="stylesheet"
    href="{{ URL::asset('THIS/assets/plugins/cube-portfolio/cubeportfolio/css/cubeportfolio.min.css') }}">
<link rel="stylesheet"
    href="{{ URL::asset('THIS/assets/plugins/cube-portfolio/cubeportfolio/custom/custom-cubeportfolio.css') }}">

<!-- Custom Theme files -->
<link rel="stylesheet" href="{{ URL::asset('THIS/assets_2/css/style.css') }}">
<link rel="stylesheet" href="{{ URL::asset('THIS/assets_2/css/owl.carousel.css') }}">
<link rel="stylesheet" href="{{ URL::asset('THIS/assets_2/css/flexslider.css') }}">

<style>
.tableficha {
    width: 60%;
    margin: auto;
    text-align: center;
}

.tabletitulo {
    color: #fff;
    background: #0E5FF1;
    font-weight: bold;
}

.tableficha tr {
    font-weight: bold;
}
</style>




@endsection

<!-- Contenido en el Body -->
@section('content')
<!-- products -->
<div class="products">
    <div class="container">

        <div class="single-page margin-bottom-60 box_shadom_imagen"
            style="padding-bottom: 45px;padding-top: 45px;padding-left: 78px;">
            <div class="single-page-row" id="detail-21">
                <div class="col-md-6 single-top-left">
                    <div class="flexslider">
                        <ul class="slides">
                        @foreach($Products as $value)
                            <li
                                data-thumb="<?php echo $value->pro_img; ?>">
                                <div class="thumb-image detail_images">
                                    <img src="<?php echo $value->pro_img; ?>"
                                        data-imagezoom="true" class="img-responsive" alt="">
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 single-top-right">
                    <div class="heading margin-bottom-20">
                        <h2 style="display: flex !important;">Cocina DELINIA en kit Galaxy blanco 2,40 m
                            595,75€</h2>
                    </div>

                    <p>Processing Time: Item will be shipped out within 2-3 working days. </p>
                    <div class="single-rating">
                        <ul>
                            <li><i class="fa fa-star-o" aria-hidden="true"></i></li>
                            <li><i class="fa fa-star-o" aria-hidden="true"></i></li>
                            <li><i class="fa fa-star-o" aria-hidden="true"></i></li>
                            <li><i class="fa fa-star-o" aria-hidden="true"></i></li>
                            <li><i class="fa fa-star-o" aria-hidden="true"></i></li>
                            <li class="rating">20 reviews</li>
                            <li><a href="#">Add your review</a></li>
                        </ul>
                    </div>
                    <div class="single-price">
                        <ul>
                            <li>$540</li>
                            <li><del>$600</del></li>
                            <li><span class="w3off">Consultar disponibilidad en <br> tienda y venta
                                    telefónica</span></li>
                            <li>Ends on: June,5th</li>
                            <li><a href="#"><i class="fa fa-gift" aria-hidden="true"></i> Coupon</a></li>
                        </ul>
                    </div>
                    <p class="single-price-text">Entrega a pie de vehículo si las condiciones de la vía lo
                        permiten o las recomendaciones sanitarias pueden respetarse </p>
                    <form action="#" method="post">
                        <input type="hidden" name="cmd" value="_cart" />
                        <input type="hidden" name="add" value="1" />
                        <input type="hidden" name="w3ls_item" value="Snow Blower" />
                        <input type="hidden" name="amount" value="540.00" />
                        <button type="submit" class="w3ls-cart"><i class="fa fa-cart-plus" aria-hidden="true"></i> Venta
                            Telefóginica</button>
                    </form>
                    <button class="w3ls-cart w3ls-cart-like"><i class="fa fa-heart-o" aria-hidden="true"></i>
                        Añadir Deseo</button>
                </div>
                <div class="clearfix"> </div>
            </div>
            
        </div>

        <!-- collapse-tabs -->
        <div class="collpse tabs">
            <div class="heading margin-bottom-20">
                <h2 style="display: flex !important;">Acerca de este artículo</h2>
            </div>
            <div class="panel-group collpse" id="accordion" role="tablist" aria-multiselectable="true">
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingOne">
                        <h4 class="panel-title">
                            <a class="pa_italic" role="button" data-toggle="collapse" data-parent="#accordion"
                                href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                <i class="fa fa-file-text-o fa-icon" aria-hidden="true"></i> Description <span
                                    class="fa fa-angle-down fa-arrow" aria-hidden="true"></span> <i
                                    class="fa fa-angle-up fa-arrow" aria-hidden="true"></i>
                            </a>
                        </h4>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel"
                        aria-labelledby="headingOne">
                        <div class="panel-body">
                            Composición de cocina Delinia modelo Galaxy de color blanco de 2,4 metros. La
                            composición incluye un mueble bajo de 45 cm con un cajón y 2 gavetas con freno, un
                            mueble para horno de 60x70 cm, un mueble bajo de 45x70 cm con una puerta, un mueble
                            bajo de 60x70 cm con una puerta, un mueble bajo de 30x70 cm con una puerta, 2
                            muebles altos de 40x70 cm con puerta, un mueble alto de 60x70 cm con puerta y un
                            mueble alto de 30x70 cm con puerta. Incluye zócalo, tiradores y bisagras. No incluye
                            grifo, fregadero, encimera ni electrodomésticos que se venden por separado. Ver
                            ficha técnica
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingTwo">
                        <h4 class="panel-title">
                            <a class="collapsed pa_italic" role="button" data-toggle="collapse" data-parent="#accordion"
                                href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                <i class="fa fa-info-circle fa-icon" aria-hidden="true"></i> FICHA TÉCNICA <span
                                    class="fa fa-angle-down fa-arrow" aria-hidden="true"></span>
                                <i class="fa fa-angle-up fa-arrow" aria-hidden="true"></i>
                            </a>
                        </h4>
                    </div>
                    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                        <div class="panel-body">
                            <table class="tableficha">
                                <tr>
                                    <td>Titulo</td>
                                    <td>Aprendiendo UML en 24 Horass</td>
                                </tr>
                                <tr>
                                    <td>Paginas</td>
                                    <td>24 Horas</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        @include('web.layouts.pages.recommends')
    </div>
</div>
<!--//products-->
@endsection

@section('footer_page')

<!-- --------------------------------------LISTA DE PRODUCTOS----------- -->
<script src="{{ URL::asset('THIS/assets/plugins/cube-portfolio/cubeportfolio/js/jquery.cubeportfolio.min.js') }}">
</script>
<script src="{{ URL::asset('THIS/assets/js/plugins/cube-portfolio/cube-portfolio-4.js') }}"></script>
<!--flex slider-->
<script src="{{ URL::asset('THIS/assets_2/js/jquery.flexslider.js') }}"></script>


<script>
jQuery(document).ready(function() {
    App.init();
    App.initScrollBar();
    App.initParallaxBg();
    OwlCarousel.initOwlCarousel();
    RevolutionSlider.initRSfullWidth();
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
</script>
<script src="{{ URL::asset('THIS/assets_2/js/imagezoom.js') }}"></script>

@endsection