

 <!-- Favicon -->
 <link rel="shortcut icon" href="assets/img/logo_cocina_2.jpg">
<!-- Web Fonts -->
<link rel='stylesheet' type='text/css'
    href='//fonts.googleapis.com/css?family=Open+Sans:400,300,600&amp;subset=cyrillic,latin'>
<!-- CSS Global Compulsory -->
<link rel="stylesheet" href="{{ URL::asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ URL::asset('assets/css/shop.style.css') }}">
<!-- CSS Header and Footer -->
<link rel="stylesheet" href="{{ URL::asset('assets/css/headers/header-v5.css') }}">
<link rel="stylesheet" href="{{ URL::asset('assets/css/footers/footer-v1.css') }}">
<!-- CSS Implementing Plugins -->
<link rel="stylesheet" href="{{ URL::asset('assets/plugins/animate.css') }}">
<link rel="stylesheet" href="{{ URL::asset('assets/plugins/line-icons/line-icons.css') }}">
<link rel="stylesheet" href="{{ URL::asset('assets/plugins/font-awesome/css/font-awesome.min.css') }}">
<link rel="stylesheet" href="{{ URL::asset('assets/plugins/scrollbar/css/jquery.mCustomScrollbar.css') }}">
<!-- CSS Customization -->
<link rel="stylesheet" href="{{ URL::asset('assets/css/custom.css') }}">

<style>
    .dont-render-dawg {
        position: absolute;
        height: 0;
        width: 0;
    }

    .main-nav {
        background: #eee;
    }

    .main-nav ul {
        margin: 0;
        padding: 0;
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        list-style: none;
    }

    .main-nav a {
        padding: 0.25rem 0.25rem;
        font-size: 1.6rem;
        max-width: 140px;
        font-weight: bold;
        text-decoration: none;
        display: flex;
        align-items: flex-start;
        color: #333;
    }

    .main-nav a:hover,
    .main-nav a:focus {
        background: #ccc;
        color: black;
    }

    .main-nav a:hover svg,
    .main-nav a:focus svg {
        fill: green;
    }

    .main-nav a:hover span,
    .main-nav a:focus span {
        color: black;
    }

    .main-nav span {
        display: block;
        font-size: 1rem;
        font-weight: normal;
        color: #888;
        margin: 0.25rem 0 0 0;
    }

    .main-nav .icon {
        width: 40px;
        height: 40px;
        float: left;
        margin-right: 1rem;
        fill: #999;
    }

    .main-nav.outlines * {
        outline: 1px solid rgba(255, 0, 0, 0.5);
    }

    .options {
        text-align: center;
        padding: 2rem 0;
    }

    .options select {
        margin-right: 2rem;
    }

    @media (min-width: 1000px) {
        .main-nav a {
            max-width: 500px;
            font-size: 2rem;
        }

        .main-nav .icon {
            width: 25px;
            height: 25px;
        }
    }

    @media (max-width: 991px) {
        #inlineFrameExample {
            width: 330px !important;
        }
    }
</style>
<!-- CSS Theme -->

<link rel="stylesheet" href="{{ URL::asset('assets/css/theme-colors/default.css') }}">
<link rel="stylesheet" href="{{ URL::asset('styles.css') }}">
<link rel="stylesheet" href="{{ URL::asset('styles_letra.css') }}">
<link rel="stylesheet" href="{{ URL::asset('assets/css/shop.style.css') }}">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Oswald:400,700" type="text/css" media="all">

<link rel="stylesheet" href="{{ URL::asset('THIS/assets/css/style.css') }}">

<!-- Toastr -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">