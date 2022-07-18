<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\products;
use Storage;
use Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Filesystem\Filesystem;
use File;


class MuebleCopeteController extends Controller {

    //:::::::::::::::::::::::::: CRUD COMPOSICION OFERTA::::::::::::::::::::::::::

    public function mueble_copete() {
      return view('admin.pages.mueble_copete.admin_mueble_copete');
    }


    
    public function mueble_copete_listar(Request $request) {

      if(intval($request->id_categoria) > 0){
        $rowData_ = DB::select("
                    SELECT 
                    `id`, `url_image`,  nombre as  name_color,  descripcion as  description
                    FROM mc_copete

                  WHERE nombre=? 
                  ORDER BY id desc ", [$request->id_categoria]);

      }else{
     
        $rowData_ = DB::select("
                  SELECT 
                  `id`, `url_image`,  nombre as  name_color,  descripcion as  description
                  FROM mc_copete
                  ORDER BY id desc ");

      }

      return view('admin.pages.mueble_copete.ajax.tablaProducto')->with(compact('rowData_'));
    }






 public function mueble_copete_crear(Request $request) 
 {        
          $file0           = $request->file('image0');
          $txt_pro_name    = $request->txt_pro_name;
          $txt_descripcion = $request->txt_descripcion;
          $id_imagen_0       = $request->id_producto;

         switch($request->isValues) {
          case 'CREAR': 

            DB::beginTransaction();

            try {

              if($file0 != NULL){

                  $filename  =  time() .'_'.$file0->getClientOriginalName();
                  $path = "img/mc_copete";
                  $file0->move($path,$filename);

               
                  DB::table('mc_copete')->insert([
                    'nombre'          => $txt_pro_name, 
                    'descripcion'     => $txt_descripcion, 
                    'url_image'       => '/img/mc_copete/'.$filename, 
                    'created_at'      => date("Y-m-d H:i:s"),
                    'updated_at'      =>date("Y-m-d H:i:s")
                  ]);
                }
                
                DB::commit();
                // all good
                return json_encode(['data' => 'Registro correctamente!','state' => 'ok']);
            } catch (\Exception $e) {
                DB::rollback();
                // something went wrong
                return redirect()->back()->withErrors(['error' => $e->getMessage()]);
            }

                break;
          case 'ACTUALIZAR': 


            DB::beginTransaction();
            try {



                if($file0 != NULL){
                  $url_imagen =  DB::table('mc_copete')->where('id', '=', $id_imagen_0)->get();
                
                    if(file_exists(str_replace('/img/', 'img/',  $url_imagen[0]->url_image))){
                      unlink(str_replace('/img/', 'img/',  $url_imagen[0]->url_image));
                    }
                  
                    $filename  =  time() .'_'.$file0->getClientOriginalName(); 
                    $path = "img/mc_copete";
                    $file0->move($path,$filename); 
      
                    DB::table('mc_copete')
                      ->where("id",$id_imagen_0)
                      ->update([
                        'url_image' => '/img/mc_copete/'.$filename, 
                        'updated_at' =>date("Y-m-d H:i:s")
                      ]); 

                  }else{

                    DB::table('mc_copete')
                    ->where("id",$id_imagen_0)
                    ->update([
                      'nombre'         => $txt_pro_name, 
                      'descripcion'    => $txt_descripcion, 
                      'updated_at' =>date("Y-m-d H:i:s")
                    ]); 

                  }

                  DB::commit();
                  // all good
                  return json_encode(['data' => 'Actualizado correctamente!','state' => 'ok']);
              } catch (\Exception $e) {
                  DB::rollback();
                  // something went wrong
                  return redirect()->back()->withErrors(['error' => $e->getMessage()]);
              }


                  break;

            case 'ELIMINAR': 
    
              DB::beginTransaction();

              try {
                $url_imagen =  DB::table('mc_copete')->where('id', '=', $id_imagen_0)->get();
                
                if(file_exists(str_replace('/img/', 'img/',  $url_imagen[0]->url_image))){
                  unlink(str_replace('/img/', 'img/',  $url_imagen[0]->url_image));
                }

                  DB::table('mc_copete')->where('id', '=', $id_imagen_0)->delete();
      
                  DB::commit();
                  // all good
                  return json_encode(['data' => 'Elimino el registro correctamente!','state' => 'ok']);
              } catch (\Exception $e) {
                  DB::rollback();
                  // something went wrong
                  return redirect()->back()->withErrors(['error' => $e->getMessage()]);
              }

                  break;
      }
 }


    public function mueble_copete_editar(Request $request) {
     
      $rowData_ = DB::select("
      SELECT 
      `id`, `url_image`,  nombre as  name_color,  descripcion as  description
      FROM mc_copete
      WHERE id=?
      ORDER BY id desc ", [$request->id_producto]);

      return json_encode($rowData_) ;
    }

}