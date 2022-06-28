<style>
@media (max-width: 998px) {
    .header-v5 .navbar-brand {
        margin-top: 0px;
    }
}

.header-v5 .navbar-default .navbar-toggle .icon-bar {
    background: #fff;
}

.main-nav ul {
    justify-content: left;
}

@media (min-width: 768px) {
    .container_menus {
        width: auto !important;
    }
}

.header-v5 .navbar-default .navbar-nav>li>a {
    color: #ffffff;
    /* font-size: 16px; */
    font-weight: 900;
    text-transform: uppercase;
}

@media (min-width: 992px) {

    .header-v5 .navbar-default .navbar-nav>li>a:hover,
    .header-v5 .navbar-default .navbar-nav>.active>a {
        border-top: solid 2px #ffdfc0 !important;
    }

    .header-v5 .navbar-default .navbar-nav>li:hover>a {
        color: #048aa2 !important;
    }

    #peque_logo {
        display: none;
    }
}


@media (max-width: 991px) {
    #logo_cocina {
        display: none;
    }

    .header-v5 .navbar {
        margin-top: unset;
    }
}


@media (min-width: 992px) {

    .header-v5 .dropdown-menu .active>a,
    .header-v5 .dropdown-menu li>a:hover {
        color: #fff;
        background: #85888a !important;
        filter: none !important;
        /* width: 120%; */

    }

    .over_items:hover {
        color: #fff !important;
    }
}
</style>

<!--=== Header v5 ===-->
<div class="header-v5 header-static margin-bottom-30">
    <div class="topbar-v3" style="background: #13756f;padding: 14px 0;">
        <div class="search-open">
            <div class="container">
                <input type="text" class="form-control" placeholder="Search">
                <div class="search-close"><i class="icon-close"></i></div>
            </div>
        </div>

        <div id="toop_bar_ancho" class="container">
            <div class="row">
                <div class="col-sm-6">
                    <!-- Topbar Navigation -->
                    <ul class="left-topbar">
                        <li><i class="search fa fa-clock-o"></i>
                            <a style="font-size: 14px;">
                                L - V :10:00 a 01:30 / 05:00 a 08:00</a>
                        </li>
                        <li>|
                            <a href="/contacto" style="font-size: 14px;">CONTACTO </a>
                        </li>
                    </ul>
                </div>
                <div class="col-sm-6">
                    <ul class="list-inline right-topbar pull-right">
                        <?php if (Auth::check()) { ?>
                        <li>
                            <a style="font-size: 14px;" href="{{url('/')}}/profile"><i class="fa fa-user"></i>
                                {{ucwords(Auth::user()->name)}}</a> |
                            <a style="font-size: 14px;" href="/logout">Logout</a>
                        </li>
                        <?php } else { ?>
                        <li><a style="font-size: 14px;" href="{{url('/')}}/login_register">Iniciar Sesión</a></li>
                        <?php } ?>


                        <li> | <a style="font-size: 14px;" href="#" onclick="openModal_areaProfesional()"> Área
                                Profesional</a></li>
                        <!-- <a style="font-size: 14px;" href="/lista_deseo">Lista de Deseos</a></li> -->
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                aria-haspopup="true" aria-expanded="true"><i class="fa fa-shopping-cart"></i>
                                <span class="badge">{{Cart::count()}}</span></a>

                            <ul class="dropdown-menu" style="margin-left: -250px;">
                                <p align="center" class="pull-left" style="font-weight:bold; margin:5px">
                                    <i class="fa fa-shopping-cart"></i>
                                    <span class="badge">{{Cart::count()}}</span>
                                </p>


                                <p align="center" class="pull-right" style="font-weight:bold; margin:5px">Total:
                                    <span style="color:green">{{Cart::subtotal()}}</span>
                                </p>

                                <?php $cartData = Cart::content();?>
                                @if(count($cartData)!=0)
                                @foreach($cartData as $cartD)
                                <div class="col-md-12" style="padding:5px">

                                    <div class="col-sm-5">
                                        <img src="{{$cartD->options->img}}" style="width:80%" />
                                    </div>
                                    <div class="col-sm-7">
                                        <h6 style="margin:0px;text-transform: lowercase;"><span>{{$cartD->name}}</span>
                                        </h6>
                                        <p>Precio: {{$cartD->price}} Cantidad: {{$cartD->qty}}</p>
                                    </div>
                                </div>
                                @endforeach
                                <br> <br>
                                <div class="row">
                                    <div class="col-md-5 pull-left">
                                        <a href="{{url('/cart')}}"
                                            style="padding:5px; color:#fff; background-color:orange">Comprar</a>
                                    </div>
                                    @endif
                            </ul>
                        </li>

                        <li><i class="search fa fa-search search-button"></i></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Navbar -->
    <div class="navbar navbar-default mega-menu" role="navigation" style="background: #ffffff;">

        <div id="logo_cocina" class="nav navbar-nav" style="margin-bottom: 20px;margin-top: 20px;">
            <a href="/"><img style="width: 345px;" id="logo_cocinsa"
                    src="{{ URL::asset('assets/img/logo_cocina_2.jpg') }}" alt="Logo"></a>
        </div>

        <div class="container container_menus">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse"
                    data-target=".navbar-responsive-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a id="peque_logo" class="navbar-brand" href="index.php">
                    <img id="logo-header" src="{{ URL::asset('assets/img/logo_response.png') }}" alt="Logo">
                </a>
            </div>
        </div>
        <div class="collapse navbar-collapse navbar-responsive-collapse" style="background: rgb(0 0 0);">
            <!-- Nav Menu -->
            <ul class="nav navbar-nav">
                @include('web.partials.header.1_modulo_kit')

            </ul>
        </div>
    </div>
</div>

<!-- Modal Modelo de Puerta -->
<div class="modal fade" id="md_areaProfesional" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">FORMULARIO DE ÁREA PROFESIONAL</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="updateDivPrincipal">


                <form method="POST" action="{{url('/enviar_email_informacion')}}">

                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <strong>Nombre o Empresa</strong>
                                <input type="text" name="txt_nombre" id="txt_nombre" class="form-control"
                                    placeholder="Nombre">

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <strong>Email:</strong>
                                <input type="text" name="txt_email" id="txt_email" class="form-control"
                                    placeholder="Email">

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <strong>Teléfono:</strong>
                                <input type="text" name="txt_telefono" id="txt_telefono" class="form-control"
                                    placeholder="Teléfono">

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <strong>Asunto:</strong>
                                <input type="text" name="txt_asunto" id="txt_asunto" class="form-control"
                                    placeholder="Asunto">

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <strong>Mensaje:</strong>
                                <textarea name="txt_descripcion" id="txt_descripcion" rows="3"
                                    class="form-control"></textarea>

                            </div>
                        </div>
                    </div>

                    <div class="form-group text-center">
                        <button class="btn btn-success btn-submit">Enviar Ahora</button>
                    </div>
                </form>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
            </div>
        </div>
    </div>
</div>


@push('scripts')
<script>
//::::::::::::::::::::: MODAL AREA ROFESIONAL
function openModal_areaProfesional() {
    $('#md_areaProfesional').modal(true)
}
</script>
@endpush