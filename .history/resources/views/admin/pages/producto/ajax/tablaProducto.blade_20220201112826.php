<table id="example1" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>PAGINA</th>
            <th>TITULO</th>
            <th>SUBTITULO</th>
            <th>DESCRIPCION</th>
            <th>IMAGEN</th>
            <th>ACCIONES</th>
        </tr>
    </thead>
    <tbody>

        @foreach ($rowData_ as $rows)
        <tr>
            <td>{{ $rows->id_gallery }}</td>
            <td>{{ 
                $rows->id_menu==1?'Galeria':($rows->id_menu==2?'Proyectos':($rows->id_menu==3?'Reformas':($rows->id_menu==4?'Decoración':$rows->id_menu)))   }}</td>
            <td>{{ $rows->titulo }}</td>
            <td>{{ $rows->sub_titulo }}</td>
            <td>{{ $rows->descripcion }}</td>
            <td><div class="attachment-block"><img class="attachment-img" src="{{ $rows->url_image }}" alt="Attachment Image"></div></td>
            <td>
                <a href="javascript:void(0)" onclick="openModalTraining({{ $rows->id_gallery }},'ACTUALIZAR' )"
                    class="btn btn-block bg-gradient-success"><i class="far fa-edit"></i> </a>
                <a href="javascript:void(0)" onclick="openModalTraining({{ $rows->id_gallery }},'ELIMINAR' )"
                    class="btn btn-block bg-gradient-danger"><i class="fas fa-trash-alt"></i> </a>
            </td>

        </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <th>ID</th>
            <th>PAGINA</th>
            <th>TITULO</th>
            <th>SUBTITULO</th>
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