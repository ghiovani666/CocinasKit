<table id="example1" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>CATEGORIA</th>
            <th>TITULO</th>
            <th>DESCRIPCION</th>
            <th>IMAGEN</th>
            <th>ACCIONES</th>
        </tr>
    </thead>
    <tbody>

        @foreach ($rowData_ as $rows)
        <tr>
            <td>{{ $rows->id_estudio }}</td>
            <td>{{ $rows->nombre }}</td>
            <td>{{ $rows->titulo }}</td>
            <td>{{ $rows->descripcion }}</td>
            <td><div class="attachment-block"><img class="attachment-img" src="{{ $rows->url_image }}" alt="Attachment Image"></div></td>
            <td>
                <a href="javascript:void(0)" onclick="openModalTraining({{ $rows->id_estudio }},'ACTUALIZAR' )"
                    class="btn btn-block bg-gradient-success"><i class="far fa-edit"></i> </a>
                <a href="javascript:void(0)" onclick="openModalTraining({{ $rows->id_estudio }},'ELIMINAR' )"
                    class="btn btn-block bg-gradient-danger"><i class="fas fa-trash-alt"></i> </a>
                    <a href="javascript:void(0)" onclick="openModalTraining({{ $rows->id_estudio }},'TEXTO' )"
                    class="btn btn-block bg-gradient-primary"><i class="fab fa-adversal"></i> </a>
            </td>

        </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
        <th>ID</th>
        <th>CATEGORIA</th>
            <th>TITULO</th>
            <th>DESCRIPCION</th>
            <th>IMAGEN</th>
            <th>ACCIONES</th>
        </tr>
    </tfoot>
</table>

<script>
//:::::::::::: CRUD SERVICIOS :::::::::::::::::::::::::::::
$(function() {
    $("#example1").DataTable({
        "order": [
            [0, "desc"]
        ],
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');


});
</script>