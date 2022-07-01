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

class MuebleCompletoController extends Controller {

    public function mueble_completo($id) {
        try {
            
        $Products = DB::table('menu')
        ->join('menu_category', 'menu.id_menu', '=', 'menu_category.id_menu')
        ->join('menu_items', 'menu_category.id_cat', '=', 'menu_items.id_cat')
        ->join('products', 'menu_items.id_item', '=', 'products.id_item')

        ->join('imagen', 'products.id', '=', 'imagen.id_product')
        ->join('medida', 'imagen.id_imagen', '=', 'medida.id_imagen')
        ->where('imagen.check', '=',1)
        ->where('products.id_item', $id)->get();

        if(Auth::check()){
            $recommends = new recommends;
            $recommends->uid = Auth::user()->id;
            $recommends->pro_id =$Products[0]->id;
            $recommends->save();
            }

        return view('web.pages.mueble_completo.web_mueble_completo', compact('Products'));

        } catch (\Throwable $th) {
            return back()->with('msg', 'No se encuentra Registro');
        }
    }

    public function change_modelo_puerta(Request $request)
    {
        $Imagen = DB::table('modelo_puerta')
                         ->where('id', $request->txt_id)
                         ->get();
        $html="";
        $html.='<label for="group_1">'.$Imagen[0]->nombre.'</label>
            <div>

                <label class="radio-img" data-toggle="tooltip" data-placement="top" title="">
                    <input type="radio" name="color_puertas"   onclick="openModal_ModeloPuerta('."'".$Imagen[0]->url_image."'".')">
                    <img style="width: 100%;" src="'.$Imagen[0]->url_image.'">
                </label>
            </div>';

        return $html;
    }

    public function hide_tirador_encimera(Request $request) {
        return view('web.pages.mueble_completo.ajax.table_encimera');
    }

    public function change_tirador_encimera(Request $request)
    {
        $Imagen = DB::table('color_image')
                         ->where('id', $request->id)
                         ->get();
        $html="";
        // $html.='<label for="group_1">Código: '.$Imagen[0]->name_color.'</label>';
        $html.='<div>
                <label class="radio-img" data-toggle="tooltip" data-placement="top"
                    title="xxx">
                    <input type="radio" name="color_puertas" onclick="openModal_ModeloPuerta('."'".$Imagen[0]->url_image."'".')">
                    <img  style="width: 100%;" src="'.$Imagen[0]->url_image.'">
                </label>
            </div>';
        return $html;
      
    }

    public function html_imagen_tirador(Request $request)
    {
        $Imagen = DB::table('mc_tirador')
                         ->where('id', $request->txt_id)
                         ->get();
                    $html="";
                    $html.='<label for="group_1">Código: '.$Imagen[0]->nombre.'</label>
                        <div>
                            <label class="radio-img" data-toggle="tooltip" data-placement="top"
                                title="'.$Imagen[0]->nombre.'">
                                <input type="radio" name="color_puertas">
                                <img  style="width: 100%;" src="'.$Imagen[0]->url_image.'">
                            </label>
                        </div>';

        return $html;
      
    }

    public function html_imagen_tirador_unero(Request $request)
    {
        $Imagen = DB::table('mc_tirador_unero')
                         ->where('id', $request->txt_id)
                         ->get();
                    $html="";
                    $html.='<label for="group_1">Código: '.$Imagen[0]->nombre.'</label>
                        <div>
                            <label class="radio-img" data-toggle="tooltip" data-placement="top"
                                title="'.$Imagen[0]->nombre.'">
                                <input type="radio" name="color_puertas">
                                <img  style="width: 100%;" src="'.$Imagen[0]->url_image.'">
                            </label>
                        </div>';

        return $html;
      
    }


}