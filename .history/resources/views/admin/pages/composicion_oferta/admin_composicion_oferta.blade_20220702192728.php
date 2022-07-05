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
                        <a href="javascript:void(0)" onclick="openModalCrud(false,'CREAR')"
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
    <div class="modal fade" id="modalOpen" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="txt_tituloModal">COMPOSICIÓN DE OFERTA</h5>
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
                                            <h3 class="d-inline-block d-sm-none">Nombre del Producto</h3>
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
                                            <h3 class="my-3">DESCRIPCIÓN DEL PRODUCTO</h3>
                                            <textarea class="form-control" name="txt_descripcion" rows="3"
                                                placeholder="Descripción ..." required></textarea>

                                            <hr>
                                            <h4>COLORES</h4>
                                            <div class="btn-group btn-group-toggle" data-toggle="buttons">

                                            


                                                <div class="select2-purple">
                                                    <select class="select2" multiple="multiple"
                                                        data-placeholder="Seleccione"
                                                        data-dropdown-css-class="select2-purple" style="width: 100%;">
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

                                            <h4 class="mt-3">TIRADORES</h4>
                                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                                <div class="select2-purple">
                                                    <!-- <select class="select2" multiple="multiple"
                                                        data-placeholder="Seleccione"
                                                        data-dropdown-css-class="select2-purple" style="width: 100%;">
                                                        <option>Alabama</option>
                                                        <option>Alaska</option>
                                                        <option>California</option>
                                                        <option>Delaware</option>
                                                        <option>Tennessee</option>
                                                        <option>Texas</option>
                                                        <option>Washington</option>
                                                    </select> -->
                                                </div>
                                            </div>

                                            <h4 class="mt-3">ENZIMERAS</h4>
                                            <div class="btn-group btn-group-toggle" data-toggle="buttons">

                                                <div class="select2-purple">
                                                    <!-- <select class="select2" multiple="multiple"
                                                        data-placeholder="Seleccione"
                                                        data-dropdown-css-class="select2-purple" style="width: 100%;">
                                                        <option>Alabama</option>
                                                        <option>Alaska</option>
                                                        <option>California</option>
                                                        <option>Delaware</option>
                                                        <option>Tennessee</option>
                                                        <option>Texas</option>
                                                        <option>Washington</option>
                                                    </select> -->
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
                                                    <label for="txt_price">Precio:</label>
                                                    <input type="text" class="form-control" name="txt_price"
                                                        required>
                                                </h2>
                                                <h4 class="mt-0">
                                                    <small>Total: $80.00 </small>
                                                </h4>
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
$('#uploadForm').on('submit', function(e) {
    e.preventDefault();

    // $('#modalOpen').modal('hide')
    let formData = new FormData(this);
    axios.post('composicion_oferta_crear',
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

            $('img[name=image0]').attr('src', response.data.src0);
            $('img[name=image1]').attr('src', response.data.src1);
            $('img[name=image2]').attr('src', response.data.src2);
            $('img[name=image3]').attr('src', response.data.src3);
            $('img[name=image4]').attr('src', response.data.src4);
            $('img[name=image5]').attr('src', response.data.src5);

            listarDataTable($('select[name=txt_id_cat]').val())
            $("input[name=image]").val(null);
            $("input[name=image]").val("");
        }

    }).catch(function() {
        console.log('FAILURE!!');
    });

});


function openModalCrud(id_producto, isValues) {
    // CASO CLICK MODAL, ELIMINAR
    if (isValues == "ELIMINAR") {
        if (confirm('Esta seguro de Eliminar?')) {
            let formData = new FormData();
            formData.append('txt_id_gallery', id_producto)
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
        $('#modalOpen').modal('show')
        $('input[name=id_producto]').val(id_producto)
        $('input[name=isValues]').val(isValues) //OPCION DE CREAR, ACTUALIZAR

        if (isValues == 'CREAR') {

            $('.editShowHide').show();
            //LIMPIAR
            $('input[name=txt_id_menu]').val("");
            $('input[name=txt_sub_titulo]').val("");
            $('textarea[name=txt_descripcion]').val("");
            $('textarea[name=txt_url_link]').val("");
            $('img[name=image0]').attr('src', "https://sistemas.com/wp-content/uploads/2013/12/twitpic.png");
            $("input[name=image]").val(null);
        }
        // CASO , SI ES FALSO => ES EDITAR
        if (id_producto) {

            $('.editShowHide').hide();
            let formData = new FormData();
            formData.append('id_producto', id_producto)
            axios.post('composicion_oferta_editar',
                formData, {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                }
            ).then(function(response) {

                $('input[name=id_image0]').val(response.data[0].id_imagen);
                $('input[name=id_image1]').val(response.data[1].id_imagen);
                $('input[name=id_image2]').val(response.data[2].id_imagen);
                $('input[name=id_image3]').val(response.data[3].id_imagen);
                $('input[name=id_image4]').val(response.data[4].id_imagen);
                $('input[name=id_image5]').val(response.data[5].id_imagen);

                $('img[id=blah_0]').attr('src', response.data[0].url_image);
                $('img[id=blah_1]').attr('src', response.data[1].url_image);
                $('img[id=blah_2]').attr('src', response.data[2].url_image);
                $('img[id=blah_3]').attr('src', response.data[3].url_image);
                $('img[id=blah_4]').attr('src', response.data[4].url_image);
                $('img[id=blah_5]').attr('src', response.data[5].url_image);


                $('textarea[name=txt_descripcion]').val(response.data[0].pro_info);
                $('input[name=txt_price]').val(response.data[0].price);


            }).catch(function() {
                console.log('FAILURE!!');
            });
        }
    }
}


//Initialize Select2 Elements
// $('.select2').select2()



$(".select2").select2({
    ajax: {
        transport: function(params, success, failure){

            console.log($(".select2").val())

        // axios.post("/rest/vue/1.0/profile/search", {query: $(".itemName").val()})
        // .then(function(response){
        //    success(response);
        // })
        // .catch(function(error){
        //    alert(error);
        // });

    },
    processResults: function(data){
        // var processedArray = [];
        // data.profiles.forEach(function(item){
        //     processedArray.push({id: item.ID, text: item.name});
        // });
        // return processedArray;
        }
    },
    minimumInputLength: 2,
    placeholder: "Select a profile",
    allowClear: true
});

// $('.itemName').select2({
//   placeholder: 'Select an item',
//   ajax: {
//     url: '/select2-autocomplete-ajax',
//     dataType: 'json',
//     delay: 250,
//     processResults: function (data) {

//         console.log(data)
//       return {
//         results:  $.map(data, function (item) {
//               return {
//                   text: item.pro_name,
//                   id: item.id
//               }
//           })
//       };
//     },
//     cache: true
//   }

// });

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
</style>
@endsection