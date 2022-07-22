@extends('web.layouts.base')

<!-- Titulo de la página -->
@section('title_page')
<title>Inmonut</title>
@endsection

<!-- Contenido en el Head de la pagina -->
@section('head_page')
<!-- extras -->

<!-- Template Main CSS File -->
<link rel="stylesheet" href="{{ URL::asset('template_inmonut/assets/vendor/icofont/icofont.min.css') }}" />
<link rel="stylesheet" href="{{ URL::asset('template_inmonut/assets/vendor/boxicons/css/boxicons.min.css') }}" />
<link rel="stylesheet" href="{{ URL::asset('template_inmonut/assets/vendor/animate.css/animate.min.css') }}" />
<link rel="stylesheet" href="{{ URL::asset('template_inmonut/assets/vendor/venobox/venobox.css') }}" />
<link rel="stylesheet" href="{{ URL::asset('template_inmonut/assets/css/gallery.css') }}" />


@endsection

<!-- Contenido en el Body -->
@section('content')
<!--=== Content Part ===-->

<!--//==Page Header Start==//-->
<div class="page-header black-overlay">
    <div class="container breadcrumb-section">
        <div class="row pad-s15">
            <div class="col-md-12">
                <h2>Galería de Imagenes</h2>
                <div class="clear"></div>
                <div class="breadcrumb-box">
                    <ul class="breadcrumb">
                        <li>
                            <a href="index.html">Inicio</a>
                        </li>
                        <li class="active">Galería</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--//==Page Header End==//-->

<section class="page_single portfoio">
    <div class="container">


        <!-- ======= Portfoio Section ======= -->
        <section id="portfolio" class="portfoio">
            <div class="container" data-aos="fade-up">
            <input type="hidden" value="{{$idMenu}}" name="txt_id_menu" id="txt_id_menu">


                <div class="section-title">
                    <h1 style="text-transform: uppercase;"> {{ $nombreGaleria }} </h1>
                    <p style="font-family: Lato, Sans-Serif;font-size: 1.89rem;">Estos son nuestros productos mas
                        destacados, la cual usted puede seleccionar nuestra gran variedad de modelos y recreaciones.</p>
                </div>
                {{ csrf_field() }}
                <div id="post_data"></div>
                <div class="clear"></div>

        </section>

    </div>
</section>


<!--/end container-->
@endsection


@push('scripts')
<script>
$(document).ready(function() {
    var _token = $('input[name="_token"]').val();
    let txt_id_menu = $('input[name="txt_id_menu"]').val();
    console.log(txt_id_menu)
    
    load_data('', _token,txt_id_menu);
    function load_data(id = "", _token,txt_id_menu) {
        $.ajax({
            url: "/galeriaLoad",
            method: "POST",
            data: {
                id: id,
                _token: _token,
                txt_id_menu:txt_id_menu
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
        load_data(id, _token,txt_id_menu_);
    });
});
</script>
@endpush

@section('footer_page')
<!-- js Galeria -->
<script type="text/javascript" src="{{ URL::asset('template_inmonut/assets/vendor/venobox/venobox.min.js') }}"></script>
<script type="text/javascript"
    src="{{ URL::asset('template_inmonut/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('template_inmonut/assets/js/contacts.js') }}"></script>
@endsection