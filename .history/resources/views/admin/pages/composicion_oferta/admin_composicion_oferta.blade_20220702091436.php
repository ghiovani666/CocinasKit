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
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div id="msj_alert__"></div>
                <div class="col-12">
                    <div class="pull-right" style="text-align: center;">
                        <a href="javascript:void(0)" onclick="openModalTraining(false,'CREAR')"
                            class="btn btn-block bg-gradient-success"><i class="far fa-edit"></i> Crear producto</a>
                    </div>

                    <div class="row" style="text-align: center;display: initial;">
                        <div class="form-group">
                            <label>Filtrar por categoria</label>

                            <select class="form-control" name="txt_id_cat">
                                <option value="0">------------All ---------------- </option>
                                @foreach ($cb_listCategoria as $rows)
                                <option value="{{ $rows->id_cat }}">
                                    {{ $rows->names }}
                                </option>
                                @endforeach
                            </select>

                        </div>

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
    <div class="modal fade" id="modalTraining" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="txt_tituloModal">Actualizar</h5>
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
                                <div class="row">
                                    <div class="col-12 col-sm-6">
                                        <h3 class="d-inline-block d-sm-none">LOWA Men’s Renegade GTX Mid Hiking Boots
                                            Review</h3>
                                        <div class="col-12">
                                            <img src="/img/mc_admin/btn_agregar_principal.jpg" class="product-image"
                                                alt="Product Image" style="border: solid 1px;">
                                        </div>
                                        <div class="col-12 product-image-thumbs">
                                            <div class="product-image-thumb active"><img
                                                    src="/img/mc_admin/btn_agregar.png" alt="Product Image"></div>
                                            <div class="product-image-thumb"><img src="/img/mc_admin/btn_agregar.png"
                                                    alt="Product Image"></div>
                                            <div class="product-image-thumb"><img src="/img/mc_admin/btn_agregar.png"
                                                    alt="Product Image"></div>
                                            <div class="product-image-thumb"><img src="/img/mc_admin/btn_agregar.png"
                                                    alt="Product Image"></div>
                                            <div class="product-image-thumb"><img src="/img/mc_admin/btn_agregar.png"
                                                    alt="Product Image"></div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <h3 class="my-3">DESCRIPCIÓN DEL PRODUCTO</h3>
                                        <textarea class="form-control" name="txt_descripcion" rows="3"
                                            placeholder="Descripción ..." required></textarea>

                                        <hr>
                                        <h4>COLORES</h4>
                                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                            <label class="btn btn-default text-center active">
                                                <input type="radio" name="color_option" id="color_option_a1"
                                                    autocomplete="off" checked>
                                                Green
                                                <br>
                                                <i class="fas fa-circle fa-2x text-green"></i>
                                            </label>
                                            <label class="btn btn-default text-center">
                                                <input type="radio" name="color_option" id="color_option_a2"
                                                    autocomplete="off">
                                                Blue
                                                <br>
                                                <i class="fas fa-circle fa-2x text-blue"></i>
                                            </label>
                                            <label class="btn btn-default text-center">
                                                <input type="radio" name="color_option" id="color_option_a3"
                                                    autocomplete="off">
                                                Purple
                                                <br>
                                                <i class="fas fa-circle fa-2x text-purple"></i>
                                            </label>
                                            <label class="btn btn-default text-center">
                                                <input type="radio" name="color_option" id="color_option_a4"
                                                    autocomplete="off">
                                                Red
                                                <br>
                                                <i class="fas fa-circle fa-2x text-red"></i>
                                            </label>
                                            <label class="btn btn-default text-center">
                                                <input type="radio" name="color_option" id="color_option_a5"
                                                    autocomplete="off">
                                                Orange
                                                <br>
                                                <i class="fas fa-circle fa-2x text-orange"></i>
                                            </label>
                                        </div>

                                        <h4 class="mt-3">TIRADORES</h4>
                                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                            <label class="btn btn-default text-center">
                                                <input type="radio" name="color_option" id="color_option_b1"
                                                    autocomplete="off">
                                                <span class="text-xl">S</span>
                                                <br>
                                                Small
                                            </label>
                                            <label class="btn btn-default text-center">
                                                <input type="radio" name="color_option" id="color_option_b2"
                                                    autocomplete="off">
                                                <span class="text-xl">M</span>
                                                <br>
                                                Medium
                                            </label>
                                            <label class="btn btn-default text-center">
                                                <input type="radio" name="color_option" id="color_option_b3"
                                                    autocomplete="off">
                                                <span class="text-xl">L</span>
                                                <br>
                                                Large
                                            </label>
                                            <label class="btn btn-default text-center">
                                                <input type="radio" name="color_option" id="color_option_b4"
                                                    autocomplete="off">
                                                <span class="text-xl">XL</span>
                                                <br>
                                                Xtra-Large
                                            </label>
                                        </div>

                                        <h4 class="mt-3">ENZIMERAS</h4>
                                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                            <label class="btn btn-default text-center">
                                                <input type="radio" name="color_option" id="color_option_b1"
                                                    autocomplete="off">
                                                <span class="text-xl">S</span>
                                                <br>
                                                Small
                                            </label>
                                            <label class="btn btn-default text-center">
                                                <input type="radio" name="color_option" id="color_option_b2"
                                                    autocomplete="off">
                                                <span class="text-xl">M</span>
                                                <br>
                                                Medium
                                            </label>
                                            <label class="btn btn-default text-center">
                                                <input type="radio" name="color_option" id="color_option_b3"
                                                    autocomplete="off">
                                                <span class="text-xl">L</span>
                                                <br>
                                                Large
                                            </label>
                                            <label class="btn btn-default text-center">
                                                <input type="radio" name="color_option" id="color_option_b4"
                                                    autocomplete="off">
                                                <span class="text-xl">XL</span>
                                                <br>
                                                Xtra-Large
                                            </label>


                                            <div class="col-12 col-sm-6">
                <div class="form-group">
                  <label>Multiple (.select2-purple)</label>
                  <div class="select2-purple">
                    <select class="select2" multiple="multiple" data-placeholder="Select a State" data-dropdown-css-class="select2-purple" style="width: 100%;">
                      <option>Alabama</option>
                      <option>Alaska</option>
                      <option>California</option>
                      <option>Delaware</option>
                      <option>Tennessee</option>
                      <option>Texas</option>
                      <option>Washington</option>
                    </select>
                  </div>
                </div>
                <!-- /.form-group -->
              </div>
              
                                        </div>



                                        <h4 class="mt-3">COPETE</h4>
                                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                            <div class="form-group">
                                                <div
                                                    class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                                    <input type="checkbox" class="custom-control-input"
                                                        id="customSwitch3">
                                                    <label class="custom-control-label" for="customSwitch3">ACTIVAR
                                                        COPETE</label>
                                                </div>
                                            </div>

                                        </div>


                                        <div class="bg-gray py-2 px-3 mt-4">
                                            <h2 class="mb-0">


                                                <label for="txt_sub_titulo">Precio:</label>
                                                <input type="text" class="form-control" name="txt_sub_titulo" required>


                                            </h2>
                                            <h4 class="mt-0">
                                                <small>Total: $80.00 </small>
                                            </h4>
                                        </div>

                                        <div class="mt-4">
                                            <div class="btn btn-primary btn-lg btn-flat">
                                                <i class="fas fa-cart-plus fa-lg mr-2"></i>
                                                Add to Cart
                                            </div>

                                            <div class="btn btn-default btn-lg btn-flat">
                                                <i class="fas fa-heart fa-lg mr-2"></i>
                                                Add to Wishlist
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                    </section>
                    <!-- /.content -->





















                    <form id="uploadFormTraining">
                        <input type="hidden" name="txt_id_gallery" />
                        <input type="hidden" name="isValues" />

                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-sm-12">

                                <div class="card card-primary">
                                    <div class="card-body">
                                        <div class="form-group editShowHide">
                                            <div class="form-group">
                                                <label>Tipo de Menu</label>
                                                <select class="form-control" name="txt_id_menu">
                                                    <option value="1"> Página Galería </option>
                                                    <option value="2"> Página Proyectos </option>
                                                    <option value="3"> Página Reformas</option>
                                                    <option value="4"> Página Decoración</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group editShowHide">
                                            <div class="form-group">
                                                <label>Titulo Principal</label>
                                                <input type="text" class="form-control" name="txt_titulo" required>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="txt_sub_titulo">Sub Titulo</label>
                                            <input type="text" class="form-control" name="txt_sub_titulo" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="txt_descripcion">Descripción</label>
                                            <textarea class="form-control" name="txt_descripcion" rows="3"
                                                placeholder="Enter ..." required></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="txt_descripcion">URL Link</label>
                                            <textarea class="form-control" name="txt_url_link" rows="3"
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
                                            <a href="/template_admin/img/modelo/modelo_galeria.jpg"
                                                class="btn btn-primary btn-sm" download><i class="far fa-thumbs-up"></i>
                                                Descargar Modelo</a>
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
//:::::::::::: CRUD PRODUCTOS :::::::::::::::::::::::::::::
function listarDataTable(id_categoria) {
    $.ajax({
        type: 'get',
        dataType: 'html',
        url: 'composicion_oferta_listar',
        data: "id_categoria=" + id_categoria,
        success: function(response) {
            $('#dataProducto').html(response);
        }
    });
}

