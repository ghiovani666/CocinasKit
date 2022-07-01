<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;






    //::::::::::::::::::::::: WEB CLIENTE : PROFILE ::::::::::::::::::::::::::
    Route::get('/', 'HomeController@viewHome')->name('home');
























    
    Route::get('/login_register', 'HomeController@login_register')->name('login_register');

    Route::get('/home', 'Web\HomeController@viewHome')->name('home');
    Route::get('/options', 'Web\HomeController@viewOptions')->name('options');
    Route::get('/composer_products', 'Web\HomeController@composerProducts')->name('composer_products');
    Route::get('/add_cart', 'Web\HomeController@addCart')->name('add_cart');

    Route::post('addReview', 'HomeController@addReview');
    Route::get('selectSize', 'HomeController@selectSize');
    Route::get('selectColor', 'HomeController@selectColor');
    Route::get('/logout', 'Auth\LoginController@logout');
    Route::get('/shop', 'HomeController@shop');

    Route::get('/products', 'HomeController@shop');
    Route::get('/products/{name}', 'HomeController@proCats');

    Route::get('/contact', 'HomeController@contact');
    Route::post('/search', 'HomeController@search');
    Route::get('/cart', 'CartController@index');

    Route::get('/cart/remove/{id}', 'CartController@destroy');
    Route::get('/cart/update/{id}', 'CartController@update');

    Route::get('/newArrival', 'HomeController@newArrival');












    //::::::::::::::::::::::: WEB CLIENTE : PROFILE ::::::::::::::::::::::::::
    Route::group(['middleware' => 'auth'], function() {
        Route::get('/profile', function() {
            return view('web.pages.profile.index');
        });
        Route::get('/orders',               'Web\ProfileController@orders');
        Route::get('/address',              'Web\ProfileController@address');
        Route::post('/updateAddress',       'Web\ProfileController@UpdateAddress');
        Route::get('/password',             'Web\ProfileController@Password');
        Route::post('/updatePassword',      'Web\ProfileController@updatePassword');
        Route::get('/thankyou', function() {
            return view('profile.thankyou');
        });
        Route::get('/mail',             'HomeController@sendmail');
        Route::get('/checkout',         'CheckoutController@index');
        Route::post('/formvalidate',    'CheckoutController@formvalidate');
    });

    //::::::::::::::::::::::: WEB CLIENTE : LOGEO ::::::::::::::::::::::::::
    Auth::routes();
    Route::get('/logout', 'Auth\LoginController@logout');

    //::::::::::::::::::::::: WEB : LISTA DE DESEOS ::::::::::::::::::::::::::
    Route::get('/lista_deseo',              'Web\ListaDeseoController@lista_deseo');
    Route::post('lista_deseo_agregar',      'Web\ListaDeseoController@lista_deseo_agregar');
    Route::get('/lista_deseo_remover/{id}', 'Web\ListaDeseoController@lista_deseo_remover');

    //::::::::::::::::::::::: WEB : COMPOSICION DE OFERTAS ::::::::::::::::::::::::::
    Route::get('/composicion_oferta/{id_cat}',          'Web\ComposicionOfertaController@composicion_oferta');
    Route::get('/composicion_oferta_detalle/{id}',      'Web\ComposicionOfertaController@composicion_oferta_detalle');

    //::::::::::::::::::::::: WEB : MUEBLES COMPLETOS ::::::::::::::::::::::::::
    Route::get('/mueble_completo/{id}',         'Web\MuebleCompletoController@mueble_completo');
    Route::post('/change_modelo_puerta',        'Web\MuebleCompletoController@change_modelo_puerta');
    Route::get('/hide_tirador_encimera',        'Web\MuebleCompletoController@hide_tirador_encimera');
    Route::post('/change_tirador_encimera',     'Web\MuebleCompletoController@change_tirador_encimera');













//-----------nuevo admin-------------
Route::get('/list_pro', 'AdminController@list_pro');
// enviar valores al front option
Route::get('/options/{id}', 'HomeController@optionsMenu');
Route::get('/list_products', 'Web\HomeController@listProducts')->name('list_products');
Route::get('/cart/addItem/{id}', 'CartController@addItem');





Route::get('/products/update/{id}', 'HomeController@update_producto');


Route::get('/product_structura', 'HomeController@product_structura');

Route::get('/paypal/pay', 'PaymentController@payWithPayPal');
Route::get('/paypal/status', 'PaymentController@payPalStatus');
Route::get('/results', 'HomeController@result_success');
Route::get('/change_table', 'HomeController@change_table');//cambio de medidas
Route::get('/change_imagen', 'HomeController@change_imagen');
Route::get('/change_imagen_color', 'HomeController@change_imagen_color');//cambios de imagen en el details:color y tirador
Route::get('/change_imagen_tirador', 'HomeController@change_imagen_tirador');//cambios de imagen en el details:color y tirador

//---------PRECIO----------------
Route::post('/change_price', 'HomeController@change_price');
Route::post('/change_imagen_select_color', 'HomeController@change_imagen_select_color');
Route::post('/change_imagen_select_tirador', 'HomeController@change_imagen_select_tirador');
//---------AJAX----------------
Route::post('/list_medidas', 'AdminController@listMedidas');
Route::post('/list_images', 'AdminController@listImages');


/*
//=======================VUE=========================================
Route::middleware('auth')->get('/admin/dashboard', function() {
    return view('admin.dashboard');
})->name('admin-dashboard');
//----cuando refresque
Route::middleware('auth')->get('admin/{any}', function () {
    return view('admin.dashboard');
})->where('any', '[\/\w\.-]*');

//========================================================================
*/

