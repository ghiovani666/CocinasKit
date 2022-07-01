<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Mail;
use App\Mail\contacts;
use App\Mail\CreateOrders;
use App\wishList;
use App\recommends;

//ENVIAR CORREOS
use App\Mail\EnviarCorreosInfo;

class HomeController extends Controller {

    public function viewHome(){
    	return view('web.pages.index');
    }

         

    public function login_register(){
    	return view('web.pages.loginRegister');
    }

    public function viewOptions(){
        return view('web.pages.options');
    }
    public function composerProducts(){
        return view('web.pages.composerProducts');
    }

    public function addCart(){
        return view('web.pages.addCart');
    }


    public function shop(Request $request) {
        $Products = DB::table('products')
        ->join('imagen', 'products.id', '=', 'imagen.id_product')
        ->join('medida', 'imagen.id_medida', '=', 'medida.id_medida')
        ->paginate(6);
        return view('web.pages.shop', compact('Products'));
    }


    public function newArrival(){
                  $Products = DB::table('products')->where('new_arrival', 1)->paginate(6); // now we are fetching all products
                  return view('web.pages.shop', compact('Products'));

    }

    public function proCats(Request $request) {
        $id_cat = $request->id_cat;
        $Products = DB::table('menu_category')->leftJoin('products', 'menu_category.id_cat', '=', 'products.cat_id')->where('menu_category.id_cat', '=', $id_cat)->paginate(6);
         return view('web.pages.shop', compact('Products'));
    }



    public function contact() {
        return view('web.pages.contact');
    }

    public function search(Request $request) {
        $search = $request->search_data;
        if ($search == '') {
            return view('web.pages.home');
        } else {
            $Products = DB::table('products')->where('pro_name', 'like', '%' . $search . '%')->paginate(12);
            return view('web.pages.shop', ['msg' => 'Results: ' . $search], compact('Products'));
        }
    }

    public function sendmail() {
        $Products = DB::table('products')->get();
        $mail = 'ghiovani999@gmail.com';
        Mail::to($mail)->send(new CreateOrders($Products));
       return back()->with('msg', 'Item Removed from Wishlist');
    }


    public function selectSize(Request $har){
      $proDum = $har->proDum;
      $size = $har->size;
      $s_price = DB::table('products_properties')
      ->where('pro_id', $proDum)
      ->where('size', $size)
      ->get();
$colorCount =1;
//echo "<p>click on color to see price and add to cart button</p>";
      foreach($s_price as $sPrice){
        //echo "US $ " .$sPrice->p_price;?>
<input type="hidden" value="<?php echo $sPrice->p_price;?>" name="newPrice" />
<input type="hidden" value="<?php echo $sPrice->color;?>" id="colorValue<?php echo $colorCount;?>" />
<div style="background:<?php echo $sPrice->color;?>;
        width:40px; height:40px; float:left; margin:5px" id="colorClicked<?php echo $colorCount;?>"></div>
<?php $colorCount++;
      }
    }

    public function selectColor(Request $colorRequest){
      $proDum = $colorRequest->proDum;
      $size = $colorRequest->size;
      $color = $colorRequest->color;
      $c_price = DB::table('products_properties')
      ->where('pro_id', $proDum)
      ->where('size', $size)
      ->where('color',$color)
      ->get();
      $colorCount =1;
            foreach($c_price as $sPrice){
              echo "$" . $sPrice->p_price;?>
<input type="hidden" value="<?php echo $sPrice->p_price;?>" name="newPrice" />
<input type="hidden" value="<?php echo $sPrice->color;?>" id="colorValue<?php echo $colorCount;?>" />
<div style="background:<?php echo $sPrice->color;?>; width:40px; height:40px"
    id="colorClicked<?php echo $colorCount;?>"></div>
<?php $colorCount++;
            }


    }

    public function addReview(Request $request){
      DB::table('reviews')->insert(
    ['person_name' => $request->person_name, 'person_email' => $request->person_email,
  'review_content' => $request->review_content,
  'created_at' => date("Y-m-d H:i:s"),'updated_at' =>date("Y-m-d H:i:s")]
      );
      return back();
    }

    //-----------OPCIONES DE MENU
    Public function optionsMenu($id) {
        //view product details
        $options = DB::table('menu_category')->where('id_menu', $id)->get();
        return view('web.layouts.pages.options', compact('options'));

    }





    Public function product_structura() {
        //view product details
               return view('web.pages.product_structura');

    }





    

    
    //-----------CAMBIA DE IMAGEN
    public function change_imagen(Request $request)
    {
        $Imagen = DB::table('imagen as i')
                         ->join('medida as m', 'i.id_medida', '=', 'm.id_medida')
                         ->select('i.url_image','m.price','i.id_imagen','m.id_color','i.id_product','m.apertura')
                         ->where('i.id_medida', $request->txt_id_medida)
                         ->get();
            return view('web.pages.images.change_image', compact('Imagen'));
      
    }

