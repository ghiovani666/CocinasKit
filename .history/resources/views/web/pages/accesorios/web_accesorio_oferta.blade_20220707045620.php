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
                            <!--features_items-->
                            <b> Total Productos</b>: {{$Products->total()}}
                            <h2 class="title text-center">
                                <?php
                        if (isset($msg)) {
                            echo $msg;
                        } else {
                            ?>
                            <?php if(!empty($Products[0]->names)) { ?>
                                <div id="filters-container" class="cbp-l-filters-text content-xs">
                                    <div class="header-v5"
                                        style="background: black;margin-bottom: 25px;position: unset;">
                                        <h1
                                            style="margin-bottom: 15px;color: white;padding: 15px 0px 0px 0px;text-align: center;">
                                                <?php echo $Products[0]->names ?>
                                        </h1>
                                    </div>
                                </div>
                                <?php }else{echo "";}?>
                                <?php } ?>
                            </h2>

                            <?php if ($Products->isEmpty()) { ?>
                            sorry, products not found
                            <?php } else {
                            $countP=0;?>

                            @foreach($Products as $product)
                            <input type="hidden" id="pro_id<?php echo $countP;?>" value="{{$product->id}}" />
                            <div class="col-sm-3">

                                <!--=== cocinas===-->
                                <li class="item box_shadom_imagen  margin-bottom-30">
                                    <div class="product-img">
                                        <a href="{{url('/accesorio_oferta_detalle')}}/{{$product->id}}"><img
                                                class="full-width img-responsive" src="<?php echo $product->url_image; ?>"
                                                alt=""></a>
                                        <a class="product-review"
                                            href="{{url('/accesorio_oferta_detalle')}}/{{$product->id}}">Mas Información</a>
                                    </div>
                                    <div class="product-description product-description-brd" style="background: white;">
                                        <div class="overflow-h margin-bottom-5">
                                            <div class="pull-left">
                                                <h4 class="title-price"><a
                                                        href="{{url('/accesorio_oferta_detalle')}}/{{$product->id}}"><?php echo substr($product->pro_name, 0, 15).' ...'; ?></a>
                                                </h4>
                                                <span class="gender">
                                                <?php  echo substr($product->pro_info, 0, 100).' ...'; ?>
                                                </span>
                                            </div>
                                        </div>
                                        <ul class="list-inline product-ratings">
                                            <li><i class="rating-selected fa fa-star"></i></li>
                                            <li><i class="rating-selected fa fa-star"></i></li>
                                            <li><i class="rating-selected fa fa-star"></i></li>
                                            <li><i class="rating fa fa-star"></i></li>
                                            <li><i class="rating fa fa-star"></i></li>
                                            <li class="like-icon">
                                                <div class="choose">
                                                    <?php
                                                if(Auth::check()){
                                                $count = App\wishList::where(['pro_id' => $product->id])->count();
                                                ?>
                                                    <?php if($count=="0"){?>
                                                    <form action="{{url('/lista_deseo_agregar')}}" method="post">
                                                        {{ csrf_field() }}
                                                        <input type="hidden" value="{{$product->id}}" name="pro_id" />
                                                        <input type="hidden" value="{{$product->price}}"
                                                            name="precio" />
                                                        <input type="hidden" value="{{$product->url_image}}"
                                                            name="url_image" />
                                                        <button type="submit" id="addToCart2"><i class="fa fa-heart-o"
                                                                aria-hidden="true"></i></button>
                                                    </form>
                                                    <?php } else {?>
                                                    <a href="{{url('/lista_deseo')}}"><i class="fa fa-heart"
                                                            aria-hidden="true"></i></a>
                                                    <?php }}else{?>
                                                    <a href="/login_register"><i class="fa fa-heart-o"
                                                            aria-hidden="true"></i></a>
                                                    <?php } ?>
                                                </div>
                                            </li>

                                            <h2 id="price">
                                                <span style="text-decoration:line-through; color:#ddd"></span>
                                                ${{$product->price}}
                                            </h2>
                                            <div id="successMsg<?php echo $countP;?>" class="alert alert-success"></div>
                                        </ul>
                                    </div>
                                </li>

                            </div>
                            <?php $countP++?>
                            @endforeach
                            <?php } ?>

                        </div>
                        <ul class="pagination">
                            {{ $Products->links()}}
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
$(document).ready(function() {
    <?php $maxP = count($Products);
  for($i=0;$i<$maxP; $i++) {?>
    $('#successMsg<?php echo $i;?>').hide();
    $('#cartBtn<?php echo $i;?>').click(function() {
        var pro_id<?php echo $i;?> = $('#pro_id<?php echo $i;?>').val();

        $.ajax({
            type: 'get',
            url: '<?php echo url('/cart/addItem');?>/' + pro_id<?php echo $i;?>,
            success: function() {
                $('#cartBtn<?php echo $i;?>').hide();
                $('#successMsg<?php echo $i;?>').show();
                $('#successMsg<?php echo $i;?>').append('product has been added to cart');
            }
        });

    });
    <?php }?>
});
</script>

<script>
$(function() {
    $("#slider-range").slider({
        range: true,
        min: 0,
        max: 100,
        values: [15, 65],
        slide: function(event, ui) {

            $("#amount_start").val(ui.values[0]);
            $("#amount_end").val(ui.values[1]);
            var start = $('#amount_start').val();
            var end = $('#amount_end').val();

            $.ajax({
                type: 'get',
                dataType: 'html',
                url: '',
                data: "start=" + start + "& end=" + end,
                success: function(response) {
                    console.log(response);
                    $('#updateDiv').html(response);
                }
            });
        }
    });

    $('.try').click(function() {

        //alert('hardeep');

        var brand = [];
        $('.try').each(function() {
            if ($(this).is(":checked")) {

                brand.push($(this).val());
            }
        });
        Finalbrand = brand.toString();
    });
});

<?php $pros = DB::table('products')->get();?>
$(function() {
    var source = [
        @foreach($pros as $pro) {
            value: "<?php echo url('/');?>/product_details/<?php echo $pro->id;?>",
            label: "<?php echo $pro->pro_name;?>"
        },
        @endforeach
    ];
    $("#proList").autocomplete({
        source: source,
        select: function(event, ui) {
            window.location.href = ui.item.value;
        }
    });
});
</script>
@endsection