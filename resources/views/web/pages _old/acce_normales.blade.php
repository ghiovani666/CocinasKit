@if($Products[0]->id_cat==1 || $Products[0]->id_cat==11 || $Products[0]->id_cat==12 ||
                                    $Products[0]->id_cat==13)
                                    <div class="product_attributes clearfix ">
                                        <h3 class="cko_pb_center_column_title" style="background: #6f6f6f;">COLORES</h3>
                                        <div id="attributes">
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
                                                            <label class="radio-img" data-toggle="tooltip"
                                                                data-placement="top" title="{{$altImg->description}}">
                                                                <input type="radio" name="color_puertas"
                                                                    {{ $altImg->id == $Products[0]->id_color ? 'checked' : ''}}
                                                                    value="{{$altImg->id}}" />
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
                                                            <label class="radio-img" data-toggle="tooltip"
                                                                data-placement="top" title="{{$altImg->description}}">
                                                                <input type="radio" name="color_puertas"
                                                                    {{ $altImg->id == $Products[0]->id_color ? 'checked' : ''}}
                                                                    value="{{$altImg->id}}" />
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
                                                            <label class="radio-img" data-toggle="tooltip"
                                                                data-placement="top" title="{{$altImg->description}}">
                                                                <input type="radio" name="color_puertas"
                                                                    {{ $altImg->id == $Products[0]->id_color ? 'checked' : ''}}
                                                                    value="{{$altImg->id}}" />
                                                                <img style="width: 40px;" src="{{$altImg->url_image}}">
                                                            </label>
                                                            @endif

                                                            @endforeach
                                                        </div>
                                                    </tr>
                                                </tbody>
                                            </div>
                                        </div>

                                            <div class="col-sm-4" id="txt_caracteristica" style="text-align: center;">
                                            </div>
                                        
                                        </div>
                                    </div>

                                    <div style="height: 190px;background: #f1f1f0;">
                                    <div class="col-sm-8">

                                        <div class="txt_modelo">
                                            
                                            <label for="layout" style="font-weight: bold;">TIRADORES </label>
                                              <?php  
                                                $tirador = DB::table('accesorio')
                                                ->where('codigo','01')
                                                ->get();
                                                ?>
                                            <!-- ---------------------------MODELO TIRADOR------------ -->
                                            <div style="display: flex;">
                                                @foreach($tirador as $altImg)
                                                <label class="radio-img" data-toggle="tooltip" data-placement="top"
                                                    title="{{$altImg->names}}">
                                                    <input type="radio" name="txt_model_tirador"
                                                        value="{{$altImg->price}}-{{$altImg->id_accesorio}}"/>
                                                    <img style="width: 40px;" src="{{$altImg->url_image}}">
                                                </label>
                                                @endforeach
                                            </div>

                                            <label for="layout" style="font-weight: bold;">COMPLETE SU PEDIDO </label><br />
                                            <label class="form-check-label" for="patas" style="padding-right: 10px;"> Enzimeras:</label>
                                            <?php  
                                                $encimera = DB::table('accesorio')
                                                ->where('codigo','02')
                                                ->get();
                                                ?>
                                            <!-- ---------------------------MODELO TIRADOR------------ -->
                                            <div style="display: flex;">
                                                @foreach($encimera as $altImg)
                                                <label class="radio-img" data-toggle="tooltip" data-placement="top"
                                                    title="{{$altImg->names}}">
                                                    <input type="radio" name="txt_model_enzimera"
                                                        value="{{$altImg->price}}-{{$altImg->id_accesorio}}"/>
                                                    <img style="width: 40px;" src="{{$altImg->url_image}}">
                                                </label>
                                                @endforeach
                                            </div>

                                        </div>

                                        <div class="margin-bottom-10">
                                            <label class="form-check-label" for="patas" style="padding-right: 10px;"> Copete:</label>
                                            <input class="form-check-input" type="checkbox" name="txt_tirador" value="1">
                                        </div>


                                        </div>

                                        <div class="col-sm-4" id="txt_caracteristica_tirador" style="text-align: center;">
                                        </div>
                                    </div>

                                    @endif