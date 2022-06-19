<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use App\orders;

use Illuminate\Support\Facades\Auth;
use Mail;
use App\Mail\CreateOrders;

use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Payer;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Amount;
use PayPal\Api\Transaction;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Payment;
use PayPal\Exception\PayPalConnectionException;

use PayPal\Api\Details;
use PayPal\Api\ExecutePayment;
use PayPal\Api\PaymentExecution;

use Gloudemans\Shoppingcart\Facades\Cart; // for cart lib

class PaymentController extends Controller
{
    private $apiContext;

    public function __construct()
    {
        $payPalConfig = Config::get('paypal');

        $this->apiContext = new \PayPal\Rest\ApiContext(
            new \PayPal\Auth\OAuthTokenCredential(
                $payPalConfig['client_id'],
                $payPalConfig['secret']
            )
        );

        $this->apiContext->setConfig($payPalConfig['settings']);
    }


 public function payWithPayPal(Request $request)
    {

        //primero debe pasar por las validaciones
            $txt_pagos=$request->input('txt_pagos');
            $txt_persona=$request->input('txt_persona');

            if($txt_persona=="3" && $txt_pagos=="1"){

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

            //================INSERTAR ARRAYS EN SSESIONS
            $request->session()->put('session_detail', [
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
                'entre_calle' => $request->txt_entre_calle
            ]);

        $monto_pagar = floatval($request->input('monto_pagar'));
        $payer = new Payer();
        $payer->setPaymentMethod('paypal');

        $amount = new Amount();
        $amount->setTotal($monto_pagar);//ENVIAMOS MONTO A PAGAR
        $amount->setCurrency('EUR');//USD

        $transaction = new Transaction();
        $transaction->setAmount($amount);
        $transaction->setDescription('Solicitud de compra de Cocina');// NEVIAMOS UNA DESCRIPCION

        $callbackUrl = url('/paypal/status');

        $redirectUrls = new RedirectUrls();
        $redirectUrls->setReturnUrl($callbackUrl)
            ->setCancelUrl($callbackUrl);

        $payment = new Payment();
        $payment->setIntent('sale')
            ->setPayer($payer)
            ->setTransactions(array($transaction))
            ->setRedirectUrls($redirectUrls);

        try {
            $payment->create($this->apiContext);

            return redirect()->away($payment->getApprovalLink());
        } catch (PayPalConnectionException $ex) {
            echo $ex->getData();
        }
    }

    public function payPalStatus(Request $request)
    {
        // dd($request->session()->get('session_detail')["names"]);
        // exit();

        $paymentId = $request->input('paymentId');
        $payerId = $request->input('PayerID');
        $token = $request->input('token');

        if (!$paymentId || !$payerId || !$token) {
            $error = 'Lo sentimos! El pago a través de PayPal no se pudo realizar.';
            return redirect('/results')->with(compact('error'));
        }

        $payment = Payment::get($paymentId, $this->apiContext);

        $execution = new PaymentExecution();
        $execution->setPayerId($payerId);

        /** Execute the payment **/
        $result = $payment->execute($execution, $this->apiContext);

        if ($result->getState() === 'approved') {
            $status = 'Gracias! El pago a través de PayPal se ha ralizado correctamente.';
            //---------REGISTRO EN LA BD-------------
          
            // $cartItems = Cart::content(); 

            // foreach ($cartItems as $value {
            //     $insert = EmuTestTag::insert([
            //         'id_test' => $id_test,
            //         'id_tags' => $value_tag,
            //         'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
            //         'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
            //     ]);
            // }

            //===============ENVIO DE CORREO PARA EL CLIENTE POR SU COMPRA
            $SumaTotal = Cart::total()-Cart::tax();
            //$mail = 'ghiovani999@gmail.com';
            Mail::to(Auth::user()->email)->send(new CreateOrders($SumaTotal));

            //=================CREAR PEDIDO Y ORDENES DE LOS PRODUCTOS

            $id_ultimate = DB::table('pedido')->insertGetId([
                'names' => $request->session()->get('session_detail')["names"],
                'last_name' => $request->session()->get('session_detail')["last_name"],
                'dni' => $request->session()->get('session_detail')["dni"],
                'phone' => $request->session()->get('session_detail')["phone"],
                'num_fact' => $request->session()->get('session_detail')["num_fact"],
                'country' => $request->session()->get('session_detail')["country"],
                'name_recibe' => $request->session()->get('session_detail')["name_recibe"],
                'calle' => $request->session()->get('session_detail')["calle"],
                'altura' => $request->session()->get('session_detail')["altura"],
                'departament' => $request->session()->get('session_detail')["departament"],
                'torre' => $request->session()->get('session_detail')["torre"],
                'entre_calle' => $request->session()->get('session_detail')["entre_calle"],
                'state' =>'pending',
                'user_id' =>  Auth::user()->id,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' =>date("Y-m-d H:i:s")
            ]);
    
            // orders::createOrder();
            $user = Auth::user();
                $cartItems = Cart::content();
                foreach ($cartItems as $cartItem) {
                    $user->orders()->create([
                        'total' => $cartItem->qty * $cartItem->price,
                        'qty' => $cartItem->qty,
                        'price' => $cartItem->price,
                        'id_pedido' => $id_ultimate,
                        'id_imagen' => $cartItem->options["id_imagen"],

                        'ancho' => $cartItem->options["datos"]["ancho"],
                        'alto' => $cartItem->options["datos"]["alto"],
                        'fondo' => $cartItem->options["datos"]["fondo"],
                        
                        'apertura' => $cartItem->options["datos"]["apertura"],
                        'id_color' => $cartItem->options["datos"]["id_color"],
                        'id_accesorio' => $cartItem->options["datos"]["id_accesorio"]
                        
                        ]);
                }

            $request->session()->forget('session_detail');//borramos session
            Cart::destroy();
            
            //  orders::createOrder();
            // var_dump($cartItems);
            //   Cart::destroy();
            // exit();

            return redirect('/results')->with(compact('status'));
        }

        $alert = 'Lo sentimos! El pago a través de PayPal no se pudo realizar.';
        return redirect('/results')->with(compact('alert'));
    }

}