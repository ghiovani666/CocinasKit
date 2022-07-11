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
                        <li class="breadcrumb-item active">Tabla de productos</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


    <!-- Main content -->
    <div class="content" style="text-align: -webkit-right;">
        <div class="col-2">
            <a href="javascript:void(0)" onclick="openModalCrud(false,'CREAR',null)" class="btn bg-gradient-success"><i
                    class="far fa-plus-square"></i> Crear</a>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div id="msj_alert__"></div>
                <div class="col-12">
                    <div class="row" style="text-align: center;display: initial;">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Tabla de productos</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body" id="dataProducto"></div>
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
    <div class="modal fade" id="modalOpen" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="txt_tituloModal">ACCESORIOS</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <!-- Main content -->
                    <section class="content">
                        <!-- Default box -->
                        <div class="card card-solid">
                            <div class="card-body">
                                <form id="uploadForm">
                                    <input type="hidden" name="id_producto" />
                                    <input type="hidden" name="isValues" />

                                    <input type="hidden" name="id_image0" />
                                    <input type="hidden" name="id_image1" />
                                    <input type="hidden" name="id_image2" />
                                    <input type="hidden" name="id_image3" />
                                    <input type="hidden" name="id_image4" />
                                    <input type="hidden" name="id_image5" />

                                    {{ csrf_field() }}

                                    <div class="row">
                                        <div class="col-12 col-sm-6">
                                            <div class="col-12" style="margin-bottom: 15px;">
                                                <input type="text" class="form-control" name="txt_pro_name"
                                                    placeholder="Nombre del Producto" required>
                                            </div>
                                            <div class="col-12">
                                                <label for="file0">
                                                    <img id="blah_0" src="/img/mc_admin/btn_agregar_principal.jpg"
                                                        class="product-image" alt="Product Image"
                                                        style="border: solid 1px;">
                                                </label>
                                                <input id="file0" type="file" name="image0" />
                                            </div>

                                            <div class="col-12 product-image-thumbs">
                                                <label for="file1">
                                                    <div class="product-image-thumb active"><img id="blah_1"
                                                            src="/img/mc_admin/btn_agregar.png" alt="Product Image">
                                                    </div>
                                                    <input id="file1" type="file" name="image1" />
                                                </label>
                                                <label for="file2">
                                                    <div class="product-image-thumb"><img id="blah_2"
                                                            src="/img/mc_admin/btn_agregar.png" alt="Product Image">
                                                    </div>
                                                    <input id="file2" type="file" name="image2" />
                                                </label>
                                                <label for="file3">
                                                    <div class="product-image-thumb"><img id="blah_3"
                                                            src="/img/mc_admin/btn_agregar.png" alt="Product Image">
                                                    </div>
                                                    <input id="file3" type="file" name="image3" />
                                                </label>

                                                <label for="file4">
                                                    <div class="product-image-thumb"><img id="blah_4"
                                                            src="/img/mc_admin/btn_agregar.png" alt="Product Image">
                                                    </div>
                                                    <input id="file4" type="file" name="image4" />
                                                </label>
                                                <label for="file5">
                                                    <div class="product-image-thumb"><img id="blah_5"
                                                            src="/img/mc_admin/btn_agregar.png" alt="Product Image">
                                                    </div>
                                                    <input id="file5" type="file" name="image5" />
                                                </label>


                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6">

                                            <div class="row">
                                                <div class="col-12">
                                                    <select name="txt_id_item" id="txt_id_item" class="form-control">
                                                        @foreach ($cbCategoria as $item)
                                                        <option value="{{$item->id_item}}">{{$item->names}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-12">
                                                    <h3 class="my-3">DESCRIPCIÓN DEL PRODUCTO</h3>
                                                    <textarea class="form-control" name="txt_descripcion" rows="3"
                                                        placeholder="Descripción ..." required></textarea>
                                                </div>
                                            </div>

                                            <div class="mt-4">
                                                <button class="btn btn-primary btn-lg btn-flat" id="btn_sumit"><i
                                                        class="fas fa-save fa-lg mr-2"></i> GUARDAR</button>

                                                <button class="btn btn-default btn-lg btn-flat" type="button"
                                                    data-dismiss="modal"><i class="fas fa-times-circle fa-lg mr-2"></i>
                                                    CERRAR</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </section>
                    <!-- /.content -->
                </div>
            </div>
        </div>
    </div>

    <!-- Modal de medida-->
    <div class="modal fade" id="modalOpenMedida" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="txt_tituloModal">APLICANDO MEDIDAS</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Main content -->
                    <section class="content">
                        <!-- Default box -->
                        <div class="card card-solid">
                            <div class="card-body">
                                <form id="uploadFormMedida">
                                    <input type="hidden" name="txt_id_producto_" />
                                    <input type="hidden" name="isValues" />
                                    <input type="hidden" name="txt_id_imagen_" />
                                    {{ csrf_field() }}
                                    <div class="row">
                                        <div class="col-12 col-sm-5">
                                            <div class="col-12">

                                                <div class="col-12" style="margin-top: 10px" id="txt_radio_2">
                                                    <label for="lbl_name">Nombre del producto</label>
                                                    <input type="text" class="form-control" name="txt_mueble_2"
                                                        id="txt_nombreMedidad" disabled />
                                                </div>

                                            </div>
                                            <div class="col-12"
                                                style="display: flex;margin-bottom: 10px;margin-top: 10px">
                                                <div class="col-3">
                                                    <label for="lbl_name">Largo:</label>
                                                    <select name="txt_ancho_" id="txt_ancho_" class="form-control">
                                                        <option title="30 cm" value="30">30 cm</option>
                                                        <option title="35 cm" value="35">35 cm</option>
                                                        <option title="40 cm" value="40">40 cm</option>
                                                        <option title="45 cm" value="45">45 cm</option>
                                                        <option title="50 cm" value="50">50 cm</option>
                                                        <option title="60 cm" value="60">60 cm</option>
                                                        <option title="70 cm" value="70">70 cm</option>
                                                        <option title="80 cm" value="80">80 cm</option>
                                                        <option title="90 cm" value="90">90 cm</option>
                                                        <option title="100 cm" value="100">100 cm</option>
                                                        <option title="120 cm" value="120">120 cm</option>
                                                    </select>
                                                </div>
                                                <div class="col-3">
                                                    <label for="lbl_name">Alto:</label>
                                                    <select name="txt_alto_" id="txt_alto_" class="form-control">
                                                        <option value="70">70cm</option>
                                                    </select>
                                                </div>

                                            </div>

                                            <div class="col-12" style="display: flex;margin-top: 45px;">
                                                <div class="col-6">
                                                    <label for="lbl_oferta_precio">Ingrese el precio</label>
                                                    <input type="text" class="form-control" id="txt_precio"
                                                        name="txt_precio" required>
                                                </div>
                                                <div class="col-6">
                                                    <label for="file1">
                                                        <img id="txt_src_imagen" src="/img/mc_admin/btn_agregar_principal.jpg"
                                                            class="product-image" alt="Product Image"
                                                            style="border: solid 1px;width: 145px;height: auto;">
                                                    </label>

                                                </div>
                                            </div>

                                            <div class="mt-4">
                                                <button class="btn btn-primary btn-lg btn-flat" id="btn_sumit"><i
                                                        class="fas fa-save fa-lg mr-2"></i> INSERTAR</button>

                                                <button class="btn btn-default btn-lg btn-flat" type="button"
                                                    data-dismiss="modal"><i class="fas fa-times-circle fa-lg mr-2"></i>
                                                    CERRAR</button>
                                            </div>

                                        </div>
                                        <div class="col-12 col-sm-7">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h3 class="card-title">Lista de medidas</h3>
                                                </div>

                                                <div class="card-body table-responsive p-0" id="dataProductoMedida">
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </section>
                    <!-- /.content -->

                </div>
            </div>
        </div>
    </div>

    <!-- Modal de medida Editar-->
    <div class="modal fade" id="openModalMedidasEditar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="txt_tituloModal">ACTUALIZANDO MEDIDAS</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Main content -->
                    <section class="content">
                        <!-- Default box -->
                        <div class="card card-solid">
                            <div class="card-body">
                                <form id="uploadFormMedidaEditar">
                                    <input type="hidden" name="txt_id_medida" />
                                    {{ csrf_field() }}
                                    <div class="row">
                                        <div class="col-12 col-sm-12">
                                            <div class="col-12"
                                                style="display: flex;margin-bottom: 10px;margin-top: 10px">
                                                <div class="col-3">
                                                    <label for="lbl_name">Largo:</label>
                                                    <select name="txt_ancho_" id="txt_ancho_" class="form-control">
                                                        <option title="30 cm" value="30">30 cm</option>
                                                        <option title="35 cm" value="35">35 cm</option>
                                                        <option title="40 cm" value="40">40 cm</option>
                                                        <option title="45 cm" value="45">45 cm</option>
                                                        <option title="50 cm" value="50">50 cm</option>
                                                        <option title="60 cm" value="60">60 cm</option>
                                                        <option title="70 cm" value="70">70 cm</option>
                                                        <option title="80 cm" value="80">80 cm</option>
                                                        <option title="90 cm" value="90">90 cm</option>
                                                        <option title="100 cm" value="100">100 cm</option>
                                                        <option title="120 cm" value="120">120 cm</option>
                                                    </select>
                                                </div>
                                                <div class="col-3">
                                                    <label for="lbl_name">Alto:</label>
                                                    <select name="txt_alto_" id="txt_alto_" class="form-control">
                                                        <option value="70">70cm</option>
                                                    </select>
                                                </div>

                                            </div>

                                            <div class="col-12" style="margin-top: 10px;">
                                                <label for="lbl_oferta_precio">Ingrese el precio €</label>
                                                <input type="text" class="form-control" id="txt_precio_"
                                                    name="txt_precio" required>
                                            </div>

                                            <div class="mt-4">
                                                <button class="btn btn-primary btn-lg btn-flat" id="btn_sumit"><i
                                                        class="fas fa-save fa-lg mr-2"></i> ACTUALIZAR</button>

                                                <button class="btn btn-default btn-lg btn-flat" type="button"
                                                    data-dismiss="modal"><i class="fas fa-times-circle fa-lg mr-2"></i>
                                                    CERRAR</button>
                                            </div>

                                        </div>

                                    </div>
                                </form>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </section>
                    <!-- /.content -->

                </div>
            </div>
        </div>
    </div>

</div>

@push('scripts')

<script>
//:::::::::::: CRUD PRODUCTOS :::::::::::::::::::::::::::::
function listarDataTable(id_categoria) {
    $.ajax({
        type: 'get',
        dataType: 'html',
        url: 'accesorios_listar',
        data: "id_categoria=" + id_categoria,
        success: function(response) {
            $('#dataProducto').html(response);
        }
    });
}

listarDataTable(0)

//OPERACIONES:CREAR, ACTUALIZAR Y ELIMINAR
$('#uploadForm').on('submit', function(e) {
    e.preventDefault();

    let formData = new FormData(this);
    axios.post('accesorios_crear',
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
                text: response.data.data,
            })
        } else {
            $('#modalOpen').modal('hide')
            Swal.fire(
                'Good job!',
                response.data.data,
                'success'
            )
            listarDataTable(0)
        }

    }).catch(function() {
        console.log('FAILURE!!');
    });

});


