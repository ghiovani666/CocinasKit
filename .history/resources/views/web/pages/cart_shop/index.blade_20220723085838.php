@extends('web.base')
<!-- Contenido en el Head de la pagina -->
@section('head_page')
<!-- extras -->
<link href="{{asset('theme/css/main_cocina.css')}}" rel="stylesheet">

<style>
.cart {
    background: #13756f4f !important;
    padding: 1em 0;
}

.cart .items {
    display: block;
    width: 100%;
    vertical-align: middle;
    padding: 1.5em;
    border-bottom: 1px solid #fafafa;
}

.cart .items.even {
    background: #fafafa;
}

.cart .items .infoWrap {
    display: table;
    width: 100%;
}

.cart .items .cartSection {
    display: table-cell;
    vertical-align: middle;
}

.cart .items .cartSection .itemNumber {
    font-size: .75em;
    color: #777;
    margin-bottom: .5em;
}

.cart .items .cartSection h3 {
    font-size: 1em;
    font-family: "Montserrat", sans-serif;
    font-weight: bold;
    text-transform: uppercase;
    letter-spacing: .025em;
}

.cart .items .cartSection p {
    display: inline-block;
    font-size: .85em;
    color: #777777;
    font-family: "Montserrat", sans-serif;
}

.cart .items .cartSection p .quantity {
    font-weight: bold;
    color: #333;
}

.cart .items .cartSection p.stockStatus {
    color: #82CA9C;
    font-weight: bold;
    padding: .5em 0 0 1em;
    text-transform: uppercase;
}

.cart .items .cartSection p.stockStatus.out {
    color: #F69679;
}

.cart .items .cartSection .itemImg {
    width: 4em;
    float: left;
}

.cart .items .cartSection.qtyWrap,
.cart .items .cartSection.prodTotal {
    text-align: center;
}

.cart .items .cartSection.qtyWrap p,
.cart .items .cartSection.prodTotal p {
    font-weight: bold;
    font-size: 1.25em;
}

.cart .items .cartSection input.qty {
    width: 2em;
    text-align: center;
    font-size: 1em;
    padding: .25em;
    margin: 1em .5em 0 0;
}

.cart .items .cartSection .itemImg {
    width: 8em;
    display: inline;
    padding-right: 1em;
}

.special {
    display: block;
    font-family: "Montserrat", sans-serif;
}

.special .specialContent {
    padding: 1em 1em 0;
    display: block;
    margin-top: .5em;
    border-top: 1px solid #dadada;
}

.special .specialContent:before {
    content: "\21b3";
    font-size: 1.5em;
    margin-right: 1em;
    color: #6f6f6f;
    font-family: helvetica, arial, sans-serif;
}

a.remove {
    text-decoration: none;
    font-family: "Montserrat", sans-serif;
    color: #ffffff;
    font-weight: bold;
    background: #e0e0e0;
    padding: .5em;
    font-size: .75em;
    display: inline-block;
    border-radius: 100%;
    line-height: .85;
    -webkit-transition: all 0.25s linear;
    -moz-transition: all 0.25s linear;
    -ms-transition: all 0.25s linear;
    -o-transition: all 0.25s linear;
    transition: all 0.25s linear;
}

a.remove:hover {
    background: #f30;
}

.promoCode {
    /* border: 2px solid #efefef; */
    float: left;
    width: 35%;
    padding: 2%;
}

.promoCode label {
    display: block;
    width: 100%;
    font-style: italic;
    font-size: 1.15em;
    margin-bottom: .5em;
    letter-spacing: -.025em;
}

.promoCode input {
    /* width: 85%; */
    width: 8% !important;
    font-size: 1em;
    padding: .5em;
    float: left;
    border: 1px solid #dadada;
}

.promoCode input:active,
.promoCode input:focus {
    outline: 0;
}

.promoCode a.btn {
    float: left;
    width: 15%;
    padding: .75em 0;
    border-radius: 0 1em 1em 0;
    text-align: center;
    border: 1px solid #82ca9c;
}

.promoCode a.btn:hover {
    border: 1px solid #f69679;
    background: #f69679;
}

.btn:link,
.btn:visited {
    text-decoration: none;
    font-family: "Montserrat", sans-serif;
    letter-spacing: -.015em;
    font-size: 1em;
    padding: 1em 3em;
    color: #fff;
    background: #82ca9c;
    font-weight: bold;
    border-radius: 50px;
    float: right;
    text-align: right;
    -webkit-transition: all 0.25s linear;
    -moz-transition: all 0.25s linear;
    -ms-transition: all 0.25s linear;
    -o-transition: all 0.25s linear;
    transition: all 0.25s linear;
}

