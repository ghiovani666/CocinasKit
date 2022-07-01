@extends('web.base')

<!-- Titulo de la página -->
@section('title_page')
<title>Tu cocinakit</title>
@endsection

<!-- Contenido en el Head de la pagina -->
@section('head_page')
<!-- extras -->
<link rel="stylesheet" href="{{ URL::asset('assets/plugins/owl-carousel/owl-carousel/owl.carousel.css') }}">
<link rel="stylesheet"
    href="{{ URL::asset('THIS/assets/plugins/cube-portfolio/cubeportfolio/css/cubeportfolio.min.css') }}">
<link rel="stylesheet"
    href="{{ URL::asset('THIS/assets/plugins/cube-portfolio/cubeportfolio/custom/custom-cubeportfolio.css') }}">

<link rel="stylesheet" href="../../themes/warehouse/cache/v_615_8a6bf2d4042c5d2bd53744de401f69c6_all.css"
    type="text/css" media="all" />
<script type="text/javascript">
var cko_cookie_info = '{"cko_colorInteriorMueble":4,"cko_colorAcabadoPuerta":2,"cko_canto":2,"cko_modeloTirador":5}';
</script>

<link rel="stylesheet" href="{{ URL::asset('css/product_details.css') }}">


<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax.libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">


<style type="text/css">
 @import url('https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900&display=swap');