    public function change_imagen_select_color(Request $request)
    {
        $Imagen = DB::table('color_image')
                         ->where('id', $request->txt_id_color)
                         ->get();
                         $html="";
                         $html.='<label for="group_1">'.$Imagen[0]->name_color.'</label>
                                <div>

                                    <label class="radio-img" data-toggle="tooltip" data-placement="top"
                                        title="402 ROJO 4L">
                                        <input type="radio" name="color_puertas">
                                        <img style="width: 100%;" src="'.$Imagen[0]->url_image.'">
                                    </label>
                                </div>';

        return $html;
      
    }
    public function change_imagen_select_tirador(Request $request)
    {
        $Imagen = DB::table('accesorio')
                         ->where('id_accesorio', $request->txt_id_tirador)
                         ->get();
                         $html="";
                         $html.='<label for="group_1">Código: '.$Imagen[0]->names.'</label>
                                <div>

                                    <label class="radio-img" data-toggle="tooltip" data-placement="top"
                                        title="402 ROJO 4L">
                                        <input type="radio" name="color_puertas">
                                        <img  style="width: 100%;" src="'.$Imagen[0]->url_image.'">
                                    </label>
                                </div>';

        return $html;
      
    }

    
    public function change_imagen_color(Request $request)
    {
        $Imagen = DB::table('medida as m')
                        ->join('accesorio as t', 'm.id_accesorio', '=', 't.id_accesorio')
                        ->join('color_image as c', 'm.id_color', '=', 'c.id')
                        ->select('c.url_image')
                        ->where('m.id_medida', $request->txt_id_medida)
                        ->get();
            return view('web.pages.images.change_image_details', compact('Imagen'));
      
    }

    public function change_imagen_tirador(Request $request)
    {
        $Imagen = DB::table('medida as m')
                        ->join('accesorio as t', 'm.id_accesorio', '=', 't.id_accesorio')
                        ->join('color_image as c', 'm.id_color', '=', 'c.id')
                        ->select('t.url_image')
                        ->where('m.id_medida', $request->txt_id_medida)
                        ->get();
            return view('web.pages.images.change_image_details', compact('Imagen'));
      
    }
        //-----------CAMBIA DE IMAGEN
        public function change_table(Request $request)
        {
            $IdMedi =$request->txt_id_medida;
            $Medida = DB::table('imagen as i')
            ->join('medida as m', 'i.id_medida', '=', 'm.id_medida')
            ->join('apertura as a', 'm.apertura', '=', 'a.id')
            ->join('accesorio as t', 'm.id_accesorio', '=', 't.id_accesorio')
            ->join('color_image as c', 'm.id_color', '=', 'c.id')
            ->select(
            'm.id_medida',
            DB::raw('CONCAT(m.ancho,m.unidad) as ancho'),
            DB::raw('CONCAT(m.alto,m.unidad) as alto'),
            DB::raw('CONCAT(m.fondo,m.unidad) as fondo'),
            'c.name_color',
            'c.url_image AS color_imagen',
            'a.names AS name_apertura',
            't.names AS name_tirador',
            't.id_accesorio',
            'm.id_color',
            't.url_image AS tirador_imagen',
            'm.price')
             ->where('m.id_color',$request->txt_id_color)
            ->get();
                return view('web.pages.images.change_table')
                ->with(compact('Medida'))
                ->with(compact('IdMedi'));
        }

 
    public function result_success() {
        return view('cart.results');
    }

    
        //--LISTA DEL PRECIO
        public function change_price(Request $request) {
        
            $price = DB::table('medida')->leftJoin('imagen_sub', 'medida.id_medida', '=', 'imagen_sub.id_medida')
            ->where('medida.id_imagen',$request->txt_id_imagen)
            ->where('medida.ancho',$request->txt_ancho)
            ->where('medida.alto',$request->txt_alto)
            ->where('medida.fondo',$request->txt_fondo)
            ->get();
     
           return response()->json([$price[0]->price,$price[0]->url_image]);
    
        }

        public function contacto() {
            return view('web.pages.contacto');
        }

        //ENVIAR CORREO DE INFORMACION
        public function enviar_email_informacion(Request $request)
        {
    
            Mail::to('ghiovani999@gmail.com')
            ->send(new EnviarCorreosInfo([
                'txt_nombre' => $request->txt_nombre,
                'txt_email' => $request->txt_email,
                'txt_telefono' => $request->txt_telefono,
                'txt_asunto' => $request->txt_asunto,
                'txt_descripcion' => $request->txt_descripcion,
            ])); 
            return redirect()->back()->with(['success' => 'El formulario de contacto se envio correctamente']);
        }
        

}