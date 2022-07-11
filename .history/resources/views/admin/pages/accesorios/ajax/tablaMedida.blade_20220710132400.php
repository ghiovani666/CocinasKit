<table id="example1" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th style="width: 10px">N°</th>
            <th>Largo</th>
            <th>Alto</th>
            <th style="width: 40px">Precio</th>
            <th style="width: 40px">Accion</th>
        </tr>
    </thead>
    <tbody>

        @foreach ($rowData_ as $rows)
        <tr>
            <td>{{ $rows->id_medida }}</td>
            <td>{{ $rows->largo }} cm</td>
            <td>{{ $rows->alto }} cm</td>
            <td><span class="badge bg-danger"> € {{ $rows->price }}</span></td>
            <td style="display: flex;">
                <a href="#" onclick="openModalMedidasEditar({{ $rows->id_medida }},'EDITAR')" class="btn btn-badge"><i class="fas fa-edit"></i></a>
                <a  href="#" onclick="openModalMedidasEditar({{ $rows->id_medida }},'ELIMINAR')" class="btn btn-badge"><i class="fas fa-trash-alt"></i></a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<script>
</script>