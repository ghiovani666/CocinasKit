<!DOCTYPE html>
<html>
<head class="printArea">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- Titulo de la página -->
    <title>Tucocinakit</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Default CSS -->
    @section('head')
        @include('web.partials.head')
    @show

    <!-- CSS Page para las paginas a instanciar -->
    @yield('head_page')

</head>

<body class="header-fixed">
<!-- style="background: #d7dede;" -->
    <div class="wrapper" >
        <!-- Header para todas las paginas -->
        @include('web.partials.header')
  
        @yield('content')
        <!-- Footer para todas las paginas -->
        @include('web.partials.footer')
    </div>

    <!-- Codigo JS para todas las paginas -->
    @include('web.partials.footer_js')

    @yield('footer_page')

    @stack('scripts')
</body>

</html>
