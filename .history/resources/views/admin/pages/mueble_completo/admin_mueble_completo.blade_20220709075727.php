@extends('admin.master')
@section('content')

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
            <a href="javascript:void(0)" onclick="openModalCrud(false,'CREAR',null)"
                class="btn btn-block bg-gradient-success"><i class="far fa-plus-square"></i> Crear</a>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-3">
                    <select name="" id="menu_categoria" class="form-control">
                        <option value="0" disable="true" selected="true">
                            <========== Todos==========>
                        </option>
                        @foreach ($cbCategoria as $item)
                        <option value="{{$item->id_cat}}">{{$item->names}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-3">
                    <select name="" id="menu_item" class="form-control"></select>
                </div>
            </div>
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

    <!-- Modal de productos-->
    <div class="modal fade" id="modalOpen" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="txt_tituloModal">MUEBLES COMPLETOS</h5>
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
                                    {{ csrf_field() }}
                                    <div class="row">
                                        <div class="col-12 col-sm-6">
                                            <div class="col-12" style="margin-bottom: 15px;">
                                                <input type="text" class="form-control" name="txt_pro_name"
                                                    placeholder="Escribe el nombre o la opcion del mueble" required>
                                            </div>
                                            <div class="col-12">
                                                <label for="file0">
                                                    <img id="blah_0" src="/img/mc_admin/btn_agregar_principal.jpg"
                                                        class="product-image" alt="Product Image"
                                                        style="border: solid 1px;">
                                                </label>
                                                <input id="file0" type="file" name="image0" />
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6">

                                            <div class="row">
                                                <div class="col-6">
                                                    <select name="menu_categoriaRegistrar" id="menu_categoriaRegistrar"
                                                        class="form-control">
                                                        <option value="0" disable="true" selected="true">
                                                            <= Categoria=>
                                                        </option>
                                                        @foreach ($cbCategoria as $item)
                                                        <option value="{{$item->id_cat}}">{{$item->names}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-6">
                                                    <select name="menu_itemsRegistrar" id="menu_itemsRegistrar"
                                                        class="form-control"></select>
                                                </div>
                                                <div class="col-12" style="margin-top: 10px;">
                                                    <label class="control-label">DESCRIPCI??N DEL
                                                        PRODUCTO</label>
                                                    <textarea class="form-control" name="txt_descripcion" rows="3"
                                                        placeholder="Descripci??n ..." required></textarea>
                                                </div>
                                                <div class="col-12" style="margin-top: 15px;">
                                                    <div id="dataOpciones"></div>
                                                </div>
                                                <div class="col-12" style="margin-top: 15px;">
                                                    <label for="txt_price">Precio:</label>
                                                    <input type="text" class="form-control" name="txt_price" required>
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
                                    <input type="hidden" name="id_producto" />
                                    <input type="hidden" name="isValues" />
                                    <input type="hidden" name="id_image0" />
                                    {{ csrf_field() }}
                                    <div class="row">
                                        <div class="col-12 col-sm-6">
                                            <div class="col-12">
                                                <label for="lbl_name">Seleccione una opcion de mueble?:</label>
                                                <div><input type="radio" name="flavorGroup" value="cherry" /> Si</div>
                                                <div><input type="radio" name="flavorGroup" value="almond" /> No</div>
                                                <label for="lbl_name" style="margin-top: 10px">Escribe la nueva
                                                    opcion del mueble:</label>
                                                <input type="text" class="form-control" name="lbl_name">
                                            </div>
                                            <div class="col-12"
                                                style="display: flex;margin-bottom: 10px;margin-top: 10px">
                                                <div class="col-3">
                                                    <label for="lbl_name">Ancho:</label>
                                                    <select name="txt_ancho" id="txt_ancho" class="form-control">
                                                        <option value="60">60cm</option>
                                                        <option value="60">60cm</option>
                                                        <option value="60">60cm</option>
                                                    </select>
                                                </div>
                                                <div class="col-3">
                                                    <label for="lbl_name">Alto:</label>
                                                    <select name="txt_ancho" id="txt_ancho" class="form-control">
                                                        <option value="60">60cm</option>
                                                        <option value="60">60cm</option>
                                                        <option value="60">60cm</option>
                                                    </select>
                                                </div>
                                                <div class="col-3">
                                                    <label for="lbl_name">Fondo:</label>
                                                    <select name="txt_ancho" id="txt_ancho" class="form-control">
                                                        <option value="60">60cm</option>
                                                        <option value="60">60cm</option>
                                                        <option value="60">60cm</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12" style="margin-top: 20px">
                                                <label for="lbl_name">Apertura:</label>
                                            </div>
                                            <div class="col-12" style="display: flex;">
                                                <div class="col-3">
                                                    <label for="lbl_name">Izquierda:</label>
                                                    <input type="checkbox" id="cbox1" class="form-control"
                                                        value="first_checkbox">
                                                </div>
                                                <div class="col-3">
                                                    <label for="lbl_name">Derecha:</label>
                                                    <input type="checkbox" id="cbox1" class="form-control"
                                                        value="first_checkbox">
                                                </div>
                                                <div class="col-3">
                                                    <label for="lbl_name">2 Puertas:</label>
                                                    <input type="checkbox" id="cbox1" class="form-control"
                                                        value="first_checkbox">
                                                </div>
                                            </div>

                                            <div class="col-12" style="display: flex;margin-top: 45px;">

                                                <div class="col-6">
                                                    <label for="lbl_oferta_precio">Ingrese el precio</label>
                                                    <input type="text" class="form-control" name="lbl_oferta_precio">
                                                </div>
                                                <div class="col-6">
                                                    <label for="file0">
                                                        <img id="blah_0" src="/img/mc_admin/btn_agregar_principal.jpg"
                                                            class="product-image" alt="Product Image"
                                                            style="border: solid 1px;width: 145px;height: auto;">
                                                    </label>
                                                    <input id="file0" type="file" name="image0" />
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
                                        <div class="col-12 col-sm-6">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h3 class="card-title">Lista de medidas</h3>
                                                </div>

                                                <div class="card-body p-0">
                                                    <table class="table table-striped">
                                                        <thead>
                                                            <tr>
                                                                <th style="width: 10px">N??</th>
                                                                <th>Ancho</th>
                                                                <th>Alto</th>
                                                                <th>Fondo</th>
                                                                <th>Imagen</th>
                                                                <th style="width: 40px">Precio</th>
                                                                <th style="width: 40px">Accion</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>1.</td>
                                                                <td>53 cm</td>
                                                                <td>56 cm</td>
                                                                <td>53 cm</td>
                                                                <th><img style="width: 30px;height: 37px;"
                                                                        src="/img/mc_modelo_puerta/modelo3.png"></th>
                                                                <td><span class="badge bg-danger"> 35.25</span></td>
                                                                <td><button type="button" class="btn btn-badge"><i
                                                                            class="fas fa-trash-alt"></i></button></td>
                                                            </tr>
                                                            <tr>
                                                                <td>1.</td>
                                                                <td>53 cm</td>
                                                                <td>56 cm</td>
                                                                <td>53 cm</td>
                                                                <th><img style="width: 30px;height: 37px;"
                                                                        src="/img/mc_modelo_puerta/modelo3.png"></th>
                                                                <td><span class="badge bg-danger"> 35.25</span></td>
                                                                <td><button type="button" class="btn btn-badge"><i
                                                                            class="fas fa-trash-alt"></i></button></td>
                                                            </tr>
                                                            <tr>
                                                                <td>1.</td>
                                                                <td>53 cm</td>
                                                                <td>56 cm</td>
                                                                <td>53 cm</td>
                                                                <th><img style="width: 30px;height: 37px;"
                                                                        src="/img/mc_modelo_puerta/modelo3.png"></th>
                                                                <td><span class="badge bg-danger"> 35.25</span></td>
                                                                <td><button type="button" class="btn btn-badge"><i
                                                                            class="fas fa-trash-alt"></i></button></td>
                                                            </tr>
                                                            <tr>
                                                                <td>1.</td>
                                                                <td>53 cm</td>
                                                                <td>56 cm</td>
                                                                <td>53 cm</td>
                                                                <th><img style="width: 30px;height: 37px;"
                                                                        src="/img/mc_modelo_puerta/modelo3.png"></th>
                                                                <td><span class="badge bg-danger"> 35.25</span></td>
                                                                <td><button type="button" class="btn btn-badge"><i
                                                                            class="fas fa-trash-alt"></i></button></td>
                                                            </tr>
                                                            <tr>
                                                                <td>1.</td>
                                                                <td>53 cm</td>
                                                                <td>56 cm</td>
                                                                <td>53 cm</td>
                                                                <th><img style="width: 30px;height: 37px;"
                                                                        src="/img/mc_modelo_puerta/modelo3.png"></th>
                                                                <td><span class="badge bg-danger"> 35.25</span></td>
                                                                <td><button type="button" class="btn btn-badge"><i
                                                                            class="fas fa-trash-alt"></i></button></td>
                                                            </tr>

                                                        </tbody>
                                                    </table>
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

</div>

@push('scripts')

<script>
//:::::::::::: CRUD PRODUCTOS :::::::::::::::::::::::::::::
function listarDataTable(id_categoria, isValues) {

    $.ajax({
        type: 'get',
        dataType: 'html',
        url: 'mueble_completo_listar',
        data: {
            id_categoria: id_categoria,
            isValues: isValues
        },

        success: function(response) {
            $('#dataProducto').html(response);
        }
    });
}
//:::::::::::::LISTA LOS SELEC2 ::::::::::::::::::::::::
function listarComboBox(id_producto) {
    $.ajax({
        type: 'get',
        dataType: 'html',
        url: 'mueble_completo_listar_combobox',
        data: "id_producto=" + id_producto,
        success: function(response) {
            $('#dataOpciones').html(response);
        }
    });
}


//OPERACIONES:CREAR, ACTUALIZAR Y ELIMINAR
$('#uploadForm').on('submit', function(e) {
    e.preventDefault();
    let formData = new FormData(this);
    axios.post('mueble_completo_crear',
        formData, {
            headers: {
                'Content-Type': 'multipart/form-data'
            }
        }
    ).then(function(response) {

        $('#modalOpen').modal('hide')

        if (response.data.state == "error") {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: response.data.data,
            })
        } else {
            Swal.fire(
                'Good job!',
                response.data.data,
                'success'
            )
            listarDataTable(0, "LISTA_TODO")
        }

    }).catch(function() {
        console.log('FAILURE!!');
    });

});


