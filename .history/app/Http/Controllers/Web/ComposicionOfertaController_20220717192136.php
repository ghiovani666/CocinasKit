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

class ComposicionOfertaController extends Controller {

    public function composicion_oferta($id_cat) {

        $Products = DB::table('products')
        ->join('menu_items', 'menu_items.id_item', '=', 'products.id_item')
        ->join('imagen', 'products.id', '=', 'imagen.id_product')
        ->join('medida', 'imagen.id_imagen', '=', 'medida.id_imagen')
        // ->where('imagen.check', '=',1)
        ->where('menu_items.id_cat', '=', $id_cat)
        ->paginate(8);

         return view('web.pages.composicion_oferta.web_composicion_oferta', compact('Products'));
    }


        Public function composicion_oferta_detalle($id) {

            $Products = DB::table('menu')
            ->join('menu_category', 'menu.id_menu', '=', 'menu_category.id_menu')
            ->join('menu_items', 'menu_category.id_cat', '=', 'menu_items.id_cat')
            ->join('products', 'menu_items.id_item', '=', 'products.id_item')
    
            ->join('imagen', 'products.id', '=', 'imagen.id_product')
            ->join('medida', 'imagen.id_imagen', '=', 'medida.id_imagen')
            // ->where('imagen.check', '=',1)
            ->where('products.id', $id)->get();

            if(Auth::check()){
                $recommends = new recommends;
                $recommends->uid = Auth::user()->id;
                $recommends->pro_id =$id;
                $recommends->save();
                }
    
            return view('web.pages.composicion_oferta.web_composicion_oferta_detalle', compact('Products'));
        }


        public function html_imagen_modelo_puerta(Request $request)
        {
            $Imagen = DB::table('mc_modelo_puerta')
                             ->where('id', $request->txt_id)
                             ->get();
            $html="";
            $html.='<label for="group_1">'.$Imagen[0]->nombre.'</label>
                <div>
    
                    <label class="radio-img" data-toggle="tooltip" data-placement="top" title="">
                        <input type="radio" name="color_puertas"   onclick="modalAbrirImagen('."'".$Imagen[0]->url_image."'".')">
                        <img style="width: 100%;" src="'.$Imagen[0]->url_image.'">
                    </label>
                </div>';
    
            return $html;
        }

}