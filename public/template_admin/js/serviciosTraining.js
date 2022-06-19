// //:::::::::::: CRUD SERVICIOS :::::::::::::::::::::::::::::
// $('#uploadFormTraining').on('submit', function (e) {
//     e.preventDefault();

//     $('#modalTraining').modal('hide')
//     let formData = new FormData(this);
//     axios.post('createServicioTraining',
//         formData, {
//         headers: {
//             'Content-Type': 'multipart/form-data'
//         }
//     }
//     ).then(function (response) {
//         if (response.data.state == "error") {
//             $('#msj_alert__').html(
//                 '<div class="alert alert-danger" role="alert">' + response.data.data + '</div>')
//                 .fadeOut(9500);
//         } else {
//             $('#msj_alert__').html(
//                 '<div class="alert alert-success" role="alert">' + response.data.data + '</div>'
//             )
//                 .fadeOut(9500);
//             if (response.data.src) {
//                 $('img[name=txt_url_image]').attr('src', response.data.src);
//             }

//             listarDataTable($('input[name=txt_id_servicio__]').val())
//             $("input[name=image]").val(null);
//             $("input[name=image]").val("");
//         }

//     }).catch(function () {
//         console.log('FAILURE!!');
//     });

// });

// function listarDataTable(id_servicio) {
//     $.ajax({
//         type: 'get',
//         dataType: 'html',
//         url: 'listarDataTable',
//         data: "txt_id_servicio=" + id_servicio,
//         success: function (response) {
//             $('#updateDiv').html(response);
//         }
//     });
// }

// listarDataTable(0)

// function openModalTraining(id_descripcion, isValues) {

//     if (isValues == "ELIMINAR") {
//         if (confirm('Esta seguro de Eliminar?')) {
//             let formData = new FormData();
//             formData.append('txt_id_descripcion', id_descripcion)
//             formData.append('isValues', isValues)
//             axios.post('createServicioTraining',
//                 formData, {
//                 headers: {
//                     'Content-Type': 'multipart/form-data'
//                 }
//             }
//             ).then(function (response) {
//                 if (response.data.state == "error") {
//                     $('#msj_alert__').html(
//                         '<div class="alert alert-danger" role="alert">' + response.data.data + '</div>')
//                         .fadeOut(9500);
//                 } else {
//                     $('#msj_alert__').html(
//                         '<div class="alert alert-success" role="alert">' + response.data.data + '</div>'
//                     )
//                         .fadeOut(9500);
//                     listarDataTable(0)
//                 }

//             }).catch(function () {
//                 console.log('FAILURE!!');
//             });
//         }

//     } else {

//         $('#modalTraining').modal('show')
//         $('input[name=txt_id_descripcion]').val(id_descripcion)
//         $('input[name=isValues]').val(isValues) //OPCION DE CREAR, ACTUALIZAR

//         if (isValues == 'CREAR') {
            
//             $('.editShowHide').show();
//             //LIMPIAR
//             $('select[name=txt_titulo_principal]').val("");
//             $('input[name=txt_sub_titulo]').val("");
//             $('textarea[name=txt_descripcion]').val("");
//             $('textarea[name=txt_url_link]').val("");
//             $('img[name=txt_url_image]').attr('src', "https://sistemas.com/wp-content/uploads/2013/12/twitpic.png");
//             $("input[name=image]").val(null);
//         }

//         if (id_descripcion) {

//             $('.editShowHide').hide();

//             let formData = new FormData();
//             formData.append('txt_id_descripcion', id_descripcion)
//             axios.post('editServicioTraining',
//                 formData, {
//                 headers: {
//                     'Content-Type': 'multipart/form-data'
//                 }
//             }
//             ).then(function (response) {
//                 console.log(response.data[0].id_servicio);
//                 $('input[name=txt_id_servicio__]').val(response.data[0].id_servicio);//SIRVE PARA MANTENER LA TABLA EN EL FILTRO
//                 $('input[name=txt_titulo_principal__]').val(response.data[0].id_titulo);
//                 $('select[name=txt_titulo_principal]').val(response.data[0].id_titulo);
//                 $('input[name=txt_sub_titulo]').val(response.data[0].title);
//                 $('textarea[name=txt_descripcion]').val(response.data[0].descripcion);
//                 $('textarea[name=txt_url_link]').val(response.data[0].url_link);
//                 $('img[name=txt_url_image]').attr('src', response.data[0].url_image);

//             }).catch(function () {
//                 console.log('FAILURE!!');
//             });
//         }
//     }
// }
// // ::::::::::::::::: SELECCIONAR IMAGEN :::::::::::::::::::::::::::
// $("#inputGroupFile01").change(function (event) {
//     RecurFadeIn();
//     readURL(this);
// });
// $("#inputGroupFile01").on('click', function (event) {
//     RecurFadeIn();
// });

// function readURL(input) {
//     if (input.files && input.files[0]) {
//         var reader = new FileReader();
//         var filename = $("#inputGroupFile01").val();
//         filename = filename.substring(filename.lastIndexOf('\\') + 1);
//         reader.onload = function (e) {
//             //   debugger;      
//             $('#blah').attr('src', e.target.result);
//             $('#blah').hide();
//             $('#blah').fadeIn(500);
//             $('.custom-file-label').text(filename);
//         }
//         reader.readAsDataURL(input.files[0]);
//     }
//     $(".alert").removeClass("loading").hide();
// }

// function RecurFadeIn() {
//     console.log('ran');
//     FadeInAlert("Wait for it...");
// }

// function FadeInAlert(text) {
//     $(".alert").show();
//     $(".alert").text(text).addClass("loading");
// }

// // ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::

// $('select[name=txt_id_servicio]').on('change click', function () {
//     const id_servicio = this.value;
//     handleSecundario(id_servicio)
// });
// const handleSecundario = (id_servicio) => {
//     axios.post('changeServicioTraining', {
//         'txt_id_servicio': id_servicio,
//     })
//         .then(function (response) {
//             $('select[name=txt_titulo_principal]').html(response.data);
//         }).catch(function (error) {
//             if (error.response.status) {
//                 alert('No existe la medida.! Gracias')
//             }
//         })
// }

// $('select[name=txt_id_servicio_filtrar]').on('change click', function () {
//     const id_servicio = this.value;
//     listarDataTable(id_servicio)
// });