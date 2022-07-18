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
                    <button type="submit" class="btn btn-info" style="font-size: 25px;">Enviar
                        Pago <i class="fa fa-check" aria-hidden="true"></i></button>

                </li>
            </ul>
        </div>


    </div>
</div>

<!-- Modal Numero Cuenta -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="border: unset !important;">
            <div class="alert" role="alert" style="display: flex;background: #13756f;color: white;">
                <svg style="font-size: 30px;" width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-check-circle"
                    fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                    <path fill-rule="evenodd"
                        d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.236.236 0 0 1 .02-.022z" />
                </svg> <label for="" style="padding-left: 12px;font-size: 16px;color: white;">Producto
                    agregado al
                    carro</label>
            </div>
            <div class="modal-body">
                <p>¿Quieres agregar un servicio de armado o instalación?</p><br>
                <p class="margin-bottom-30">Seleccione la opción "Ir al carro de compras" y agregue
                    los servicios de armado o instalación.
                    Arma tu presupuesto de inmediato y lo gestionaremos en breve.
                </p>

                <div class="alert alert-primary" role="alert" style="display: flex;color: #ffffff;background: #808080;">

                    <svg style="font-size: 30px;" width="1em" height="1em" viewBox="0 0 16 16"
                        class="bi bi-exclamation-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                        <path
                            d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z" />
                    </svg>
                    <label for="" style="padding-left: 12px;font-size: 16px;color:#ffffff;">
                        Programa el servicio escribiendo a:
                        programatuservicio@tucocinakit.es Cobertura: Madrid
                        -España</label>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Ver más
                    Productos</button>
                <a class="btn btn-danger" href="{{url('/cart')}}"><i class="fa fa-shopping-cart" aria-hidden="true"></i>
                    Ir al Carro de Compras</a>
            </div>
        </div>
    </div>
</div>


<script>
// :::::::::::::::::::::::::::::::: AGREGAR PRECIOS ::::::::::::::::::::::::::::::::::::::::
$("input[name=check_armado_mueble]").change(function(e) {
    if ($("input[name=check_armado_mueble]").prop('checked')) {
        let rest1 = parseFloat($('#txt_monto_total_').text()) + parseFloat($(this).val());
        $('#txt_monto_total_').text(rest1.toFixed(2))
    } else {
        let rest2 = parseFloat($('#txt_monto_total_').text()) - parseFloat($(this).val());
        $('#txt_monto_total_').text(rest2.toFixed(2))
    }
});

$("input[name=check_instalacion_mueble]").change(function(e) {
    if ($("input[name=check_instalacion_mueble]").prop('checked')) {
        let rest1 = parseFloat($('#txt_monto_total_').text()) + parseFloat($(this).val());
        $('#txt_monto_total_').text(rest1.toFixed(2))
    } else {
        let rest2 = parseFloat($('#txt_monto_total_').text()) - parseFloat($(this).val());
        $('#txt_monto_total_').text(rest2.toFixed(2))
    }
});


// :::::::::::::::::::::::::::::::: CAMBIAR CANTIDAD ::::::::::::::::::::::::::::::::::::::::
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