listarDataTable(0)

$('select[name=txt_id_cat]').on('change click', function() {
    const id_servicio = $('select[name=txt_id_cat]').val();
    listarDataTable(id_servicio)
});

//OPERACIONES:CREAR, ACTUALIZAR Y ELIMINAR
$('#uploadFormTraining').on('submit', function(e) {
    e.preventDefault();

    $('#modalTraining').modal('hide')
    let formData = new FormData(this);
    axios.post('composicion_oferta_crear',
        formData, {
            headers: {
                'Content-Type': 'multipart/form-data'
            }
        }
    ).then(function(response) {
        if (response.data.state == "error") {
            $('#msj_alert__').html(
                    '<div class="alert alert-danger" role="alert">' + response.data.data + '</div>')
                .fadeOut(9500);
        } else {
            $('#msj_alert__').html(
                    '<div class="alert alert-success" role="alert">' + response.data.data + '</div>'
                )
                .fadeOut(9500);
            if (response.data.src) {
                $('img[name=txt_url_image]').attr('src', response.data.src);
            }

            listarDataTable($('select[name=txt_id_cat]').val())
            $("input[name=image]").val(null);
            $("input[name=image]").val("");
        }

    }).catch(function() {
        console.log('FAILURE!!');
    });

});


function openModalTraining(id_gallery, isValues) {
    // CASO CLICK MODAL, ELIMINAR
    if (isValues == "ELIMINAR") {
        if (confirm('Esta seguro de Eliminar?')) {
            let formData = new FormData();
            formData.append('txt_id_gallery', id_gallery)
            formData.append('isValues', isValues)
            axios.post('composicion_oferta_crear',
                formData, {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                }
            ).then(function(response) {
                if (response.data.state == "error") {
                    $('#msj_alert__').html(
                            '<div class="alert alert-danger" role="alert">' + response.data.data + '</div>')
                        .fadeOut(9500);
                } else {
                    $('#msj_alert__').html(
                            '<div class="alert alert-success" role="alert">' + response.data.data + '</div>'
                        )
                        .fadeOut(9500);
                    listarDataTable($('select[name=txt_id_cat]').val())
                }

            }).catch(function() {
                console.log('FAILURE!!');
            });
        }

    } else {
        // CASO CLICK MODAL, EDITAR
        $('#modalTraining').modal('show')
        $('input[name=txt_id_gallery]').val(id_gallery)
        $('input[name=isValues]').val(isValues) //OPCION DE CREAR, ACTUALIZAR

        if (isValues == 'CREAR') {

            $('.editShowHide').show();
            //LIMPIAR
            $('input[name=txt_id_menu]').val("");
            $('input[name=txt_sub_titulo]').val("");
            $('textarea[name=txt_descripcion]').val("");
            $('textarea[name=txt_url_link]').val("");
            $('img[name=txt_url_image]').attr('src', "https://sistemas.com/wp-content/uploads/2013/12/twitpic.png");
            $("input[name=image]").val(null);
        }
        // CASO , SI ES FALSO => ES EDITAR
        if (id_gallery) {

            $('.editShowHide').hide();
            let formData = new FormData();
            formData.append('txt_id_gallery', id_gallery)
            axios.post('composicion_oferta_editar',
                formData, {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                }
            ).then(function(response) {

                $('input[name=txt_id_gallery]').val(response.data[0].id_gallery);

                $('input[name=txt_titulo]').val(response.data[0].titulo);
                $('input[name=txt_sub_titulo]').val(response.data[0].sub_titulo);
                $('textarea[name=txt_descripcion]').val(response.data[0].descripcion);
                $('textarea[name=txt_url_link]').val(response.data[0].url_link);
                $('img[name=txt_url_image]').attr('src', response.data[0].url_image);

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