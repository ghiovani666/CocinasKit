<div class="col-sm-12">
    <div class="card card-outline card-info">
        <div class="card-header">
            <h3 class="card-title">
                Ficha Técnica
            </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <textarea id="summernote" name="txt_descripcion_info">
                                                {{$rowData_[0]->info_descripcion}}
                                                </textarea>
        </div>
    </div>
</div>

<script>
//:::::::::::: CRUD SERVICIOS :::::::::::::::::::::::::::::
$(document).ready(function() {
    $('#summernote').summernote({
        // height: 400, 
        // placeholder: 'techsolutionstuff.com',
        callbacks: {
            onImageUpload: function(image) {
                uploadImage(image[0]);
            }
        }
    });
    function uploadImage(image) {
        var formData = new FormData();
        formData.append("image", image);
        axios.post('general_imagen_ficha_tecnica',
            formData, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            }
        ).then(function(response) {
            console.log(response);
            var image = $('<img>').attr('src', '/img/ficha_tecnica/' + response.data);
            console.log(image[0]);
            $('#summernote').summernote("insertNode", image[0]);
        }).catch(function() {
            console.log('FAILURE!!');
        });
    }
});
</script>