Route::get('/contacto', 'HomeController@contacto');
//ENVIAR EMAILs
Route::post('enviar_email_informacion', 'HomeController@enviar_email_informacion');




Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function() {

    //::::::::::::::::::::::: ADMIN CONTROLLER ADMIN ::::::::::::::::::::::::::
    Route::get('/index',               'Admin\AdminController@index');
    Route::post('/general_imagen',     'Admin\AdminController@general_imagen');

    //::::::::::::::::::::::: ADMIN CONTROLLER HOME ::::::::::::::::::::::::::
    Route::get('/admin_home_slider',                            'Admin\HomeController@admin_home_slider');
    Route::post('/admin_home_slider_edit',                      'Admin\HomeController@admin_home_slider_edit');
    Route::post('/admin_home_slider_update',                      'Admin\HomeController@admin_home_slider_update');


    Route::get('/admin_home_bienvenidos',                       'Admin\HomeController@admin_home_bienvenidos');
    Route::post('/admin_home_bienvenidos_update_text',          'Admin\HomeController@admin_home_bienvenidos_update_text');
    Route::post('/admin_home_bienvenidos_update_image',         'Admin\HomeController@admin_home_bienvenidos_update_image');
    Route::post('/admin_home_footer_update',                    'Admin\HomeController@admin_home_footer_update');

    Route::get('/admin_ventajas',                            'Admin\HomeController@admin_ventajas');
    Route::post('/admin_ventajas_update',                     'Admin\HomeController@admin_ventajas_update');

    Route::get('/admin_nuestra_actividad',                  'Admin\HomeController@admin_nuestra_actividad');
    Route::get('/listData_NuestraActividad',                'Admin\HomeController@listData_NuestraActividad');
    Route::post('/editData_NuestraActividad',               'Admin\HomeController@editData_NuestraActividad');
    Route::post('/selectData_NuestraActividad',             'Admin\HomeController@selectData_NuestraActividad');


    Route::get('/admin_nuestro_estudio',         'Admin\HomeController@admin_nuestro_estudio');
    Route::get('/listarGaleriaDataTable',        'Admin\HomeController@listarGaleriaDataTable');
    Route::post('/createServicioGaleria',        'Admin\HomeController@createServicioGaleria');
    Route::post('/editServicioGaleria',          'Admin\HomeController@editServicioGaleria');
    Route::post('/editData_NuestroEstudio',      'Admin\HomeController@editData_NuestroEstudio');


    //::::::::::::::::::::::: ADMIN CONTROLLER QUIENES SOMOS ::::::::::::::::::::::::::
    Route::get('/admin_quienes_somos',             'Admin\QuienesSomosController@admin_quienes_somos');
    Route::post('/admin_quienes_somos_update',     'Admin\QuienesSomosController@admin_quienes_somos_update');

    //::::::::::::::::::::::: ADMIN CONTROLLER QUE HACEMOS ::::::::::::::::::::::::::
    Route::get('/admin_quehacemos',             'Admin\QueHacemosController@admin_quehacemos');
    Route::post('/admin_quehacemos_update',     'Admin\QueHacemosController@admin_quehacemos_update');

    
    











    Route::get('/admin_mathias_rath',                       'Admin\LaAlianzaController@admin_mathias_rath');
    Route::post('/admin_mathias_rath_update',               'Admin\LaAlianzaController@admin_mathias_rath_update');
























        //::::::::::::::::::::::: CONTROLLER PRODUCTO: CRUD ::::::::::::::::::::::::::
        Route::get('/mainProducto',             'Admin\ProductoController@mainProducto');
        Route::get('/listarProducto',           'Admin\ProductoController@listarProducto');
        Route::post('/createServicioGaleria',   'Admin\ProductoController@createServicioGaleria');
        Route::post('/editServicioGaleria',     'Admin\ProductoController@editServicioGaleria');




















    Route::get('/admin_sustancias_vitales',                 'Admin\LaAlianzaController@admin_sustancias_vitales');
    Route::post('/admin_sustancias_vitales_update',         'Admin\LaAlianzaController@admin_sustancias_vitales_update');

    Route::get('/admin_productos_naturales',                'Admin\LaAlianzaController@admin_productos_naturales');
    Route::post('/admin_productos_naturales_update',        'Admin\LaAlianzaController@admin_productos_naturales_update');

    Route::get('/admin_formacion',                          'Admin\LaAlianzaController@admin_formacion');
    Route::post('/admin_formacion_update',                  'Admin\LaAlianzaController@admin_formacion_update');

    Route::get('/admin_grupo_barcelona',                    'Admin\LaAlianzaController@admin_grupo_barcelona');
    Route::post('/admin_grupo_barcelona_update',            'Admin\LaAlianzaController@admin_grupo_barcelona_update');

    //::::::::::::::::::::::: WEB CONTROLLER INVESTIGACION ::::::::::::::::::::::::::
    Route::get('/admin_investigacion',             'Admin\InsInvestigacionController@admin_investigacion');
    Route::post('/admin_investigacion_update',     'Admin\InsInvestigacionController@admin_investigacion_update');

    

    //::::::::::::::::::::::: WEB CONTROLLER PROFESIONAL ::::::::::::::::::::::::::
    Route::get('/admin_profesional',                        'Admin\ProfesionalesController@admin_profesional');
    Route::post('/admin_profesional_update',                'Admin\ProfesionalesController@admin_profesional_update');

});