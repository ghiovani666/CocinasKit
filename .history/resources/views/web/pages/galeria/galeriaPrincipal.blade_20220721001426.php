@extends('web.base')
<!-- Contenido en el Head de la pagina -->
@section('head_page')
<!-- extras -->
<link rel="stylesheet" href="{{ URL::asset('assets/plugins/owl-carousel/owl-carousel/owl.carousel.css') }}">
<link rel="stylesheet"
    href="{{ URL::asset('THIS/assets/plugins/cube-portfolio/cubeportfolio/css/cubeportfolio.min.css') }}">
<link rel="stylesheet"
    href="{{ URL::asset('THIS/assets/plugins/cube-portfolio/cubeportfolio/custom/custom-cubeportfolio.css') }}">

<link rel="stylesheet" href="../../themes/warehouse/cache/v_615_8a6bf2d4042c5d2bd53744de401f69c6_all.css"
    type="text/css" media="all" />
<script type="text/javascript">
var cko_cookie_info = '{"cko_colorInteriorMueble":4,"cko_colorAcabadoPuerta":2,"cko_canto":2,"cko_modeloTirador":5}';
</script>

<link rel="stylesheet" href="{{ URL::asset('css/product_details.css') }}">

@endsection

<!-- Contenido en el Body -->
@section('content')

<!-- <div class="container" style="width: 100%;max-width: 1190px;"> -->
<div class="container" style="width: 100%; max-width: 1080px;">
    <div class="row content-inner">
        <div id="center_column" class="center_column col-xs-12 col-sm-12 col-sm-push-0">
            <div itemscope itemtype="https://schema.org/Product">
                <div class="cocinakit-mueble-general cocinakit-mueble-kit primary_block row ">

                    <div class="container" data-aos="fade-up">
                        <input type="hidden" value="{{$idMenu}}" name="txt_id_menu" id="txt_id_menu">


                        <div class="section-title">
                            <h1 style="text-transform: uppercase;"> {{ $nombreGaleria }} </h1>
                            <p style="font-family: Lato, Sans-Serif;font-size: 1.89rem;">Estos son nuestros
                                productos mas
                                destacados, la cual usted puede seleccionar nuestra gran variedad de modelos
                                y recreaciones.</p>
                        </div>
                        {{ csrf_field() }}
                        <div id="post_data"></div>
                        <div class="clear"></div>


                    </div>
                </div>
            </div>
        </div>



    </div>

    @endsection

    @section('footer_page')

    <!-- --------------------------------------LISTA DE PRODUCTOS----------- -->
    <script src="{{ URL::asset('THIS/assets/plugins/cube-portfolio/cubeportfolio/js/jquery.cubeportfolio.min.js') }}">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-zoom/1.7.20/jquery.zoom.min.js"></script>
    <script src="{{ URL::asset('THIS/assets/js/plugins/cube-portfolio/cube-portfolio-4.js') }}"></script>

    <script>
    $(document).ready(function() {
        var _token = $('input[name="_token"]').val();
        let txt_id_menu = $('input[name="txt_id_menu"]').val();
        console.log(txt_id_menu)

        load_data('', _token, txt_id_menu);

        function load_data(id = "", _token, txt_id_menu) {
            $.ajax({
                url: "/galeriaLoad",
                method: "POST",
                data: {
                    id: id,
                    _token: _token,
                    txt_id_menu: txt_id_menu
                },
                success: function(data) {
                    $('#load_more_button').remove();
                    $('#post_data').append(data);
                }
            })
        }
        $(document).on('click', '#load_more_button', function() {
            var id = $(this).data('id');
            let txt_id_menu_ = $('input[name="txt_id_menu"]').val();
            $('#load_more_button').html('<b>Loading...</b>');
            load_data(id, _token, txt_id_menu_);
        });
    });
    </script>

    <!--flex slider-->
    <script src="{{ URL::asset('THIS/assets_2/js/jquery.flexslider.js') }}"></script>
    <script src="{{ URL::asset('themes/warehouse/cache/v_726_15810251d95ac88cec9fad9fb952e72e.js') }}"></script>

    @endsection