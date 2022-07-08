@extends('web.base')

<!-- Contenido en el Head de la pagina -->
@section('head_page')
<!-- extras -->
<link href="{{asset('theme/css/main_cocina.css')}}" rel="stylesheet">
@endsection

<!-- Contenido en el Body -->
@section('content')
<div class="container">

    <section id="cart_items">
        <div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="{{url('/')}}">Inicio</a></li>
                    <li class="active">Carrito de Compras</li>
                </ol>
            </div>


             @if(session('status'))
                <div class="alert alert-success">
                    {{session('status')}}
                    <br><span><a href="{{url('/')}}/orders" class="btn btn-success btn-small">Ir Ordenes</a></span>
                </div>
                @endif
                @if(session('alert'))
                <div class="alert alert-warning">

                    {{session('status')}}
                </div>
                @endif

                @if(session('error'))
                <div class="alert alert-danger">

                    {{session('error')}}
                </div>
                @endif

        </div>
    </section>
    
</div>
@endsection

@section('footer_page')

<script>
$(document).ready(function() {
    <?php for($i=1;$i<20;$i++){?>
    $('#upCart<?php echo $i;?>').on('change keyup', function() {
        var newqty = $('#upCart<?php echo $i;?>').val(); //numero de productos
        var rowId = $('#rowId<?php echo $i;?>').val(); //id del producto
        var proId = $('#proId<?php echo $i;?>').val(); //id de la base de datos
        if (newqty <= 0) {
            alert('enter only valid qty')
        } else {
            $.ajax({
                type: 'get',
                dataType: 'html',
                url: '<?php echo url('/cart/update');?>/' + proId,
                data: "qty=" + newqty + "& rowId=" + rowId + "& proId=" + proId,
                success: function(response) {
                    console.log(response);
                    $('#updateDiv').html(response);
                }
            });
        }
    });
    
    <?php } ?>
});
</script>

@endsection