function openModalCrud(id_producto, isValues, id_item,pro_name,url_image) {
    // CASO CLICK MODAL, ELIMINAR
    if (isValues == "ELIMINAR") {

        Swal.fire({
            title: 'Esta seguro de eliminar?',
            text: "¡No podrás revertir esto!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, eliminar!'
        }).then((result) => {
            if (result.dismiss !== 'cancel') {


                let formData = new FormData();
                formData.append('id_producto', id_producto)
                formData.append('isValues', isValues)
                formData.append('txt_id_item', id_item)
                axios.post('accesorios_crear',
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
                            response.data.data,
                            'success'
                        )

                        listarDataTable(0)
                    }

                }).catch(function() {
                    console.log('FAILURE!!');
                });

            }
        })

    } else if (isValues == "MEDIDAS") {
        $('#modalOpenMedida').modal('show')

        listar_medidas(id_producto)
        $('img[id=txt_src_imagen]').attr('src', url_image);
        $('input[id=txt_nombreMedidad]').val(pro_name);

        $('input[name=txt_id_imagen_]').val(id_imagen);
        $('input[name=txt_id_producto_]').val(id_producto);

    } else {
        // CASO CLICK MODAL, EDITAR
        $('#modalOpen').modal('show')
        $('input[name=id_producto]').val(id_producto)
        $('input[name=isValues]').val(isValues) //OPCION DE CREAR, ACTUALIZAR


        if (isValues == 'CREAR') {

            //LIMPIAR
            $('input[name=id_image0]').val("");
            $('input[name=id_image1]').val("");
            $('input[name=id_image2]').val("");
            $('input[name=id_image3]').val("");
            $('input[name=id_image4]').val("");
            $('input[name=id_image5]').val("");

            $('input[name=txt_pro_name]').val("");
            $('textarea[name=txt_descripcion]').val("");
            $('input[name=txt_price]').val("");

            $('img[id=blah_0]').attr('src', "/img/mc_admin/btn_agregar_principal.jpg");
            $('img[id=blah_1]').attr('src', "/img/mc_admin/btn_agregar.png");
            $('img[id=blah_2]').attr('src', "/img/mc_admin/btn_agregar.png");
            $('img[id=blah_3]').attr('src', "/img/mc_admin/btn_agregar.png");
            $('img[id=blah_4]').attr('src', "/img/mc_admin/btn_agregar.png");
            $('img[id=blah_5]').attr('src', "/img/mc_admin/btn_agregar.png");

        }
        // CASO , SI ES FALSO => ES EDITAR
        if (id_producto) {


            $("input[name=image0]").val(null);
            $("input[name=image1]").val(null);
            $("input[name=image2]").val(null);
            $("input[name=image3]").val(null);
            $("input[name=image4]").val(null);
            $("input[name=image5]").val(null);

            let formData = new FormData();
            formData.append('id_producto', id_producto)
            formData.append('id_item', id_item)

            axios.post('accesorios_editar',
                formData, {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                }
            ).then(function(response) {

                if (response.data[0]) {
                    $('input[name=id_image0]').val(response.data[0].id_imagen);
                    if (response.data[1])
                        $('input[name=id_image1]').val(response.data[1].id_imagen);
                    if (response.data[2])
                        $('input[name=id_image2]').val(response.data[2].id_imagen);
                    if (response.data[3])
                        $('input[name=id_image3]').val(response.data[3].id_imagen);
                    if (response.data[4])
                        $('input[name=id_image4]').val(response.data[4].id_imagen);
                    if (response.data[5])
                        $('input[name=id_image5]').val(response.data[5].id_imagen);

                    if (response.data[0])
                        $('img[id=blah_0]').attr('src', response.data[0].url_image);
                    else
                        $('img[id=blah_0]').attr('src', "/img/mc_admin/btn_agregar.png");
                    if (response.data[1])
                        $('img[id=blah_1]').attr('src', response.data[1].url_image);
                    else
                        $('img[id=blah_1]').attr('src', "/img/mc_admin/btn_agregar.png");
                    if (response.data[2])
                        $('img[id=blah_2]').attr('src', response.data[2].url_image);
                    else
                        $('img[id=blah_2]').attr('src', "/img/mc_admin/btn_agregar.png");
                    if (response.data[3])
                        $('img[id=blah_3]').attr('src', response.data[3].url_image);
                    else
                        $('img[id=blah_3]').attr('src', "/img/mc_admin/btn_agregar.png");
                    if (response.data[4])
                        $('img[id=blah_4]').attr('src', response.data[4].url_image);
                    else
                        $('img[id=blah_4]').attr('src', "/img/mc_admin/btn_agregar.png");
                    if (response.data[5])
                        $('img[id=blah_5]').attr('src', response.data[5].url_image);
                    else
                        $('img[id=blah_5]').attr('src', "/img/mc_admin/btn_agregar.png");

                    $('textarea[name=txt_descripcion]').val(response.data[0].pro_info);
                    $('input[name=txt_pro_name]').val(response.data[0].pro_name);
                    $('select[name=txt_id_item]').val(id_item);

                }


            }).catch(function() {
                console.log('FAILURE!!');
            });
        }
    }
}


