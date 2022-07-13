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
                        mex.apert_izquierda,
                        mex.apert_derecha,
                        mex.apert_doble,
                        
                        mex.desc_price,
                        mex.aume_price,
                        mex.price,

                        mex.id_color,

                        m.id_imagen,
                        p.id, 
                        p.id_item, 
                        p.pro_name, 
                        p.pro_info,
                        m.url_image

                        FROM  menu_items mi  
                        INNER JOIN products p on mi.id_item=p.id_item
                        INNER JOIN imagen m on p.id=m.id_product
                        INNER JOIN medida mex on m.id_imagen=mex.id_imagen
                        WHERE p.id_item = ?
                        GROUP BY m.id_imagen
                        ORDER BY m.id_imagen asc LIMIT 1", [$id]) ;


        // $Products = DB::table('menu')
        // ->join('menu_category', 'menu.id_menu', '=', 'menu_category.id_menu')
        // ->join('menu_items', 'menu_category.id_cat', '=', 'menu_items.id_cat')
        // ->join('products', 'menu_items.id_item', '=', 'products.id_item')

        // ->join('imagen', 'products.id', '=', 'imagen.id_product')
        // ->join('medida', 'imagen.id_imagen', '=', 'medida.id_imagen')
        // // ->where('imagen.check', '=',1)
        // ->where('products.id_item', $id)->get();

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


    public function mueble_completo_($id,$id2) {
        try {
            
            $Products = DB::select("
                        SELECT 
                        mex.apert_izquierda,
                        mex.apert_derecha,
                        mex.apert_doble,
                        
                        mex.desc_price,
                        mex.aume_price,
                        mex.price,

                        mex.id_color,

                        m.id_imagen,
                        p.id, 
                        p.id_item, 
                        p.pro_name, 
                        p.pro_info,
                        m.url_image

                        FROM  menu_items mi  
                        INNER JOIN products p on mi.id_item=p.id_item
                        INNER JOIN imagen m on p.id=m.id_product
                        INNER JOIN medida mex on m.id_imagen=mex.id_imagen
                        WHERE p.id_item = ? AND p.id = ?
                        GROUP BY m.id_imagen
                        ORDER BY m.id_imagen asc LIMIT 1", [$id,$id2]) ;

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


    public function html_imagen_colores(Request $request) {
        $rdData = DB::select("
                        SELECT xs.* FROM md_modelo_puerta_color_intermedio mp INNER JOIN mc_colores xs ON mp.id_color = xs.id
                        WHERE mp.id_producto = ? AND mp.id_modelo_puerta=?
                        ORDER BY mp.id_color ASC", [$request->id_producto, $request->id_modelo_puerta]);

        $html="";


            foreach ($rdData as $key => $value) {
                $html.='            <label class="radio-img" title="'.$value->description.'">
                <input type="radio" name="color_puertas" value="'.$value->id.'" />
                <img style="width: 40px;" src="'.$value->url_image.'" >
                </label>>';
            }
     return $html;
    }
 

}