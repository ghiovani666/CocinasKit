<table id="example1" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>NOMBRE</th>
            <th>EMAIL</th>
            <th>TEÉFONO</th>
            <th>UBICACIÓN</th>
            <th>FECHA CREACIÓN</th>
            <th>FECHA ACTUALIZACIÓN</th>

            <th>ESTADO</th>
            <th>ACCIONES</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($rowData_ as $rows)
        <tr>
            <td>{{ $rows->id }}</td>
            <td>{{ $rows->name }}</td>
            <td>{{ $rows->email }}</td>
            <td>{{ $rows->telefono }}</td>
            <td>{{ $rows->ubicacion }}</td>
            <td>{{ $rows->created_at }}</td>
            <td>{{ $rows->updated_at }}</td>

            <td>
                @if ($rows->estado_oferta==1)
                <div class="btn bg-gradient-success"><i class="fas fa-check-circle"></i> </div>
                @else
                <div class="btn  bg-gradient-danger"><i class="fas fa-times"></i> </div>
                @endif

            </td>

            <td>
                <a href="javascript:void(0)" onclick="openModalCrud({{ $rows->id }},'ACTUALIZAR' )"
                    class="btn bg-gradient-success"><i class="far fa-edit"></i> </a>
                <a href="javascript:void(0)" onclick="openModalCrud({{ $rows->id }},'ELIMINAR' )"
                    class="btn bg-gradient-danger"><i class="fas fa-trash-alt"></i> </a>
            </td>
        </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <th>ID</th>
            <th>NOMBRE</th>
            <th>EMAIL</th>
            <th>TEÉFONO</th>
            <th>UBICACIÓN</th>
            <th>FECHA CREACIÓN</th>
            <th>FECHA ACTUALIZACIÓN</th>

            <th>ESTADO</th>
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