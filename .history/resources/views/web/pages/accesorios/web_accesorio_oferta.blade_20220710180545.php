@extends('web.base')

<!-- Contenido en el Head de la pagina -->
@section('head_page')
<!-- extras -->
<link href="{{asset('theme/css/main_cocina.css')}}" rel="stylesheet">
<link href="{{asset('theme/css/price-range.css')}}" rel="stylesheet">
<link href="{{asset('theme/css/jquery-ui.css')}}" rel="stylesheet">
@endsection

<!-- Contenido en el Body -->
@section('content')
<!--=== Content Part ===-->
<div class="content container">
    <div class="row">

        <section>
            <div class="container">
                <div class="row">

                    <div class="col-sm-12 padding-right" id="updateDiv">

                        <div class="features_items">

                            <h2 class="title text-center">

                         
                            <input type="hidden" />
                            <div class="col-sm-3">



                            </div>

                        </div>
                        <ul class="pagination">
                           
                        
                        </ul>
                    </div>
                </div>
            </div>
    </div>
    </section>

</div>
<!--/end row-->
</div>
<!--/end container-->
@endsection

@section('footer_page')
<script>

</script>

@endsection