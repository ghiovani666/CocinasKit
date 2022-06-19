<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/*
Route::middleware('auth:api')->resource('users',        'api\UsersController');//---Lista los Usuarios
Route::middleware('auth:api')->resource('account',      'api\AccountController');
Route::resource('users', 'api\UsersController');
Route::middleware('auth:api')->resource('profile',      'api\ProfileController');

Route::middleware('auth:api')->get('list_product',      'api\ProductController@list_product');
Route::middleware('auth:api')->get('list_menu',         'api\ProductController@list_menu');
Route::middleware('auth:api')->post('list_category',    'api\ProductController@list_category');
Route::middleware('auth:api')->post('list_item',        'api\ProductController@list_item');
Route::middleware('auth:api')->post('register_product', 'api\ProductController@register_product');

Route::middleware('auth:api')->post('list_images',      'api\ProductController@list_images');
Route::middleware('auth:api')->post('list_medidas',     'api\ProductController@list_medidas');
Route::middleware('auth:api')->post('insert_medida',    'api\ProductController@insert_medida');
Route::middleware('auth:api')->post('update_medida',    'api\ProductController@update_medida');
Route::middleware('auth:api')->post('delete_medida',    'api\ProductController@delete_medida');
Route::middleware('auth:api')->post('delete_imagen',    'api\ProductController@delete_imagen');
Route::middleware('auth:api')->post('create_imagen',    'api\ProductController@create_imagen');
Route::middleware('auth:api')->post('update_imagen',    'api\ProductController@update_imagen');
Route::middleware('auth:api')->post('update_product',   'api\ProductController@update_product');
Route::middleware('auth:api')->post('delete_product',   'api\ProductController@delete_product');
Route::middleware('auth:api')->post('descuento_price',  'api\ProductController@descuento_price');

Route::middleware('auth:api')->get('list_menu_filter',            'api\ProductController@list_menu_filter');
Route::middleware('auth:api')->post('masivo_insert_medidas',      'api\ProductController@masivo_insert_medidas');
Route::middleware('auth:api')->post('change_medida',              'api\ProductController@change_medida');
Route::middleware('auth:api')->post('update_imagen_sub',          'api\ProductController@update_imagen_sub');
*/


