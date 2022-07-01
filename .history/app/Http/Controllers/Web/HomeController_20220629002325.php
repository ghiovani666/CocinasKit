<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Session;
//ENVIAR CORREOS
use Mail;
use App\Mail\contacts;
use App\Mail\CreateOrders;
use App\wishList;
use App\recommends;

//ENVIAR CORREOS
use App\Mail\EnviarCorreosInfo;

class HomeController  extends Controller {

    public function Home(){
    	return view('web.pages.index');
    }

    public function login_register(){
    	return view('web.pages.loginRegister');
    }

    Public function servicio_propuesta() {
        //view product details
               return view('web.pages.product_structura');

    }

}