*{
    font-family: 'Poppins', sans-serif;
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

.post-slider{
    position: relative;
}
.post-slider .next{
    position: absolute;
    top:50%;
    right: 30px;
    font-size: 2em;
    color: #2980B9;
    cursor: pointer;
}
.post-slider .prev{
    position: absolute;
    top:50%;
    left: 30px;
    font-size: 2em;
    color:#2980B9;
    cursor: pointer;
}
.post-slider .post-wrapper{
    width: 84%;
    height: 350px;
    margin:0px auto;
    overflow: hidden;
    padding:10px 0px 10px 0px;
}
.post-slider .post-wrapper .post{
    height: 300px;
    width: 330px;
    margin:0px 10px;
    display: inline-block;
    background: #6DD5FA;
    border-radius: 5px;
    box-shadow: 1rem 1rem 1rem -1rem #a0a0a033;
}
.post-slider .post-wrapper .post .post-info{
    height: 130px;
    padding: 0px 5px;
}
.post-slider .post-wrapper .post .slider-image{
    width: 100%;
    height: 200px;
    border-top-left-radius: 5px;
    border-top-right-radius: 5px;
}
.post-slider h4{
    padding:5px;
    font-family: Arial, Helvetica, sans-serif;
    color:#fff
}
.post-slider a{
    text-decoration: none;
    color: inherit;
}
.page-wrapper a:hover{
    color:black;
}

/* FILTRE BOUTON */
 
section{
  padding: 20px;
  margin: 40px auto;
}
section ul{
    display: flex;
    margin-bottom: 10px;
}
section ul li{
    list-style: none;
    background: #eee;
    padding: 8px 20px;
    margin: 8px;
    letter-spacing: 1px;
    cursor: pointer;
}
section ul li.active{
    background: #2980B9;
}
section ul li:hover{
    background: #2980B9;
}

</style>
@endsection

<!-- Contenido en el Body -->
@section('content')

<!-- <div class="container" style="width: 100%;max-width: 1190px;"> -->
<div class="container" style="width: 100%; max-width: 1080px;">
    <div class="row content-inner">
        <div id="center_column" class="center_column col-xs-12 col-sm-12 col-sm-push-0">
            <div itemscope itemtype="https://schema.org/Product">
                <div class="cocinakit-mueble-general cocinakit-mueble-kit primary_block row ">

                    <input type="hidden" value="{{session()->has('message') ? session()->get('message') : false}}"
                        id="txt_modal" name="txt_modal" />

                    <!--=== COLUMNA 1 ===-->
                    <div class="col-xs-12 show-right-info col-md-4">
                        <div class="product-title">
                            <h1 itemprop="name" style="background-color: #6f6f6f !important;">
                                <?php echo ucwords($Products[0]->pro_name); ?></h1>
                        </div>
                        <!-- Master Slider -->
                        <div class="master-slider ms-skin-default" id="masterslider">
                            <div class="flexslider" id="updateDiv">
                                <div class="zoom" id="produto">
                                    <img src="{{ $Products[0]->url_image }}" id="txt_imagenPrincipal" width="500px"
                                        style="height: 287px;" />
                                </div>
                            </div>
                            @if($Products[0]->id_cat==1)
                            <div class="txt_modelo">
                                <?php  
                                    $imagen = DB::table('imagen')
                                    ->leftJoin('medida', 'imagen.id_imagen', '=', 'medida.id_imagen')
                                    ->where('imagen.id_product', '=',$Products[0]->id)
                                    ->get();
                                    ?>

                                <div style="display: flex;">
                                    @foreach($imagen as $altImg)
                                    <label class="radio-img" data-toggle="tooltip" data-placement="top"
                                        title="{{$altImg->description}}">
                                        <input type="radio" value="{{$altImg->price}}-{{$altImg->id_imagen}}"
                                            onclick="imagenPrincipal('{{$altImg->url_image}}')" />
                                        <img style="width: 70px;" src="{{$altImg->url_image}}">
                                    </label>
                                    @endforeach
                                </div>
                            </div>
                            @endif
                        </div>
                        <div id="cko_producto_bottom">
                            <div id="cko_foto_producto_bottom">
                                <a id="ver_3D_full" href="#!" onclick="imagenFunction()"><i class="icon-plus"></i></a>
                                <div class="zoomsection"> ZOOM <i class="fa fa-search-plus" aria-hidden="true"></i>
                                </div>
                            </div>
                            <div id="short_description_block" style="margin-top: 20px;">
                                <div id="short_description_content" class="align_justify" itemprop="description">
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#detalleModal">
                                        Ver más detalles
                                    </button>
                                </div>
                            </div>
                            <ul id="usefull_link_block" class="clearfix no-print" style="margin-top: 20px;">
                                <li class="print"> <a href="javascript:print();"> Imprimir </a></li>
                            </ul>
                        </div>

                        @if($Products[0]->id_cat==5)
                        @include('web.mueble_completo.pages.component.pf_puertas')
                        @elseif($Products[0]->id_cat==6)
                        @include('web.mueble_completo.pages.component.pf_unero')
                        @elseif($Products[0]->id_cat==7)
                        @include('web.mueble_completo.pages.component.pf_vitrina')
                        @else
                        @if($Products[0]->id_cat!=1 && $Products[0]->id_cat!=11 && $Products[0]->id_cat!=12 &&
                        $Products[0]->id_cat!=13
                        && $Products[0]->id_cat!=15
                        && $Products[0]->id_cat!=2
                        && $Products[0]->id_cat!=3
                        && $Products[0]->id_cat!=4
                        )


                        <!--=== TIRADORES ===-->
                        <div class="product_attributes margin-bottom-10">
                            <h3 class="cko_pb_center_column_title" style="background: #6f6f6f;">TIRADORES
                            </h3>
                            <?php  
                                    $modeloTirador = DB::table('mc_tirador')->get();
                                    $modeloConUnero = DB::table('mc_tirador_unero')->get();
                                ?>
                            <fieldset style="height: 400px;">

                                <div id="exTab1">
                                    <ul class="nav nav-pills">
                                        <li class="active">
                                            <a href="#1a" data-toggle="tab">Con tirador</a>
                                        </li>
                                        <li><a href="#2a" data-toggle="tab">Con uñero</a>
                                        </li>
                                    </ul>

                                    <div class="tab-content clearfix">
                                        <div class="tab-pane active" id="1a">


                                            <div class="col-8 col-sm-6">
                                                <div style="display: flex;">
                                                    @foreach($modeloTirador as $item)
                                                    @if($item->orden==1)
                                                    <label class="radio-img" data-toggle="tooltip" data-placement="top"
                                                        title="{{$item->descripcion}}">
                                                        <input type="radio" name="modelo_puertas"
                                                            value="{{$item->id}}" />
                                                        <img style="width: 60px;height: 67px;"
                                                            src="{{$item->url_image}}">
                                                    </label>
                                                    @endif
                                                    @endforeach
                                                </div>

                                                <div style="display: flex;">
                                                    @foreach($modeloTirador as $item)
                                                    @if($item->orden==2)
                                                    <label class="radio-img" data-toggle="tooltip" data-placement="top"
                                                        title="{{$item->descripcion}}">
                                                        <input type="radio" name="modelo_puertas"
                                                            value="{{$item->id}}" />
                                                        <img style="width: 60px;height: 67px;"
                                                            src="{{$item->url_image}}">
                                                    </label>
                                                    @endif
                                                    @endforeach
                                                </div>

                                                <div style="display: flex;">
                                                    @foreach($modeloTirador as $item)
                                                    @if($item->orden==3)
                                                    <label class="radio-img" data-toggle="tooltip" data-placement="top"
                                                        title="{{$item->descripcion}}">
                                                        <input type="radio" name="modelo_puertas"
                                                            value="{{$item->id}}" />
                                                        <img style="width: 60px;height: 67px;"
                                                            src="{{$item->url_image}}">
                                                    </label>
                                                    @endif
                                                    @endforeach
                                                </div>

                                                <div style="display: flex;">
                                                    @foreach($modeloTirador as $item)
                                                    @if($item->orden==4)
                                                    <label class="radio-img" data-toggle="tooltip" data-placement="top"
                                                        title="{{$item->descripcion}}">
                                                        <input type="radio" name="modelo_puertas"
                                                            value="{{$item->id}}" />
                                                        <img style="width: 60px;height: 67px;"
                                                            src="{{$item->url_image}}">
                                                    </label>
                                                    @endif
                                                    @endforeach
                                                </div>

                                                <div style="display: flex;">
                                                    @foreach($modeloTirador as $item)
                                                    @if($item->orden==5)
                                                    <label class="radio-img" data-toggle="tooltip" data-placement="top"
                                                        title="{{$item->descripcion}}">
                                                        <input type="radio" name="modelo_puertas"
                                                            value="{{$item->id}}" />
                                                        <img style="width: 60px;height: 67px;"
                                                            src="{{$item->url_image}}">
                                                    </label>
                                                    @endif
                                                    @endforeach
                                                </div>


                                            </div>
                                            <div class="col-4 col-sm-6">
                                                <div id="txt_tirador_puerta" style="text-align: center;"></div>
                                            </div>

                                        </div>
                                        <div class="tab-pane" id="2a">


                                            <div class="col-8 col-sm-6">
                                                <div style="display: flex;">
                                                    @foreach($modeloConUnero as $item)
                                                    @if($item->orden==1)
                                                    <label class="radio-img" data-toggle="tooltip" data-placement="top"
                                                        title="{{$item->descripcion}}">
                                                        <input type="radio" name="modelo_puertas"
                                                            value="{{$item->id}}" />
                                                        <img style="width: 60px;height: 67px;"
                                                            src="{{$item->url_image}}">
                                                    </label>
                                                    @endif
                                                    @endforeach
                                                </div>

                                                <div style="display: flex;">
                                                    @foreach($modeloConUnero as $item)
                                                    @if($item->orden==2)
                                                    <label class="radio-img" data-toggle="tooltip" data-placement="top"
                                                        title="{{$item->descripcion}}">
                                                        <input type="radio" name="modelo_puertas"
                                                            value="{{$item->id}}" />
                                                        <img style="width: 60px;height: 67px;"
                                                            src="{{$item->url_image}}">
                                                    </label>
                                                    @endif
                                                    @endforeach
                                                </div>

                                                <div style="display: flex;">
                                                    @foreach($modeloConUnero as $item)
                                                    @if($item->orden==3)
                                                    <label class="radio-img" data-toggle="tooltip" data-placement="top"
                                                        title="{{$item->descripcion}}">
                                                        <input type="radio" name="modelo_puertas"
                                                            value="{{$item->id}}" />
                                                        <img style="width: 60px;height: 67px;"
                                                            src="{{$item->url_image}}">
                                                    </label>
                                                    @endif
                                                    @endforeach
                                                </div>

                                                <div style="display: flex;">
                                                    @foreach($modeloConUnero as $item)
                                                    @if($item->orden==4)
                                                    <label class="radio-img" data-toggle="tooltip" data-placement="top"
                                                        title="{{$item->descripcion}}">
                                                        <input type="radio" name="modelo_puertas"
                                                            value="{{$item->id}}" />
                                                        <img style="width: 60px;height: 67px;"
                                                            src="{{$item->url_image}}">
                                                    </label>
                                                    @endif
                                                    @endforeach
                                                </div>

                                                <div style="display: flex;">
                                                    @foreach($modeloConUnero as $item)
                                                    @if($item->orden==5)
                                                    <label class="radio-img" data-toggle="tooltip" data-placement="top"
                                                        title="{{$item->descripcion}}">
                                                        <input type="radio" name="modelo_puertas"
                                                            value="{{$item->id}}" />
                                                        <img style="width: 60px;height: 67px;"
                                                            src="{{$item->url_image}}">
                                                    </label>
                                                    @endif
                                                    @endforeach
                                                </div>


                                            </div>
                                            <div class="col-4 col-sm-6">
                                                <div id="txt_tirador_puerta" style="text-align: center;"></div>
                                            </div>


                                        </div>
                                        <div class="col-4 col-sm-6">
                                            <div id="txt_tirador_puerta" style="text-align: center;"></div>
                                        </div>

                                    </div>
                                </div>

                            </fieldset>
                        </div>

                        @endif
                        @endif
                    </div>

                    <form action="{{url('/cart/addItem')}}/<?php echo $Products[0]->id; ?>">
                        <input type="hidden" value="{{$Products[0]->id_imagen}}" id="id_imagens" name="id_imagens" />

                        <!--=== COLUMNA 2 ===-->
                        <div class="col-xs-12 col-md-4 ">
                            <!--=== MODELO DE PUERTAS ===-->
                            <div class="product_attributes margin-bottom-10">
                                <h3 class="cko_pb_center_column_title" style="background: #6f6f6f;">MODELOS DE PUERTAS
                                </h3>
                                <?php  
                                    $modeloPuerta = DB::table('mc_modelo_puerta')->get();
                                ?>

                                <fieldset style="height: 290px;">
                                    <div class="col-8 col-sm-6">
                                        <div style="display: flex;">
                                            @foreach($modeloPuerta as $item)
                                            @if($item->orden==1)
                                            <label class="radio-img" data-toggle="tooltip" data-placement="top"
                                                title="{{$item->descripcion}}">
                                                <input type="radio" name="modelo_puertas" value="{{$item->id}}" />
                                                <img style="width: 60px;height: 67px;" src="{{$item->url_image}}">
                                            </label>
                                            @endif
                                            @endforeach
                                        </div>

                                        <div style="display: flex;">
                                            @foreach($modeloPuerta as $item)
                                            @if($item->orden==2)
                                            <label class="radio-img" data-toggle="tooltip" data-placement="top"
                                                title="{{$item->descripcion}}">
                                                <input type="radio" name="modelo_puertas" value="{{$item->id}}" />
                                                <img style="width: 60px;height: 67px;" src="{{$item->url_image}}">
                                            </label>
                                            @endif
                                            @endforeach
                                        </div>

                                        <div style="display: flex;">
                                            @foreach($modeloPuerta as $item)
                                            @if($item->orden==3)
                                            <label class="radio-img" data-toggle="tooltip" data-placement="top"
                                                title="{{$item->descripcion}}">
                                                <input type="radio" name="modelo_puertas" value="{{$item->id}}" />
                                                <img style="width: 60px;height: 67px;" src="{{$item->url_image}}">
                                            </label>
                                            @endif
                                            @endforeach
                                        </div>

                                        <div style="display: flex;">
                                            @foreach($modeloPuerta as $item)
                                            @if($item->orden==4)
                                            <label class="radio-img" data-toggle="tooltip" data-placement="top"
                                                title="{{$item->descripcion}}">
                                                <input type="radio" name="modelo_puertas" value="{{$item->id}}" />
                                                <img style="width: 60px;height: 67px;" src="{{$item->url_image}}">
                                            </label>
                                            @endif
                                            @endforeach
                                        </div>


                                    </div>
                                    <div class="col-4 col-sm-6">
                                        <div id="txt_modelo_puerta" style="text-align: center;"></div>
                                    </div>
                                </fieldset>
                                
                            </div>
                            @if($Products[0]->id_cat!=1 && $Products[0]->id_cat!=11 && $Products[0]->id_cat!=12 &&
                            $Products[0]->id_cat!=13)
                            @if($Products[0]->id_color!=0)

                            <!--=== ACABADOS DE PUERTAS ===-->
                            <div class="product_attributes margin-bottom-10">
                                <h3 class="cko_pb_center_column_title" style="background: #6f6f6f;">ACABADO DE PUERTAS
                                </h3>
                                <?php  
                                    $modeloPuerta = DB::table('mc_acabado_puerta')->get();
                                ?>

                                <fieldset style="height: 370px;">
                                    <div class="col-8 col-sm-6">
                                        <div style="display: flex;">
                                            @foreach($modeloPuerta as $item)
                                            @if($item->orden==1)
                                            <label class="radio-img" data-toggle="tooltip" data-placement="top"
                                                title="{{$item->descripcion}}">
                                                <input type="radio" name="modelo_puertas" value="{{$item->id}}" />
                                                <img style="width: 60px;" src="{{$item->url_image}}">
                                            </label>
                                            @endif
                                            @endforeach
                                        </div>

                                        <div style="display: flex;">
                                            @foreach($modeloPuerta as $item)
                                            @if($item->orden==2)
                                            <label class="radio-img" data-toggle="tooltip" data-placement="top"
                                                title="{{$item->descripcion}}">
                                                <input type="radio" name="modelo_puertas" value="{{$item->id}}" />
                                                <img style="width: 60px;" src="{{$item->url_image}}">
                                            </label>
                                            @endif
                                            @endforeach
                                        </div>

                                        <div style="display: flex;">
                                            @foreach($modeloPuerta as $item)
                                            @if($item->orden==3)
                                            <label class="radio-img" data-toggle="tooltip" data-placement="top"
                                                title="{{$item->descripcion}}">
                                                <input type="radio" name="modelo_puertas" value="{{$item->id}}" />
                                                <img style="width: 60px;" src="{{$item->url_image}}">
                                            </label>
                                            @endif
                                            @endforeach
                                        </div>

                                        <div style="display: flex;">
                                            @foreach($modeloPuerta as $item)
                                            @if($item->orden==4)
                                            <label class="radio-img" data-toggle="tooltip" data-placement="top"
                                                title="{{$item->descripcion}}">
                                                <input type="radio" name="modelo_puertas" value="{{$item->id}}" />
                                                <img style="width: 60px;" src="{{$item->url_image}}">
                                            </label>
                                            @endif
                                            @endforeach
                                        </div>

                                        <div style="display: flex;">
                                            @foreach($modeloPuerta as $item)
                                            @if($item->orden==5)
                                            <label class="radio-img" data-toggle="tooltip" data-placement="top"
                                                title="{{$item->descripcion}}">
                                                <input type="radio" name="modelo_puertas" value="{{$item->id}}" />
                                                <img style="width: 60px;" src="{{$item->url_image}}">
                                            </label>
                                            @endif
                                            @endforeach
                                        </div>


                                    </div>
                                    <div class="col-4 col-sm-6">
                                        <div id="txt_acabado_puerta" style="text-align: center;"></div>
                                    </div>
                                </fieldset>
                            </div>























                            <section>
    <ul>
      <li class="list active" data-filter="Tout">Tout</li>
      <li class="list" data-filter="Langue">Langue</li>
      <li class="list" data-filter="Informatique">Informatique</li>
      <li class="list" data-filter="Design">Design</li>
      <li class="list" data-filter="Autre">Autre</li>
    </ul>
  
    <div class="post-slider">
      <i class="fas fa-chevron-left prev"></i>
      <i class="fas fa-chevron-right next"></i>

       <!--FORMATION INFORMATIQUE-->

      <div class="post-wrapper">

        <div class="post Informatique">
          <img src="informatique 1.jpg" alt="" class="slider-image">
          <div class="post-info">
            <h4><a href="#">Formation en Informatique</a></h4>
            <i class="fas fa-book">Apprenez l'informatique !</i>
          </br>
            <i class="fas fa-check">Formation avec une certification à la fin !</i>
          </div>
        </div>

        <div class="post Informatique">
          <img src="informatique2.jpg" alt="" class="slider-image">
          <div class="post-info">
            <h4><a href="#">Formation en Bureautique</a></h4>
            <i class="fas fa-book">Apprenez la bueautique ! </i>
          </br>
            <i class="fas fa-check">Formation avec une certification à la fin !</i>
          </div>
        </div>

        <div class="post Informatique">
          <img src="informatique3.png" alt="" class="slider-image">
          <div class="post-info">
            <h4><a href="#">Formation en Informatique</a></h4>
            <i class="fas fa-book">Apprenez l'utilisation d'Excel !</i>
          </br>
            <i class="fas fa-check">Formation avec une certification à la fin !</i>
          </div>
        </div>

        <div class="post Informatique">
          <img src="informatique4.jpg" alt="" class="slider-image">
          <div class="post-info">
            <h4><a href="#">Formation Word</a></h4>
            <i class="fas fa-book">Apprenez l'utilisation de Word</i>
          </br>
            <i class="fas fa-check">Formation avec une certification à la fin !</i>
          </div>
        </div>

        <div class="post Informatique">
          <img src="informatique5.jpg" alt="" class="slider-image">
          <div class="post-info">
            <h4><a href="#">Formation Powerpoint</a></h4>
            <i class="fas fa-book">Apprenez l'utilisation de Powerpoint !</i>
          </br>
            <i class="fas fa-check">Formation avec une certification à la fin !</i>
          </div>
        </div>

          <!--FORMATION LANGUE-->

        <div class="post Langue">
          <img src="langue1.png" alt="" class="slider-image">
          <div class="post-info">
            <h4><a href="#">Formation en Anglais</a></h4>
            <i class="fas fa-book">Apprenez l'Anglais !</i>
          
          </br>
            <i class="fas fa-check">Formation avec une certification à la fin !</i>
          </div>
        </div>

        <div class="post Langue">
          <img src="langue2.png" alt="" class="slider-image">
          <div class="post-info">
            <h4><a href="#">Formation en Français</a></h4>
            <i class="fas fa-book">Apprenez le Français !</i>
          </br>
           
            <i class="fas fa-check">Formation avec une certification à la fin !</i>
          </div>
        </div>

        <div class="post Langue">
          <img src="langue3.jpg" alt="" class="slider-image">
          <div class="post-info">
            <h4><a href="#">Formation en Espagnol</a></h4>
            <i class="fas fa-book">Apprenez l'Espagnol !</i>
            
          </br>
            <i class="fas fa-check">Formation avec une certification à la fin !</i>
          </div>
        </div>
        <div class="post Langue">
          <img src="langue4.png" alt="" class="slider-image">
          <div class="post-info">
            <h4><a href="#">Formation en Allemand</a></h4>
            <i class="fas fa-book">Apprenez l'Allemand !</i>
           
          </br>
            <i class="fas fa-check">Formation avec une certification à la fin !</i>
          </div>
        </div>
       

        <!--FORMATION DESIGN-->

        <div class="post Design">
          <img src="design1.png" alt="" class="slider-image">
          <div class="post-info">
            <h4><a href="#">Formation Photoshop</a></h4>
            <i class="fas fa-book">Apprenez l'utilisation de Photoshop !</i>
           
          </br>
            <i class="fas fa-check">Formation avec une certification à la fin !</i>
          </div>
        </div>

        <div class="post Design">
          <img src="design2.png" alt="" class="slider-image">
          <div class="post-info">
            <h4><a href="#">Formation Illustrator</a></h4>
            <i class="fas fa-book">Apprenez l'utilisation d'Illustrator !</i>
           
          </br>
            <i class="fas fa-check">Formation avec une certification à la fin !</i>
          </div>
        </div>

        <div class="post Design">
          <img src="design3.png" alt="" class="slider-image">
          <div class="post-info">
            <h4><a href="#">Formation InDesign</a></h4>
            <i class="fas fa-book">Apprenez l'utilisation d'InDesign !</i>
           
          </br>
            <i class="fas fa-check">Formation avec une certification à la fin !</i>
          </div>
        </div>

        <div class="post Design">
          <img src="design4.png" alt="" class="slider-image">
          <div class="post-info">
            <h4><a href="#">Formation PAO</a></h4>
            <i class="fas fa-book">Apprenez l'utilisation du pack PAO !</i>
           
          </br>
            <i class="fas fa-check">Formation avec une certification à la fin !</i>
          </div>
        </div>

        <!-- FORMATION AUTRE -->

        <div class="post Autre">
          <img src="autre1.jpg" alt="" class="slider-image">
          <div class="post-info">
            <h4><a href="#">Formation Secrétariat</a></h4>
            <i class="fas fa-book">Apprenez le Secrétariat</i>
           
          </br>
            <i class="fas fa-check">Formation avec une certification à la fin !</i>
          </div>
        </div>

        <div class="post Autre">
          <img src="autre2.jpg" alt="" class="slider-image">
          <div class="post-info">
            <h4><a href="#">Formation Comptabilité</a></h4>
            <i class="fas fa-book">Apprenez la Comptabilité</i>
           
          </br>
            <i class="fas fa-check">Formation avec une certification à la fin !</i>
          </div>
        </div>

        <div class="post Autre">
          <img src="autre3.jpg" alt="" class="slider-image">
          <div class="post-info">
            <h4><a href="#">Formation Hygiène Alimentaire</a></h4>
            <i class="fas fa-book">Apprenez l'hygiene alimentaire</i>
           
          </br>
            <i class="fas fa-check">Formation avec une certification à la fin !</i>
          </div>
        </div>

      </div>
    </div>
  </section>












  <section>
    <ul>
      <li class="list active" data-filter="Tout">Tout</li>
      <li class="list" data-filter="Langue">Langue</li>
      <li class="list" data-filter="Informatique">Informatique</li>
      <li class="list" data-filter="Design">Design</li>
      <li class="list" data-filter="Autre">Autre</li>
    </ul>
  
    <div class="post-slider">
      <i class="fas fa-chevron-left prev"></i>
      <i class="fas fa-chevron-right next"></i>

       <!--FORMATION INFORMATIQUE-->

      <div class="post-wrapper">

        <div class="post Informatique">
          <img src="informatique 1.jpg" alt="" class="slider-image">
          <div class="post-info">
            <h4><a href="#">Formation en Informatique</a></h4>
            <i class="fas fa-book">Apprenez l'informatique !</i>
          </br>
            <i class="fas fa-check">Formation avec une certification à la fin !</i>
          </div>
        </div>

        <div class="post Informatique">
          <img src="informatique2.jpg" alt="" class="slider-image">
          <div class="post-info">
            <h4><a href="#">Formation en Bureautique</a></h4>
            <i class="fas fa-book">Apprenez la bueautique ! </i>
          </br>
            <i class="fas fa-check">Formation avec une certification à la fin !</i>
          </div>
        </div>

        <div class="post Informatique">
          <img src="informatique3.png" alt="" class="slider-image">
          <div class="post-info">
            <h4><a href="#">Formation en Informatique</a></h4>
            <i class="fas fa-book">Apprenez l'utilisation d'Excel !</i>
          </br>
            <i class="fas fa-check">Formation avec une certification à la fin !</i>
          </div>
        </div>

        <div class="post Informatique">
          <img src="informatique4.jpg" alt="" class="slider-image">
          <div class="post-info">
            <h4><a href="#">Formation Word</a></h4>
            <i class="fas fa-book">Apprenez l'utilisation de Word</i>
          </br>
            <i class="fas fa-check">Formation avec une certification à la fin !</i>
          </div>
        </div>

        <div class="post Informatique">
          <img src="informatique5.jpg" alt="" class="slider-image">
          <div class="post-info">
            <h4><a href="#">Formation Powerpoint</a></h4>
            <i class="fas fa-book">Apprenez l'utilisation de Powerpoint !</i>
          </br>
            <i class="fas fa-check">Formation avec une certification à la fin !</i>
          </div>
        </div>

          <!--FORMATION LANGUE-->

        <div class="post Langue">
          <img src="langue1.png" alt="" class="slider-image">
          <div class="post-info">
            <h4><a href="#">Formation en Anglais</a></h4>
            <i class="fas fa-book">Apprenez l'Anglais !</i>
          
          </br>
            <i class="fas fa-check">Formation avec une certification à la fin !</i>
          </div>
        </div>

        <div class="post Langue">
          <img src="langue2.png" alt="" class="slider-image">
          <div class="post-info">
            <h4><a href="#">Formation en Français</a></h4>
            <i class="fas fa-book">Apprenez le Français !</i>
          </br>
           
            <i class="fas fa-check">Formation avec une certification à la fin !</i>
          </div>
        </div>

        <div class="post Langue">
          <img src="langue3.jpg" alt="" class="slider-image">
          <div class="post-info">
            <h4><a href="#">Formation en Espagnol</a></h4>
            <i class="fas fa-book">Apprenez l'Espagnol !</i>
            
          </br>
            <i class="fas fa-check">Formation avec une certification à la fin !</i>
          </div>
        </div>
        <div class="post Langue">
          <img src="langue4.png" alt="" class="slider-image">
          <div class="post-info">
            <h4><a href="#">Formation en Allemand</a></h4>
            <i class="fas fa-book">Apprenez l'Allemand !</i>
           
          </br>
            <i class="fas fa-check">Formation avec une certification à la fin !</i>
          </div>
        </div>
       

        <!--FORMATION DESIGN-->

        <div class="post Design">
          <img src="design1.png" alt="" class="slider-image">
          <div class="post-info">
            <h4><a href="#">Formation Photoshop</a></h4>
            <i class="fas fa-book">Apprenez l'utilisation de Photoshop !</i>
           
          </br>
            <i class="fas fa-check">Formation avec une certification à la fin !</i>
          </div>
        </div>

        <div class="post Design">
          <img src="design2.png" alt="" class="slider-image">
          <div class="post-info">
            <h4><a href="#">Formation Illustrator</a></h4>
            <i class="fas fa-book">Apprenez l'utilisation d'Illustrator !</i>
           
          </br>
            <i class="fas fa-check">Formation avec une certification à la fin !</i>
          </div>
        </div>

        <div class="post Design">
          <img src="design3.png" alt="" class="slider-image">
          <div class="post-info">
            <h4><a href="#">Formation InDesign</a></h4>
            <i class="fas fa-book">Apprenez l'utilisation d'InDesign !</i>
           
          </br>
            <i class="fas fa-check">Formation avec une certification à la fin !</i>
          </div>
        </div>

        <div class="post Design">
          <img src="design4.png" alt="" class="slider-image">
          <div class="post-info">
            <h4><a href="#">Formation PAO</a></h4>
            <i class="fas fa-book">Apprenez l'utilisation du pack PAO !</i>
           
          </br>
            <i class="fas fa-check">Formation avec une certification à la fin !</i>
          </div>
        </div>

        <!-- FORMATION AUTRE -->

        <div class="post Autre">
          <img src="autre1.jpg" alt="" class="slider-image">
          <div class="post-info">
            <h4><a href="#">Formation Secrétariat</a></h4>
            <i class="fas fa-book">Apprenez le Secrétariat</i>
           
          </br>
            <i class="fas fa-check">Formation avec une certification à la fin !</i>
          </div>
        </div>

        <div class="post Autre">
          <img src="autre2.jpg" alt="" class="slider-image">
          <div class="post-info">
            <h4><a href="#">Formation Comptabilité</a></h4>
            <i class="fas fa-book">Apprenez la Comptabilité</i>
           
          </br>
            <i class="fas fa-check">Formation avec une certification à la fin !</i>
          </div>
        </div>

        <div class="post Autre">
          <img src="autre3.jpg" alt="" class="slider-image">
          <div class="post-info">
            <h4><a href="#">Formation Hygiène Alimentaire</a></h4>
            <i class="fas fa-book">Apprenez l'hygiene alimentaire</i>
           
          </br>
            <i class="fas fa-check">Formation avec une certification à la fin !</i>
          </div>
        </div>

      </div>
    </div>
  </section>











                            @endif
                            @endif
                        </div>

                        <!--=== COLUMNA 3 ===-->
                        <div class="col-xs-12 col-md-4">

                            <!--=== ACABADO DEL MUEBLE ===-->
                            @if($Products[0]->id_cat==11)
                            @include('web.pages.mueble_completo.component.acce_informativo')
                            @elseif($Products[0]->id_cat==12)
                            @include('web.pages.mueble_completo.component.acce_informativo')
                            @elseif($Products[0]->id_cat==13)
                            @include('web.pages.mueble_completo.component.acce_informativo')
                            @else
                            @include('web.pages.mueble_completo.component.acce_normales')
                            @endif
                            @if($Products[0]->id_cat!=1 && $Products[0]->id_cat!=11 && $Products[0]->id_cat!=12 &&
                            $Products[0]->id_cat!=13)
                            @include('web.pages.mueble_completo.component.acabados_mueble')
                            @endif

                            <!--=== PAGOS ===-->
                            <div class="product_attributes clearfix margin-bottom-30">
                                <h3 class="cko_pb_center_column_title" style="background: #6f6f6f;">PAGO </h3>
                                <h3 class="cko_pb_right_column_title">Procesar pedido</h3>
                                <div class="cko_procesar_pedido"
                                    style="height: <?php echo $resultado =((($Products[0]->id_cat==5 || $Products[0]->id_cat==6 || $Products[0]->id_cat==7 )?140:($Products[0]->id_cat==8 || $Products[0]->id_cat==9 || $Products[0]->id_cat==10 || $Products[0]->id_cat==16 ))?'unset':120); ?>px;">

                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <label for="qty">Cantidad</label>
                                                <input type="number" name="txt_cantidad_precio" class="form-control"
                                                    size="2" value="1" id="txt_cantidad_precio" autocomplete="off"
                                                    MIN="1" MAX="30">
                                            </div>
                                            <div class="col-sm-6">
                                                <label for="formGroupExampleInput">TOTAL €</label>
                                                <input style="text-align: center;pointer-events: none;"
                                                    name="costo_total" id="costo_total" type="text"
                                                    class="form-control" />
                                                <input type="hidden" name="cost_total_hide" id="cost_total_hide" />

                                            </div>
                                        </div>
                                    </div>
                                    <button style="background: #13756f" class="btn btn-primary btn-lg btn-block"
                                        id="addToCart"> <i class="fa fa-shopping-cart"></i>
                                        Añadir al Carrito
                                    </button><br />
                                    <input type="hidden" value="<?php echo $Products[0]->id; ?>" id="proDum" />
                                </div>
                            </div>

                            @if($Products[0]->id_cat!=11 && $Products[0]->id_cat!=12 && $Products[0]->id_cat!=13)
                            @include('web.pages.mueble_completo.component.acce_informativo')
                            @endif

                        </div>

                    </form>


                    <!-- Modal Modelo de Puerta -->
                    <div class="modal fade" id="md_modeloPuerta" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Imagen Del Producto</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body" id="updateDivPrincipal">
                                    <img src="#" id="src_modelo_puerta" width="500px" />
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                    <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal producto -->
                    <div class="modal fade" id="imagenModal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Imagen del Producto</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body" id="updateDivPrincipal">
                                    <img src="{{ $Products[0]->url_image }}" id="zoomImgModal" width="500px" />
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                    <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal detalle del producto -->
                    <div class="modal fade" id="detalleModal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Detalle del Producto</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    {{$Products[0]->pro_info}}
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                    <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal de Tirador -->
                    <div class="modal fade" id="imagenModalTirador" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Visualizar Imagen </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body" id="updateDivTirador"></div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal de Color -->
                    <div class="modal fade" id="imagenModalColor" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Visualizar Imagen </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body" id="updateDivColor"></div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- Modal -->
                    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content" style="border: unset !important;">
                                <div class="alert" role="alert" style="display: flex;background: #13756f;color: white;">
                                    <svg style="font-size: 30px;" width="1em" height="1em" viewBox="0 0 16 16"
                                        class="bi bi-check-circle" fill="currentColor"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                        <path fill-rule="evenodd"
                                            d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.236.236 0 0 1 .02-.022z" />
                                    </svg> <label for=""
                                        style="padding-left: 12px;font-size: 16px;color: white;">Producto agregado al
                                        carro</label>
                                </div>
                                <div class="modal-body">
                                    <p>¿Quieres agregar un servicio de instalación?</p><br>
                                    <p class="margin-bottom-30">Servicio de Armado y/o Instalación € 26.90
                                    </p>

                                    <div class="alert alert-primary" role="alert"
                                        style="display: flex;color: #ffffff;background: #808080;">

                                        <svg style="font-size: 30px;" width="1em" height="1em" viewBox="0 0 16 16"
                                            class="bi bi-exclamation-circle" fill="currentColor"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                            <path
                                                d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z" />
                                        </svg>
                                        <label for="" style="padding-left: 12px;font-size: 16px;color:#ffffff;">
                                            Programa el servicio escribiendo a:
                                            programatuservicio@tucocinakit.es Cobertura: Madrid
                                            -España</label>
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Ver más
                                        Productos</button>
                                    <a class="btn btn-danger" href="{{url('/cart')}}"><i class="fa fa-shopping-cart"
                                            aria-hidden="true"></i> Ir al Carro de Compras</a>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>

    <!--=== Content Medium ===-->
    @include('web.pages.mueble_completo.component.details_information')

</div>

@endsection

@section('footer_page')

<!-- --------------------------------------LISTA DE PRODUCTOS----------- -->
<script src="{{ URL::asset('THIS/assets/plugins/cube-portfolio/cubeportfolio/js/jquery.cubeportfolio.min.js') }}">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-zoom/1.7.20/jquery.zoom.min.js"></script>
<script src="{{ URL::asset('THIS/assets/js/plugins/cube-portfolio/cube-portfolio-4.js') }}"></script>


<script src="https://code.jquery.com/jquery-3.6.0.js"
  integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
  crossorigin="anonymous"></script>

<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>


<script>
$(document).ready(function() {
    App.init();
    App.initScrollBar();
    App.initParallaxBg();
    OwlCarousel.initOwlCarousel();
    RevolutionSlider.initRSfullWidth();

    //====VARIABLES POR DEFAULS

    $('#cost_total_hide,#costo_total').val(<?=
    ($Products[0]->price - ($Products[0]->price*$Products[0]->desc_price)/100 + ($Products[0]->price*$Products[0]->aume_price)/100);
    ?>);

    $('#id_imagens').val(<?=$Products[0]->id_imagen;?>);
    if (<?=$Products[0]->id_color;?>) {
        handleSecundario(<?=$Products[0]->id_color;?>)
    }

});
</script>
<script>
// Can also be used with $(document).ready()
$(window).load(function() {
    $('.flexslider').flexslider({
        animation: "slide",
        controlNav: "thumbnails"
    });
});

function imagenFunction() {
    $('#imagenModal').modal(true)
}

//=============FUNCIONES PARA COLOR Y TIRADOR===========
function imagenFunctionColor(txt_id_medida) {

    $.ajax({
        type: 'get',
        dataType: 'html',
        url: '<?php echo url('/change_imagen_color');?>',
        data: "txt_id_medida=" + txt_id_medida,
        success: function(response) {
            $('#updateDivColor').html(response);
            $('#imagenModalColor').modal(true)
        }
    });
}

function imagenFunctionTirador(txt_id_medida) {
    $.ajax({
        type: 'get',
        dataType: 'html',
        url: '<?php echo url('/change_imagen_tirador');?>',
        data: "txt_id_medida=" + txt_id_medida,
        success: function(response) {
            $('#updateDivTirador').html(response);
            $('#imagenModalTirador').modal(true)
        }
    });
}
// ---------------abrir modal cuando se inserta el producto
($('#txt_modal').val() == 1) ? $('#exampleModalLong').modal(true): ''

$("input[type=radio][name=color_puertas_change]").change(function() {
    const txt_id_color = $('input[name="color_puertas_change"]:checked').val();
    console.log(txt_id_color);
    handleSecundario(txt_id_color)
});


$("input[type=radio][name=color_puertas]").change(function() {
    const txt_id_color = $('input[name="color_puertas"]:checked').val();
    handleSecundario(txt_id_color)
});
//--------------END - CAMBIOS DE IMAGENS-------------
const handleSecundario = (txt_id_color) => {
    axios.post('/change_imagen_select_color', {
            'txt_id_color': txt_id_color,
        })
        .then(function(response) {
            $('#txt_caracteristica').html(response.data);
        }).catch(function(error) {
            if (error.response.status) {
                //alert('No existe la medida.! Gracias')
            }
        })
}

$('#txt_cantidad_precio').on('change keyup', function() {
    const valor = parseFloat($('#cost_total_hide').val()).toFixed(2)
    const total = this.value * valor
    $('#costo_total').val(parseFloat(total).toFixed(2))
});


$("#txt_composicion").change(function() {
    const id_producto = this.value;
    window.location.href = window.location.origin + '/product_details_/' + id_producto;
});

$(document).ready(function() {
    $('#produto').zoom();
});

//----------------------PRECIOS--------------
$('#txt_ancho,#txt_alto,#txt_fondo').on('change', function() {

    console.log($('#txt_ancho').val());



    axios.post('/change_price', {
            'txt_id_imagen': '<?php echo $Products[0]->id_imagen; ?>',
            'txt_ancho': $('#txt_ancho').val(),
            'txt_alto': $('#txt_alto').val(),
            'txt_fondo': $('#txt_fondo').val(),
        })
        .then(function(response) {
            if (response.data[1] != null) {
                $('#cost_total_hide,#costo_total').val(response.data[0])
                imagenPrincipal(response.data[1])
            } else {
                $('#cost_total_hide,#costo_total').val(response.data[0])
            }

        }).catch(function(error) {
            if (error.response.status) {
                // alert('No existe la medida.! Gracias')
            }
            //https://stackoverflow.com/questions/56577124/how-to-handle-500-error-message-with-axios/56577273
        })

});



$("input[type=radio][name=txt_model_enzimera]").click(function() {
    const txt_id_color = $('input[name="txt_model_enzimera"]:checked').val();
    let total_pre = parseFloat($('#cost_total_hide').val()) + parseFloat(txt_id_color.split('-')[0]);
    $('#costo_total').val(total_pre);
    handleTirador(txt_id_color.split('-')[1]) //Cambiar Imagen

});

//-------------- CAMBIOS DE IMAGENS -------------
const handleTirador = (txt_id_tirador) => {
    axios.post('/change_imagen_select_tirador', {
            'txt_id_tirador': txt_id_tirador,
        })
        .then(function(response) {
            $('#txt_caracteristica_tirador').html(response.data);
        }).catch(function(error) {
            if (error.response.status) {
                // alert('No existe la medida.! Gracias')
            }
        })
}
const imagenPrincipal = (url_image) => {
    $('#txt_imagenPrincipal').attr('src', url_image);
    $('.zoomImg').attr('src', url_image);
    $('#zoomImgModal').attr('src', url_image);
}

//========================CAMBIA LA IMAGEN DE ENCIMERA - MUEBLES COMPLETOS
$("input[type=radio][name=color_puerta_unero]").click(function() {
    const txt_id = $('input[name="color_puerta_unero"]:checked').val();
    handleTiradorEncimera(txt_id) //Cambiar Imagen
});

const handleTiradorEncimera = (txt_id) => {
    axios.post('/change_tirador_encimera', {
            'id': txt_id,
        })
        .then(function(response) {
            $('#txt_caracteristica_tirador').html(response.data);
        }).catch(function(error) {
            if (error.response.status) {
                // alert('No existe la medida.! Gracias')
            }
        })
}
//========================OCULTA LA LISTA DE ENCIMERA- MUEBLES COMPLETOS



//:::::::::::::::::::::: COLUMNA 2 :::::::::::::::
$(document).ready(function() {
    functionModuloPuerta(1)
})

$("input[type=radio][name=modelo_puertas]").change(function() {
    const txt_id = $('input[name="modelo_puertas"]:checked').val();
    functionModuloPuerta(txt_id)
});

const functionModuloPuerta = (txt_id) => {
    axios.post('/change_modelo_puerta', {
            'txt_id': txt_id,
        })
        .then(function(response) {
            $('#txt_modelo_puerta').html(response.data);
            $('#txt_acabado_puerta').html(response.data);
            $('#txt_tirador_puerta').html(response.data);
        }).catch(function(error) {
            if (error.response.status) {
                // alert('No existe la medida.! Gracias')
            }
        })
}

//:::::::::::::::::::::: COLUMNA 1 :::::::::::::::
$(document).ready(function() {
    handleTirador(1)
})

$("#txt_tirador_unero1").on('change', function() {
    $(".txt_modelo_tirador").show();
    if (this.value == 0) {
        //  $('#cost_total_hide,#costo_total').val($('#cost_total_hide').val())
    }

    // $("input[type=radio][name=txt_model_tirador]").prop('checked', false); 
    // $('#cost_total_hide,#costo_total').val(); 

    axios.get('/hide_tirador_encimera').then(function(response) {
        $('.lista_uneros_').html("");
    }).catch(function(error) {
        if (error.response.status) {
            console.log(error)
        }
    })

})

$('#txt_tirador_unero2').on('change', function() {
    $(".txt_modelo_tirador").hide();
    axios.get('/hide_tirador_encimera')
        .then(function(response) {
            $('.lista_uneros_').html(response.data);
        }).catch(function(error) {
            if (error.response.status) {
                console.log(error)
            }
        })
});

$("input[type=radio][name=txt_model_tirador]").click(function() {
    const txt_id_color = $('input[name="txt_model_tirador"]:checked').val();
    let total_pre = parseFloat($('#cost_total_hide').val()) + parseFloat(txt_id_color.split('-')[0]);
    $('#costo_total').val(total_pre);
    handleTirador(txt_id_color.split('-')[1]) //Cambiar Imagen

});

//::::::::::::::::::::: MOSTRAR IMAGEN MODELO PUERTA
function openModal_ModeloPuerta(url_imagen) {
    $('#md_modeloPuerta').modal(true)
    $('#src_modelo_puerta').attr('src', url_imagen);
}



$(document).ready(function(){
  $('.post-wrapper').slick({
      slidesToShow: 3,
      slidesToScroll: 1,
      autoplaySpeed: 2250,
      nextArrow:$('.next'),
      prevArrow:$('.prev'),
      infinite:true,
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 3,
            infinite: true,
            dots: true
          }
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 2
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }
      ]
    });

    $('.list').click(function() {
    if(!$(this).is('.active')){
      var category = $(this).data('filter'),
          slider = $('.post-wrapper');
          
      $(this).addClass('active').siblings().removeClass('active');
      
      slider.slick('slickUnfilter'); //reset slider filter
      if(category != 'Tout'){
        slider.slick('slickFilter','.'+category);
      }
    }       
  })
  });

        

</script>

<!--flex slider-->
<script src="{{ URL::asset('THIS/assets_2/js/jquery.flexslider.js') }}"></script>
<script src="{{ URL::asset('themes/warehouse/cache/v_726_15810251d95ac88cec9fad9fb952e72e.js') }}"></script>

<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>


@endsection