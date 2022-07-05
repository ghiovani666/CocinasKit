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
        $slider_ = DB::table('web_home')->whereIn('id_home', array(1, 2, 3))->get();
        return view('web.pages.index')->with(compact('slider_'));
    }

    public function login_register(){
    	return view('web.pages.web_login_registro');
    }

    Public function servicio_propuesta() {
        return view('web.pages.web_servicio_propuesta');
    }

    Public function servicio_transporte() {
        return view('web.pages.web_servicio_instalacion');
    }

    public function contacto() {
        return view('web.pages.web_contacto');
    }

}