<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


    //::::::::::::::::::::::: WEB : HOME ::::::::::::::::::::::::::
    Route::get('/',                     'Web\HomeController@Home')->name('Home');
    Route::get('/servicio_propuesta',   'Web\HomeController@servicio_propuesta');
    Route::get('/servicio_transporte',  'Web\HomeController@servicio_transporte');
    Route::get('/contacto',             'Web\HomeController@contacto');

    //::::::::::::::::::::::: WEB: LOGEO ::::::::::::::::::::::::::
    Auth::routes();
    Route::get('/login_register',   'Web\HomeController@login_register')->name('login_register');
    Route::get('/logout',           'Auth\LoginController@logout');


    //::::::::::::::::::::::: WEB : LISTA DE DESEOS ::::::::::::::::::::::::::
    Route::get('/lista_deseo',              'Web\ListaDeseoController@lista_deseo');
    Route::post('lista_deseo_agregar',      'Web\ListaDeseoController@lista_deseo_agregar');
    Route::get('/lista_deseo_remover/{id}', 'Web\ListaDeseoController@lista_deseo_remover');

    //::::::::::::::::::::::: WEB : COMPOSICION DE OFERTAS ::::::::::::::::::::::::::
    Route::get('/composicion_oferta/{id_cat}',          'Web\ComposicionOfertaController@composicion_oferta');
    Route::get('/composicion_oferta_detalle/{id}',      'Web\ComposicionOfertaController@composicion_oferta_detalle');

    //::::::::::::::::::::::: WEB : ACCESORIOS ::::::::::::::::::::::::::
    Route::get('/accesorio_oferta/{id_cat}',          'Web\AccesorioOfertaController@accesorio_oferta');
    Route::get('/accesorio_oferta_detalle/{id}',      'Web\AccesorioOfertaController@accesorio_oferta_detalle');

        
    //::::::::::::::::::::::: WEB : MUEBLES COMPLETOS ::::::::::::::::::::::::::
    Route::get('/mueble_completo/{id}',         'Web\MuebleCompletoController@mueble_completo');
    Route::get('/hide_tirador_encimera',        'Web\MuebleCompletoController@hide_tirador_encimera');
    Route::post('/change_tirador_encimera',     'Web\MuebleCompletoController@change_tirador_encimera');

    Route::post('/html_imagen_tirador',             'Web\MuebleCompletoController@html_imagen_tirador');
    Route::post('/html_imagen_tirador_unero',       'Web\MuebleCompletoController@html_imagen_tirador_unero');
    Route::post('/html_imagen_acabado_puertas',     'Web\MuebleCompletoController@html_imagen_acabado_puertas');
    Route::post('/html_imagen_modelo_puerta',       'Web\MuebleCompletoController@html_imagen_modelo_puerta');

    //::::::::::::::::::::::: WEB : AÑADIR CART_SHOP ::::::::::::::::::::::::::
    Route::get('/cart/addItem/{id}', 'CartController@addItem');
    Route::get('/cart', 'CartController@index');
    Route::get('/cart/remove/{id}', 'CartController@destroy');
    Route::get('/cart/update/{id}', 'CartController@update');
    Route::get('/add_cart', 'Web\HomeController@addCart')->name('add_cart');


    Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function() {

        //::::::::::::::::::::::: ADMIN CONTROLLER ADMIN ::::::::::::::::::::::::::
        Route::get('/index',               'Admin\AdminController@index');
        Route::post('/general_imagen',     'Admin\AdminController@general_imagen');

        //::::::::::::::::::::::: ADMIN CONTROLLER HOME ::::::::::::::::::::::::::
        Route::get('/admin_home_slider',                            'Admin\HomeController@admin_home_slider');
        Route::post('/admin_home_slider_edit',                      'Admin\HomeController@admin_home_slider_edit');
        Route::post('/admin_home_slider_update',                      'Admin\HomeController@admin_home_slider_update');

        //::::::::::::::::::::::: CONTROLLER PRODUCTO: CRUD ::::::::::::::::::::::::::
        Route::get('/mainProducto',             'Admin\ProductoController@mainProducto');
        Route::get('/listarProducto',           'Admin\ProductoController@listarProducto');
        Route::post('/createServicioGaleria',   'Admin\ProductoController@createServicioGaleria');
        Route::post('/editServicioGaleria',     'Admin\ProductoController@editServicioGaleria');










        

        //::::::::::::::::::::::: WEB CONTROLLER PROFESIONAL ::::::::::::::::::::::::::
        Route::get('/admin_profesional',                        'Admin\ProfesionalesController@admin_profesional');
        Route::post('/admin_profesional_update',                'Admin\ProfesionalesController@admin_profesional_update');

    });