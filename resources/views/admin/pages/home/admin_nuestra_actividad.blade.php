@extends('admin.master')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0" style="color:white;">.</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>

                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div id="msj_alert__"></div>
                <div class="col-12">

                    <div class="pull-right" style="text-align: center;">
                        <a href="javascript:void(0)" onclick="openModalTraining(false,'CREAR')"
                            class="btn btn-block bg-gradient-success"><i class="far fa-edit"></i> Crear Actividad</a>
                    </div>

                    <div class="row" style="text-align: center;display: initial;">

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Nuestras Actividades</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body" id="updateDiv"></div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    <!-- Modal Descripcion-->
    <div class="modal fade" id="modalTraining" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="txt_tituloModal">Actualizar Actividad</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="uploadFormTraining">
                        <input type="hidden" name="txt_id_actividad" />
                        <input type="hidden" name="isValues" />

                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-sm-12">

                                <div class="card card-primary">
                                    <div class="card-body">

                                        <div class="form-group">
                                            <div class="form-group">
                                                <label>Titulo Principal</label>
                                                <input type="text" class="form-control" name="txt_titulo" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="txt_descripcion">Descripción</label>
                                            <textarea class="form-control" name="txt_descripcion" rows="3"
                                                placeholder="Enter ..." required></textarea>
                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button class="btn btn-primary" id="btn_sumit">Aplicar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal Texto-->
    <div class="modal fade" id="modalDescripcionTexto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" style="max-width: 90%;" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="txt_tituloModal">Enlace Texto</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="uploadFormTexto">
                        <input type="hidden" name="txt_id_actividad" />
                        <input type="hidden" name="isValues" />

                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-sm-12">

                                <div class="card card-primary">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="txt_descripcion">Descripción</label>
                                            <textarea id="summernote" name="txt_descripcion_texto"></textarea>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button class="btn btn-primary" id="btn_sumit">Aplicar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


</div>


@endsection


@push('scripts')
<script>
//:::::::::::: CRUD :::::::::::::::::::::::::::::
function listData_NuestraActividad(id_actividad) {
    $.ajax({
        type: 'get',
        dataType: 'html',
        url: 'listData_NuestraActividad',
        data: "txt_id_actividad=" + id_actividad,
        success: function(response) {
            $('#updateDiv').html(response);
        }
    });
}

listData_NuestraActividad(0)


function openModalTraining(id_actividad, isValues) {
    // CASO CLICK MODAL, ELIMINAR
    if (isValues == "ELIMINAR") {
        if (confirm('Esta seguro de Eliminar?')) {
            let formData = new FormData();
            formData.append('txt_id_actividad', id_actividad)
            formData.append('isValues', isValues)
            axios.post('selectData_NuestraActividad',
                formData, {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                }
            ).then(function(response) {
                setTimeout(() => {
                    if (response.status == 200) {
                        Swal.fire(
                            'Good job!',
                            'You clicked the button!',
                            'success'
                        )
                        listData_NuestraActividad($('select[name=txt_id_servicio_filtrar]').val())
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Something went wrong!',
                        })
                    }
                }, 500);
            }).catch(function() {
                console.log('FAILURE!!');
            });
        }

    } else if (isValues == 'TEXTO') {

        $('input[name=txt_id_actividad]').val(id_actividad)
        $('input[name=isValues]').val(isValues) //OPCION DE CREAR, ACTUALIZAR

        $('#modalDescripcionTexto').modal({
            backdrop: 'static',
            keyboard: false // to prevent closing with Esc button (if you want this too)
        })

        let formData = new FormData();
        formData.append('txt_id_actividad', id_actividad)
        axios.post('editData_NuestraActividad',
            formData, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            }
        ).then(function(response) {

            // $('#summernote').code(response.data[0].descripcion_texto);
            //$('#summernote').summernote('editor.pasteHTML',response.data[0].descripcion_texto);

            // $('#summernote').summernote('code', response.data[0].descripcion_texto);

            // $('#summernote').summernote('code', '')
            $('#summernote').html(escape($('#summernote').summernote('code', response.data[0]
                .descripcion_texto)));


            // $('#summernote').html(escape($('#summernote').summernote('code', response.data[0].descripcion_texto)));

        }).catch(function() {
            console.log('FAILURE!!');
        });


    } else {
        // CASO CLICK MODAL, EDITAR
        $('#modalTraining').modal('show')
        $('input[name=txt_id_actividad]').val(id_actividad)
        $('input[name=isValues]').val(isValues) //OPCION DE CREAR, ACTUALIZAR

        if (isValues == 'CREAR') {

            //LIMPIAR
            $('input[name=txt_id_menu]').val("");
            $('textarea[name=txt_descripcion]').val("");
            $('input[name=txt_titulo]').val("");

        }
        // CASO , SI ES FALSO => ES EDITAR
        if (id_actividad) {

            let formData = new FormData();
            formData.append('txt_id_actividad', id_actividad)
            axios.post('editData_NuestraActividad',
                formData, {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                }
            ).then(function(response) {

                $('input[name=txt_id_actividad]').val(response.data[0].id_actividad);
                $('input[name=txt_titulo]').val(response.data[0].titulo);
                $('textarea[name=txt_descripcion]').val(response.data[0].descripcion);

            }).catch(function() {
                console.log('FAILURE!!');
            });
        }
    }
}

//OPERACIONES:CREAR, ACTUALIZAR
$('#uploadFormTraining').on('submit', function(e) {
    e.preventDefault();

    $('#modalTraining').modal('hide')
    let formData = new FormData(this);
    axios.post('selectData_NuestraActividad',
        formData, {
            headers: {
                'Content-Type': 'multipart/form-data'
            }
        }
    ).then(function(response) {

        setTimeout(() => {
            if (response.status == 200) {
                Swal.fire(
                    'Good job!',
                    'You clicked the button!',
                    'success'
                )
                listData_NuestraActividad($('select[name=txt_id_servicio_filtrar]').val())
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Something went wrong!',
                })
            }
        }, 500);

    }).catch(function() {
        console.log('FAILURE!!');
    });

});


//OPERACIONES:CREAR, ACTUALIZAR
$('#uploadFormTexto').on('submit', function(e) {
    e.preventDefault();

    $('#modalDescripcionTexto').modal('hide')
    let formData = new FormData(this);
    axios.post('selectData_NuestraActividad',
        formData, {
            headers: {
                'Content-Type': 'multipart/form-data'
            }
        }
    ).then(function(response) {

        setTimeout(() => {
            if (response.status == 200) {
                Swal.fire(
                    'Good job!',
                    'You clicked the button!',
                    'success'
                )
                listData_NuestraActividad($('select[name=txt_id_servicio_filtrar]').val())
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Something went wrong!',
                })
            }
        }, 500);

    }).catch(function() {
        console.log('FAILURE!!');
    });

});

$('textarea[name=txt_descripcion_texto]').summernote({
    tabsize: 4,
    height: 420
});
</script>
@endpush