<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{

    public function list_product() {
        $data = DB::select("call sp_list_product()");
        return response()->json($data);
      }
 
      public function list_menu()
      {
          $datas = DB::table("menu")->get();
          return json_encode($datas);
      }
      public function list_category(Request $request)
      {
          $datas = DB::table("menu_category")
          ->where('id_menu',$request->id_menu)
          ->get();
          return json_encode($datas);
      }
      public function list_item(Request $request)
      {
          $datas = DB::table("menu_items")
          ->where('id_cat',$request->id_cat)
          ->get();
          return json_encode($datas);
      }

      public function register_product(Request $request) {

        if(DB::table('products')->orderBy('id', 'desc')->first()){
          $pro= DB::table('products')->orderBy('id', 'desc')->first();
          $suma=intval($pro->id)+intval('1');
        }else{
          $suma=1;
        }
  
          $id_ultimate = DB::table('products')->insertGetId([
            'pro_name' => $request->pro_name,
            'id_item' =>  $request->id_item,
            'pro_code' => 'BALDA_CCL'.$suma,
            'pro_info' => $request->pro_info,
            'created_at' =>date("Y-m-d H:i:s"),
            'updated_at' =>date("Y-m-d H:i:s")
        ]);
         //------ACTUALIZA EL CONTADOR 
         $id_item = DB::table('products')->select('id_item')->where('id',$id_ultimate)->get();
         $count = DB::table('products')->where('id_item',$id_item[0]->id_item)->count();
         $data =DB::table('menu_items')->where('id_item', $id_item[0]->id_item)->update(['numbers' => $count]);
  
         return response()->json([
            'message' => 'Successfully.',
            'posts' => $data
        ]);
      }
      public function list_images(Request $request){
        $data = DB::table('products')
        ->join('imagen', 'imagen.id_product', '=', 'products.id')
        ->where('products.id', $request->id_product)->orderBy('imagen.id_imagen', 'ASC')->get();

        return response()->json($data);
      }

      public function list_medidas(Request $request){
        $data = DB::table('medida')
        ->where('id_imagen', $request->id_imagen)->orderBy('medida.id_medida', 'DESC')->get();

        return response()->json($data);
      }

      public function insert_medida(Request $request){ 

        $idMedida =  DB::table('medida')->insertGetId([
          'id_imagen' => $request->id_imagen,
          'ancho' => $request->ancho,
          'alto' => $request->alto,
          'fondo' => $request->fondo,
          'largo' => $request->largo,
          'price' => $request->price,

          'unidad_ancho' => $request->unidad_ancho,
          'unidad_alto' => $request->unidad_alto,
          'unidad_fondo' => $request->unidad_fondo,
          'unidad_largo' => $request->unidad_largo,

          'apertura' => (($request->derecha==1)?1:($request->izquierda==1)?1:($request->doble==1)?1:($request->abatible==1)?1:($request->extraible==1)?1:0), 
          'apert_derecha' => $request->derecha, 
          'apert_izquierda' => $request->izquierda, 
          'apert_doble' => $request->doble, 
          'apert_abatible' => $request->abatible,
          'apert_extraible' => $request->extraible, 
          
          'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
          'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
        ]);

        $data = DB::table('imagen_sub')->insert([
          'id_medida' => $idMedida,
      ]);


        return response()->json($data);
      }

      public function update_medida(Request $request){ 

        $data = DB::table('medida')
        ->where('id_medida', $request->id_medida)
        ->update([
            'id_imagen' => $request->id_imagen,
            'ancho' => $request->ancho,
            'alto' => $request->alto,
            'fondo' => $request->fondo,
            'largo' => $request->largo,
            'price' => $request->price,

            'unidad_ancho' => $request->unidad_ancho,
            'unidad_alto' => $request->unidad_alto,
            'unidad_fondo' => $request->unidad_fondo,
            'unidad_largo' => $request->unidad_largo,
            
          'apertura' => (($request->derecha==1)?1:($request->izquierda==1)?1:($request->doble==1)?1:($request->abatible==1)?1:($request->extraible==1)?1:0), 
          'apert_derecha' => $request->derecha, 
          'apert_izquierda' => $request->izquierda, 
          'apert_doble' => $request->doble, 
          'apert_abatible' => $request->abatible, 
          'apert_extraible' => $request->extraible, 

            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
      ]);

        return response()->json($data);
      }

      public function delete_medida(Request $request){ 
        $data =  DB::table('medida')->where('id_medida', '=',$request->id_medida)->delete();

        $url_imagen =  DB::table('imagen_sub')->where('id_medida', '=',  $request->id_medida)->get();
        if($url_imagen){
          unlink(str_replace('/img/', 'img/',  $url_imagen[0]->url_image));
          DB::table('imagen_sub')->where('id_medida', '=',$request->id_medida)->delete();
        }

        
        return response()->json($data);
      }

      public function delete_imagen(Request $request) {
        $url_imagen =  DB::table('imagen')->where('id_imagen', '=',  $request->id_imagen)->get();
        unlink(str_replace('/img/', 'img/',  $url_imagen[0]->url_image));
        DB::table('medida')->where('id_imagen', '=',  $request->id_imagen)->delete();
        $data = DB::table('imagen')->where('id_imagen', '=',  $request->id_imagen)->delete();
        return response()->json($data);
      }

      public function create_imagen(Request $request){
      
        $file = $request->file('image');
        $filename  = time() .'_'.$file->getClientOriginalName();
        $path = "img/alt_images";
        $file->move($path,$filename);
        $data = DB::table('imagen')->insert([
          'id_product' => $request->id_product, 
          'check' => $request->check,
          'url_image' => '/img/alt_images/'.$filename, 
          ]);
          
          return response()->json($data);
      }

      public function update_imagen(Request $request){
      

          if($request->file('image')){
            $url_imagen =  DB::table('imagen')->where('id_imagen', '=',  $request->id_imagen)->get();
            unlink(str_replace('/img/', 'img/',  $url_imagen[0]->url_image));
  
            $file = $request->file('image');
            $filename  = time() .'_'.$file->getClientOriginalName();
            $path = "img/alt_images";
            $file->move($path,$filename);
  
            $data  =  DB::table('imagen')
              ->where('id_imagen', $request->id_imagen)
              ->update([
                'check' => $request->check,
                'url_image' => '/img/alt_images/'.$filename, 
            ]);
          }else{

            DB::table('imagen')
            ->where('id_imagen', $request->id_imagen)
            ->update([
              'check' => $request->check,
            ]);

            $data  =   DB::table('medida')
            ->where('id_imagen', $request->id_imagen)
            ->update([
              'id_color' => $request->color
            ]);
          }
          return response()->json($data);
      }

      public function update_product(Request $request) {

        $data =  DB::table('products')->where('id',$request->id_product)->update([
          'id_item' => $request->id_item,
          'pro_name' => $request->pro_name,
          'pro_info' => $request->pro_info
          ]); 
          return response()->json($data);
      }

      public function delete_product(Request $request) {  
        $imagen = DB::table('imagen')->where('id_product', '=', $request->id)->get();
        
          foreach ($imagen as $key => $value) {
            unlink(str_replace('/img/', 'img/',$value->url_image));
            DB::table('medida')->where('id_medida', '=',$value->id_medida)->delete();
          }
            DB::table('imagen')->where('id_product', '=',$request->id)->delete();
  
          //------ACTUALIZA EL CONTADOR 
          $id_item = DB::table('products')->select('id_item')->where('id',$request->id)->get();
          $count = DB::table('products')->where('id_item',$id_item[0]->id_item)->count();
          DB::table('menu_items')->where('id_item', $id_item[0]->id_item)->update(['numbers' => $count-1]);
          $data =  DB::table('products')->where('id', '=',$request->id)->delete();
        
     
      return response()->json($data);
    }

    public function descuento_price(Request $request) {
      $data = DB::select("call sp_update_price(".$request->id_menu.",".$request->desc_price.",".$request->aume_price.")");
      return response()->json($data);
    }

    public function list_menu_filter()
    {
        $datas = DB::table("menu")
        ->whereIn("id_menu",[2,3,4])->get();
        //whereNotIn
        return json_encode($datas);
    }

    public function masivo_insert_medidas(Request $request) {
      foreach ($request->data as $key => $value) {
         $data = DB::select("call sp_insert_medidas(".$request->id_menu.",".$value['ancho'].",".$value['alto'].",".$value['fondo'].",".$value['largo'].")");
      }
      return response()->json($data);
    }

    public function change_medida(Request $request) {
      if($request->valor==1){
        $data  =  DB::table('medida')->where('id_medida', $request->id_medida)->update(['ancho' =>0]);
      }elseif($request->valor==2){
        $data  =  DB::table('medida')->where('id_medida', $request->id_medida)->update(['alto' =>0]);
      }elseif($request->valor==3){
        $data  =  DB::table('medida')->where('id_medida', $request->id_medida)->update(['fondo' =>0]);
      }else{
        $data  =  DB::table('medida')->where('id_medida', $request->id_medida)->update(['largo' =>0]);
      }

      return response()->json($data);
    }

    public function update_imagen_sub(Request $request){
      

      if($request->file('image')){
        $url_imagen =  DB::table('imagen_sub')->where('id_medida', '=',  $request->id_medida)->get();
        if($url_imagen[0]->url_image!=null){
          unlink(str_replace('/img/', 'img/',  $url_imagen[0]->url_image));
        }else{
          $file = $request->file('image');
          $filename  = time() .'_'.$file->getClientOriginalName();
          $path = "img/alt_images_sub";
          $file->move($path,$filename);
        }
 
        $data  =  DB::table('imagen_sub')
          ->where('id_medida', $request->id_medida)
          ->update([
            'url_image' => '/img/alt_images_sub/'.$filename, 
        ]);
        return response()->json($data);
      }
     
  }
  

}