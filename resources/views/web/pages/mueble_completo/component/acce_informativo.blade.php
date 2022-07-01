@if($Products[0]->id_cat==1)
<div class="product_attributes clearfix margin-bottom-30" style="background: #f1f1f0;height: 276px;">
    <h3 class="cko_pb_center_column_title" style="background: #6f6f6f;">DESCRIPCIÓN DEL PRODUCTO</h3>
    <div id="attributes">
        {{$Products[0]->pro_info}}
    </div>
</div>
@endif

@if($Products[0]->id_cat==11 || $Products[0]->id_cat==12 || $Products[0]->id_cat==13)
<div class="product_attributes clearfix margin-bottom-30" style="background: #f1f1f0;height: 325px;">
    <h3 class="cko_pb_center_column_title" style="background: #6f6f6f;">DESCRIPCIÓN DEL PRODUCTO</h3>
    <div id="attributes" style="margin-left: 12px;margin-right: 12px;">
        {{$Products[0]->pro_info}}
    </div>

    <div id="attributes" style="margin-top: 25px;margin-left: 12px;">
        <div class="row margin-bottom-30">

            <div class="col-sm-3">
                <label for="size">Largo</label>
                <?php $sizes = DB::table('medida as md')
                    ->select(DB::raw('DISTINCT(CONCAT(md.largo,md.unidad_largo)) AS unidad'),'md.largo')
                    ->where('md.id_medida',$Products[0]->id_medida)
                    ->get();?>

                @if(count($sizes)!=0)
                <select name="txt_alto" id="txt_alto" class="form-control">
                    @foreach ($sizes as $size)
                    <option value="{{$size->largo}}">{{$size->unidad}}</option>
                    @endforeach
                </select>
                @endif
            </div>

        </div>
    </div>

    <div class="txt_modelo">
        <?php  
        $imagen = DB::table('imagen')
        ->leftJoin('medida', 'imagen.id_imagen', '=', 'medida.id_imagen')
        ->where('imagen.id_product', '=',$Products[0]->id)
        ->get();
        ?>
        <!-- ---------------------------LISTA DE IMAGENES------------ -->
        <div style="display: flex;margin-left: 12px;">
            @foreach($imagen as $altImg)
            <label class="radio-img" data-toggle="tooltip" data-placement="top" title="{{$altImg->description}}">
                <input type="radio" value="{{$altImg->price}}-{{$altImg->id_imagen}}"
                    onclick="imagenPrincipal('{{$altImg->url_image}}')" />
                <img style="width: 100px;" src="{{$altImg->url_image}}">
            </label>
            @endforeach
        </div>
    </div>

</div>
@endif