.btn:after {
    /* content: "\276f"; */
    padding: .5em;
    position: relative;
    right: 0;
    -webkit-transition: all 0.15s linear;
    -moz-transition: all 0.15s linear;
    -ms-transition: all 0.15s linear;
    -o-transition: all 0.15s linear;
    transition: all 0.15s linear;
}

.btn:hover,
.btn:focus,
.btn:active {
    background: #f69679;
}

.btn:hover:after,
.btn:focus:after,
.btn:active:after {
    right: -10px;
}

.promoCode .btn {
    font-size: .85em;
    paddding: .5em 2em;
}

/* TOTAL AND CHECKOUT  */
.subtotal {
    float: right;
    width: 35%;
}

.subtotal .totalRow {
    padding: .5em;
    text-align: right;
}

.subtotal .totalRow.final {
    font-size: 1.25em;
    font-weight: bold;
}

.subtotal .totalRow span {
    display: inline-block;
    padding: 0 0 0 1em;
    text-align: right;
}

.subtotal .totalRow .label {
    font-family: inherit;
    font-size: .85em;
    text-transform: uppercase;
    color: #777;
}

.subtotal .totalRow .value {
    letter-spacing: -.025em;
    width: 35%;
}

@media only screen and (max-width: 39.375em) {
    .wrap {
        width: 98%;
        padding: 2% 0;
    }

    .projTitle {
        font-size: 1.5em;
        padding: 10% 5%;
    }

    .heading {
        padding: 1em;
        font-size: 90%;
    }

    .cart .items .cartSection {
        width: 90%;
        display: block;
        float: left;
    }

    .cart .items .cartSection.qtyWrap {
        width: 10%;
        text-align: center;
        padding: .5em 0;
        float: right;
    }

    .cart .items .cartSection.qtyWrap:before {
        content: "QTY";
        display: block;
        font-family: "Montserrat", sans-serif;
        padding: .25em;
        font-size: .75em;
    }

    .cart .items .cartSection.prodTotal,
    .cart .items .cartSection.removeWrap {
        display: none;
    }

    .cart .items .cartSection .itemImg {
        width: 25%;
    }

    .promoCode,
    .subtotal {
        width: 100%;
    }

    a.btn.continue {
        width: 100%;
        text-align: center;
    }
}
</style>
@endsection

