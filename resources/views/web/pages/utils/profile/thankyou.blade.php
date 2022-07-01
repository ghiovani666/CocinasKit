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
    <h1 align="center">{{Auth::user()->name}} Gracias</h1>

    <div class="alert alert-success">
        <p class="panel-body"> Su orden ha sido puesta</p><br>
        <span><a href="{{url('/')}}/orders" class="btn btn-success btn-small"> Ir Ordenes</a></span>
    </div>


</div>
@endsection

@section('footer_page')

@endsection