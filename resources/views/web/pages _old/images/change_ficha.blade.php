<thead>
    <tr>
        <th colspan="2" style="background: #13756f;color: white;text-align: center;font-size: 18px;">Ficha técnica</th>
    </tr>
</thead>
<tbody>


    <tr>
        <td>Tipo</td>
        <td><?php echo ucwords($Medida[0]->pro_name); ?></td>
    </tr>
    <tr>
        <td>Material</td>
        <td>Melamina</td>
    </tr>
    <tr>
        <td>Ancho</td>
        <td>{{$Medida[0]->ancho}}</td>
    </tr>
    <tr>
        <td>Alto</td>
        <td>{{$Medida[0]->alto}}</td>
    </tr>
    <tr>
        <td>Profundidad</td>
        <td>{{$Medida[0]->fondo}}</td>
    </tr>
    <tr>
        <td>Grosor</td>
        <td>? cm</td>
    </tr>
    <tr>
        <td>Color</td>
        <td>{{$Medida[0]->name_color}}</td>
    </tr>
    <tr>
        <td>Uso</td>
        <td>{{$Medida[0]->pro_info}}</td>
    </tr>
</tbody>

