@if($Products[0]->id_cat!=1 && $Products[0]->id_cat!=11 && $Products[0]->id_cat!=12 &&
$Products[0]->id_cat!=13)
<div class="product_attributes clearfix margin-bottom-10">
    <h3 class="cko_pb_center_column_title" style="background: #6f6f6f;">ACABADO DEL MUEBLE</h3>
    <div id="attributes">

        <fieldset class="attribute_fieldset"
            style="height: <?php echo $resultado =((($Products[0]->id_cat==5 || $Products[0]->id_cat==6 || $Products[0]->id_cat==7 )?270:($Products[0]->id_cat==8 || $Products[0]->id_cat==9 || $Products[0]->id_cat==10 || $Products[0]->id_cat==16 ))?270:370); ?>px;">


            <div id="attributes">

                <div class="row margin-bottom-30">
                    <div class="col-sm-3">
                        <label for="size">Ancho <em class="cocinakit_help_icon icon-question circle-icon"></em></label>
                        <p class="cocinakit_help_text" style="display: none;">
                            <img
                                src="https://www.cocinaskitonline.com/modules/cocinakit_configurador/img/ayudas/medidas.jpg">-
                            Se toma como ancho del mueble la medida
                            EXTERIOR del
                            mismo.<br /><br />- En caso de que se
                            quiera
                            un
                            mueble
                            con un ancho diferente a los estándares
                            que
                            se
                            ofrecen
                            en el desplegable, puede dirigirse al
                            apartado CORTE
                            A
                            MEDIDA en la parte derecha de la
                            pantalla e
                            introducir
                            la medida deseada.
                        </p>
                        <?php $sizes = DB::table('medida as md')
                                                    ->select(DB::raw('DISTINCT(CONCAT(md.ancho,md.unidad_ancho)) AS unidad'),'md.ancho')
                                                ->where('md.id_imagen',$Products[0]->id_imagen)
                                                ->where('md.ancho','>',0)
                                                    ->get();?>

                        @if(count($sizes)!=0)
                        <select name="txt_ancho" id="txt_ancho" class="form-control">
                            @foreach ($sizes as $size)
                            <option value="{{$size->ancho}}">{{$size->unidad}}</option>
                            @endforeach
                        </select>
                        @endif
                    </div>
                    <div class="col-sm-3">
                        <label for="size">Alto</label>
                        <?php $sizes = DB::table('medida as md')
                                                    ->select(DB::raw('DISTINCT(CONCAT(md.alto,md.unidad_alto)) AS unidad'),'md.alto')
                                                ->where('md.id_imagen',$Products[0]->id_imagen)
                                                ->where('md.alto','>',0)
                                                    ->get();?>

                        @if(count($sizes)!=0)
                        <select name="txt_alto" id="txt_alto" class="form-control">
                            @foreach ($sizes as $size)
                            <option value="{{$size->alto}}">{{$size->unidad}}</option>
                            @endforeach
                        </select>
                        @endif
                    </div>

                </div>


                @if($Products[0]->apertura==1)
                <div class="margin-bottom-40">

                    <label for="layout" style="color: #000000;font-weight: bold;">APERTURA
                        <em class="cocinakit_help_icon icon-question circle-icon" original-title=""></em></label><br />
                    <p class="cocinakit_help_text" style="display: none;"><img
                            src="https://www.cocinaskitonline.com/modules/cocinakit_configurador/img/ayudas/apertura.jpg">-
                        Las opciones de apertura a izquierta o
                        derecha sólo
                        serán seleccionables mientras el mueble
                        no
                        supere una
                        anchura de 70 cm, ya que a partir de esa
                        medida la
                        configuración del mueble será de 2
                        puertas.<br><br>- La
                        opción de apertura doble sólo será
                        seleccionable a
                        partir de una anchura de mueble de 50
                        cm, ya
                        que por
                        debajo de esa medida la configuración
                        del
                        mueble será de
                        1 puerta.</p>
                    <div class="col-sm-12" style="display: flex;">
                        @if($Products[0]->apert_izquierda==1)
                        <input class="form-check-input" type="radio" name="txt_apertura" style="margin-right: 10px;"
                            value="1" checked>
                        <label class="form-check-label" for="txt_apertura">
                            Izquierda
                        </label>
                        @endif

                        @if($Products[0]->apert_derecha==1)
                        <input style="margin-left: 47px;" class="form-check-input" style="margin-right: 10px;"
                            type="radio" name="txt_apertura" value="2">
                        <label class="form-check-label" style="margin-left: 10px;" for="txt_apertura">
                            Derecha
                        </label>
                        @endif

                        @if($Products[0]->apert_doble==1)
                        <input style="margin-left: 47px;" class="form-check-input" style="margin-right: 10px;"
                            type="radio" name="txt_apertura" value="3">
                        <label class="form-check-label" style="margin-left: 10px;" for="txt_apertura">
                            Doble
                        </label>
                        @endif

                        @if($Products[0]->apert_abatible==1)
                        <input style="margin-left: 47px;" class="form-check-input" style="margin-right: 10px;"
                            type="radio" name="txt_apertura" value="4">
                        <label class="form-check-label" style="margin-left: 10px;" for="txt_apertura">
                            Abatible
                        </label>
                        @endif

                        @if($Products[0]->apert_extraible==1)
                        <input style="margin-left: 47px;" class="form-check-input" style="margin-right: 10px;"
                            type="radio" name="txt_extraible" value="4">
                        <label class="form-check-label" style="margin-left: 10px;" for="txt_extraible">
                            Extraible
                        </label>
                        @endif

                    </div>

                </div>
                @endif


            </div>
        </fieldset>

    </div>
</div>

@endif



@if($Products[0]->id_cat!=1 && $Products[0]->id_cat!=11 && $Products[0]->id_cat!=12 && $Products[0]->id_cat!=13
&& $Products[0]->id_cat!=15
&& $Products[0]->id_cat!=2
&& $Products[0]->id_cat!=3
&& $Products[0]->id_cat!=4
)

<div class="product_attributes margin-bottom-10">
    <h3 class="cko_pb_center_column_title" style="background: #6f6f6f;">TIRADORES</h3>
    <fieldset style="height: 185px;">
        <div class="col-sm-8">


            <div class="col-sm-12 margin-bottom-10">
                <input class="form-check-input" type="radio" name="txt_tirador" value="1" checked>
                <label class="form-check-label" for="patas">
                    Con Tirador
                </label>
            </div>



            <div class="txt_modelo">
                <label for="layout">SELECIONE EL MODELO </label><br />
                <?php  
                    $tirador = DB::table('accesorio')->get();
                    ?>
                <!-- ---------------------------MODELO TIRADOR------------ -->
                <div style="display: flex;">
                    @foreach($tirador as $altImg)
                    <label class="radio-img" data-toggle="tooltip" data-placement="top" title="{{$altImg->names}}">
                        <input type="radio" name="txt_model_tirador"
                            value="{{$altImg->price}}-{{$altImg->id_accesorio}}" />
                        <img style="width: 40px;" src="{{$altImg->url_image}}">
                    </label>
                    @endforeach
                </div>
            </div>

        </div>

        <div class="col-sm-4" id="txt_caracteristica_tirador" style="text-align: center;">
        </div>
    </fieldset>
</div>
@endif