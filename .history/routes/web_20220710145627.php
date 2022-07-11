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
    Route::get('/cart/addItem/{id}',        'CartController@addItem');
    Route::get('/cart',                     'CartController@index');
    Route::get('/cart/remove/{id}',         'CartController@destroy');
    Route::get('/cart/update/{id}',         'CartController@update');
    Route::get('/add_cart',                 'Web\HomeController@addCart')->name('add_cart');

    //::::::::::::::::::::::: WEB :DESCUENTO USUARIO ::::::::::::::::::::::::::
    Route::post('/web_descuento_usuario',      'Web\DescuentoUsuarioController@web_descuento_usuario');

    
    Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function() {

        //::::::::::::::::::::::: ADMIN CONTROLLER ADMIN ::::::::::::::::::::::::::
        Route::get('/index',               'Admin\AdminController@index');
        Route::post('/general_imagen',     'Admin\AdminController@general_imagen');

        //::::::::::::::::::::::: ADMIN CONTROLLER HOME ::::::::::::::::::::::::::
        Route::get('/admin_home_slider',                            'Admin\HomeController@admin_home_slider');
        Route::post('/admin_home_slider_edit',                      'Admin\HomeController@admin_home_slider_edit');
        Route::post('/admin_home_slider_update',                     'Admin\HomeController@admin_home_slider_update');

        //::::::::::::::::::::::: CONTROLLER COMPOSICION DE OFERTA: CRUD ::::::::::::::::::::::::::
        Route::get('/composicion_oferta',                      'Admin\ComposicionOfertaController@composicion_oferta');
        Route::get('/composicion_oferta_listar',               'Admin\ComposicionOfertaController@composicion_oferta_listar');
        Route::get('/composicion_oferta_listar_combobox',      'Admin\ComposicionOfertaController@composicion_oferta_listar_combobox');
        Route::post('/composicion_oferta_crear',               'Admin\ComposicionOfertaController@composicion_oferta_crear');
        Route::post('/composicion_oferta_editar',              'Admin\ComposicionOfertaController@composicion_oferta_editar');



        //::::::::::::::::::::::: CONTROLLER DESCUENTO USUARIOS: CRUD ::::::::::::::::::::::::::
        Route::get('/descuento_usuario',                      'Admin\DescuentoUsuarioController@descuento_usuario');
        Route::get('/descuento_usuario_listar',               'Admin\DescuentoUsuarioController@descuento_usuario_listar');

        Route::post('/descuento_usuario_crear',               'Admin\DescuentoUsuarioController@descuento_usuario_crear');
        Route::post('/descuento_usuario_editar',              'Admin\DescuentoUsuarioController@descuento_usuario_editar');


        //::::::::::::::::::::::: CONTROLLER MANTENIMIENTO COLORES: CRUD ::::::::::::::::::::::::::
        Route::get('/mueble_colores',                      'Admin\MuebleColoresController@mueble_colores');
        Route::get('/mueble_colores_listar',               'Admin\MuebleColoresController@mueble_colores_listar');
        Route::post('/mueble_colores_crear',               'Admin\MuebleColoresController@mueble_colores_crear');
        Route::post('/mueble_colores_editar',              'Admin\MuebleColoresController@mueble_colores_editar');

        //::::::::::::::::::::::: CONTROLLER MANTENIMIENTO MODELO DE PUERTAS: CRUD ::::::::::::::::::::::::::
        Route::get('/mueble_puertas',                      'Admin\MueblePuertaController@mueble_puertas');
        Route::get('/mueble_puertas_listar',               'Admin\MueblePuertaController@mueble_puertas_listar');
        Route::post('/mueble_puertas_crear',               'Admin\MueblePuertaController@mueble_puertas_crear');
        Route::post('/mueble_puertas_editar',              'Admin\MueblePuertaController@mueble_puertas_editar');

        //::::::::::::::::::::::: CONTROLLER MANTENIMIENTO TIRADOR: CRUD ::::::::::::::::::::::::::
        Route::get('/mueble_tirador',                      'Admin\MuebleTiradorController@mueble_tirador');
        Route::get('/mueble_tirador_listar',               'Admin\MuebleTiradorController@mueble_tirador_listar');
        Route::post('/mueble_tirador_crear',               'Admin\MuebleTiradorController@mueble_tirador_crear');
        Route::post('/mueble_tirador_editar',              'Admin\MuebleTiradorController@mueble_tirador_editar');

        //::::::::::::::::::::::: CONTROLLER MANTENIMIENTO UÑERO: CRUD ::::::::::::::::::::::::::
        Route::get('/mueble_unero',                        'Admin\MuebleUneroController@mueble_unero');
        Route::get('/mueble_unero_listar',                 'Admin\MuebleUneroController@mueble_unero_listar');
        Route::post('/mueble_unero_crear',                 'Admin\MuebleUneroController@mueble_unero_crear');
        Route::post('/mueble_unero_editar',                'Admin\MuebleUneroController@mueble_unero_editar');

        //::::::::::::::::::::::: CONTROLLER MANTENIMIENTO ENZIMERA: CRUD ::::::::::::::::::::::::::
        Route::get('/mueble_enzimera',                      'Admin\MuebleEnzimeraController@mueble_enzimera');
        Route::get('/mueble_enzimera_listar',               'Admin\MuebleEnzimeraController@mueble_enzimera_listar');
        Route::post('/mueble_enzimera_crear',               'Admin\MuebleEnzimeraController@mueble_enzimera_crear');
        Route::post('/mueble_enzimera_editar',              'Admin\MuebleEnzimeraController@mueble_enzimera_editar');

        //::::::::::::::::::::::: CONTROLLER MUEBLE COMPLETO: CRUD ::::::::::::::::::::::::::
        Route::get('/mueble_completo',                      'Admin\MuebleCompletoController@mueble_completo');
        Route::get('/mueble_completo_listar',               'Admin\MuebleCompletoController@mueble_completo_listar');
        Route::get('/mueble_completo_listar_combobox',      'Admin\MuebleCompletoController@mueble_completo_listar_combobox');
        Route::post('/mueble_completo_crear',               'Admin\MuebleCompletoController@mueble_completo_crear');
        Route::post('/mueble_completo_editar',              'Admin\MuebleCompletoController@mueble_completo_editar');

        Route::get('/filtro_combobox_table',                'Admin\MuebleCompletoController@filtro_combobox_table');
        Route::post('/mueble_completo_crear_medida',        'Admin\MuebleCompletoController@mueble_completo_crear_medida');
        Route::get('/mueble_completo_listar_medidas',       'Admin\MuebleCompletoController@mueble_completo_listar_medidas');
        Route::post('/mueble_completo_editar_medida',       'Admin\MuebleCompletoController@mueble_completo_editar_medida');
        Route::post('/mueble_completo_eliminar_medida',     'Admin\MuebleCompletoController@mueble_completo_eliminar_medida');

        //::::::::::::::::::::::: CONTROLLER ACCESORIOS: CRUD ::::::::::::::::::::::::::
        Route::get('/accesorios',                      'Admin\AccesoriosController@accesorios');
        Route::get('/accesorios_listar',               'Admin\AccesoriosController@accesorios_listar');
        Route::post('/accesorios_crear',               'Admin\AccesoriosController@accesorios_crear');
        Route::post('/accesorios_editar',              'Admin\AccesoriosController@accesorios_editar');


        Route::get('/accesorios_listar_medidas',       'Admin\AccesoriosController@accesorios_listar_medidas');
        Route::post('/accesorios_crear_medida',        'Admin\AccesoriosController@accesorios_crear_medida');
        Route::post('/accesorios_editar_medida',       'Admin\AccesoriosController@accesorios_editar_medida');


    });