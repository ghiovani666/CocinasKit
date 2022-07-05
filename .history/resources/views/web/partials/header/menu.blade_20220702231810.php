<?php
//  $altImgs = DB::select("call sp_list_menus()")->get();
$menu = DB::table('menu')->get();
$category = DB::table('menu_category')->get();
$items = DB::table('menu_items')->get();
 ?>
@if(count($menu)!=0)
@foreach($menu as $data1)

<li class="dropdown mega-menu-fullwidth">
    @if($data1->id_menu == 1)
        <a href="/composicion_oferta/{{$data1->id_menu}}" class="dropdown-toggle" data-hover="dropdown">
            {{$data1->names}}
        </a>
    @else
        <!-- <a href="/options/{{$data1->id_menu}}" class="dropdown-toggle" data-hover="dropdown">
            {{$data1->names}}
        </a> -->
        <a href="#!" class="dropdown-toggle" data-hover="dropdown">
            {{$data1->names}}
        </a>
    @endif
    <ul class="dropdown-menu">
        <li>
            <div class="mega-menu-content" style="background: #eeeeee;">
                <div class="container">
                    <div class="row">

                        @foreach($category as $data2)
                        @if($data2->id_menu == $data1->id_menu)
                        @if($data2->id_menu != 1)
                        <div class="col-md-3 col-sm-6">
                            <h3 style="font: inherit;" class="mega-menu-heading">
                                <a style="font-size: 20px;font-weight: 600;"href="/composicion_oferta/{{$data2->id_cat}}">{{$data2->names}}</a>
                            </h3>
                            <nav role='navigation' class="main-nav">
                                <ul>
                                    @foreach($items as $data3)
                                    @if($data3->id_cat == $data2->id_cat)
                                    <li class="longitud_cocina">
                                    @if($data3->id_cat==11 || $data3->id_cat==12 || $data3->id_cat==13 )
                                    <a style="font-size: 17px;" href="/accesorio_oferta/{{$data3->id_cat}}">
                                        <!-- <img src="/assets/img/escurreplatos.png" alt="" style="margin: 10px;"> -->
                                        <div style="padding-bottom: 1em;margin-top: -20px;"><br />
                                        {{$data3->names}}<div style="font-size: 12px;margin-top: 5px;">
                                                {{ (

                                                    $data3->id_cat!=11 && 
                                                    $data3->id_cat!=12 && 
                                                    $data3->id_cat!=13 && 
                                                    $data3->id_cat!=14 && 

                                                    $data3->id_cat!=5 && 
                                                    $data3->id_cat!=6 &&
                                                    $data3->id_cat!=7 &&

                                                    $data3->id_cat!=1)?'('. $data3->numbers.' Tipos)':""
                                                }}
                                            </div>
                                        </div>
                                    </a>
                                    @elseif($data3->id_cat==14)
                                    <a  style="font-size: 17px;"  href="<?php echo (substr($data3->names, 0, -20)=='Pres'?'/servicio_propuesta':'/servicio_transporte');?>">
                                        <!-- <img src="/assets/img/escurreplatos.png" alt="" style="margin: 10px;"> -->
                                        <div style="padding-bottom: 1em;margin-top: -20px;margin-left: 12px;"><br />
                                        {{$data3->names}}<div style="font-size: 12px;margin-top: 5px;">
                                                {{ (
                                                    $data3->id_cat!=11 && 
                                                    $data3->id_cat!=12 && 
                                                    $data3->id_cat!=13 && 
                                                    $data3->id_cat!=14 && 

                                                    $data3->id_cat!=5 && 
                                                    $data3->id_cat!=6 &&
                                                    $data3->id_cat!=7 &&

                                                    $data3->id_cat!=1)?'('. $data3->numbers.' Tipos)':""
                                                }}
                                            </div>
                                        </div>
                                    </a>
                                    @else
                                    <a  style="font-size: 17px;padding-left: 10px;" href="/mueble_completo/{{$data3->id_item}}">
                                            <!-- <img src="/assets/img/escurreplatos.png" alt="" style="margin: 10px;"> -->
                                            <div style="padding-bottom: 1em;margin-top: -20px;"><br />
                                                {{$data3->names}}<div style="font-size: 12px;margin-top: 5px;">
                                                    {{ (
                                                    $data3->id_cat!=11 && 
                                                    $data3->id_cat!=12 && 
                                                    $data3->id_cat!=13 && 
                                                    $data3->id_cat!=14 && 

                                                    $data3->id_cat!=5 && 
                                                    $data3->id_cat!=6 &&
                                                    $data3->id_cat!=7 &&
                                                    
                                                    $data3->id_cat!=1)?'('. $data3->numbers.' Tipos)':""
                                                    }}
                                                </div>
                                            </div>
                                        </a>
                                        @endif
                                    </li>
                                    @endif
                                    @endforeach
                                </ul>
                            </nav>
                        </div>
                        @endif
                        @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </li>
    </ul>
</li>

@endforeach
@endif