<!-- Contenido en el Body -->
@section('content')
<div class="container">

    <?php if ($cartItems->isEmpty()) { ?>
    <section id="cart_items">
        <div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="{{url('/')}}">Home</a></li>
                    <li class="active">Shopping Cart</li>
                </ol>
            </div>
            <div align="center"> <img src="{{asset('theme/images/cart/empty-cart.png')}}" /></div>

        </div>
    </section>
    <!--/#cart_items-->
    <?php } else { ?>

    <section id="cart_items">
        <div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="{{url('/')}}/cart">Carrito</a></li>
                    <li class="active">Procesar Pedido</li>
                </ol>
            </div>

            <div id="updateDiv">
                @if(session('status'))
                <div class="alert alert-success">

                    {{session('status')}}
                </div>
                @endif

                @if(session('error'))
                <div class="alert alert-danger">

                    {{session('error')}}
                </div>
                @endif

                <?php  
                $precioAdicional = DB::select("SELECT * FROM mc_precio_adicional c");                                   
                    ?>
                <div class="table-responsive cart_info">
                    <div class="wrap cf">
                        <div class="cart">
                            <ul class="cartWrap">
                                <?php $count =1;?>
                                @foreach($cartItems as $cartItem)

                                <li class="items odd">

                                    <div class="infoWrap">

                                        <div class="cartSection">
                                            <a href="{{url('/product_details_')}}/{{$cartItem->id}}"><img
                                                    src="{{$cartItem->options->img}}" class="itemImg"></a>
                                            <ul>
                                                <li><i class="fa fa-check" aria-hidden="true"></i> Codigo:
                                                    {{$cartItem->id}}</li>
                                                <li><i class="fa fa-check" aria-hidden="true"></i> Precio Unitario: €
                                                    {{$cartItem->price}}</li>



                                            </ul>
                                            <h3><a
                                                    href="{{url('/product_details_')}}/{{$cartItem->id}}">{{$cartItem->name}}</a>
                                            </h3>

                                        </div>

                                        <div class="prodTotal cartSection">
                                            <div class="cart_quantity_button">
                                                <input type="hidden" id="rowId<?php echo $count;?>"
                                                    value="{{$cartItem->rowId}}" />
                                                <input type="hidden" id="proId<?php echo $count;?>"
                                                    value="{{$cartItem->id}}" />

                                                <input type="number" size="2" value="{{$cartItem->qty}}" name="qty"
                                                    id="upCart<?php echo $count;?>" autocomplete="off"
                                                    style="text-align:center; max-width:50px; " MIN="1" MAX="30">
                                            </div>
                                        </div>

                                        <div class="prodTotal cartSection">
                                            <p class="cart_total_price">€ {{$cartItem->subtotal}}</p>
                                        </div>

                                        <div class="cartSection removeWrap">
                                            <a href="{{url('/cart/remove')}}/{{$cartItem->rowId}}">
                                                @include('web.pages.cart_shop.ajax.icon_eliminar')</a>
                                        </div>
                                    </div>
                                </li>
                                <?php $count++;?>
                                @endforeach
                            </ul>
                        </div>






                        <ul style="text-decoration: none;display: flex">
                            <li>
                                @if ($cartItem->qty < 4) <input class="form-check-input" type="checkbox"
                                    value="{{ $precioAdicional[0]->precio }}" name="check_armado_mueble">
                                    <label class="form-check-label" for="check_armado_mueble">
                                        Transporte
                                        {{ $precioAdicional[0]->precio }} €
                                    </label>
                                    @elseif($cartItem->qty >= 4 && $cartItem->qty <= 6) <input class="form-check-input"
                                        type="checkbox" value="{{ $precioAdicional[1]->precio }}"
                                        name="check_armado_mueble">
                                        <label class="form-check-label" for="check_armado_mueble">
                                            Transporte
                                            {{ $precioAdicional[1]->precio }} €
                                        </label>
                                        @else

                                        <input class="form-check-input" type="checkbox"
                                            value="{{ $precioAdicional[2]->precio }}" name="check_armado_mueble">
                                        <label class="form-check-label" for="check_armado_mueble">
                                            Transporte
                                            {{ $precioAdicional[2]->precio }} €
                                        </label>
                                        @endif

                            </li>

                            <li>

                                @if ($cartItem->qty < 4) <input class="form-check-input" type="checkbox"
                                    value="{{ $precioAdicional[3]->precio }}" name="check_armado_mueble">
                                    <label class="form-check-label" for="check_armado_mueble">
                                        Instalación {{ $precioAdicional[3]->precio }} €
                                    </label>
                                    @elseif($cartItem->qty >= 4 && $cartItem->qty <= 6) <input class="form-check-input"
                                        type="checkbox" value="{{ $precioAdicional[4]->precio }}"
                                        name="check_armado_mueble">
                                        <label class="form-check-label" for="check_armado_mueble">
                                            Instalación
                                            {{ $precioAdicional[4]->precio }} €
                                        </label>
                                        @else

                                        <input class="form-check-input" type="checkbox"
                                            value="{{ $precioAdicional[5]->precio }}" name="check_armado_mueble">
                                        <label class="form-check-label" for="check_armado_mueble">
                                            Instalación
                                            {{ $precioAdicional[5]->precio }} €
                                        </label>
                                        @endif

                            </li>


                        </ul>







                        <div class="subtotal cf">
                            <ul>
                                <li class="totalRow"><span class="label">Subtotal</span><span class="value">€
                                        {{Cart::subtotal()}}</span></li>
                                <li class="totalRow"><span class="label">Costo de Envio €</span><span
                                        class="value"><span id="monto_text1"> 00.00</span></span>
                                </li>
                                <li class="totalRow final margin-bottom-30"><span class="label">Total €</span><span
                                        class="value"><span id="txt_monto_total_"> {{Cart::subtotal()}}</span></span>
                                </li>
                                <li class="totalRow">
                                    <a href="{{ URL::previous() }}">
                                        <button type="submit" class="btn btn-danger" style="font-size: 25px;"> <i
                                                class="glyphicon glyphicon-chevron-left" aria-hidden="true"></i>
                                            Regresar</button>
                                    </a>
                                    <button type="submit" class="btn btn-info" onclick="openModalCuenta()"
                                        style="font-size: 25px;">Enviar
                                        Pago <i class="fa fa-check" aria-hidden="true"></i></button>

                                </li>
                            </ul>
                        </div>


                    </div>
                </div>
                <!-- Modal Numero Cuenta -->
                <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content" style="border: unset !important;">
                            <div class="alert" role="alert" style="display: flex;background: #13756f;color: white;">
                                <svg style="font-size: 30px;" width="1em" height="1em" viewBox="0 0 16 16"
                                    class="bi bi-check-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                    <path fill-rule="evenodd"
                                        d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.236.236 0 0 1 .02-.022z" />
                                </svg> <label for="" style="padding-left: 12px;font-size: 16px;color: white;">Se ha
                                    procesado las caracteristicas del producto</label>
                            </div>
                            <div class="modal-body">
                                <p>Realiza los pagos a nuestras cuentas:</p><br>
                                <p class="margin-bottom-30">
                                    {{count($precioAdicional)!=0?$precioAdicional[6]->precio:''}} </p>

                                <div class="alert alert-primary" role="alert"
                                    style="display: flex;color: #ffffff;background: #808080;">

                                    <svg style="font-size: 30px;" width="1em" height="1em" viewBox="0 0 16 16"
                                        class="bi bi-exclamation-circle" fill="currentColor"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                        <path
                                            d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z" />
                                    </svg>
                                    @if (auth()->check())
                                    @if (Auth::user()->oferta_estado==1)
                                    <input type="hidden" id="validar_precio" value="{{Auth::user()->oferta_precio}}" />
                                    <label for="" style="padding-left: 12px;font-size: 16px;color:#ffffff;">
                                        Usted ya tiene un Descuento del % {{Auth::user()->oferta_precio}} . Monto a
                                        pagar: <strong id="valorDescuento"></strong></label>
                                    @else
                                    <label for="" style="padding-left: 12px;font-size: 16px;color:#ffffff;">
                                        Obten un descuento %29.99 de oferta, si eres profesional. !Registrate</label>
                                    @endif
                                    @else
                                    <label for="" style="padding-left: 12px;font-size: 16px;color:#ffffff;">
                                        Obten un descuento %29.99 de oferta, si eres profesional. Registrate!</label>
                                    @endif

                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Registrate</button>
                            </div>
                        </div>
                    </div>
                </div>




            </div>
    </section>
    <?php } ?>

