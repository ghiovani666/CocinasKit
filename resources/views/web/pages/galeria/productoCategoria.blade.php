@extends('web.layouts.base')

<!-- Titulo de la página -->
@section('title_page')
<title>Inmonut</title>
@endsection

<!-- Contenido en el Head de la pagina -->
@section('head_page')
<!-- extras -->

@endsection

<!-- Contenido en el Body -->
@section('content')
<!--=== Content Part ===-->
<!--//==Page Header Start==//-->
<div class="page-header black-overlay">
    <div class="container breadcrumb-section">
        <div class="row pad-s15">
            <div class="col-md-12">
                <h2>Composición</h2>
                <div class="clear"></div>
                <div class="breadcrumb-box">
                    <ul class="breadcrumb">
                        <li>
                            <a href="index.html">Inicio</a>
                        </li>
                        <li class="active">Lista de Ofertas</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--//==Page Header End==//-->

<!--//=========product Page Start=========//-->
<section class="wa-products-main padTB100">
    <div class="container">
        <div class="row">

            <!--features_items-->
            <b> Total Productos</b>: {{$Products->total()}}
            <h2 class="title text-center">
                <?php
                        if (isset($msg)) {
                            echo $msg;
                        } else {
                            ?>
                <?php if(!empty($Products[0]->names)) { ?>
                <div id="filters-container" class="cbp-l-filters-text content-xs">
                    <div class="header-v5" style="background: black;margin-bottom: 25px;position: unset;">
                        <h1 style="margin-bottom: 15px;color: white;padding: 15px 0px 0px 0px;text-align: center;">

                            <?php echo $Products[0]->names ?>

                        </h1>
                    </div>
                </div>
                <?php }else{echo "";}?>
                <?php } ?>
            </h2>

            <?php if ($Products->isEmpty()) { ?>
            Lo siento, Productos no encontrados
            <?php } else {
                
                $countP=0;?>

            {{ csrf_field() }}
            <div id="post_data"></div>

            <?php } ?>
        </div>
    </div>

</section>
</div>
<!--/end container-->
@endsection

@section('footer_page')

@endsection

@push('scripts')
<script>
$(document).ready(function() {
    var _token = $('input[name="_token"]').val();
    load_data('', _token);
    function load_data(id = "", _token) {
        $.ajax({
            url: "/productCategoryLoad",
            method: "POST",
            data: {
                id: id,
                _token: _token
            },
            success: function(data) {
                $('#load_more_button').remove();
                $('#post_data').append(data);
            }
        })
    }
    $(document).on('click', '#load_more_button', function() {
        var id = $(this).data('id');
        $('#load_more_button').html('<b>Loading...</b>');
        load_data(id, _token);
    });
});
/*  //INFINITY SCROLLING SCROLL
  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
  $(document).ready(function() {
      var limit = 6;
      var start = 0;
      var action = 'inactive';
      function loadData(limit, start) {
          $.ajax({
              url: "/loadmore",
              method: "POST",
              data: {
                  limit: limit,
                  start: start
              },
              cache: false,
              success: function(data) {
                  $('#load_data').append(data);
                  if (data == '') {
                      $('#load_data_message').html(
                          "<div style='width: 100%;background:#fff;border-radius: 8px;padding:1px;margin-top: 10px;'><p style='text-align: center;font-weight: bold;'>End</p></div>'"
                          );
                      action = 'active';
                  } else {
                      $('#load_data_message').html(
                          "<div style='width: 100%;background:#fff;border-radius: 8px;padding:1px;margin-top: 10px;'><p style='text-align: center;font-weight: bold;'>Loading</p></div>'"
                          );
                      action = "inactive";
                  }
              }
          });
      }
      if (action == 'inactive') {
          action = 'active';
          loadData(limit, start);
      }
      $(window).scroll(function() {
          if ($(window).scrollTop() + $(window).height() > $("#load_data").height() && action ==
              'inactive') {
              action = 'active';
              start = start + limit;
              setTimeout(function() {
                  loadData(limit, start);
              }, 1000);
          }
      });
  });
  */
</script>
@endpush