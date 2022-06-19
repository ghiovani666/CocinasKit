<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\DB;

use App\address;
use App\orders;

class CheckoutController extends Controller {

    public function index(Request $request) {
        $monto=$request->input('monto_pagar');
      

        $txt_pagos=$request->input('txt_pagos');
        $txt_persona=$request->input('txt_persona');

        if(!empty($txt_persona) && !empty($txt_pagos)){
                // check for user login
                if (Auth::check()) {
                    $cartItems = Cart::content(); 
                // return view('front.checkout', compact('cartItems'));
                return view('web.pages.checkout')
                ->with(compact('cartItems'))
                ->with(compact('monto'))
                
                ->with(compact('txt_pagos'))
                ->with(compact('txt_persona'));

                } else {
                return redirect('login_register');
                }
        }else{
            return redirect('cart');
        }
       
    }


    public function formvalidate(Request $request) {

            //primero debe pasar por las validaciones
            $txt_pagos=$request->input('txt_pagos');
            $txt_persona=$request->input('txt_persona');
            //---------------AGREGAR IMAGEN-------
            $file = $request->file('image');
            $filename  = time() .'_'.$file->getClientOriginalName(); // name of file
            $path = "img/voucher_imagen";
            $file->move($path,$filename); // save to our local folder
            //--------------------------

            if($txt_persona=="3" && $txt_pagos=="2"){

                $this->validate($request, [
                    'txt_nombre' => 'required',
                    'txt_apellido' => 'required',
                    'txt_dni' => 'required',
                    'txt_cell' => 'required',
                    'txt_fac' => 'required',
                    'txt_contry' => 'required']);

            }else{
                $this->validate($request, [
                    'txt_nombre' => 'required',
                    'txt_apellido' => 'required',
                    'txt_dni' => 'required',
                    'txt_cell' => 'required',
                    'txt_fac' => 'required',
                    'txt_contry' => 'required',
                    'r_txt_apellido' => 'required',
                    'txt_calle' => 'required',
                    'txt_altura' => 'required',
                    'txt_departament' => 'required',
                    'txt_torre' => 'required',
                    'txt_entre_calle' => 'required']);
            }

       
        $id_ultimate = DB::table('pedido')->insertGetId([
            'names' => $request->txt_nombre,
            'last_name' => $request->txt_apellido,
            'dni' => $request->txt_dni,
            'phone' => $request->txt_cell,
            'num_fact' => $request->txt_fac,
            'country' => $request->txt_contry,
            'name_recibe' => $request->r_txt_apellido,
            'calle' => $request->txt_calle,
            'altura' => $request->txt_altura,
            'departament' => $request->txt_departament,
            'torre' => $request->txt_torre,
            'entre_calle' => $request->txt_entre_calle,
            'state' =>'pending',
            'url_voucher' => '/img/voucher_imagen/'.$filename, 
            'user_id' =>  Auth::user()->id,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' =>date("Y-m-d H:i:s")
        ]);

        // orders::createOrder();
        $user = Auth::user();
            $cartItems = Cart::content();
            foreach ($cartItems as $cartItem) {
                $user->orders()->create(['total' => $cartItem->qty * $cartItem->price,'qty' => $cartItem->qty,'price' => $cartItem->price, 'id_imagen' => $cartItem->options["id_imagen"],'id_pedido' => $id_ultimate]);
            }

        Cart::destroy();
        return redirect('thankyou');
    }

}