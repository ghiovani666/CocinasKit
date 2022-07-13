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
                    <label for="lbl_name" class="check_ShowHide"
                        style="margin-left: 20px;margin-top: 2px;">Todos:</label>
                    <input type="checkbox" class="check_ShowHide" id="check_1" name="check_1"
                        style="width: 17px;height: 33px;margin-left: 10px;" value="1">
                </div>

                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                    <div class="select2-purple">
                        <select name="nameColor[]" multiple
                            class="form-control nameColor <!-- @error('authors') is-invalid @enderror -->">
                            @foreach ($cbColores as $items)
                            <option value="{{ $items->id }}">
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

});
</script>