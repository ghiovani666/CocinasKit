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
                        <li class="breadcrumb-item active">Tabla de Diapositivas</li>
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

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Actualizar Categorias</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <!-- we are adding the accordion ID so Bootstrap's collapse plugin detects it -->
                            <div id="accordion">
                                <div class="card card-success">
                                    <div class="card-header">
                                        <h4 class="card-title w-100">
                                            <a class="d-block w-100" data-toggle="collapse" href="#collapseThree">
                                                Abrir Categorias
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseThree" class="collapse" data-parent="#accordion">
                                        <div class="card-body">
                                            <form id="uploadFormTextoCategoria">
                                                <input type="hidden" name="isValues" value="TEXTO_CATEGORIA" />

                                                {{ csrf_field() }}
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="card-block">
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Categoria
                                                                    1</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" name="txt_categoria_1"
                                                                        class="form-control"
                                                                        value="{{$rowData_[0]->nombre}}" />
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Categoria
                                                                    2</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" name="txt_categoria_2"
                                                                        class="form-control"
                                                                        value="{{$rowData_[1]->nombre}}" />
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Categoria
                                                                    3</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" name="txt_categoria_3"
                                                                        class="form-control"
                                                                        value="{{$rowData_[2]->nombre}}" />
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Categoria
                                                                    4</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" name="txt_categoria_4"
                                                                        class="form-control"
                                                                        value="{{$rowData_[3]->nombre}}" />
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Categoria
                                                                    5</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" name="txt_categoria_5"
                                                                        class="form-control"
                                                                        value="{{$rowData_[4]->nombre}}" />
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary">Actualizar</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>

                <div class="col-12">
                    <div class="pull-right" style="text-align: center;">
                        <a href="javascript:void(0)" onclick="openModalTraining(false,'CREAR')"
                            class="btn btn-block bg-gradient-success"><i class="far fa-edit"></i> Crear Estudio</a>
                    </div>

                    <div class="row" style="text-align: center;display: initial;">
                        <div class="form-group">
                            <label>Filtrar x Categoria</label>
                            <div class="input-group">

                                @if(count($rowData_)!=0)
                                <select class="custom-select" id="txt_id_servicio_filtrar"
                                    name="txt_id_servicio_filtrar">
                                    <option value="0">------------All ---------------- </option>
                                    @foreach ($rowData_ as $rows)
                                    <option value="{{$rows->id_estudio_categoria}}">{{$rows->nombre}}</option>
                                    @endforeach
                                </select>
                                @endif

                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" id="btnBuscar" type="button"><i
                                            class="fa fa-search"></i></button>
                                </div>
                            </div>

                        </div>

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">DataTable de Estudios</h3>
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

    <!-- Modal de CRUD-->
    <div class="modal fade" id="modalTraining" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="txt_tituloModal">Actualizar Estudios</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="uploadFormTraining">
                        <input type="hidden" name="txt_id_estudio" />
                        <input type="hidden" name="isValues" />

                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-sm-12">

                                <div class="card card-primary">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label>Categoria</label>
                                                <select class="form-control" name="txt_id_estudio_categoria">
                                                    @foreach ($rowData_ as $rows)
                                                    <option value="{{$rows->id_estudio_categoria}}">{{$rows->nombre}}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="form-group">
                                                <label>Titulo</label>
                                                <input type="text" class="form-control" name="txt_titulo" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="txt_descripcion">Descripción</label>
                                            <textarea class="form-control" name="txt_descripcion" rows="3"
                                                placeholder="Enter ..." required></textarea>
                                        </div>
                                        <div class="form-group" style="text-align: center">
                                            <div class="contain animated bounce">
                                                <div class="alert"></div>
                                                <div id='img_contain'>
                                                    <img id="blah" align='middle'
                                                        src="http://www.clker.com/cliparts/c/W/h/n/P/W/generic-image-file-icon-hi.png"
                                                        alt="your image" title='' name="txt_url_image" />
                                                </div>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" id="inputGroupFile01" name="image"
                                                            class="imgInp custom-file-input"
                                                            aria-describedby="inputGroupFileAddon01">
                                                        <label class="custom-file-label" for="inputGroupFile01">Choose
                                                            file</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- <a href="/template_admin/img/modelo/modelo_galeria.jpg"
                                                class="btn btn-primary btn-sm" download><i class="far fa-thumbs-up"></i>
                                                Descargar Modelo</a> -->
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

