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

    public function lista_deseo() {
        $Products = DB::table('wishlist')
        ->join('products', 'wishlist.pro_id', '=', 'products.id')
        ->get();
        return view('web.pages.web_lista_deseo', compact('Products'));
    }

    public function web_descuento_usuario(Request $request) {

        $result = DB::table('users')->insert([
            'name'          => $request->txt_nombre, 
            'email'         => $request->txt_email, 
            'telefono'      => $request->txt_telefono, 
            'ubicacion'     => $request->txt_pais_ciudad, 
          
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' =>date("Y-m-d H:i:s")
          ]);

        return back()->with('msg', 'Item Removed from Wishlist');  
    }

    public function lista_deseo_remover($id) {
        DB::table('wishlist')->where('pro_id', '=', $id)->delete();
        return back()->with('msg', 'Item Removed from Wishlist');
    }


}