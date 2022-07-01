<tbody>
<tr>
    <?php  
        // $altImgs = DB::select("call sp_list_colors(".$Products[0]->id.")");
        $altImgs = DB::table('color_image')->get();
        $color_category = DB::table('color_category')->get();

        ?>
    <!-- ---------------------------1. BRILLO------------ -->
    <td>
        <label for="group_1" class="attribute_label">
            {{$color_category[3]->names}}
        </label>
    </td>
    <div style="display: flex;">
        @foreach($altImgs as $altImg)

        @if($altImg->id_cat==4)
        <label class="radio-img" data-toggle="tooltip"
            data-placement="top" title="{{$altImg->description}}">
            <input type="radio" name="color_puertas_change"  onclick="imagenPrincipal('{{$altImg->url_image}}')"/>
            <img style="width: 40px;" src="{{$altImg->url_image}}">
        </label>
        @endif

        @endforeach
    </div>
    <!-- ---------------------------2. MAT------------ -->
    <td>
        <label for="group_1" class="attribute_label">
            {{$color_category[4]->names}}
        </label>
    </td>
    <div style="display: flex;">
        @foreach($altImgs as $altImg)

        @if($altImg->id_cat==5)
        <label class="radio-img" data-toggle="tooltip"
            data-placement="top" title="{{$altImg->description}}">
            <input type="radio" name="color_puertas_change" onclick="imagenPrincipal('{{$altImg->url_image}}')"/>
            <img style="width: 40px;" src="{{$altImg->url_image}}">
        </label>
        @endif

        @endforeach
    </div>

    <!-- ---------------------------3. MADERA------------ -->
    <td>
        <label for="group_1" class="attribute_label">
            {{$color_category[5]->names}}
        </label>
    </td>
    <div style="display: flex;">
        @foreach($altImgs as $altImg)

        @if($altImg->id_cat==6)
        <label class="radio-img" data-toggle="tooltip"
            data-placement="top" title="{{$altImg->description}}">
            <input type="radio" name="color_puertas_change" onclick="imagenPrincipal('{{$altImg->url_image}}')"/>
            <img style="width: 40px;" src="{{$altImg->url_image}}">
        </label>
        @endif

        @endforeach
    </div>
</tr>
</tbody>