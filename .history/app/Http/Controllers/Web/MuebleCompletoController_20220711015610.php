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
            

            $Products = DB::select("
                        SELECT 
                        p.apert_izquierda,
                        p.apert_derecha,
                        p.apert_doble,
                        m.id_imagen,
                        p.id, 
                        p.id_item, 
                        p.pro_name, 
                        p.pro_info,
                        m.url_image
                    
                        FROM  menu_items mi  
                        INNER JOIN products p on mi.id_item=p.id_item
                        INNER JOIN imagen m on p.id=m.id_product
                        WHERE p.id_item = ?
                        ORDER BY m.id_imagen asc LIMIT 1", [$id]) ;

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
                    <input type="radio" name="color_puertas" onclick="modalAbrirImagen('."'".$Imagen[0]->url_image."'".')">
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
                                <input type="radio" name="color_puertas" onclick="modalAbrirImagen('."'".$Imagen[0]->url_image."'".')">
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
                                <input type="radio" name="color_puertas" onclick="modalAbrirImagen('."'".$Imagen[0]->url_image."'".')">
                                <img  style="width: 100%;" src="'.$Imagen[0]->url_image.'">
                            </label>
                        </div>';

        return $html;
      
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

    public function html_imagen_acabado_puertas(Request $request)
    {
        $Imagen = DB::table('mc_acabado_puerta')
                         ->where('id', $request->txt_id_color)
                         ->get();
                    $html="";
                    $html.='<label for="group_1">'.$Imagen[0]->nombre.'</label>
                        <div>

                            <label class="radio-img" data-toggle="tooltip" data-placement="top"
                                title="'.$Imagen[0]->nombre.'">
                                <input type="radio" name="color_puertas" onclick="modalAbrirImagen('."'".$Imagen[0]->url_image."'".')">
                                <img style="width: 100%;" src="'.$Imagen[0]->url_image.'">
                            </label>
                        </div>';

        return $html;
      
    }


}