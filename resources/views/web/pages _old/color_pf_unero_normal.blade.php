<tbody>
<tr>
    <?php  
        $altImgs = DB::select("call sp_list_colors(".$Products[0]->id.")");
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
            <input type="radio" name="color_puertas_change"  value="{{$altImg->id}}"/>
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
            <input type="radio" name="color_puertas_change"  value="{{$altImg->id}}"/>
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
            <input type="radio" name="color_puertas_change"  value="{{$altImg->id}}"/>
            <img style="width: 40px;" src="{{$altImg->url_image}}">
        </label>
        @endif

        @endforeach
    </div>
</tr>
</tbody>