function openModalCrud(id_producto, isValues,id_cat) {
    // CASO CLICK MODAL, ELIMINAR
    if (isValues == "ELIMINAR") {
        if (confirm('Esta seguro de Eliminar?')) {

            let formData = new FormData();
            formData.append('id_producto', id_producto)
            formData.append('isValues', isValues)
            axios.post('mueble_completo_crear',
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

                    listarDataTable(0, "LISTA_TODO")
                }

            }).catch(function() {
                console.log('FAILURE!!');
            });
        }

    } else if (isValues == "MEDIDAS") {
        $('#modalOpenMedida').modal('show')
    } else {
        // CASO CLICK MODAL, EDITAR
        $('#modalOpen').modal('show')
        $('input[name=id_producto]').val(id_producto)
        $('input[name=isValues]').val(isValues) //OPCION DE CREAR, ACTUALIZAR, MEDIDA

        if (isValues == 'CREAR') {
            listarComboBox(0)
            //LIMPIAR
            $('input[name=id_image0]').val("");
            $('input[name=txt_pro_name]').val("");
            $('textarea[name=txt_descripcion]').val("");
            $('input[name=txt_price]').val("");
            $('img[id=blah_0]').attr('src', "/img/mc_admin/btn_agregar_principal.jpg");
            $(".nameColor,.nameTirador,.nameUnero,.nameModelo").val("").trigger("change");
            $(".nameColor,.nameTirador,.nameUnero,.nameModelo").trigger("change");
        }
        // CASO , SI ES FALSO => ES EDITAR
        if (id_producto) {

            $("input[name=image0]").val(null);
            listarComboBox(id_producto)

            let formData = new FormData();
            formData.append('id_producto', id_producto)
            axios.post('mueble_completo_editar',
                formData, {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                }
            ).then(function(response) {

               

                // console.log(response.data[0].id_item)

                if (response.data[0]) {
                    $('input[name=id_image0]').val(response.data[0].id_imagen);
                    $('textarea[name=txt_descripcion]').val(response.data[0].pro_info);
                    $('input[name=txt_pro_name]').val(response.data[0].pro_name);
                    $('input[name=txt_price]').val(response.data[0].price);

                    // $("select[name=menu_categoriaRegistrar]").val(id_cat);
                   

                    // $("#menu_categoriaRegistrar").val(10).trigger("change");
                    // $("select[name=menu_itemsRegistrar]").val(33);
              




$('#menu_categoriaRegistrar').trigger('change', [function(){
    console.log("bien")
}]);


                    // $('input:radio[name="txt_copete"]').filter('[value=' + response.data[0].copete + ']').prop(
                    //     'checked', true);
                }

            }).catch(function() {
                console.log('FAILURE!!');
            });
        }
    }
}


