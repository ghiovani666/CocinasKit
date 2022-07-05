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

    public function lista_deseo_agregar(Request $request) {

        $wishList = new wishList;
        $wishList->user_id = Auth::user()->id;
        $wishList->pro_id = $request->pro_id;
        $wishList->precio = $request->precio;
        $wishList->url_image = $request->url_image;
        $wishList->save();

        return back()->with('msg', 'Item Removed from Wishlist');  
    }

    public function lista_deseo_remover($id) {
        DB::table('wishlist')->where('pro_id', '=', $id)->delete();
        return back()->with('msg', 'Item Removed from Wishlist');
    }


}