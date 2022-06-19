How to use
Clone repo

git clone https://github.com/webdevmatics/ecom.git
Install the composer dependencies

composer install
Save .env.example as .env and put your database credentials

Set application key

php artisan key:generate        
And Migrate with

php artisan migrate

Install node dependencies

npm install

Run watcher

npm run watch

Caracteristicas

php artisan --version 
Laravel Framework 7.28.4

information
https://dev.to/msamgan/php-artisan-make-auth-in-laravel-6-0-hc
https://laravelarticle.com/laravel-7-authentication-tutorial

instalamos
composer require laravelcollective/html
https://laravelcollective.com/docs/6.x/html
para que funcione: composer update

para imagenes
http://image.intervention.io/getting_started/installation
composer require intervention/image
 "intervention/image": "^2.5",
 para que funcione: composer update
php artisan vendor:publish --provider="Intervention\Image\ImageServiceProviderLaravelRecent"

instalosmos el mejor lugar v 7 laravel
https://github.com/olimortimer/LaravelShoppingcart
composer require olimortimer/laravelshoppingcart

https://www.youtube.com/watch?v=TIUEieJHhA0&list=PLrUNEklLHiKXTzdUY33z9gCU9P5sul6FQ&index=9
https://www.youtube.com/watch?v=QFrUF8UQEig



modificarmos
C:\xampp\htdocs\1_CARLOS_CLI\COCINAS_CARLOS\laravel-cocina\public\assets\css\headers\header-v5.css
--------------carrito de compras
    /* .header-v5 .open > .dropdown-menu {
        display: none;
    } */

    para el hover del menu
    -------------------------
        .header-v5 .navbar-nav > li.dropdown:hover > .dropdown-menu {
        display: block;
    }   

    php artisan cache:clear
php artisan view:clear
php artisan route:clear
php artisan clear-compiled

------------------
<!-- <php

return [
    'client_id' => env('PAYPAL_CLIENT_ID'),
    'secret'    => env('PAYPAL_SECRET'),

    'settings' => [
        'mode'         => env('PAYPAL_MODE', 'sandbox'),
        'http.ConnectionTimeOut'     => 30,
        'log.LogEnabled'            => true,
        'log.FileName'            => storage_path('/logs/paypal.log'),
        'log.LogLevel'            => 'ERROR',
    ]
]; -->
-------------------------
para instalar paypal
https://packagist.org/packages/srmklive/paypal la version 2 funciona
luego composer update
https://www.positronx.io/how-to-integrate-paypal-payment-gateway-in-laravel/

--------------INGRESAR LAS CUENTAS DE PRUBA
https://www.sandbox.paypal.com/
https://developer.paypal.com/

1. CAMBIO DE CONTRASEÑA
(personal)
XD<L3Cjx
sb-cw47ga3748303@personal.example.com

TRANSFERENCIA
==============
https://www.youtube.com/watch?v=_0oK6ZsSuW0

enctype="multipart/form-data"

=============CREAR CORREOS
php artisan make:mail CreateOrders

------pruebas
https://www.leroymerlin.es/fp/81955083/cocina-delinia-en-kit-galaxy-blanco-1-80-m

--------paypal
https://www.youtube.com/watch?v=k0FSJ8Vxiww

----OPERACIONES CORRECTAS
   $SumaTotal = Cart::total()-Cart::tax();
   

               :users_count="{{ $users->count() }}"
            :categories_count="{{ $categories->count() }}"

  -------------------------
https://www.thepolyglotdeveloper.com/2017/11/pass-data-between-routes-vuejs-web-application/


/node_modules
/public/hot
/public/storage
/storage/*.key
/vendor
.env
.env.backup
.phpunit.result.cache
Homestead.json
Homestead.yaml
npm-debug.log
yarn-error.log


npm install vue-bootstrap-toasts