//Initialize Select2 Elements
$('.nameColor,.nameTirador,.nameUnero,.nameModelo').select2()

// :::::::::::::::::::::::: COMBODEPENDIENTE :::::::::::::::::::::::::::::::::

$('#menu_categoria').on('change', function(e) {
    // e.preventDefault();
    var id_categoria = e.target.value;
    $.ajax({
        type: 'get',
        contentType: "application/json; charset=utf-8",
        dataType: "json",
        url: 'filtro_combobox_table',
        data: "id_categoria=" + id_categoria,
        success: function(response) {
            listarDataTable(id_categoria, "LISTA_CATEGORIA")
            $('#menu_item').empty();
            $('#menu_item').append(
                '<option value="0" disable="true" selected="true"> <========== Todos ==========> </option>'
            );

            $.each(response.data, function(fetch, regenciesObj) {
                $('#menu_item').append('<option value="' + regenciesObj.id_item + '">' +
                    regenciesObj.names + '</option>');
            })
        }
    });
});


$('select[id=menu_item]').on('change', function(e) {
    var menu_item = e.target.value;
    if (menu_item == "0") {
        listarDataTable($('select[id=menu_categoria]').val(), "LISTA_CATEGORIA")
    } else {
        listarDataTable(menu_item, "LISTA_ITEM")
    }
});



$('#menu_categoriaRegistrar').on('change', function(e) {
    // e.preventDefault();
    var id_categoria = e.target.value;
    $.ajax({
        type: 'get',
        contentType: "application/json; charset=utf-8",
        dataType: "json",
        url: 'filtro_combobox_table',
        data: "id_categoria=" + id_categoria,
        success: function(response) {

            $('#menu_itemsRegistrar').empty();
            $('#menu_itemsRegistrar').append(
                '<option value="0" disable="true" selected="true"> <=== Todos ===> </option>'
            );

            $.each(response.data, function(fetch, regenciesObj) {
                $('#menu_itemsRegistrar').append('<option value="' + regenciesObj.id_item + '">' +
                    regenciesObj.names + '</option>');
            })
        }
    });
});



$(document).ready(function() {
    listarDataTable(0, "LISTA_TODO")
});
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