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

class DescuentoUsuarioController  extends Controller {

    public function web_descuento_usuario(Request $request) {

        DB::beginTransaction();

        try {

            $result = DB::table('users')->insert([
                'name'          => $request->txt_nombre, 
                'email'         => $request->txt_email, 
                'telefono'      => $request->txt_telefono, 
                'ubicacion'     => $request->txt_pais_ciudad, 
            
                'created_at'    => date("Y-m-d H:i:s"),
                'updated_at'    =>date("Y-m-d H:i:s")
            ]);

            DB::commit();
            // all good
            return json_encode(['data' => 'Actualizado el registro correctamente!','state' => 'ok']);
        } catch (\Exception $e) {
            DB::rollback();
            // something went wrong
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

}