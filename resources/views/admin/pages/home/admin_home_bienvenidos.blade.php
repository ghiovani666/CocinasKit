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
                        <li class="breadcrumb-item active">Bienvenidos</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div>
    </div>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div id="msj_alert"></div>
            <form id="saveText">
                {{ csrf_field() }}
                <input type="hidden" name="txt_values0" value="6" />
                <input type="hidden" name="txt_values1" value="21" />
                <input type="hidden" name="txt_values2" value="22" />
                <input type="hidden" name="txt_values3" value="23" />
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-block">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Título</label>
                                <div class="col-sm-10">
                                    <textarea type="text" name="txt_title0"
                                        class="form-control">{{$clases_[0]->title1  }}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Descripción</label>
                                <div class="col-sm-10">
                                    <textarea type="text" name="txt_descripcion0"
                                        class="form-control">{{$clases_[0]->descripcion  }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="card-block">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Opcion 1 : Titulo</label>
                                <div class="col-sm-10">
                                    <textarea type="text" name="txt_title1"
                                        class="form-control">{{$clases_[1]->title1  }}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Opcion 1 : Descripción </label>
                                <div class="col-sm-10">
                                    <textarea type="text" name="txt_descripcion1"
                                        class="form-control">{{$clases_[1]->descripcion  }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="card-block">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Opcion 2 : Titulo</label>
                                <div class="col-sm-10">
                                    <textarea type="text" name="txt_title2"
                                        class="form-control">{{$clases_[2]->title1  }}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Opcion 2 : Descripción </label>
                                <div class="col-sm-10">
                                    <textarea type="text" name="txt_descripcion2"
                                        class="form-control">{{$clases_[2]->descripcion  }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="card-block">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Opcion 3 : Titulo</label>
                                <div class="col-sm-10">
                                    <textarea type="text" name="txt_title3"
                                        class="form-control">{{$clases_[3]->title1  }}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Opcion 3 : Descripción </label>
                                <div class="col-sm-10">
                                    <textarea type="text" name="txt_descripcion3"
                                        class="form-control">{{$clases_[3]->descripcion  }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <!-- Box Comment -->
                        <div class="card card-widget">
                            <div class="card-header">
                                <div class="user-block">
                                    <img class="img-circle" src="/template_admin/dist/img/user1-128x128.jpg"
                                        alt="User Image">
                                    <span class="username"><a href="#">Sub Imagen</a></span>
                                </div>
                                <!-- /.user-block -->
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" title="Mark as read">
                                        <i class="far fa-circle"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                                <!-- /.card-tools -->
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body" >
                                <img class="img-fluid pad" src="{{$clases_[0]->url_image}}" alt="Photo" id="imagen_{{$clases_[0]->id_home}}">
                            </div>

                            <!-- /.card-header -->
                            <div class="card-body">
                                <a href="/template_admin/img/modelo/modelo_bienvenido.jpg" class="btn btn-primary btn-sm"
                                    download><i class="far fa-thumbs-up"></i> Descargar Modelo</a>
                                <a href="javascript:void(0)" onclick="openModal({{ $clases_[0]->id_home }},'slider' )"
                                    class="btn btn-danger btn-sm"><i class="far fa-thumbs-up"></i> Subir Imagen</a>
                            </div>
                            <!-- /.card-body -->

                        </div>
                        <!-- /.card -->
                    </div>

                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary">Actualizar</button>
                </div>
            </form>
        </div><!-- /.container-fluid -->
    </section>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Actualizar Imagen</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form id="saveImagen">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card-block">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Upload File</label>
                                    <div class="col-sm-10">
                                        <input type="file" name="image" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button class="btn btn-primary">Actualizar</button>
                    </div>
                </form>
            </div>


        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
function openModal(txt_id_home, isClass) {
    $('#exampleModal').modal('show')
    obtenerDatosModal(txt_id_home, isClass)
}

$('#saveText').on('submit', function(e) {
    e.preventDefault();
    let formData = new FormData(this);
    axios.post('admin_home_bienvenidos_update_text',
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

$('#saveImagen').on('submit', function(e) {
    e.preventDefault();
    $('#exampleModal').modal('hide')
    let formData = new FormData(this);
    axios.post('admin_home_bienvenidos_update_image',
        formData, {
            headers: {
                'Content-Type': 'multipart/form-data'
            }
        }
    ).then(function(response) {

        setTimeout(() => {
            if (response.status == 200) {

                $('#imagen_' + response.data[1]).attr("src", response.data[0]);

                Swal.fire(
                    'Good job!',
                    'You clicked the button!',
                    'success'
                )
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