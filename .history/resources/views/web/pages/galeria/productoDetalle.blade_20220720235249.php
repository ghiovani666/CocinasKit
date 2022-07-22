@extends('web.layouts.base')

<!-- Titulo de la página -->
@section('title_page')
<title>Inmonut</title>
@endsection

<!-- Contenido en el Head de la pagina -->
@section('head_page')
<!-- extras -->
<style>
.zoom {
    display: inline-block;
    position: relative;
}
.zoom img {
    display: block;
}
</style>
@endsection

<!-- Contenido en el Body -->
@section('content')
<!--=== Content Part ===-->

<!--//==Page Header Start==//-->
<div class="page-header black-overlay">
    <div class="container breadcrumb-section">
        <div class="row pad-s15">
            <div class="col-md-12">
                <h2>Detalle del Producto</h2>
                <div class="clear"></div>
                <div class="breadcrumb-box">
                    <ul class="breadcrumb">
                        <li>
                            <a href="index.html">Inicio</a>
                        </li>
                        <li class="active">Detalle del Producto</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--//==Page Header End==//-->

<!--//=========product Detail Start=========//-->
<section class="page_single">
    <div class="container">
        <div class="row padTB100">
            <div class="prod-info-section">
                <div class="clearfix">
                    <!--Thumbnail Column-->
                    <div class="carousel-column col-lg-6 col-md-6 col-sm-5 col-xs-12">
                        <div class="wa-product-main-image marB20">
                            <a href="{{ $Products[0]->url_image }}" class="fancybox" data-fancybox-group="group"
                                title="Chrome Finish faucet">
                                <div class="zoom" id="produto">
                                    <img src="{{ $Products[0]->url_image }}" alt="">
                                </div>
                            </a>
                        </div>
                        <div id="wa-slide-image" class="owl-carousel  wa-slide-image carousel-style-1">
                            <?php $sizes = DB::table('web_producto_imagen')->where('id_product',$Products[0]->id)->get();?>
                            @if(count($sizes)!=0)
                            @foreach ($sizes as $values)
                            <a href="{{ $values->url_image }}" class="fancybox" data-fancybox-group="group"
                                title="Chrome Finish faucet"> <img src="{{ $values->url_image }}" alt=""> </a>
                            @endforeach
                            </select>
                            @endif

                        </div>
                    </div>

                    <!--Content Column-->
                    <div class="content-column col-lg-6 col-md-6 col-sm-7 col-xs-12">
                        <div class="outer wow fadeInRight">
                            <div class="title-box">
                                <div class="inner marB30">
                                    <h2 class="marB10" style="font-weight: normal !important;">
                                        {{ $Products[0]->pro_name }}</h2>
                                    <p class="availability in-stock">REF:
                                        <span>{{ $Products[0]->pro_code }}</span>
                                    </p>
                                    <span class="price marB10">
                                        <del>{{$Products[0]->price_old?'€'.$Products[0]->price_old:''}}</del>
                                        {{$Products[0]->price?'€'.$Products[0]->price:''}}
                                        <span class="clear"></span>
                                    </span>
                                    @php
                                    echo htmlspecialchars_decode($Products[0]->pro_info);
                                    @endphp
                                </div>
                                <div class="clear"></div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
<!--//=========product Detail End=========//-->
<!--//==product Description Start==//-->
<section class="page_single">
    <div class="container">
        <div class="row">
            <div class="prod-info-section">
                <div class="clearfix">
                    <div class="col-md-12">
                        <div class="block-caption">
                            <div class="left-title">
                                <h2>Discripcion del Producto<span class="heading-border"></span></h2>
                                <div class="clear"></div>
                            </div>
                            @php
                            echo htmlspecialchars_decode($Products[0]->description_pro);
                            @endphp
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--//==product Description End==//-->
<!--//==product Review Section Start==//-->
<section class="page_single">
    <div class="container">
        <div class="row padTB100">
            <div class="prod-info-section">
                <div class="clearfix">

                    <div class="col-md-12 padT30">
                        <!--//==Section Heading Start==//-->
                        <div class="left-title">
                            <h2>Envia un mensaje <span class="heading-border"></span></h2>
                            <div class="clear"></div>
                        </div>
                        <!--//==Section Heading End==//-->
                        <div class="row">
                            <div class="contact-form-section">
                                <!--//==Comment Form Start==//-->
                                <form class="contact-form">
                                    <div class="col-md-6 form-group">
                                        <input type="text" placeholder="Tu Nombre">
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <input type="email" id="exampleInputEmail" placeholder="Tu Email">
                                    </div>
                                    <div class="col-md-12 form-group">
                                        <textarea name="contact_message" class="textarea-message"
                                            placeholder="Tu Mensaje" rows="10"></textarea>
                                    </div>
                                    <div class="col-md-12 form-group">
                                        <button type="submit" class="col-md-3 theme-button">Enviar </button>
                                    </div>
                                </form>
                                <!--//==Comment Form End==//-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--//==product Review Section Start==//-->
<!--/end container-->
@endsection


@section('footer_page')
<!-- ----------------slider del producto---------- -->
<script type="text/javascript" src="{{ URL::asset('template_inmonut/assets/plugins/fancymedia/js/jquery.fancybox.pack.js') }}">
</script>
<script type="text/javascript" src="{{ URL::asset('template_inmonut/assets/plugins/fancymedia/js/jquery.fancybox-media.js') }}">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-zoom/1.7.20/jquery.zoom.min.js"></script>
<script>
$(document).ready(function() {
    $('#produto').zoom();
});
</script>
@endsection