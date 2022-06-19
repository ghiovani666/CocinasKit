//******************global****************** */
function openModal(txt_id_home, isClass) {
    $('#exampleModal').modal('show')
    obtenerDatosModal(txt_id_home, isClass)
}

const obtenerDatosModal = (txt_id_home, isClass) => {
    $('input[name=txt_id_home]').val(txt_id_home);
    axios.post('dashboard_home_edit_imagen', {
        'txt_id_home': txt_id_home,
        'txt_isclass': isClass,
    })
        .then(function (response) {
            $('textarea[name=txt_titulo1]').val(response.data[0].title1);
            $('textarea[name=txt_titulo2]').val(response.data[0].title2);
        }).catch(function (error) {
            if (error.response.status) {
                alert('No existe ..! Gracias1')
            }
        })
}

// $('#uploadForm').on('submit', function (e) {
//     e.preventDefault();
//     $('#exampleModal').modal('hide')
//     let formData = new FormData(this);
//     axios.post('dashboard_home_actualizar_imagen',
//         formData, {
//         headers: {
//             'Content-Type': 'multipart/form-data'
//         }
//     }
//     ).then(function (response) {
//         $('#imagen_' + response.data[1]).html(response.data[0]);
//     }).catch(function () {
//         console.log('FAILURE!!');
//     });

// });

$('#uploadFooter').on('submit', function (e) {
    e.preventDefault();
    let formData = new FormData(this);
    axios.post('dashboard_home_actualizar_footer',
        formData, {
        headers: {
            'Content-Type': 'multipart/form-data'
        }
    }
    ).then(function (response) {
        console.log('Successfully!!');
        $('#msj_alert').html(
            '<div class="alert alert-success" role="alert">Actualizado Correctamente.!</div>')
            .fadeOut(9500);
    }).catch(function () {
        console.log('FAILURE!!');
    });

});

// ********************clases************************ //

$('#clases_guardar_descripcion').on('submit', function (e) {
    e.preventDefault();
    let formData = new FormData(this);
    axios.post('clases_guardar_descripcion',
        formData, {
        headers: {
            'Content-Type': 'multipart/form-data'
        }
    }
    ).then(function (response) {
        $('#msj_alert').html(
            '<div class="alert alert-success" role="alert">Actualizado Correctamente.!</div>')
            .fadeOut(9500);
    }).catch(function () {
        console.log('FAILURE!!');
    });

});
// ********************fitness************************ //

$('#fitness_guardar_descripcion').on('submit', function (e) {
    e.preventDefault();
    let formData = new FormData(this);
    axios.post('fitness_guardar_descripcion',
        formData, {
        headers: {
            'Content-Type': 'multipart/form-data'
        }
    }
    ).then(function (response) {
        $('#msj_alert').html(
            '<div class="alert alert-success" role="alert">Actualizado Correctamente.!</div>')
            .fadeOut(9500);
    }).catch(function () {
        console.log('FAILURE!!');
    });

});

// ********************entrenador************************ //

$('#entrenador_guardar_descripcion').on('submit', function (e) {
    e.preventDefault();
    let formData = new FormData(this);
    axios.post('entrenador_guardar_descripcion',
        formData, {
        headers: {
            'Content-Type': 'multipart/form-data'
        }
    }
    ).then(function (response) {
        $('#msj_alert').html(
            '<div class="alert alert-success" role="alert">Actualizado Correctamente.!</div>')
            .fadeOut(9500);
    }).catch(function () {
        console.log('FAILURE!!');
    });

});


//::::::::::::::::::::::::::::::::::::::SERVICIOS TRAININNG

$('#saveServiciosTraining').on('submit', function (e) {
    e.preventDefault();
    let formData = new FormData(this);
    axios.post('saveServiciosTraining',
        formData, {
        headers: {
            'Content-Type': 'multipart/form-data'
        }
    }
    ).then(function (response) {
        $('#msj_alert').html(
            '<div class="alert alert-success" role="alert">Actualizado Correctamente.!</div>')
            .fadeOut(9500);
    }).catch(function () {
        console.log('FAILURE!!');
    });

});

function openModalServicios(id_servicio, txt_values) {
    $('#exampleModal').modal('show')
    $('input[name=txt_id_home]').val(id_servicio);
    $('input[name=txt_values]').val(txt_values);
}

$('#uploadFormServicios').on('submit', function (e) {
    e.preventDefault();
    $('#exampleModal').modal('hide')
    let formData = new FormData(this);
    axios.post('imagenServiciosTraining',
        formData, {
        headers: {
            'Content-Type': 'multipart/form-data'
        }
    }
    ).then(function (response) {

        if (response.data[1] == 'superior') {
            $('#imagen_superior').html(response.data[0]);
        } else {
            $('#imagen_inferior').html(response.data[0]);
        }

    }).catch(function () {
        console.log('FAILURE!!');
    });

});

//::::::::::::::::::::::::::::::::::::::SERVICIOS NOVEDADES

$('#saveServiciosTrainingNovedad').on('submit', function (e) {
    e.preventDefault();
    let formData = new FormData(this);
    axios.post('saveServiciosNovedad',
        formData, {
        headers: {
            'Content-Type': 'multipart/form-data'
        }
    }
    ).then(function (response) {
        $('#msj_alert').html(
            '<div class="alert alert-success" role="alert">Actualizado Correctamente.!</div>')
            .fadeOut(9500);
    }).catch(function () {
        console.log('FAILURE!!');
    });

});

$('#uploadFormServiciosNovedad').on('submit', function (e) {
    e.preventDefault();
    $('#exampleModal').modal('hide')
    let formData = new FormData(this);
    axios.post('imagenServiciosNovedad',
        formData, {
        headers: {
            'Content-Type': 'multipart/form-data'
        }
    }
    ).then(function (response) {

        if (response.data[1] == 'superior') {
            $('#imagen_superior').html(response.data[0]);
        } else {
            $('#imagen_inferior').html(response.data[0]);
        }

    }).catch(function () {
        console.log('FAILURE!!');
    });

});


// //::::::::::::::::::::::::::::::::::::::ACTUALIZAR BIENVENIDOS

// $('#updateBienvenido').on('submit', function (e) {
//     e.preventDefault();
//     let formData = new FormData(this);
//     axios.post('updateBienvenido',
//         formData, {
//         headers: {
//             'Content-Type': 'multipart/form-data'
//         }
//     }
//     ).then(function (response) {
//         console.log(response)
//         setTimeout(() => {
//             if (response.status == 200) {
//                 $('#msj_alert').html(
//                     '<div class="alert alert-success" role="alert">' + response.data.data + '</div>')
//                     .fadeOut(9500);
//             } else {
//                 $('#msj_alert').html(
//                     '<div class="alert alert-danger" role="alert"> Error al actualizar</div>')
//                     .fadeOut(9500);
//             }
//         }, 500);


//     }).catch(function () {
//         console.log('FAILURE!!');
//     });

// });