@push('scripts')
<script>
//:::::::::::: CRUD GALERIAS :::::::::::::::::::::::::::::
function listarDataTable(id_estudio_categoria) {
    $.ajax({
        type: 'get',
        dataType: 'html',
        url: 'listarGaleriaDataTable',
        data: "txt_id_estudio_categoria=" + id_estudio_categoria,
        success: function(response) {
            $('#updateDiv').html(response);
        }
    });
}

listarDataTable(0)

$('#btnBuscar').on('change click', function() {
    const id_estudio_categoria = $('select[name=txt_id_servicio_filtrar]').val();
    console.log(id_estudio_categoria)
    listarDataTable(id_estudio_categoria)
});

//OPERACIONES:CREAR, ACTUALIZAR Y ELIMINAR
$('#uploadFormTraining').on('submit', function(e) {
    e.preventDefault();

    $('#modalTraining').modal('hide')
    let formData = new FormData(this);
    axios.post('createServicioGaleria',
        formData, {
            headers: {
                'Content-Type': 'multipart/form-data'
            }
        }
    ).then(function(response) {
        if (response.data.state == "error") {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Something went wrong!',
            })
        } else {
            Swal.fire(
                'Good job!',
                'You clicked the button!',
                'success'
            )
            if (response.data.src) {
                $('img[name=txt_url_image]').attr('src', response.data.src);
            }
            listarDataTable($('select[name=txt_id_servicio_filtrar]').val())
            $("input[name=image]").val(null);
            $("input[name=image]").val("");
        }
    }).catch(function() {
        console.log('FAILURE!!');
    });

});


function openModalTraining(id_estudio, isValues) {
    // CASO CLICK MODAL, ELIMINAR
    if (isValues == "ELIMINAR") {
        if (confirm('Esta seguro de Eliminar?')) {
            let formData = new FormData();
            formData.append('txt_id_estudio', id_estudio)
            formData.append('isValues', isValues)
            axios.post('createServicioGaleria',
                formData, {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                }
            ).then(function(response) {
                if (response.data.state == "error") {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong!',
                    })
                } else {
                    Swal.fire(
                        'Good job!',
                        'You clicked the button!',
                        'success'
                    )
                    listarDataTable($('select[name=txt_id_servicio_filtrar]').val())
                }

            }).catch(function() {
                console.log('FAILURE!!');
            });
        }

    } else if (isValues == 'TEXTO') {

        $('input[name=txt_id_actividad]').val(id_estudio)
        $('input[name=isValues]').val(isValues) //OPCION DE CREAR, ACTUALIZAR

        $('#modalDescripcionTexto').modal({
            backdrop: 'static',
            keyboard: false // to prevent closing with Esc button (if you want this too)
        })

        let formData = new FormData();
        formData.append('txt_id_estudio', id_estudio)
        axios.post('editData_NuestroEstudio',
            formData, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            }
        ).then(function(response) {
            $('#summernote').html(escape($('#summernote').summernote('code', response.data[0]
                .descripcion_texto)));
        }).catch(function() {
            console.log('FAILURE!!');
        });

    } else {
        // CASO CLICK MODAL, EDITAR
        $('#modalTraining').modal('show')
        $('input[name=txt_id_estudio]').val(id_estudio)
        $('input[name=isValues]').val(isValues) //OPCION DE CREAR, ACTUALIZAR

        if (isValues == 'CREAR') {

            //LIMPIAR
            $('input[name=txt_id_estudio_categoria]').val("");
            $('textarea[name=txt_descripcion]').val("");
            $('img[name=txt_url_image]').attr('src', "/template_admin/img/modelo/fotos.png");
            $("input[name=image]").val(null);
        }
        // CASO , SI ES FALSO => ES EDITAR
        if (id_estudio) {

            let formData = new FormData();
            formData.append('txt_id_estudio', id_estudio)
            axios.post('editServicioGaleria',
                formData, {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                }
            ).then(function(response) {

                $('input[name=txt_id_estudio]').val(response.data[0].id_estudio);
                $('input[name=txt_titulo]').val(response.data[0].titulo);
                $('textarea[name=txt_descripcion]').val(response.data[0].descripcion);
                $('select[name=txt_id_estudio_categoria]').val(response.data[0].id_estudio_categoria);
                $('img[name=txt_url_image]').attr('src', (response.data[0].url_image != null ? response.data[0]
                    .url_image : "/template_admin/img/modelo/fotos.png"));

            }).catch(function() {
                console.log('FAILURE!!');
            });
        }
    }
}
// ::::::::::::::::: SELECCIONAR IMAGEN :::::::::::::::::::::::::::
$("#inputGroupFile01").change(function(event) {
    RecurFadeIn();
    readURL(this);
});
$("#inputGroupFile01").on('click', function(event) {
    RecurFadeIn();
});

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        var filename = $("#inputGroupFile01").val();
        filename = filename.substring(filename.lastIndexOf('\\') + 1);
        reader.onload = function(e) {
            //   debugger;      
            $('#blah').attr('src', e.target.result);
            $('#blah').hide();
            $('#blah').fadeIn(500);
            $('.custom-file-label').text(filename);
        }
        reader.readAsDataURL(input.files[0]);
    }
    $(".alert").removeClass("loading").hide();
}