//Initialize Select2 Elements
$('.nameColor,.nameTirador,.nameEnzimera').select2()


// :::::::::::::::::::::::::::::::::: MEDIDAS :::::::::::::::::::::::::::::

//CREAR MEDIDA
$('#uploadFormMedida').on('submit', function(e) {
    e.preventDefault();
    let formData = new FormData(this);
    formData.append('isValues', 1)
    axios.post('accesorios_crear_medida',
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
                response.data.data,
                'success'
            )
            listar_medidas($('input[name=txt_id_producto_]').val())
        }

    }).catch(function() {
        console.log('FAILURE!!');
    });

});

// ACTUALIZAR MEDIDA
$('#uploadFormMedidaEditar').on('submit', function(e) {
    e.preventDefault();
    let formData = new FormData(this);
    formData.append('isValues', 0)
    axios.post('accesorios_crear_medida',
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
            $('#openModalMedidasEditar').modal('hide')
            Swal.fire(
                'Good job!',
                response.data.data,
                'success'
            )
            listar_medidas($('input[name=txt_id_producto_]').val())
        }

    }).catch(function() {
        console.log('FAILURE!!');
    });

});

function listar_medidas(id_producto) {
    $.ajax({
        type: 'get',
        dataType: 'html',
        url: 'accesorios_listar_medidas',
        data: "id_producto=" + id_producto,
        success: function(response) {
            $('#dataProductoMedida').html(response);

        }
    });
}

