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

  
            <div class="row margin-bottom-60">
                <div class="card-container">



                    <div id="center_column" class="center_column col-xs-12 col-sm-12 col-sm-push-0">
                       
                            <h1 style="margin-bottom: 13px;">Instalación y Transporte</h1> 
                             
                          
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