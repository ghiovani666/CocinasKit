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

use Illuminate\Pagination\Paginator;

//ENVIAR CORREOS
use App\Mail\EnviarCorreosInfo;

class AccesorioOfertaController extends Controller {

    public function accesorio_oferta($id_cat) {
            $query =  DB::select(DB::raw("
                    SELECT 
                    m.id_imagen,
                    p.id, 
                    p.id_item, 
                    p.pro_name, 
                    p.pro_info,
                    m.url_image,
                    (SELECT price FROM medida  WHERE id_imagen=m.id_imagen ORDER BY id_medida asc LIMIT 1) AS price
                    FROM  menu_items mi  
                    INNER JOIN products p on mi.id_item=p.id_item
                    INNER JOIN imagen m on p.id=m.id_product
                    -- INNER JOIN medida me on m.id_imagen=me.id_imagen
                    WHERE p.id_item in (34,35)
                    ORDER BY m.id_imagen asc LIMIT 1"));

        $Products = new Paginator($query, 8);
        return view('web.pages.accesorios.web_accesorio_oferta', compact('Products'));
    }



        Public function accesorio_oferta_detalle($id) {

            $Products = DB::select("
            SELECT 
            m.id_imagen,
            p.id, 
            p.id_item, 
            p.pro_name, 
            p.pro_info,
            m.url_image,
            (SELECT price FROM medida  WHERE id_imagen=m.id_imagen ORDER BY id_medida asc LIMIT 1) AS price
            FROM  menu_items mi  
            INNER JOIN products p on mi.id_item=p.id_item
            INNER JOIN imagen m on p.id=m.id_product
            -- INNER JOIN medida me on m.id_imagen=me.id_imagen
            WHERE p.id_item in (34,35) AND p.id = ?
            ORDER BY m.id_imagen asc LIMIT 1", [$id]) ;


            if(Auth::check()){
                $recommends = new recommends;
                $recommends->uid = Auth::user()->id;
                $recommends->pro_id =$id;
                $recommends->save();
                }
    
            return view('web.pages.accesorios.web_accesorio_oferta_detalle', compact('Products'));
        }

}