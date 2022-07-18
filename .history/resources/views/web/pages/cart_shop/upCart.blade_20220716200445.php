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
                            <h3><a href="{{url('/product_details_')}}/{{$cartItem->id}}">{{$cartItem->name}}</a>
                            </h3>

                        </div>

                        <div class="prodTotal cartSection">
                            <div class="cart_quantity_button">
                                <input type="hidden" id="rowId<?php echo $count;?>" value="{{$cartItem->rowId}}" />
                                <input type="hidden" id="proId<?php echo $count;?>" value="{{$cartItem->id}}" />

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

        <div class="promoCode">
            <?php  
                            $precioAdicional = DB::select("SELECT * FROM mc_precio_adicional c");                                   
                        ?>

            <div class="form-check" style="display: flex;width: 140%;">
                <input class="form-check-input" style="margin-right: 12px;" type="checkbox"
                    value="{{count($precioAdicional)!=0?$precioAdicional[0]->precio:0}}" name="check_armado_mueble">
                <label class="form-check-label" for="check_armado_mueble" style="padding-top: 10px;">
                    Armado
                    del mueble € {{count($precioAdicional)!=0?$precioAdicional[0]->precio:0}}
                </label>
                <input class="form-check-input" style="margin-right: 12px;" type="checkbox"
                    value="{{count($precioAdicional)!=0?$precioAdicional[1]->precio:0}}"
                    name="check_instalacion_mueble">
                <label class="form-check-label" for="check_instalacion_mueble" style="padding-top: 10px;">
                    Instalación del mueble €
                    {{count($precioAdicional)!=0?$precioAdicional[1]->precio:0}}
                </label>
            </div>

        </div>

        <div class="subtotal cf">
            <ul>
                <li class="totalRow"><span class="label">Subtotal</span><span class="value">€
                        {{Cart::subtotal()}}</span></li>
                <li class="totalRow"><span class="label">Costo de Envio €</span><span class="value"><span
                            id="monto_text1"> 00.00</span></span>
                </li>
                <li class="totalRow final margin-bottom-30"><span class="label">Total €</span><span class="value"><span
                            id="txt_monto_total_"> {{Cart::subtotal()}}</span></span>
                </li>
                <li class="totalRow">
                    <a href="{{ URL::previous() }}">
                        <button type="submit" class="btn btn-danger" style="font-size: 25px;"> <i
                                class="glyphicon glyphicon-chevron-left" aria-hidden="true"></i>
                            Regresar</button>
                    </a>
                    <input type="hidden" name="monto_pagar" id="monto_pagar" value="{{Cart::subtotal()}}">
                    <input type="hidden" name="txt_pagos" id="txt_pagos">
                    <input type="hidden" name="txt_persona" id="txt_persona">
                    <button type="submit" class="btn btn-info" style="font-size: 25px;">Enviar
                        Pago <i class="fa fa-check" aria-hidden="true"></i></button>

                </li>
            </ul>
        </div>


    </div>
</div>

<script>
$(document).ready(function() {
    <?php for($i=1;$i<20;$i++){?>
    $('#upCart<?php echo $i;?>').on('change keyup', function() {
        var newqty = $('#upCart<?php echo $i;?>').val();
        var rowId = $('#rowId<?php echo $i;?>').val();
        var proId = $('#proId<?php echo $i;?>').val();
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
//--------------CAMBIO DE LOS BOTONES
const valor = parseFloat($('#monto_pagar').val()).toFixed(2)




$("input[name=check_instalacion_mueble]").change(function(e) {
    let val_1 = $(this).val();
    if ($("input[name=check_instalacion_mueble]").prop('checked')) {
        $('#txt_monto_total_').text(parseFloat($('#txt_monto_total_').text()) + parseFloat(val_1).toFixed(2))
    } else {
        $('#txt_monto_total_').text(parseFloat($('#txt_monto_total_').text()) - parseFloat(val_1).toFixed(2))
    }
});

$("input[name=check_armado_mueble]").change(function(e) {
    let val_2 = $(this).val();
    if ($("input[name=check_armado_mueble]").prop('checked')) {
        $('#txt_monto_total_').text(parseFloat($('#txt_monto_total_').text()) + parseFloat(val_2).toFixed(2))
    } else {
        $('#txt_monto_total_').text(parseFloat($('#txt_monto_total_').text()) - parseFloat(val_2.toFixed(2)))
    }
});
</script>