function openModalMedidasEditar(id_medida, isValues) {

    if (isValues == "ELIMINAR") {
        Swal.fire({
            title: 'Esta seguro de eliminar?',
            text: "¡No podrás revertir esto!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, eliminar!'
        }).then((result) => {
            if (result.dismiss !== 'cancel') {


                let formData = new FormData();
                formData.append('id_medida', id_medida)
                axios.post('accesorios_eliminar_medida',
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
                            text: response.data.data,
                        })
                    } else {
                        $('#openModalMedidasEditar').modal('hide')
                        Swal.fire(
                            'Good job!',
                            response.data.data,
                            'success'
                        )
                        listar_medidas($('input[name=txt_id_producto_]').val())
                    }


                }).catch(function() {
                    console.log('FAILURE!!');
                });

            }
        })

    } else if (isValues == "EDITAR") {

        $('#openModalMedidasEditar').modal('show')
        $('input[name=txt_id_medida]').val(id_medida);

        let formData = new FormData();
        formData.append('id_medida', id_medida)
        axios.post('accesorios_editar_medida',
            formData, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            }
        ).then(function(response) {

            if (response.data[0]) {

                $("select[name=txt_ancho_]").val(response.data[0].ancho);
                $("select[name=txt_alto_]").val(response.data[0].alto);
                $("select[name=txt_fondo_]").val(response.data[0].fondo);

                $('input[id=txt_precio_]').val(response.data[0].price);

                $('input:checkbox[id="check_izquierda_"]').filter('[value=' + response.data[0].apert_izquierda +
                    ']').prop('checked', true);
                $('input:checkbox[id="check_derecha_"]').filter('[value=' + response.data[0].apert_derecha +
                    ']').prop('checked', true);
                $('input:checkbox[id="check_doble_"]').filter('[value=' + response.data[0].apert_doble + ']')
                    .prop('checked', true);

            }

        }).catch(function() {
            console.log('FAILURE!!');
        });



    }
}



