<table id="example1" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>CATEGORIA</th>
            <th>NOMBRE</th>
            <th>CÓDIGO</th>
            <th>DESCRIPCION</th>
            <th>IMAGEN</th>
            <th>MEDIDAS</th>
            <th>ACCIONES</th>
        </tr>
    </thead>
    <tbody>

        @foreach ($rowData_ as $rows)
        <tr>
            <td>{{ $rows->id }}</td>
            <td>{{ $rows->items }}</td>
            <td>{{ $rows->pro_name }}</td>
            <td>{{ $rows->pro_code }}</td>
            <td>{{ $rows->pro_info }}</td>
            <td><div class="attachment-block"><img style="width:100px;height: 120px;" src="{{ $rows->url_image }}" alt="Attachment Image"></div></td>

            <td>
                

<!-- Generator: Adobe Illustrator 19.0.0, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 viewBox="0 0 490.001 490.001" style="enable-background:new 0 0 490.001 490.001;" xml:space="preserve">
<g>
	<g id="XMLID_42_">
		<g>
			<path style="fill:#31C0D8;" d="M150,150.001v-140l330,470H150v-50v-70v-70v-70V150.001z M330,390.001l-105-140v140H330z"/>
			<polygon style="fill:#FFD248;" points="10,155.001 10,75.001 10,10.001 110,10.001 110,480.001 10,480.001 10,415.001 
				10,335.001 10,245.001 			"/>
		</g>
		<g>
			<path d="M488.185,474.255l-330.001-470c-2.506-3.57-7.038-5.104-11.197-3.789C142.828,1.78,140,5.639,140,10.001v470
				c0,5.523,4.477,10,10,10h330c3.731,0,7.152-2.078,8.873-5.388C490.594,481.302,490.329,477.309,488.185,474.255z M160,470.001
				v-30h30v-20h-30v-50h30v-20h-30v-50h30v-20h-30v-50h30v-20h-30v-50h30v-20h-30V41.646l300.76,428.355H160z"/>
			<path d="M225,400.001h105c3.788,0,7.25-2.14,8.944-5.528c1.694-3.388,1.328-7.442-0.944-10.472l-105-140
				c-2.583-3.444-7.078-4.849-11.162-3.487c-4.083,1.361-6.838,5.183-6.838,9.487v140C215,395.524,219.478,400.001,225,400.001z
				 M235,280.001l75,100h-75V280.001z"/>
			<path d="M110,0.001H10c-5.523,0-10,4.477-10,10v470c0,5.523,4.477,10,10,10h100c5.523,0,10-4.477,10-10v-470
				C120,4.478,115.523,0.001,110,0.001z M100,470.001H20v-45h40v-20H20v-60h40v-20H20v-70h40v-20H20v-70h40v-20H20v-60h40v-20H20
				v-45h80V470.001z"/>
		</g>
	</g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
</svg>

            </td>
            <td>
                <a href="javascript:void(0)" onclick="openModalCrud({{ $rows->id }},'ACTUALIZAR',{{ $rows->id_cat }})"
                    class="btn bg-gradient-success"><i class="far fa-edit"></i> </a>
                <a href="javascript:void(0)" onclick="openModalCrud({{ $rows->id }},'ELIMINAR',{{ $rows->id_cat }})"
                    class="btn bg-gradient-danger"><i class="fas fa-trash-alt"></i> </a>
            </td>
        </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <th>ID</th>
            <th>CATEGORIA</th>
            <th>NOMBRE</th>
            <th>CÓDIGO</th>
            <th>DESCRIPCION</th>
            <th>IMAGEN</th>
            <th>MEDIDAS</th>
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