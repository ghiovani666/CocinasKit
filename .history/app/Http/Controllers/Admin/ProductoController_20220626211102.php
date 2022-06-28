<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Storage;
use Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Filesystem\Filesystem;


class ProductoController extends Controller {

    //:::::::::::::::::::::::::: CRUD DE GALERIAS ::::::::::::::::::::::::::

    public function mainProducto() {
      $rowData_ = DB::table('products')
      ->get()->toArray();
      return view('admin.pages.producto.admin_producto')->with(compact('rowData_'));
    }

    public function listarProducto(Request $request) {
      
      /*
      if(intval($request->txt_id_servicio) > 0){
        $rowData_ = DB::select("call sp_list_product() AS T")
        ->where("T.id_menu", $request->txt_id_servicio)
        ->get()->toArray();
      }else{
        $rowData_ = DB::select("call sp_list_product()")
        ->get()->toArray();
      }
      */

     $rowData_ = DB::select("call sp_list_product()");
    // return response()->json($data);

    var_dump($rowData_);

      return view('admin.pages.producto.ajax.tablaProducto')->with(compact('rowData_'));
    }

    
    
    // $data = DB::select("call sp_list_product()");
    // return response()->json($data);


 public function createServicioGaleria(Request $request) 
 {        
         switch($request->isValues) {
          case 'CREAR': 
            $file = $request->file('image');
            
            if($file != NULL){
                $filename  =  time() .'_'.$file->getClientOriginalName();
                $path = "template_inmonut/img/".$request->txt_id_menu;
                $file->move($path,$filename);

                $result = DB::table('web_producto_galeria')->insert([
                    'id_menu' => $request->txt_id_menu, 
                    'titulo' => $request->txt_titulo, 
                    'sub_titulo' => $request->txt_sub_titulo, 
                    'descripcion' => $request->txt_descripcion,
                    'url_link' => $request->txt_url_link,
                    'url_image' => '/template_inmonut/img/'.$request->txt_id_menu.'/'.$filename, 
                    'created_at' => date("Y-m-d H:i:s"),
                    'updated_at' =>date("Y-m-d H:i:s")
                  ]);
                  return json_encode(['data' => 'Creado el registro correctamente!','state' => 'ok']);
            }else{
                  return json_encode(['data' => 'Error : subir imagen!','state' => 'error']);
                }

                break;
          case 'ACTUALIZAR': 
                  $file = $request->file('image');

                if($file != NULL){
                  $url_imagen =  DB::table('web_producto_galeria')->where('id_gallery', '=', $request->txt_id_gallery)->get();
                
                  if(file_exists(str_replace('/template_inmonut/', 'template_inmonut/',  $url_imagen[0]->url_image))){
                    unlink(str_replace('/template_inmonut/', 'template_inmonut/',  $url_imagen[0]->url_image));
                  }
                  
                    $filename  =  time() .'_'.$file->getClientOriginalName(); 
                    $path = "template_inmonut/img/".$request->txt_id_menu;
                    $file->move($path,$filename); 
      
                    $result  =  DB::table('web_producto_galeria')
                      ->where("id_gallery",$request->txt_id_gallery)
                      ->update([
                        'titulo' => $request->txt_titulo, 
                        'sub_titulo' => $request->txt_sub_titulo, 
                        'descripcion' => $request->txt_descripcion,
                        'url_link' => $request->txt_url_link,
                        'url_image' => '/template_inmonut/img/'.$request->txt_id_menu.'/'.$filename, 
                        'updated_at' =>date("Y-m-d H:i:s")
                        
                      ]); 
     
                      return json_encode(['data' => 'Actualizado el registro correctamente!','state' => 'ok','src' => '/template_inmonut/img/'.$request->txt_id_menu.'/'.$filename]);

                  }else{
                    $result  =  DB::table('web_producto_galeria')
                    ->where("id_gallery",$request->txt_id_gallery)
                    ->update([

                      'titulo' => $request->txt_titulo, 
                      'sub_titulo' => $request->txt_sub_titulo, 
                      'descripcion' => $request->txt_descripcion,
                      'url_link' => $request->txt_url_link,
                      'updated_at' =>date("Y-m-d H:i:s")
                    ]); 
                    return json_encode(['data' => 'Actualizado el registro correctamente!','state' => 'ok']);
                  }

                  break;

            case 'ELIMINAR': 
              $url_imagen =  DB::table('web_producto_galeria')->where('id_gallery', '=', $request->txt_id_gallery)->get();
              if(file_exists(str_replace('/template_inmonut/', 'template_inmonut/',  $url_imagen[0]->url_image))){
                unlink(str_replace('/template_inmonut/', 'template_inmonut/',  $url_imagen[0]->url_image));
              }
              DB::table('web_producto_galeria')->where('id_gallery', '=', $request->txt_id_gallery)->delete();
              return json_encode(['data' => 'Elimino el registro correctamente!','state' => 'ok']);
      
                  break;
      }
 }


    public function editServicioGaleria(Request $request) {
      $rowData_ = DB::table('web_producto_galeria')
      ->where("web_producto_galeria.id_gallery", $request->txt_id_gallery)
      ->get()->toArray();
      return json_encode($rowData_);
    }

}