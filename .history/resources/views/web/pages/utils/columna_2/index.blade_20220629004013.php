<div class="col-xs-12 col-md-4 ">

    <div class="product_attributes margin-bottom-10">
        <h3 class="cko_pb_center_column_title" style="background: #6f6f6f;">MODELOS DE PUERTAS</h3>
        <?php  
            $modeloPuerta = DB::table('modelo_puerta')->get();
        ?>
        <div class="col-sm-4" id="txt_modelo_puerta" style="text-align: center;"></div>
        <fieldset style="height: 270px;">
            <div class="col-sm-12">
                <div class="txt_modelo">
                    <div style="display: flex;">
                        @foreach($modeloPuerta as $item)
                        @if($item->id_cat==1)
                        <label class="radio-img" data-toggle="tooltip" data-placement="top"
                            title="{{$item->descripcion}}">
                            <input type="radio" name="modelo_puertas" value="{{$item->id}}"  />
                            <img style="width: 60px;" src="{{$item->url_image}}">
                        </label>
                        @endif
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="col-sm-12">
                <div class="txt_modelo">
                    <div style="display: flex;">
                        @foreach($modeloPuerta as $item)
                        @if($item->id_cat==2)
                        <label class="radio-img" data-toggle="tooltip" data-placement="top"
                            title="{{$item->descripcion}}">
                            <input type="radio" name="modelo_puertas" value="{{$item->id}}" />
                            <img style="width: 60px;" src="{{$item->url_image}}">
                        </label>
                        @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </fieldset>
    </div>

    <!--=== ACABADOS DE PUERTAS ===-->
    @if($Products[0]->id_cat!=1 && $Products[0]->id_cat!=11 && $Products[0]->id_cat!=12 &&
    $Products[0]->id_cat!=13)
    @if($Products[0]->id_color!=0)

    <div
        class="product_attributes <?php echo $Result=(($Products[0]->id_cat==8 || $Products[0]->id_cat==9 || $Products[0]->id_cat==10 || $Products[0]->id_cat==16 )?'':'clearfix'); ?> margin-bottom-0">
        <h3 class="cko_pb_center_column_title" style="background: #6f6f6f;">ACABADO DE PUERTAS
        </h3>
        <div id="attributes">
            @if($Products[0]->id_cat!=5 && $Products[0]->id_cat!=6 && $Products[0]->id_cat!=7)
            <div class="col-sm-8 margin-bottom-10" style="background: #f1f1f0;">
                <div class="panel-body">
                    <tbody>
                        <tr>
                            <?php  
                                    $altImgs = DB::table('color_image')->get();
                                    $color_category = DB::table('color_category')->get();
                                ?>
                            <!-- ---------------------------1. BRILLO------------ -->
                            <td>
                                <label for="group_1" class="attribute_label">
                                    {{$color_category[0]->names}}
                                </label>
                            </td>
                            <div style="display: flex;">
                                @foreach($altImgs as $altImg)

                                @if($altImg->id_cat==1)
                                <label class="radio-img" data-toggle="tooltip" data-placement="top"
                                    title="{{$altImg->description}}">
                                    <input type="radio" name="color_puertas" value="{{$altImg->id}}" />
                                    <img style="width: 40px;" src="{{$altImg->url_image}}">
                                </label>
                                @endif

                                @endforeach
                            </div>
                            <!-- ---------------------------2. MAT------------ -->
                            <td>
                                <label for="group_1" class="attribute_label">
                                    {{$color_category[1]->names}}
                                </label>
                            </td>
                            <div style="display: flex;">
                                @foreach($altImgs as $altImg)

                                @if($altImg->id_cat==2)
                                <label class="radio-img" data-toggle="tooltip" data-placement="top"
                                    title="{{$altImg->description}}">
                                    <input type="radio" name="color_puertas" value="{{$altImg->id}}" />
                                    <img style="width: 40px;" src="{{$altImg->url_image}}">
                                </label>
                                @endif

                                @endforeach
                            </div>

                            <!-- ---------------------------3. MADERA------------ -->
                            <td>
                                <label for="group_1" class="attribute_label">
                                    {{$color_category[2]->names}}
                                </label>
                            </td>
                            <div style="display: flex;">
                                @foreach($altImgs as $altImg)

                                @if($altImg->id_cat==3)
                                <label class="radio-img" data-toggle="tooltip" data-placement="top"
                                    title="{{$altImg->description}}">
                                    <input type="radio" name="color_puertas" value="{{$altImg->id}}" />
                                    <img style="width: 40px;" src="{{$altImg->url_image}}">
                                </label>
                                @endif

                                @endforeach
                            </div>
                        </tr>
                    </tbody>
                </div>

            </div>
            <div class="col-sm-4" id="txt_caracteristica" style="text-align: center;"></div>

            @else
            <div class="col-sm-8 margin-bottom-10" style="background: #f1f1f0;">
                <div class="panel-body">

                    <!-- -----------------PUERTAS CON UÑERO------------------------ -->
                    @if($Products[0]->id_cat==6)
                    @include('web.pages.color_pf_unero')
                    @else
                    @include('web.pages.color_pf_unero_normal')
                    @endif
                </div>
            </div>
            <div class="col-sm-4" id="txt_caracteristica" style="text-align: center;">
            </div>
            @endif

        </div>
    </div>
    @endif
    @endif




</div>