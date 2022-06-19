<?php

namespace App;

use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\products;

use Illuminate\Database\Eloquent\Model;

class orders extends Model {

    //protected $fillable = ['total','id_imagen','qty','price','id_pedido'];

    // public function orderFields() {
    //     return $this->belongsToMany(products::class)->withPivot('qty', 'total');
    // }

    public static function createOrder() {

        // for order inserting to database
        $user = Auth::user();
        $cartItems = Cart::content();
        foreach ($cartItems as $cartItem) {
         $user->orders()->create([
             'total' => $cartItem->qty * $cartItem->price,
             'qty' => $cartItem->qty,
             'price' => $cartItem->price,
             'id_imagen' => $cartItem->options["id_imagen"],

             'ancho' => $cartItem->options["datos"]["ancho"],
             'alto' => $cartItem->options["datos"]["alto"],
             'fondo' => $cartItem->options["datos"]["fondo"],
             
             'apertura' => $cartItem->options["datos"]["apertura"],
             'id_color' => $cartItem->options["datos"]["id_color"],
             'id_tirador' => $cartItem->options["datos"]["id_tirador"],

             ]);
        }
    }

}
