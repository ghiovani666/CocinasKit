<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Gloudemans\Shoppingcart\Facades\Cart; // for cart lib
use Illuminate\Http\Request;
use App\products;
use Illuminate\Support\Facades\Auth;
class CartController extends Controller
{
    public function index(){
        $cartItems = Cart::content();
         return view('web.pages.cart_shop.index', compact('cartItems'));

    }
    //$id: es el parametro y el : $request: son las variables
    public function addItem(Request $request,$id){
            // $cantidad = $request->txt_cantidad_precio;
            $cantidad = "55";
            $costo_total = $request->costo_total;

            $datas=[
             // "id_product"=>$request->txt_composicion,// id del producto
              "ancho"=>$request->txt_ancho,
              "alto"=>$request->txt_alto,
              "fondo"=>$request->txt_fondo,
              "apertura"=>($request->txt_apertura)?$request->txt_apertura:0,
              //"id_color"=>$request->color_puertas,//Con sub imagen
              //"id_color_2"=>$request->color_puertas_change,//Sin sub imagen
              "id_color"=>($request->color_puertas)?$request->color_puertas:$request->color_puertas_change,
              "id_tirador"=>($request->txt_model_tirador)?$request->txt_model_tirador:0,
            ];

            $products = DB::table('products')
            ->join('imagen', 'products.id', '=', 'imagen.id_product')
            ->where('imagen.id_imagen',$request->id_imagens)->get();
        // dd($request->id_imagens);
        // exit();

       // Cart::add($id,$products->pro_name,2,$price,['datos'=>$datas,'img' => $products->pro_img,'stock' => $products->stock]);
        Cart::add($id,$products[0]->pro_name,$cantidad,$costo_totall,['datos'=>$datas,'id_imagen' => $request->id_imagens,'img' => $products[0]->url_image]);
         return redirect()->back()->with('message', true);
    }

    public function destroy($id){
        Cart::remove($id);
        return back(); // will keep same page
    }

    public function update(Request $request, $id)
    {
           $qty = $request->qty;
           $proId = $request->proId;
           $rowId = $request->rowId;
            Cart::update($rowId,$qty); // for update
            $cartItems = Cart::content(); // display all new data of cart
            return view('web.pages.cart_shop.upCart', compact('cartItems'))->with('status', 'cart updated');
    }
}