@extends('web.base')

<!-- Contenido en el Head de la pagina -->
@section('head_page')
<!-- extras -->
<link rel="stylesheet" href="{{ URL::asset('assets/plugins/owl-carousel/owl-carousel/owl.carousel.css') }}">
<link rel="stylesheet" href="{{ URL::asset('assets/plugins/revolution-slider/rs-plugin/css/settings.css') }}">

@endsection

<!-- Contenido en el Body -->
@section('content')
<div class="container">
    <!--=== Slider ===-->
    <div class="tp-banner-container margin-bottom-60">
        <div class="tp-banner">
            <ul>
                @foreach($slider_ as $item)
                <!-- SLIDE 1 -->
                <li class="revolution-mch-1" data-transition="fade" data-slotamount="5" data-masterspeed="1000"
                    data-title="Slide {{ $item->id_home }}">
                    <!-- MAIN IMAGE -->
                    <img src="{{ $item->url_image }}" alt="darkblurbg" data-bgfit="cover" data-bgposition="left top"
                        data-bgrepeat="no-repeat">

                    <div class="tp-caption revolution-ch1 sft start" data-x="center" data-hoffset="0" data-y="100"
                        data-speed="1500" data-start="500" data-easing="Back.easeInOut" data-endeasing="Power1.easeIn"
                        data-endspeed="300">
                        {{ $item->title1 }}
                    </div>

                    <!-- LAYER -->
                    <div class="tp-caption sft" data-x="center" data-hoffset="0" data-y="380" data-speed="1600"
                        data-start="1800" data-easing="Power4.easeOut" data-endspeed="300"
                        data-endeasing="Power1.easeIn" data-captionhidden="off" style="z-index: 6">
                        <a href="#" class="btn-u btn-brd btn-brd-hover btn-u-light">Mas Información</a>
                    </div>
                </li>
                @endforeach

            </ul>
            <div class="tp-bannertimer tp-bottom"></div>
        </div>

    </div>
    <!--=== End Slider ===-->
    <?php
        $products1 = DB::table('recommends')
                ->leftJoin('products','recommends.pro_id','products.id')
                ->join('imagen', 'products.id', '=', 'imagen.id_product')
                ->join('medida', 'imagen.id_imagen', '=', 'medida.id_imagen')
                ->select('recommends.pro_id','products.pro_name','imagen.url_image','medida.price')
                ->take(3)
                ->get();
        if(Auth::check()){
        $products2 = DB::table('recommends')
                ->leftJoin('products','recommends.pro_id','products.id')
                ->join('imagen', 'products.id', '=', 'imagen.id_product')
                ->join('medida', 'imagen.id_imagen', '=', 'medida.id_imagen')
                ->where('uid',Auth::user()->id)
                ->inRandomOrder()
                ->take(3)
                ->get();
        }else{
        $products2 = DB::table('recommends')
                ->leftJoin('products','recommends.pro_id','products.id')
                ->join('imagen', 'products.id', '=', 'imagen.id_product')
                ->join('medida', 'imagen.id_imagen', '=', 'medida.id_imagen')
                ->inRandomOrder()
                ->take(3)
                ->get();
        }    
    ?>

    <div class="header-v5" style="background: black;margin-bottom: 25px;position: unset;">
        <h1 style="margin-bottom: 15px;color: white;padding: 15px 0px 0px 0px;text-align: center;">COMPOSICIONES EN
            OFERTAS</h1>
    </div>
    <!--=== Illustration v2 ===-->
    <div class="illustration-v2 margin-bottom-60">
        <div class="customNavigation margin-bottom-25">
            <a class="owl-btn prev rounded-x"><i class="fa fa-angle-left"></i></a>
            <a class="owl-btn next rounded-x"><i class="fa fa-angle-right"></i></a>
        </div>

        <ul class="list-inline owl-slider">

            @foreach($products1 as $p)
            <!--=== cocinas===-->
            <li class="item" style="margin: 1em !important;">
                <div class="product-img">
                    <a href="{{url('/product_details_')}}/{{$p->pro_id}}"><img style="height: 245px;"
                            class="full-width img-responsive" src="{{$p->url_image}}" alt=""></a>
                    <a class="product-review" href="{{url('/product_details_')}}/{{$p->pro_id}}">Mas Información</a>
                </div>
                <div class="product-description product-description-brd" style="background: white;">
                    <div class="overflow-h margin-bottom-5">
                        <div class="pull-left">
                            <h4 class="title-price"
                                style=" width: 230px;white-space: nowrap;text-overflow: ellipsis;overflow: hidden;"><a
                                    href="{{url('/product_details_')}}/{{$p->pro_id}}">{{$p->pro_name}}</a></h4>
                        </div>
                    </div>
                    <ul class="list-inline product-ratings">
                        <li><i class="rating-selected fa fa-star"></i></li>
                        <li><i class="rating-selected fa fa-star"></i></li>
                        <li><i class="rating-selected fa fa-star"></i></li>
                        <li><i class="rating fa fa-star"></i></li>
                        <li><i class="rating fa fa-star"></i></li>
                        <li class="like-icon"><a data-original-title="Add to wishlist" data-toggle="tooltip"
                                data-placement="left" class="tooltips" href="#"><i class="fa fa-heart"></i></a>
                        </li>
                    </ul>
                    <br />
                    <ul class="list-inline product-ratings">
                        <li><a href="{{url('/product_details_')}}/{{$p->pro_id}}" class="btn btn-default"><i
                                    class="fa fa-shopping-cart"></i>Añadir al Carrito</a></li>
                    </ul>
                </div>
            </li>
            @endforeach
            @foreach($products2 as $p)
            <li class="item" style="margin: 1em !important;">
                <div class="product-img">
                    <a href="{{url('/product_details_')}}/{{$p->pro_id}}"><img style="height: 245px;"
                            class="full-width img-responsive" src="{{$p->url_image}}" alt=""></a>
                    <a class="product-review" href="{{url('/product_details_')}}/{{$p->pro_id}}">Mas Información</a>
                </div>
                <div class="product-description product-description-brd" style="background: white;">
                    <div class="overflow-h margin-bottom-5">
                        <div class="pull-left">
                            <h4 class="title-price"
                                style=" width: 230px;white-space: nowrap;text-overflow: ellipsis;overflow: hidden;"><a
                                    href="{{url('/product_details_')}}/{{$p->pro_id}}">{{$p->pro_name}}</a></h4>
                        </div>
                    </div>
                    <ul class="list-inline product-ratings">
                        <li><i class="rating-selected fa fa-star"></i></li>
                        <li><i class="rating-selected fa fa-star"></i></li>
                        <li><i class="rating-selected fa fa-star"></i></li>
                        <li><i class="rating fa fa-star"></i></li>
                        <li><i class="rating fa fa-star"></i></li>
                        <li class="like-icon"><a data-original-title="Add to wishlist" data-toggle="tooltip"
                                data-placement="left" class="tooltips" href="#"><i class="fa fa-heart"></i></a>
                        </li>
                    </ul>
                    <br />
                    <ul class="list-inline product-ratings">
                        <li><a href="{{url('/product_details_')}}/{{$p->pro_id}}" class="btn btn-default"><i
                                    class="fa fa-shopping-cart"></i>Añadir al Carrito</a></li>
                    </ul>
                </div>
            </li>
            @endforeach
        </ul>
    </div>
    <!--=== End Illustration v2 ===-->
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

@endsection