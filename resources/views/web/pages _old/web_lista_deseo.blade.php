@extends('web.base')

<!-- Titulo de la página -->
@section('title_page')
<title>Cocinas Innova</title>
@endsection

<!-- Contenido en el Head de la pagina -->
@section('head_page')
<!-- extras -->
<link href="{{asset('theme/css/main_cocina.css')}}" rel="stylesheet">
@endsection

<!-- Contenido en el Body -->
@section('content')
<!--=== Content Part ===-->
<div class="content container">
    <div class="row">

        <section>
            <div class="container">
                <div class="row">

                    <div id="filters-container" class="cbp-l-filters-text content-xs">
                        <div class="header-v5" style="background: black;margin-bottom: 25px;position: unset;">
                            <h1 style="margin-bottom: 15px;color: white;padding: 15px 0px 0px 0px;text-align: center;">
                                <?php if (isset($msg)) { echo $msg; } else { ?> Lista de Deseos <?php } ?>
                            </h1>
                        </div>
                    </div>

                    <div class="col-sm-12 padding-right">
                        <div class="features_items">
                           <?php if ($Products->isEmpty()) { ?>
                            Lo sentimos, No se encontraron productos.!
                            <?php } else { ?>
                            @foreach($Products as $product)
                            <div class="col-sm-3">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <a href="{{url('/product_details')}}">
                                                <img src="{{$product->url_image}}" alt="" />
                                            </a>
                                            <h2>€ {{$product->precio}}</h2>
                                            <p style=" width: 130px;white-space: nowrap;text-overflow: ellipsis;overflow: hidden;" ><a href="{{url('/product_details')}}"><?php echo $product->pro_name; ?></a>
                                            </p>
                                            <hr>
                                            <a href="{{url('/cart/addItem')}}/<?php echo $product->id; ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Añadir Carrito</a>
                                        </div>

                                    </div>
                                    <div class="choose">
                                        <ul class="nav nav-pills nav-justified">
                                            <li><a href="{{url('/')}}/lista_deseo_remover/{{$product->id}}" style="color:red"><i class="fa fa-minus-square"></i>Eliminar</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            <?php } ?>
                        </div>
                        <ul class="pagination">
                        </ul>
                    </div>
                </div>
            </div>
    </div>
    </section>
</div>
<!--/end row-->
</div>
<!--/end container-->
@endsection

@section('footer_page')

@endsection