</script>

<script src="{{asset('template_admin/js/composicion_oferta_files.js')}}"></script>

@endpush

<style type="text/css">
.alert {
    text-align: center;
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



input[type='file'] {
    display: none;
}



/* ::::::::::::::::::: RADIO BUTTOM :::::::::::::::: */
/* First hide radios */
.questions input[type="radio"] {
    display: none;
}

/* Generate new radio buttons, which we can style via css */
.questions label:before {
    content: attr(data-question-number);
    display: inline-block;
    width: 30px;
    height: 30px;
    border-radius: 50%;
    border: 1px solid;
    text-align: center;
    line-height: 30px;
    margin-right: 20px;
}

/* Applying styles when checking the buttons */
.questions input[type="radio"]:checked~label {
    background-color: var(--color-blue-grayed);
    border-color: var(--color-blue);
}

.questions input[type="radio"]:checked~label:before {
    background-color: var(--color-blue);
    border-color: var(--color-blue);
    color: #ff00bc;
}

.questions label {
    display: block;
    cursor: pointer;

    padding: 10px;
    margin-bottom: 10px;
    background-color: white;
    border: 2px solid white;
    border-radius: 15px;
}

.questions {
    /* background-color: gray; */
    padding: 10px;
    display: flex;
}


.select2-container {
    display: unset !important;
}
</style>
@endsection