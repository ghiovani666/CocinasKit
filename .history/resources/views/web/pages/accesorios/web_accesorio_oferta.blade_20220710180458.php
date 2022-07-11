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

                            @foreach($Products as $product)
                            <input type="hidden" />
                            <div class="col-sm-3">



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