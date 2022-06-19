@extends('web.base')

<!-- Titulo de la página -->
@section('title_page')
<title>Cocinas Innova</title>
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

                    @foreach($options as $data)
                    <div class="card">
                        <a href="/products_list/{{$data->id_cat}}"> <img
                                src="{{$data->url_image}}"
                                alt="Random photo" class="card-img"></a>
                        <div class="card-body">
                        <a href="/products_list/{{$data->id_cat}}"><h3 class="h3_texto">{{$data->names}}</h3></a>
                        </div>
                    </div>
                    @endforeach

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