</div>
@endsection

@section('footer_page')

<script>
// :::::::::::::::::::::::::::::::: AGREGAR PRECIOS ::::::::::::::::::::::::::::::::::::::::
$("input[name=check_armado_mueble]").change(function(e) {
    if ($("input[name=check_armado_mueble]").prop('checked')) {
        let rest1 = parseFloat($('#txt_monto_total_').text().replace(",", "")) + parseFloat($(this).val());
        $('#txt_monto_total_').text(rest1.toFixed(2))
    } else {
        let rest2 = parseFloat($('#txt_monto_total_').text().replace(",", "")) - parseFloat($(this).val());
        $('#txt_monto_total_').text(rest2.toFixed(2))
    }
});

$("input[name=check_instalacion_mueble]").change(function(e) {
    if ($("input[name=check_instalacion_mueble]").prop('checked')) {
        let rest1 = parseFloat($('#txt_monto_total_').text().replace(",", "")) + parseFloat($(this).val());
        $('#txt_monto_total_').text(rest1.toFixed(2))
    } else {
        let rest2 = parseFloat($('#txt_monto_total_').text().replace(",", "")) - parseFloat($(this).val());
        $('#txt_monto_total_').text(rest2.toFixed(2))
    }
});


// :::::::::::::::::::::::::::::::: CAMBIAR CANTIDAD ::::::::::::::::::::::::::::::::::::::::
$(document).ready(function() {

    if ($('#validar_precio').val()) {
        let valorDel = parseFloat($('#txt_monto_total_').text().replace(",", "")) - (parseFloat($(
            '#validar_precio').val()) / 100) * parseFloat($('#txt_monto_total_').text().replace(",", ""));
        $('#valorDescuento').text('€ ' + valorDel.toFixed(2))
    }


    <?php for($i=1;$i<20;$i++){?>
    $('#upCart<?php echo $i;?>').on('change keyup', function() {
        var newqty = $('#upCart<?php echo $i;?>').val(); //numero de productos
        var rowId = $('#rowId<?php echo $i;?>').val(); //id del producto
        var proId = $('#proId<?php echo $i;?>').val(); //id de la base de datos

        console.log(newqty)
        console.log(rowId)
        console.log(proId)

        if (newqty <= 0) {
            alert('enter only valid qty')
        } else {
            $.ajax({
                type: 'get',
                dataType: 'html',
                url: '<?php echo url('/cart/update');?>/' + proId,
                data: "qty=" + newqty + "& rowId=" + rowId + "& proId=" + proId,
                success: function(response) {
                    $('#updateDiv').html(response);
                }
            });
        }
    });
    <?php } ?>
});

// ::::::::::::::::::::::::::::::ABRIR MODAL N# CUENTA ::::::::::::::::::::::::::::::::::::::::
function openModalCuenta() {
    $('#exampleModalLong').modal(true)
}
</script>

@endsection