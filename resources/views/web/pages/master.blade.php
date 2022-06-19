<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Cocinas Innova</title>
    <link href="{{asset('theme/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('theme/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('theme/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{asset('theme/css/price-range.css')}}" rel="stylesheet">
    <link href="{{asset('theme/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('theme/css/main.css')}}" rel="stylesheet">
    <link href="{{asset('theme/css/responsive.css')}}" rel="stylesheet">
    <link href="{{asset('theme/css/jquery-ui.css')}}" rel="stylesheet">
    <!--[if lt IE         9]>
            <script src="js/html5shiv.js"></script>
            <script src="js/respond.min.js"></script>
            <![endif]-->
    <link rel="shortcut icon" href="{{asset('theme/images/ico/favicon.ico')}}">
    <link rel="apple-touch-icon-precomposed" sizes="144x144"
        href="{{url('../')}}/theme/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114"
        href="{{url('../')}}/theme/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72"
        href="{{url('../')}}/theme/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="{{url('../')}}/theme/images/ico/apple-touch-icon-57-precomposed.png">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <style>
    .brandLi {
        padding: 10px;
    }

    .brandLi b {
        font-size: 16px;
        color: #FE980F
    }
    </style>




    <script>
    $(function() {
        $("#slider-range").slider({
            range: true,
            min: 0,
            max: 100,
            values: [15, 65],
            slide: function(event, ui) {

                $("#amount_start").val(ui.values[0]);
                $("#amount_end").val(ui.values[1]);
                var start = $('#amount_start').val();
                var end = $('#amount_end').val();

                $.ajax({
                    type: 'get',
                    dataType: 'html',
                    url: '',
                    data: "start=" + start + "& end=" + end,
                    success: function(response) {
                        console.log(response);
                        $('#updateDiv').html(response);
                    }
                });
            }
        });

        $('.try').click(function() {

            //alert('hardeep');

            var brand = [];
            $('.try').each(function() {
                if ($(this).is(":checked")) {

                    brand.push($(this).val());
                }
            });
            Finalbrand = brand.toString();

            $.ajax({
                type: 'get',
                dataType: 'html',
                url: '',
                data: "brand=" + Finalbrand,
                success: function(response) {
                    console.log(response);
                    $('#updateDiv').html(response);
                }
            });

        });
    });

    <?php $pros = DB::table('products')->get();?>

    $(function() {

        var source = [
            @foreach($pros as $pro) {
                value: "<?php echo url('/');?>/product_details/<?php echo $pro->id;?>",
                label: "<?php echo $pro->pro_name;?>"
            },
            @endforeach

        ];

        $("#proList").autocomplete({

            source: source,
            select: function(event, ui) {
                window.location.href = ui.item.value;
            }
        });

    });
    </script>

</head>
<!--/head-->

<body>
    <header id="header">
        <!--header-->
    

        <div class="header-middle">
            <!--header-middle-->
            <div class="container">
                <div class="row">

                    <div class="col-sm-8">
                        <div class="shop-menu pull-right">
                            <ul class="nav navbar-nav">
                                <?php if (Auth::check()) { ?>
                                <li><a href="{{url('/')}}/profile"><i
                                            class="fa fa-user"></i>{{ucwords(Auth::user()->name)}}</a></li>
                                <?php } ?>
                                <li><a href="#"><i class="fa fa-star"></i> Wishlist <span
                                            style="color:green; font-weight: bold">({{App\wishList::count()}})</span>
                                    </a></li>
                                <li><a href="{{url('/checkout')}}"><i class="fa fa-crosshairs"></i> Checkout</a></li>


                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                        aria-haspopup="true" aria-expanded="true"><i class="fa fa-shopping-cart"></i>
                                        <span class="badge">{{Cart::count()}}</span></a>
                                    <ul class="dropdown-menu">
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
                                                <h4 style="margin:0px;">{{$cartD->name}}</h4>
                                                <p>price: {{$cartD->price}} qty: {{$cartD->qty}}</p>
                                            </div>
                                        </div>
                                        @endforeach
                                        <br> <br>
                                        <div class="row">
                                            <div class="col-md-5 pull-left">
                                                <a href="{{url('/checkout')}}"
                                                    style="padding:5px; color:#fff; background-color:orange">Checkout</a>
                                            </div>

                                            <div class="col-md-5 pull-right">
                                                <a href="{{url('/cart')}}"
                                                    style="padding:5px; color:#fff; background-color:blueviolet">View
                                                    Cart</a>
                                            </div>
                                            @endif
                                    </ul>
                                </li>


                                <?php if (Auth::check()) { ?>
                                <li><a href="{{url('/logout')}}"><i class="fa fa-lock"></i> Logout</a></li>
                                <?php } else { ?>
                                <li><a href="{{url('/login_register')}}"><i class="fa fa-lock"></i> Login</a></li>
                                <?php } ?>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/header-middle-->

     
    </header>
    <!--/header-->
    @yield('content')

    <script src="{{asset('theme/js/bootstrap.min.js')}}"></script>
</body>

</html>