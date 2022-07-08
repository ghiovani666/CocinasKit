@extends('web.base')



<!-- Contenido en el Head de la pagina -->
@section('head_page')
<!-- extras -->
<link rel="stylesheet" href="{{ URL::asset('assets/plugins/noUiSlider/jquery.nouislider.min.css') }}">
<link rel="stylesheet" href="{{ URL::asset('assets/css/plugins/style-switcher.css') }}">
<link rel="stylesheet" href="{{ URL::asset('THIS/assets/css/style.css') }}">
<style>
.card-container {
    display: flex;
    flex-wrap: wrap;
}

.card-container .card {
    border: solid 1px #9a9a9a;
    margin: 5px;
}

.card-container .card .card-body {
    padding: 10px;
}

.h3_texto {
    color: #555;
    margin-top: 5px;
    text-align: center;
    font-size: 15px;
    font-weight: 600;
    font-family: unset;
}
</style>
@endsection

<!-- Contenido en el Body -->
@section('content')
<div class="container">
    <div class="row">
        <div class="container">
            <!--=== Product Service ===-->
            <div class="row margin-bottom-60">
                <div class="card-container">



                    <div id="center_column" class="center_column col-xs-12 col-sm-12 col-sm-push-0">
                        <div class="rte">
                            <h1 style="margin-bottom: 13px;">Presupuesto y Diseño de Cocina en 3D</h1> <img
                                src="https://www.cocinaskitonline.com/img/presupuestos/banner-diseno-3d.jpg"
                                alt="Presupuesto y diseño de cocina en 3d"> <span
                                style="font-size: 16px; line-height: 22px;"> Si necesitas diseñar tu cocina nueva o
                                estás pensando en reformar la que ya tienes, puedes obtener asesoramiento y ayuda de
                                nuestro equipo de profesionales. Para ello basta con que nos envíes unas pocas <a
                                    href="../content/13-como-medir-una-cocina"><b>medidas y datos</b></a> que
                                necesitamos para poder elaborar el diseño y un presupuesto que se ajuste a tus
                                necesidades. Tan sólo sigue unos sencillos pasos que detallamos a continuación y del
                                resto nos ocupamos nosotros. El presupuesto de tu cocina con planos 3D, un plano de
                                planta técnico con todas las acotaciones y una posible rectificación sobre la propuesta
                                inicial, todo por sólo 29 euros. Además ahora te puede salir gratis, ya que si
                                finalmente realizas un pedido de muebles por valor igual o superior a 300 euros, te
                                devolvemos el importe del presupuesto. </span> <br><br> <span style="font-size: 20px;">►
                                ESTO INCLUYE EL PEDIDO DE DISEÑO Y PRESUPUESTO</span> <br><br>
                            <div style="border-bottom: 1px solid #dddddd;">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-3"><span style="font-size: 20px;">PLANO 3D</span> <img
                                            style="width: 280px; margin-bottom: 4px; border: 1px solid #777777;"
                                            src="https://www.cocinaskitonline.com/img/presupuestos/plano-3d.jpg"
                                            alt="Plano en 3D">
                                        <p>Estudio de la mejor distribución de tu cocina en 3D</p>
                                    </div>
                                    <div class="col-xs-12 col-sm-3"><span style="font-size: 20px;">PLANO DE
                                            PLANTA</span> <img
                                            style="width: 280px; margin-bottom: 4px; border: 1px solid #777777;"
                                            src="https://www.cocinaskitonline.com/img/presupuestos/plano-planta.jpg"
                                            alt="Plano de planta">
                                        <p>Plano de cotas y medidas de la estancia y los muebles</p>
                                    </div>
                                    <div class="col-xs-12 col-sm-3"><span style="font-size: 20px;">PRESUPUESTO</span>
                                        <img style="width: 280px;margin-bottom: 4px; border: 1px solid #777777;"
                                            src="https://www.cocinaskitonline.com/img/presupuestos/presupuesto.jpg"
                                            alt="Hoja de presupuesto">
                                        <p>Documento de presupuesto detallado por partes</p>
                                    </div>
                                    <div class="col-xs-12 col-sm-3"><span style="font-size: 20px;">UNA
                                            MODIFICACIÓN</span> <img
                                            style="width: 280px; margin-bottom: 4px; border: 1px solid #777777;"
                                            src="https://www.cocinaskitonline.com/img/presupuestos/rectificacion.jpg"
                                            alt="Modificación sobre proyecto inicial">
                                        <p>Incluída una modificación sobre la propuesta inicial</p>
                                    </div>
                                </div> <br><br>
                            </div> <br><br>
           
                            <script>
                            /* <![CDATA[ */ ;
                            window.onhashchange = function() {
                                pageParamFMSend['page'] = window.location.href;
                            }
                            var pageParamFMSend = {
                                page: window.location.href,
                                id_cms: "10",
                                controller: "cms",
                            }; /* ]]> */
                            </script><br><br>
                            <div style="border-top: 1px solid #dddddd;"><br><br> <span style="font-size: 20px;">► AÑADIR
                                    EL PRODUCTO AL CARRITO PARA INICIAR EL PROCESO DE COMPRA</span> <br><br>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-6" style="font-size: 16px; line-height: 22px;">Para
                                        finalizar el pedido del presupuesto previamente se han tenido que completar los
                                        datos solicitados en el formulario de arriba. Una vez completados hacer clic en
                                        el botón rojo de "Comprar Ahora" para añadir el presupuesto al carrito e iniciar
                                        el proceso de compra. Si posteriormente se realiza un pedido de muebles de valor
                                        igual o superior a 300 euros, te devolvemos el importe del presupuesto.</div>
                                    <div class="col-xs-12 col-sm-2"
                                        style="font-size: 75px; font-weight: bold; line-height: 70px;">
                                        <blockquote>29€</blockquote>
                                    </div>
                                    <div class="col-xs-12 col-sm-4"><a id="cocinakit_boton_presupuesto"
                                            href="../index.php?controller=cart&amp;add=1&amp;id_product=281&amp;qty=1&amp;8D9J7AEZF"><img
                                                src="https://www.cocinaskitonline.com/img/presupuestos/boton.jpg"
                                                alt="Comprar ahora"></a></div>
                                </div>
                            </div>
                        </div> <br>
                    </div>



                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer_page')
<script>
jQuery(document).ready(function() {
    App.init();
    App.initScrollBar();
    App.initParallaxBg();
    OwlCarousel.initOwlCarousel();
    RevolutionSlider.initRSfullWidth();
});
</script>
<!--[if lt IE 9]>
    <script src="assets/plugins/respond.js"></script>
    <script src="assets/plugins/html5shiv.js"></script>
    <script src="assets/js/plugins/placeholder-IE-fixes.js"></script>
<![endif]-->


@endsection