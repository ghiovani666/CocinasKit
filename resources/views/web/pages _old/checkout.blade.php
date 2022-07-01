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
<div class="container">

    <section id="cart_items">
        <div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="{{url('/')}}/cart">Carrito</a></li>
                    <li class="active">Procesar Pedido</li>
                </ol>
            </div>
            <!--/breadcrums-->
            <!-- <h2 class="heading">Pago Online o Depósito Bancario: <strong>€ {{$monto}} </strong> </h2> -->


              
                <div class="shopper-informations">
                    <div class="row">


                        @if($txt_persona=="3" && $txt_pagos=="1")
                        
                        <form action="{{url('/paypal/pay')}}" method="get">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="monto_pagar" id="monto_pagar" value="{{$monto}}">

                            <input type="hidden" name="txt_pagos" value="{{$txt_pagos}}"/>
                            <input type="hidden" name="txt_persona" value="{{$txt_persona}}"/>

                            <div class="step-one">
                                <h2 class="heading">Pago por Paypal: <strong>€ {{$monto}} </strong> </h2>
                            </div>
                            <div class="col-sm-6">

                                <div class="shopper-info">
                                    <!-- <p>Detalle de la Facturación</p> -->
                                    <p>Persona quien Realiza el Pedido</p>
                                    <hr>
                                    <input type="text" name="txt_nombre" placeholder="Nombre (*)" class="form-control">
                                    <span style="color:red">{{ $errors->first('txt_nombre') }}</span>
                                    <hr>
                                    <input type="text" placeholder="Apellido (*)" name="txt_apellido" class="form-control">
                                    <span style="color:red">{{ $errors->first('txt_apellido') }}</span>
                                    <hr>
                                    <input type="text" name="txt_razon" placeholder="Razon Social o Empresa"
                                        class="form-control">

                                    <hr>
                                    <input type="text" name="txt_dni" placeholder="Número de Identificación (*)"
                                        class="form-control">
                                    <span style="color:red">{{ $errors->first('txt_dni') }}</span>
                                    <hr>
                                    <input type="text" placeholder="Telefono/Celular (*)" name="txt_cell"
                                        class="form-control">
                                    <span style="color:red">{{ $errors->first('txt_cell') }}</span>
                                    <hr>
                                    <input type="text" placeholder="Provincia de Facturación (*)" name="txt_fac"
                                        class="form-control">
                                    <span style="color:red">{{ $errors->first('txt_fac') }}</span>
                                    <hr>
                                    <select name="txt_contry" class="form-control">
                                        <option selected="selected">Seleccione Pais (*)</option>
                                        <option value="United States">United States</option>
                                        <option value="Canada">Canada</option>
                                        <option value="España">España</option>
                                    </select>
                                    <span style="color:red">{{ $errors->first('txt_contry') }}</span>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <p style="font-size: 20px;">Datos Finales</p>
                                <hr>
                                <div class="order-message">
                                    <p>Orden de envío</p>
                                    <textarea style="height: unset !important;" name="txt_message"
                                        placeholder="Notas sobre su pedido, notas especiales para la entrega"
                                        rows="4"></textarea>
                                </div>
                                <div class="form-check" style="display: flex;">
                                    <input class="form-check-input" style="margin-right: 12px;" type="checkbox" value="1"
                                        name="txt_acepto1">
                                    <label class="form-check-label" for="txt_acepto1"> Entiendo y Acepto que ante la
                                        situación excepcional que atraviesa el pais, mi pedido puede demorar hasta 3 semanas
                                        en estar preparado.
                                    </label>
                                </div>
                                <hr>
                                <div class="form-check" style="display: flex;">
                                    <input class="form-check-input" style="margin-right: 12px;" type="checkbox" value="1"
                                        id="txt_acepto2">
                                    <label class="form-check-label" for="txt_acepto2"> Acepto informar el pago mediante el
                                        sitio web antes de la fecha de vencimiento de mi reserva y comprendo que de no
                                        hacerlo mi pedido sera dado de baja teniendo que devolver a realizar uno nuevo con
                                        los precios y stock actualizados.ss
                                    </label>
                                </div>
                            </div>

                            <!-- Stack the columns on mobile by making one full-width and the other half-width -->
                            <div class="row" style="margin-bottom: 45px;margin-top: 45px;">
                                <div class="col-sm-6">
                                    <input style="font-size: 17px;" type="submit" value="PAGAR PAYPAL"
                                        class="btn btn-primary" id="cashbtn" />
                                </div>
                            </div>
                        </form>

                        @elseif($txt_persona=="4" && $txt_pagos=="1")
                        <form action="{{url('/paypal/pay')}}" method="get">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="monto_pagar" id="monto_pagar" value="{{$monto}}">

                            <input type="hidden" name="txt_pagos" value="{{$txt_pagos}}"/>
                            <input type="hidden" name="txt_persona" value="{{$txt_persona}}"/>

                        <div class="step-one">
                            <h2 class="heading">Pago por Paypal: <strong>€ {{$monto}} </strong> </h2>
                        </div>
                        <div class="col-sm-6">


                            <div class="shopper-info">
                                <!-- <p>Detalle de la Facturación</p> -->
                                <p>Persona quien Realiza el Pedido</p>
                                <hr>
                                <input type="text" name="txt_nombre" placeholder="Nombre (*)" class="form-control">
                                <span style="color:red">{{ $errors->first('txt_nombre') }}</span>
                                <hr>
                                <input type="text" placeholder="Apellido (*)" name="txt_apellido" class="form-control">
                                <span style="color:red">{{ $errors->first('txt_apellido') }}</span>
                                <hr>
                                <input type="text" name="txt_razon" placeholder="Razon Social o Empresa"
                                    class="form-control">

                                <hr>
                                <input type="text" name="txt_dni" placeholder="Número de Identificación (*)"
                                    class="form-control">
                                <span style="color:red">{{ $errors->first('txt_dni') }}</span>
                                <hr>
                                <input type="text" placeholder="Telefono/Celular (*)" name="txt_cell"
                                    class="form-control">
                                <span style="color:red">{{ $errors->first('txt_cell') }}</span>
                                <hr>
                                <input type="text" placeholder="Provincia de Facturación (*)" name="txt_fac"
                                    class="form-control">
                                <span style="color:red">{{ $errors->first('txt_fac') }}</span>
                                <hr>
                                <select name="txt_contry" class="form-control">
                                    <option selected="selected">Seleccione Pais (*)</option>
                                    <option value="United States">United States</option>
                                    <option value="Canada">Canada</option>
                                    <option value="España">España</option>
                                </select>
                                <span style="color:red">{{ $errors->first('txt_contry') }}</span>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <p style="font-size: 20px;">Persona quien Recibe el Pedido</p>
                            <hr>
                            <input type="text" placeholder="Apellido de quien recibe(*)" name="r_txt_apellido"
                                class="form-control">
                            <span style="color:red">{{ $errors->first('r_txt_apellido') }}</span>
                            <hr>
                            <input type="text" placeholder="Calle (*)" name="txt_calle" class="form-control">
                            <span style="color:red">{{ $errors->first('txt_calle') }}</span>
                            <hr>
                            <input type="text" placeholder="Altura (*)" name="txt_altura" class="form-control">
                            <span style="color:red">{{ $errors->first('txt_altura') }}</span>
                            <hr>
                            <input type="text" placeholder="Piso (*)" name="txt_piso" class="form-control">
                            <hr>
                            <input type="text" placeholder="Departamento/Unidad" name="txt_departament"
                                class="form-control">
                            <hr>
                            <input type="text" placeholder="Torre" name="txt_torre" class="form-control">
                            <hr>
                            <input type="text" placeholder="Entre Calles (*)" name="txt_entre_calle"
                                class="form-control">
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <hr>
                                <div class="order-message">
                                    <p>Orden de envío</p>
                                    <textarea style="height: unset !important;" name="txt_message"
                                        placeholder="Notas sobre su pedido, notas especiales para la entrega"
                                        rows="4"></textarea>
                                </div>
                                <div class="form-check" style="display: flex;">
                                    <input class="form-check-input" style="margin-right: 12px;" type="checkbox"
                                        value="1" name="txt_acepto1">
                                    <label class="form-check-label" for="txt_acepto1"> Entiendo y Acepto que ante la
                                        situación excepcional que atraviesa el pais, mi pedido puede demorar hasta 3
                                        semanas en estar preparado.
                                    </label>
                                </div>
                                <hr>
                                <div class="form-check" style="display: flex;">
                                    <input class="form-check-input" style="margin-right: 12px;" type="checkbox"
                                        value="1" id="txt_acepto2">
                                    <label class="form-check-label" for="txt_acepto2"> Acepto informar el pago mediante
                                        el sitio web antes de la fecha de vencimiento de mi reserva y comprendo que de
                                        no hacerlo mi pedido sera dado de baja teniendo que devolver a realizar uno
                                        nuevo con los precios y stock actualizados.
                                    </label>
                                </div>

                            </div>
                            </div>
                            <!-- Stack the columns on mobile by making one full-width and the other half-width -->
                            <div class="row" style="margin-bottom: 45px;margin-top: 45px;">
                                <div class="col-sm-6">
                                    <input style="font-size: 17px;" type="submit" value="PAGAR PAYPAL"
                                        class="btn btn-primary" id="cashbtn" />
                                </div>
                            </div>
                        </form>

                        @elseif($txt_persona=="3" && $txt_pagos=="2")
                        <form action="{{url('/')}}/formvalidate" method="post">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <input type="hidden" name="txt_pagos" value="{{$txt_pagos}}"/>
                            <input type="hidden" name="txt_persona" value="{{$txt_persona}}"/>

                            <div class="step-one">
                                <h2 class="heading">Pago por Transferecia Bancario: <strong>€ {{$monto}} </strong> </h2>
                            </div>
                            <div class="col-sm-6">

                                <div class="shopper-info">
                                    <!-- <p>Detalle de la Facturación</p> -->
                                    <p>Persona quien Realiza el Pedido</p>
                                    <hr>
                                    <input type="text" name="txt_nombre" placeholder="Nombre (*)" class="form-control">
                                    <span style="color:red">{{ $errors->first('txt_nombre') }}</span>
                                    <hr>
                                    <input type="text" placeholder="Apellido (*)" name="txt_apellido" class="form-control">
                                    <span style="color:red">{{ $errors->first('txt_apellido') }}</span>
                                    <hr>
                                    <input type="text" name="txt_razon" placeholder="Razon Social o Empresa"
                                        class="form-control">

                                    <hr>
                                    <input type="text" name="txt_dni" placeholder="Número de Identificación (*)"
                                        class="form-control">
                                    <span style="color:red">{{ $errors->first('txt_dni') }}</span>
                                    <hr>
                                    <input type="text" placeholder="Telefono/Celular (*)" name="txt_cell"
                                        class="form-control">
                                    <span style="color:red">{{ $errors->first('txt_cell') }}</span>
                                    <hr>
                                    <input type="text" placeholder="Provincia de Facturación (*)" name="txt_fac"
                                        class="form-control">
                                    <span style="color:red">{{ $errors->first('txt_fac') }}</span>
                                    <hr>
                                    <select name="txt_contry" class="form-control">
                                        <option selected="selected">Seleccione Pais (*)</option>
                                        <option value="United States">United States</option>
                                        <option value="Canada">Canada</option>
                                        <option value="España">España</option>
                                    </select>
                                    <span style="color:red">{{ $errors->first('txt_contry') }}</span>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <p style="font-size: 20px;">Datos Finales</p>
                                <hr>
                                <div class="order-message">
                                    <p>Orden de envío</p>
                                    <textarea style="height: unset !important;" name="txt_message"
                                        placeholder="Notas sobre su pedido, notas especiales para la entrega"
                                        rows="4"></textarea>
                                </div>
                                <div class="form-check" style="display: flex;">
                                    <input class="form-check-input" style="margin-right: 12px;" type="checkbox" value="1"
                                        name="txt_acepto1">
                                    <label class="form-check-label" for="txt_acepto1"> Entiendo y Acepto que ante la
                                        situación excepcional que atraviesa el pais, mi pedido puede demorar hasta 3 semanas
                                        en estar preparado.
                                    </label>
                                </div>
                                <hr>
                                <div class="form-check" style="display: flex;">
                                    <input class="form-check-input" style="margin-right: 12px;" type="checkbox" value="1"
                                        id="txt_acepto2">
                                    <label class="form-check-label" for="txt_acepto2"> Acepto informar el pago mediante el
                                        sitio web antes de la fecha de vencimiento de mi reserva y comprendo que de no
                                        hacerlo mi pedido sera dado de baja teniendo que devolver a realizar uno nuevo con
                                        los precios y stock actualizados.ss
                                    </label>
                                </div>

                                <hr>
                                    <p>Subir Comprobante</p>
                                    <hr>
                                    <input type="file" placeholder="" name="txt_file" class="form-control" />
                                    <div class="alert alert-secondary" role="alert">
                                        Realiza tu pago directamente en nuestra cuenta bancaria. Por favor usa la referencia
                                        del
                                        pedido como referencia de pago. El pedido no será enviado hasta que el importe
                                        completo
                                        haya
                                        sido recibido en nuestra cuenta.
                                    </div>
                                    <hr>



                            </div>
                            
                            <!-- Stack the columns on mobile by making one full-width and the other half-width -->
                            <div class="row" style="margin-bottom: 45px;margin-top: 45px;">
                                <div class="col-sm-6">
                                    <input style="font-size: 17px;" type="submit" value="ENVIAR ORDEN"
                                        class="btn btn-primary" id="cashbtn" />
                                </div>
                            </div>
                        </form>

                        @elseif($txt_persona=="4" && $txt_pagos=="2")
                        <form action="{{url('/')}}/formvalidate" method="post">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <input type="hidden" name="txt_pagos" value="{{$txt_pagos}}"/>
                            <input type="hidden" name="txt_persona" value="{{$txt_persona}}"/>

                            <div class="step-one">
                                <h2 class="heading">Pago por Transferecia Bancario: <strong>€ {{$monto}} </strong> </h2>
                            </div>
                            <div class="col-sm-6">


                                <div class="shopper-info">
                                    <!-- <p>Detalle de la Facturación</p> -->
                                    <p>Persona quien Realiza el Pedido</p>
                                    <hr>
                                    <input type="text" name="txt_nombre" placeholder="Nombre (*)" class="form-control">
                                    <span style="color:red">{{ $errors->first('txt_nombre') }}</span>
                                    <hr>
                                    <input type="text" placeholder="Apellido (*)" name="txt_apellido" class="form-control">
                                    <span style="color:red">{{ $errors->first('txt_apellido') }}</span>
                                    <hr>
                                    <input type="text" name="txt_razon" placeholder="Razon Social o Empresa"
                                        class="form-control">

                                    <hr>
                                    <input type="text" name="txt_dni" placeholder="Número de Identificación (*)"
                                        class="form-control">
                                    <span style="color:red">{{ $errors->first('txt_dni') }}</span>
                                    <hr>
                                    <input type="text" placeholder="Telefono/Celular (*)" name="txt_cell"
                                        class="form-control">
                                    <span style="color:red">{{ $errors->first('txt_cell') }}</span>
                                    <hr>
                                    <input type="text" placeholder="Provincia de Facturación (*)" name="txt_fac"
                                        class="form-control">
                                    <span style="color:red">{{ $errors->first('txt_fac') }}</span>
                                    <hr>
                                    <select name="txt_contry" class="form-control">
                                        <option selected="selected">Seleccione Pais (*)</option>
                                        <option value="United States">United States</option>
                                        <option value="Canada">Canada</option>
                                        <option value="España">España</option>
                                    </select>
                                    <span style="color:red">{{ $errors->first('txt_contry') }}</span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <p style="font-size: 20px;">Persona quien Recibe el Pedido</p>
                                <hr>
                                <input type="text" placeholder="Apellido de quien recibe(*)" name="r_txt_apellido"
                                    class="form-control">
                                <span style="color:red">{{ $errors->first('r_txt_apellido') }}</span>
                                <hr>
                                <input type="text" placeholder="Calle (*)" name="txt_calle" class="form-control">
                                <span style="color:red">{{ $errors->first('txt_calle') }}</span>
                                <hr>
                                <input type="text" placeholder="Altura (*)" name="txt_altura" class="form-control">
                                <span style="color:red">{{ $errors->first('txt_altura') }}</span>
                                <hr>
                                <input type="text" placeholder="Piso (*)" name="txt_piso" class="form-control">
                                <hr>
                                <input type="text" placeholder="Departamento/Unidad" name="txt_departament"
                                    class="form-control">
                                <hr>
                                <input type="text" placeholder="Torre" name="txt_torre" class="form-control">
                                <hr>
                                <input type="text" placeholder="Entre Calles (*)" name="txt_entre_calle"
                                    class="form-control">
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <hr>
                                    <div class="order-message">
                                        <p>Orden de envío</p>
                                        <textarea style="height: unset !important;" name="txt_message"
                                            placeholder="Notas sobre su pedido, notas especiales para la entrega"
                                            rows="4"></textarea>
                                    </div>
                                    <div class="form-check" style="display: flex;">
                                        <input class="form-check-input" style="margin-right: 12px;" type="checkbox"
                                            value="1" name="txt_acepto1">
                                        <label class="form-check-label" for="txt_acepto1"> Entiendo y Acepto que ante la
                                            situación excepcional que atraviesa el pais, mi pedido puede demorar hasta 3
                                            semanas en estar preparado.
                                        </label>
                                    </div>
                                    <hr>
                                    <div class="form-check" style="display: flex;">
                                        <input class="form-check-input" style="margin-right: 12px;" type="checkbox"
                                            value="1" id="txt_acepto2">
                                        <label class="form-check-label" for="txt_acepto2"> Acepto informar el pago mediante
                                            el sitio web antes de la fecha de vencimiento de mi reserva y comprendo que de
                                            no hacerlo mi pedido sera dado de baja teniendo que devolver a realizar uno
                                            nuevo con los precios y stock actualizados.
                                        </label>
                                    </div>
                                    <hr>
                                    <p>Subir Comprobante</p>
                                    <hr>
                                    <input type="file" placeholder="" name="txt_file" class="form-control" />
                                    <div class="alert alert-secondary" role="alert">
                                        Realiza tu pago directamente en nuestra cuenta bancaria. Por favor usa la referencia
                                        del
                                        pedido como referencia de pago. El pedido no será enviado hasta que el importe
                                        completo
                                        haya
                                        sido recibido en nuestra cuenta.
                                    </div>
                                    <hr>

                                </div>
                            </div>
                            <!-- Stack the columns on mobile by making one full-width and the other half-width -->
                            <div class="row" style="margin-bottom: 45px;margin-top: 45px;">
                                <div class="col-sm-6">
                                    <input style="font-size: 17px;" type="submit" value="ENVIAR ORDEN"
                                        class="btn btn-primary" id="cashbtn" />
                                </div>
                            </div>
                        </form>
                        @endif
                        </form>
                    </div>
                </div>


          
    </section>
    <!--/#cart_items-->


</div>
@endsection

@section('footer_page')
<script>
// $('#paypalbtn').hide();
//  $('#cashbtn').hide();

$(':radio[id=paypal]').change(function() {
    $('#paypalbtn').show();
    $('#cashbtn').hide();

});

$(':radio[id=cash]').change(function() {
    $('#paypalbtn').hide();
    $('#cashbtn').show();

});
</script>
@endsection