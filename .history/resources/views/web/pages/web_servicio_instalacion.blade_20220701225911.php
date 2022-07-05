@extends('web.base')

<!-- Titulo de la página -->
@section('title_page')
<title>Tu cocinakit</title>
@endsection

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
                            <h1 style="margin-bottom: 13px;">Instalación y Transporte</h1> <img
                                src="https://www.consumoteca.com/wp-content/uploads/cocina-ikea-cocina-barrio-comparativa-1536x1020.jpeg"
                                alt="Presupuesto y diseño de cocina en 3d"> <span
                                style="font-size: 16px; line-height: 22px;"> Con su permiso, nosotros y nuestros socios
                                podemos utilizar datos de localización geográfica precisa e identificación mediante las
                                características de dispositivos. Puede hacer clic para otorgarnos su consentimiento a
                                nosotros y a nuestros socios para que llevemos a cabo el procesamiento previamente
                                descrito. De forma alternativa, puede acceder a información más detallada y cambiar sus
                                preferencias antes de otorgar o negar su consentimiento. Tenga en cuenta que algún
                                procesamiento de sus datos personales puede no requerir de su consentimiento, pero usted
                                tiene el derecho de rechazar tal procesamiento. Sus preferencias se aplicarán a un grupo
                                de sitios web [hipervínculo al dominio donde se enumeran todas las propiedades para esta
                                configuración de grupo]. Puede cambiar sus preferencias en cualquier momento entrando de
                                nuevo en este sitio web o visitando nuestra política de privacidad.</span> <br><br>

                          
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