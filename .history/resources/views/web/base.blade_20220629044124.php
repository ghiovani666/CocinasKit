<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    @yield('title_page')
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




<style type="text/css">


.slider {
  position: relative;
}

.slider-image {
      padding: 30px;
    width: initial!important;
  display: block!important;
}

.slider img {
  object-fit: cover;
  width: 100%;
}

.slick-prev, .slick-next {
  position: absolute;
  top: 50%;
  z-index: 99;
  width: 50px;
  height: 50px;
}

.slick-next {
  right: 2rem;
}

.slick-prev {
  left: 2rem;
}

.slick-prev.slick-disabled:before, .slick-next.slick-disabled:before{
  opacity: 1;
}

.slick-prev:before, .slick-next:before {
  font-size:50px;
}

</style>



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
