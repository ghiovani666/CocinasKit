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
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#detalleModal">
                        Ver más detalles
                    </button>
                </div>
            </div>
            <ul id="usefull_link_block" class="clearfix no-print" style="margin-top: 20px;">
                <li class="print"> <a href="javascript:print();"> Imprimir </a></li>
            </ul>
        </div>
        <!--=== TIRADORES ===-->
        @if($Products[0]->id_cat==5)
        @include('web.pages.pf_puertas')
        @elseif($Products[0]->id_cat==6)
        @include('web.pages.pf_unero')
        @elseif($Products[0]->id_cat==7)
        @include('web.pages.pf_vitrina')
        @else
        @if($Products[0]->id_cat!=1 && $Products[0]->id_cat!=11 && $Products[0]->id_cat!=12 && $Products[0]->id_cat!=13
        && $Products[0]->id_cat!=15
        && $Products[0]->id_cat!=2
        && $Products[0]->id_cat!=3
        && $Products[0]->id_cat!=4
        )
        <div class="product_attributes margin-bottom-10">
            <h3 class="cko_pb_center_column_title" style="background: #6f6f6f;">TIRADORES</h3>
            <div class="col-sm-4" id="txt_caracteristica_tirador" style="text-align: center;"></div>
            <fieldset style="height: 152px;">
                <div class="col-sm-12">
                    <div class="col-sm-12 margin-bottom-10">
                        <input class="form-check-input" type="radio" id="txt_tirador_unero1" name="txt_tirador" value="1" checked>
                        <label class="form-check-label" for="patas">
                            Con Tirador
                        </label>
                        <input style="margin-left: 47px;" class="form-check-input" type="radio" id="txt_tirador_unero2"  name="txt_tirador" value="0">
                        <label class="form-check-label" for="patas">
                            Con Uñero
                        </label>
                    </div>
                    
                    <div class="txt_modelo_tirador">
                        <label for="layout">SELECIONE EL MODELO </label><br />
                        <?php  
                            $tirador = DB::table('tirador_encimera')
                            ->where('codigo','01')
                            ->get();
                            ?>
                        <div style="display: flex;">
                            @foreach($tirador as $altImg)
                            <label class="radio-img" data-toggle="tooltip" data-placement="top"
                                title="{{$altImg->names}}">
                                <input type="radio" name="txt_model_tirador"
                                    value="{{$altImg->price}}-{{$altImg->id_accesorio}}" />
                                <img style="width: 40px;" src="{{$altImg->url_image}}">
                            </label>
                            @endforeach
                        </div>
                    </div>

                    @if($Products[0]->id_cat==8)
                    <div class="lista_uneros_"> </div>
                    @endif
                </div>
            </fieldset>
        </div>
        @endif
        @endif
    </div>