<table id="example2" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>NOMBRE</th>
            <th>IMAGEN</th>
            <th>ACCIONES</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($rowData_ as $rows)
        <tr>
            <td>{{ $rows->id }}</td>
            <td>{{ $rows->nombre }}</td>
            <td>
                <div class="attachment-block"><img style="width:100px;height: 120px;" src="{{ $rows->url_image }}"
                        alt="Attachment Image"></div>
            </td>

            <td>
                <div class="col-12" style="display: flex;margin-top: 12px;">
                    <label for="lbl_name">
                        <h5>COLORES</h5>
                    </label>
                </div>

                <!-- COLOR: Es el id color:  $items->id -->

                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                    <div class="select2-purple">
                        <select name="nameColor[]" multiple
                            class="form-control nameColor <!-- @error('authors') is-invalid @enderror -->">
                            @foreach ($cbColores as $items)
                            <option value="{{ $items->id }}" ids="{{ $rows->id_producto }}"
                                {{ ($rows->id_modelo_puerta==$items->id_modelo_puerta ? $items->id == $items->id_color ? 'selected' : '':'') }}>
                                {{ $items->name_color }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <th>ID</th>
            <th>NOMBRE</th>
            <th>DESCRIPCION</th>
            <th>ACCIONES</th>
        </tr>
    </tfoot>
</table>

<script>
//:::::::::::: CRUD SERVICIOS :::::::::::::::::::::::::::::
$(function() {
    $("#example2").DataTable({
        "order": [
            [0, "desc"]
        ],
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
        // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example2_wrapper .col-md-6:eq(0)');



    //Initialize Select2 Elements
    $('.nameColor').select2()


    $(".nameColor").on("select2:select", function(e) {

        var myIf = e.currentTarget.ids;

        console.log(myIf)
        var select_val = $(e.currentTarget).val();
        console.log(select_val)
    });



});
</script>