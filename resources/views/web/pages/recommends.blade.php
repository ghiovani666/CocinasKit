<?php
        $products1 = DB::table('recommends')
                ->leftJoin('products','recommends.pro_id','products.id')
                ->join('imagen', 'products.id', '=', 'imagen.id_product')
                ->join('medida', 'imagen.id_medida', '=', 'medida.id_medida')
                //->select('pro_id','pro_name','url_image','price', DB::raw('count(*) as total'))
                ->select('recommends.pro_id','products.pro_name','imagen.url_image','medida.price')
                // ->groupBy('pro_id','pro_name','url_image','price')
                // ->orderby('total','DESC')
                ->take(3)
                ->get();
        if(Auth::check()){
        $products2 = DB::table('recommends')
                ->leftJoin('products','recommends.pro_id','products.id')
                ->join('imagen', 'products.id', '=', 'imagen.id_product')
                ->join('medida', 'imagen.id_medida', '=', 'medida.id_medida')
                ->where('uid',Auth::user()->id)
                ->inRandomOrder()
                ->take(3)
                ->get();
        }else{
        $products2 = DB::table('recommends')
                ->leftJoin('products','recommends.pro_id','products.id')
                ->join('imagen', 'products.id', '=', 'imagen.id_product')
                ->join('medida', 'imagen.id_medida', '=', 'medida.id_medida')
                ->inRandomOrder()
                ->take(3)
                ->get();
        }    
    ?>
        <!--=== Illustration v2 ===-->
        <div class="heading heading-v1 margin-bottom-20">
            <div class="header-v5" style="background: black;margin-bottom: 25px;position: unset;">
                <h1 style="margin-bottom: 15px;color: white;padding: 15px 0px 0px 0px;text-align: center;">
                    PRODUCTO QUE TE PUEDE GUSTAR</h1>
            </div>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed odio elit, ultrices vel cursus
                sed,
                placerat ut leo. Phasellus in magna erat. Etiam gravida convallis augue non tincidunt. Nunc
                lobortis
                dapibus neque quis lacinia. Nam dapibus tellus sit amet odio venenatis</p>
        </div>
        <div class="illustration-v2 margin-bottom-60">
            <div class="customNavigation margin-bottom-25">
                <a class="owl-btn prev rounded-x"><i class="fa fa-angle-left"></i></a>
                <a class="owl-btn next rounded-x"><i class="fa fa-angle-right"></i></a>
            </div>

            <ul class="list-inline owl-slider-v4">

            @foreach($products1 as $p)
                <li class="item active" style="margin: 1em !important;">
                    <a href="{{url('/product_details_')}}/{{$p->pro_id}}"><img style="height: 245px;" class="img-responsive"
                            src="{{$p->url_image}}"
                            alt=""></a>
                    <div class="product-description-v2">
                        <div class="margin-bottom-5">
                            <h4 class="title-price" style="font: inherit;padding-left: 20px; width: 190px;white-space: nowrap;text-overflow: ellipsis;overflow: hidden;"><a href="{{url('/product_details_')}}/{{$p->pro_id}}">{{$p->pro_name}}</a></h4>
                            <span class="title-price">${{$p->price}}</span>
                           
                            
                        </div>
                        <ul class="list-inline product-ratings">
                            <li><i class="rating-selected fa fa-star"></i></li>
                            <li><i class="rating-selected fa fa-star"></i></li>
                            <li><i class="rating-selected fa fa-star"></i></li>
                            <li><i class="rating fa fa-star"></i></li>
                            <li><i class="rating fa fa-star"></i></li>
                        </ul>
                        <br/>
                        <ul class="list-inline product-ratings">
                            <li><a href="{{url('/product_details_')}}/{{$p->pro_id}}" class="btn btn-default"><i class="fa fa-shopping-cart"></i>Add to cart</a></li>
                        </ul>
                    </div>
                    <span class="title-price"></span>
                </li>
                @endforeach
                @foreach($products2 as $p)
                <li class="item active" style="margin: 1em !important;">
                    <a href="{{url('/product_details_')}}/{{$p->pro_id}}"><img style="height: 245px;" class="img-responsive"
                            src="{{$p->url_image}}"
                            alt=""></a>
                    <div class="product-description-v2">
                        <div class="margin-bottom-5">
                            <h4 class="title-price" style="font: inherit;padding-left: 20px; width: 190px;white-space: nowrap;text-overflow: ellipsis;overflow: hidden;"><a href="{{url('/product_details_')}}/{{$p->pro_id}}">{{$p->pro_name}}</a></h4>
                            <span class="title-price">${{$p->price}}</span>
                            <a href="{{url('/product_details_')}}/{{$p->pro_id}}" class="btn btn-default add-to-cart"><i
                                    class="fa fa-shopping-cart"></i>Agregar al Carro</a>
                        </div>
                        <ul class="list-inline product-ratings">
                            <li><i class="rating-selected fa fa-star"></i></li>
                            <li><i class="rating-selected fa fa-star"></i></li>
                            <li><i class="rating-selected fa fa-star"></i></li>
                            <li><i class="rating fa fa-star"></i></li>
                            <li><i class="rating fa fa-star"></i></li>
                        </ul>
                        <br/>
                        <ul class="list-inline product-ratings">
                            <li><a href="{{url('/product_details_')}}/{{$p->pro_id}}" class="btn btn-default"><i class="fa fa-shopping-cart"></i>Agregar al Carro</a></li>
                        </ul>
                    </div>
                </li>
                @endforeach

            </ul>
        </div>
        <!--=== End Illustration v2 ===-->