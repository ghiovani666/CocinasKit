<table id="example1" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>ID</th>
          
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
            <td>{{ $rows->id }}</td>
           
            
            <td>{{ $rows->pro_name }}</td>
            <td>{{ $rows->pro_code }}</td>
            <td>{{ $rows->pro_info }}</td>
            <td><div class="attachment-block"><img class="attachment-img" src="{{ $rows->id }}" alt="Attachment Image"></div></td>
            <td>
                <a href="javascript:void(0)" onclick="openModalTraining({{ $rows->id }},'ACTUALIZAR' )"
                    class="btn btn-block bg-gradient-success"><i class="far fa-edit"></i> </a>
                <a href="javascript:void(0)" onclick="openModalTraining({{ $rows->id }},'ELIMINAR' )"
                    class="btn btn-block bg-gradient-danger"><i class="fas fa-trash-alt"></i> </a>
            </td>

        </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <th>ID</th>
       
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