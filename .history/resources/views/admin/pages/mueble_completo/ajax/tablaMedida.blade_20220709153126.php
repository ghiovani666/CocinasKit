<table id="example1" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th style="width: 10px">N°</th>
            <th>Ancho</th>
            <th>Alto</th>
            <th>Fondo</th>
            <th>Imagen</th>
            <th style="width: 40px">Precio</th>
            <th style="width: 40px">Accion</th>
        </tr>
    </thead>
    <tbody>

        @foreach ($rowData_ as $rows)
        <tr>
            <td>1.</td>
            <td>53 cm</td>
            <td>56 cm</td>
            <td>53 cm</td>
            <th><img style="width: 30px;height: 37px;" src="/img/mc_modelo_puerta/modelo3.png"></th>
            <td><span class="badge bg-danger"> 35.25</span></td>
            <td><button type="button" class="btn btn-badge"><i class="fas fa-trash-alt"></i></button></td>
        </tr>
        @endforeach
    </tbody>
</table>

<script>
</script>