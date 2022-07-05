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


//ENVIAR CORREOS
use App\Mail\EnviarCorreosInfo;

class DescuentoUsuarioController  extends Controller {

    public function web_descuento_usuario(Request $request) {

        // var_dump($request->txt_nombre);
        // var_dump($request->txt_email);
        // var_dump($request->txt_telefono);
        // var_dump($request->txt_pais_ciudad);
        // exit;

        
        DB::beginTransaction();

        try {

             DB::table('users')->insert([
                'name'          => $request->txt_nombre, 
                'email'         => $request->txt_email, 
                'telefono'      => $request->txt_telefono, 
                'ubicacion'     => $request->txt_pais_ciudad, 
                'admin'         => 2, 
                'tipo_user'     => 2, 
            
                'created_at'    => date("Y-m-d H:i:s"),
                'updated_at'    =>date("Y-m-d H:i:s")
            ]);

            DB::commit();
            // all good
            return redirect()->route('accesorio_oferta_detalle/351')->with('succes_message',"Se envio la información, nos comunicaremos en breve!");

        } catch (\Exception $e) {
            DB::rollback();
            // something went wrong
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

}