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
            $cantidad       = $request->txt_cantidad_precio;
            $costo_total    = $request->costo_total;

            $detalleProducto=[
              "id_product"              => ($request->id_producto_id_item)?$request->id_producto_id_item:0,// id del producto
              "ancho"                   => ($request->txt_ancho)?$request->txt_ancho:0,
              "alto"                    => ($request->txt_alto)?$request->txt_alto:0,
              "fondo"                   => ($request->txt_fondo)?$request->txt_fondo:0,

              "apertura"                => ($request->txt_apertura)?$request->txt_apertura:0,
              "id_modelo_puerta"        => ($request->modelo_puertas)?$request->modelo_puertas:0,
              "id_color"                => ($request->color_puertas)?$request->color_puertas:0,
              "id_tirador"              => ($request->txt_model_tirador)?$request->txt_model_tirador:0,
              "id_tirador_unero"        => ($request->txt_model_tiradorUnero)?$request->txt_model_tiradorUnero:0,            
            ];

            $products = DB::table('products')
                        ->join('imagen', 'products.id', '=', 'imagen.id_product')
                        ->where('imagen.id_imagen',$request->id_imagen__)->get();
                        // dd($request->id_imagen__);
                        // exit();

       // Cart::add($id,$products->pro_name,2,$price,['datos'=>$datas,'img' => $products->pro_img,'stock' => $products->stock]);
        Cart::add($id,$products[0]->pro_name,$cantidad,$costo_total,['datos'=>$detalleProducto,'id_imagen' => $request->id_imagens,'img' => $products[0]->url_image,'id_item' =>$products[0]->id_item]);
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


    public function checkoutPage()
    {
        if(Auth::check()){

            if (Cart::total() > 0) {
                $carts = Cart::content();
                $cart_qty = Cart::count();
                $cart_total = Cart::total();

                $divisions = ShipDivision::with(['districts', 'states'])->latest()->get();
                //return $divisions;
                return view('frontend.checkout_page.checkout_page', compact(
                    'carts',
                    'cart_qty',
                    'cart_total',
                    'divisions'
                ));
            }else{
                $notification = [
                    'message' => 'Your shopping cart is empty!!',
                    'alert-type' => 'error'
                ];
                return redirect()->route('home')->with($notification);
            }
        }else{
            $notification = [
                'message' => 'You need to Login First for Checkout',
                'alert-type' => 'error'
            ];
            return redirect()->route('login')->with($notification);
        }
    }
    
}