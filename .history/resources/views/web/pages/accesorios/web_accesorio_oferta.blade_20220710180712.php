@extends('web.base')

<!-- Contenido en el Head de la pagina -->
@section('head_page')
<!-- extras -->
<link href="{{asset('theme/css/main_cocina.css')}}" rel="stylesheet">
<link href="{{asset('theme/css/price-range.css')}}" rel="stylesheet">
<link href="{{asset('theme/css/jquery-ui.css')}}" rel="stylesheet">
@endsection

<!-- Contenido en el Body -->
@section('content')
<!--=== Content Part ===-->
<div class="content container">
    <div class="row">

        <section>
            <div class="container">
                <div class="row">

                    <div class="col-sm-12 padding-right" id="updateDiv">

                        <div class="features_items">

                            <h2 class="title text-center">

                         
                            <input type="hidden" />
                            <div class="col-sm-3">


                            @foreach($Products as $product)
                            <input type="hidden"  />
                            <div class="col-sm-3">

                                <!--=== cocinas===-->
                                <li class="item box_shadom_imagen  margin-bottom-30">
                               
                                
                                    <div class="product-description product-description-brd" style="background: white;">
                     
                                    
                                        <ul class="list-inline product-ratings">
                                            <li><i class="rating-selected fa fa-star"></i></li>
                                            <li><i class="rating-selected fa fa-star"></i></li>
                                            <li><i class="rating-selected fa fa-star"></i></li>
                                            <li><i class="rating fa fa-star"></i></li>
                                            <li><i class="rating fa fa-star"></i></li>
                                          
                                            

                                            <h2 id="price">
                                                <span style="text-decoration:line-through; color:#ddd"></span>
                                                ${{$product->id_item}}
                                            </h2>
                                            <div id="successMsg<?php echo $countP;?>" class="alert alert-success"></div>
                                        </ul>
                                    </div>
                                </li>

                            </div>
                            <?php $countP++?>
                            @endforeach
                            </div>

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
<script>

</script>

@endsection