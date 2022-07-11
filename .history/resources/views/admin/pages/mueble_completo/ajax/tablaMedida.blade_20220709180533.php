<table id="example1" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th style="width: 10px">N°</th>
            <th>Ancho</th>
            <th>Alto</th>
            <th>Fondo</th>
            <th>I</th>
            <th>D</th>
            <th>2P</th>
            <th style="width: 40px">Precio</th>
            <th style="width: 40px">Accion</th>
        </tr>
    </thead>
    <tbody>

        @foreach ($rowData_ as $rows)
        <tr>
            <td>{{ $rows->id_medida }}</td>
            <td>{{ $rows->ancho }} cm</td>
            <td>{{ $rows->alto }} cm</td>
            <td>{{ $rows->fondo }} cm</td>
            <td>{{ $rows->apert_izquierda=='1'? '<i class="fas fa-check"></i>': '<i class="fas fa-times"></i>'}} </td>

            
            <td><span class="badge bg-danger"> {{ $rows->price }}</span></td>
            <td style="display: flex;"><button type="button" class="btn btn-badge"><i class="fas fa-edit"></i></button>
            <button type="button" class="btn btn-badge"><i class="fas fa-trash-alt"></i></button></td>
        </tr>
        @endforeach
    </tbody>
</table>

<script>
</script>