@extends('web.base')

<!-- Titulo de la página -->
@section('title_page')
<title>Cocinas Innova</title>
@endsection

<!-- Contenido en el Head de la pagina -->
@section('head_page')
<!-- extras -->


@endsection

<!-- Contenido en el Body -->
@section('content')
<div class="container">


    <style>
    table td {
        padding: 10px
    }
    </style>
    <section id="cart_items">
        <div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="{{url('/')}}">Home</a></li>
                    <li class="active">Mi Perfil</li>
                </ol>
            </div>
            <!--/breadcrums-->

            <div class="row">
                @include('web.pages.profile.menu')
                <div class="col-md-8">
                    <h3><span style='color:green'>{{ucwords(Auth::user()->name)}}</span>, Bienvenido</h3>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@section('footer_page')

  
    
@endsection