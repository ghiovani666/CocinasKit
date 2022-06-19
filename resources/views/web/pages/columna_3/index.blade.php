<div class="col-xs-12 col-md-4">

<!--=== ACABADO DEL MUEBLE ===-->
@if($Products[0]->id_cat==11)
    @include('web.pages.acce_informativo')
    @elseif($Products[0]->id_cat==12)
    @include('web.pages.acce_informativo')
    @elseif($Products[0]->id_cat==13)
    @include('web.pages.acce_informativo')
    @else
    @include('web.pages.acce_normales')
@endif
@if($Products[0]->id_cat!=1 && $Products[0]->id_cat!=11 && $Products[0]->id_cat!=12 && $Products[0]->id_cat!=13)
    @include('web.pages.component.mueble_completo.acabados_mueble')
@endif

<!--=== PAGOS ===-->
<div class="product_attributes clearfix margin-bottom-30">
    <h3 class="cko_pb_center_column_title" style="background: #6f6f6f;">PAGO </h3>
    <h3 class="cko_pb_right_column_title">Procesar pedido</h3>
    <div class="cko_procesar_pedido"
        style="height: <?php echo $resultado =((($Products[0]->id_cat==5 || $Products[0]->id_cat==6 || $Products[0]->id_cat==7 )?140:($Products[0]->id_cat==8 || $Products[0]->id_cat==9 || $Products[0]->id_cat==10 || $Products[0]->id_cat==16 ))?'unset':120); ?>px;">

        <div class="form-group">
            <div class="row">
                <div class="col-sm-6">
                    <label for="qty">Cantidad</label>
                    <input type="number" name="txt_cantidad_precio" class="form-control"
                        size="2" value="1" id="txt_cantidad_precio" autocomplete="off"
                        MIN="1" MAX="30">
                </div>
                <div class="col-sm-6">
                    <label for="formGroupExampleInput">TOTAL €</label>
                    <input style="text-align: center;pointer-events: none;"
                        name="costo_total" id="costo_total" type="text"
                        class="form-control" />
                    <input type="hidden" name="cost_total_hide" id="cost_total_hide" />

                </div>
            </div>
        </div>
        <button style="background: #13756f" class="btn btn-primary btn-lg btn-block"
            id="addToCart"> <i class="fa fa-shopping-cart"></i>
            Añadir al Carrito
        </button><br />
        <input type="hidden" value="<?php echo $Products[0]->id; ?>" id="proDum" />
    </div>
</div>

@if($Products[0]->id_cat!=11 && $Products[0]->id_cat!=12 && $Products[0]->id_cat!=13)
    @include('web.pages.acce_informativo')
@endif

</div>