function RecurFadeIn() {
    console.log('ran');
    FadeInAlert("Wait for it...");
}

function FadeInAlert(text) {
    $(".alert").show();
    $(".alert").text(text).addClass("loading");
}

// ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::



//OPERACIONES:CREAR, ACTUALIZAR
$('#uploadFormTexto').on('submit', function(e) {
    e.preventDefault();

    $('#modalDescripcionTexto').modal('hide')
    let formData = new FormData(this);
    axios.post('createServicioGaleria',
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




//OPERACIONES:CREAR, ACTUALIZAR
$('#uploadFormTextoCategoria').on('submit', function(e) {
    e.preventDefault();
    $('#modalDescripcionTexto').modal('hide')
    let formData = new FormData(this);
    axios.post('createServicioGaleria',
        formData, {
            headers: {
                'Content-Type': 'multipart/form-data'
            }
        }
    ).then(function(response) {

        setTimeout(() => {
            if (response.status == 200) {
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Your work has been saved',
                    showConfirmButton: false,
                    timer: 1500
                }).then(() => {
                    window.location.reload();
                })
               
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
</script>
@endpush

<style type="text/css">
.alert {
    text-align: center;
}

#blah {
    max-height: 256px;
    height: auto;
    width: auto;
    display: block;
    margin-left: auto;
    margin-right: auto;
    padding: 5px;
}

.input-group {
    /* margin-left:calc(calc(100vw - 320px)/2); */
    /* margin-top: 40px;
    width: 320px; */
    margin-bottom: 25px;
}

.imgInp {
    width: 150px;
    /* margin-top: 10px; */
    padding: 10px;
    background-color: #d3d3d3;
}

.loading {
    animation: blinkingText ease 2.5s infinite;
}

@keyframes blinkingText {
    0% {
        color: #000;
    }

    50% {
        color: #transparent;
    }

    99% {
        color: transparent;
    }

    100% {
        color: #000;
    }
}

.custom-file-label {
    cursor: pointer;
}

/************CREDITS**************/
.credit {
    font: 14px "Century Gothic", Futura, sans-serif;
    font-size: 12px;
    color: #3d3d3d;
    text-align: left;
    /* margin-top: 10px; */
    margin-left: auto;
    margin-right: auto;
    text-align: center;
}

.credit a {
    color: gray;
}

.credit a:hover {
    color: black;
}

.credit a:visited {
    color: MediumPurple;
}
</style>
@endsection