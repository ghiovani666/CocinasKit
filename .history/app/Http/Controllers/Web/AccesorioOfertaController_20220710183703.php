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





        // $Products = DB::table('products')
        // ->join('menu_items', 'menu_items.id_item', '=', 'products.id_item')
        // // ->join('imagen', 'products.id', '=', 'imagen.id_product')
        // // ->join('medida', 'imagen.id_imagen', '=', 'medida.id_imagen')
        // ->whereIn('products.id_item', [34,35])
        // ->paginate(8);
        
        //  return view('web.pages.accesorios.web_accesorio_oferta', compact('Products'));




    //      $request = DB::select('
         
         
       
    //    ');


    //    $Products = $this->arrayPaginator($notices, $request);

    //    return view('web.pages.accesorios.web_accesorio_oferta', compact('Products'));



       $query =  DB::select(DB::raw("SELECT 
       p.id, 
       p.id_item, 
       p.pro_name, 
       p.pro_info, 
       mc.names AS categoria,
       mi.names AS items,
       (SELECT url_image FROM imagen  WHERE id_product=p.id LIMIT 1) AS url_image,
       (SELECT id_imagen FROM imagen  WHERE id_product=p.id LIMIT 1) AS id_imagen

     FROM  menu_category mc
     INNER JOIN menu_items mi on mc.id_cat=mi.id_cat
     INNER JOIN products p on mi.id_item=p.id_item
     WHERE p.id_item in (34,35)
     ORDER BY p.id desc"));

     
$page1 = new Paginator($query, 8);

dd($page1);



    }


    public function arrayPaginator($array, $request)
{
    $page = Input::get('page', 1);
    $perPage = 10;
    $offset = ($page * $perPage) - $perPage;

    return new LengthAwarePaginator(array_slice($array, $offset, $perPage, true), count($array), $perPage, $page,
        ['path' => $request->url(), 'query' => $request->query()]);
}

        Public function accesorio_oferta_detalle($id) {

            $Products = DB::table('menu')
            ->join('menu_category', 'menu.id_menu', '=', 'menu_category.id_menu')
            ->join('menu_items', 'menu_category.id_cat', '=', 'menu_items.id_cat')
            ->join('products', 'menu_items.id_item', '=', 'products.id_item')
    
            ->join('imagen', 'products.id', '=', 'imagen.id_product')
            ->join('medida', 'imagen.id_imagen', '=', 'medida.id_imagen')
            ->where('imagen.check', '=',1)
            ->where('products.id', $id)->get();
            if(Auth::check()){
                $recommends = new recommends;
                $recommends->uid = Auth::user()->id;
                $recommends->pro_id =$id;
                $recommends->save();
                }
    
            return view('web.pages.accesorios.web_accesorio_oferta_detalle', compact('Products'));
        }

}