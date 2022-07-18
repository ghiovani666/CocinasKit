@foreach($rdData as $altImg)
<label class="radio-img" title="{{ $altImg->description }}">
    <input type="radio" name="color_puertas" value="{{$altImg->id}}" />
    <img style="width: 40px;" src="{{$altImg->url_image}}">
</label>
@endforeach

<script type="text/javascript">






get_color_puerta(<?php echo (count($rdData)!=0?$rdData[0]->id:'');?>)


</script>