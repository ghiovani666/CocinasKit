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


class MuebleColoresController extends Controller {

    //:::::::::::::::::::::::::: CRUD COMPOSICION OFERTA::::::::::::::::::::::::::

    public function mueble_colores() {
      return view('admin.pages.mueble_colores.admin_mueble_colores');
    }


    
    public function mueble_colores_listar(Request $request) {

      if(intval($request->id_categoria) > 0){
        $rowData_ = DB::select("
                    SELECT 
                    `id`, `url_image`, `name_color`, `description`
                    FROM mc_colores

                  WHERE name_color=? 
                  ORDER BY id desc ", [$request->id_categoria]);

      }else{
     
        $rowData_ = DB::select("
                  SELECT 
                  `id`, `url_image`, `name_color`, `description`
                  FROM mc_colores
                  ORDER BY id desc ");

      }

      return view('admin.pages.mueble_colores.ajax.tablaProducto')->with(compact('rowData_'));
    }






 public function mueble_colores_crear(Request $request) 
 {        
         switch($request->isValues) {
          case 'CREAR': 

            DB::beginTransaction();

            try {

              $file0           = $request->file('image0');
              $txt_pro_name    = $request->txt_pro_name;
              $txt_descripcion = $request->txt_descripcion;

              if($file0 != NULL){

                  $filename  =  time() .'_'.$file0->getClientOriginalName();
                  $path = "img/mc_mueble_colores";
                  $file0->move($path,$filename);

                }
                  $result = DB::table('medida')->insert([
                    'id' => $id_imagen__, 
                    'name_color'     => $txt_pro_name, 
                    'description'    => $txt_descripcion, 
                    'url_image' => '/img/mc_mueble_colores/'.$filename, 
                    'created_at' => date("Y-m-d H:i:s"),
                    'updated_at' =>date("Y-m-d H:i:s")
                  ]);
  
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
                  $file0 = $request->file('image0');
                  $file1 = $request->file('image1');
                  $file2 = $request->file('image2');
                  $file3 = $request->file('image3');
                  $file4 = $request->file('image4');
                  $file5 = $request->file('image5');

                  $id_imagen_0 = $request->id_image0;
                  $id_imagen_1 = $request->id_image1;
                  $id_imagen_2 = $request->id_image2;
                  $id_imagen_3 = $request->id_image3;
                  $id_imagen_4 = $request->id_image4;
                  $id_imagen_5 = $request->id_image5;

                  $arraysColores = $request->nameColor;
                  $arraysTirador = $request->nameTirador;
                  $arraysEnzimera = $request->nameEnzimera;


                if($file0 != NULL &&  $id_imagen_0 != NULL){
                  $url_imagen =  DB::table('imagen')->where('id_imagen', '=', $id_imagen_0)->get();
                
                    if(file_exists(str_replace('/img/', 'img/',  $url_imagen[0]->url_image))){
                      unlink(str_replace('/img/', 'img/',  $url_imagen[0]->url_image));
                    }
                  
                    $filename  =  time() .'_'.$file0->getClientOriginalName(); 
                    $path = "img/mc_mueble_colores/".$request->id_producto;
                    $file0->move($path,$filename); 
      
                    $result  =  DB::table('imagen')
                      ->where("id_imagen",$id_imagen_0)
                      ->update([
                        'url_image' => '/img/mc_mueble_colores/'.$request->id_producto.'/'.$filename, 
                        'updated_at' =>date("Y-m-d H:i:s")
                      ]); 
     
                     // return json_encode(['data' => 'Actualizado el registro correctamente!','state' => 'ok','src0' => '/img/mc_mueble_colores/'.$request->id_producto.'/'.$filename]);

                  }
                  
                  if($file1 != NULL &&  $id_imagen_1 != NULL){
                    $url_imagen =  DB::table('imagen')->where('id_imagen', '=', $id_imagen_1)->get();
                  
                    if(file_exists(str_replace('/img/', 'img/',  $url_imagen[0]->url_image))){
                      unlink(str_replace('/img/', 'img/',  $url_imagen[0]->url_image));
                    }
                    
                      $filename  =  time() .'_'.$file1->getClientOriginalName(); 
                      $path = "img/mc_mueble_colores/".$request->id_producto;
                      $file1->move($path,$filename); 
        
                      $result  =  DB::table('imagen')
                      ->where("id_imagen",$id_imagen_1)
                        ->update([
                          'url_image' => '/img/mc_mueble_colores/'.$request->id_producto.'/'.$filename, 
                          'updated_at' =>date("Y-m-d H:i:s")
                        ]); 
       
                       // return json_encode(['data' => 'Actualizado el registro correctamente!','state' => 'ok','src1' => '/img/mc_mueble_colores/'.$request->id_producto.'/'.$filename]);
  
                    }
                    if($file2 != NULL &&  $id_imagen_2 != NULL){
                      $url_imagen =  DB::table('imagen')->where('id_imagen', '=', $id_imagen_2)->get();
                    
                      if(file_exists(str_replace('/img/', 'img/',  $url_imagen[0]->url_image))){
                        unlink(str_replace('/img/', 'img/',  $url_imagen[0]->url_image));
                      }
                      
                        $filename  =  time() .'_'.$file2->getClientOriginalName(); 
                        $path = "img/mc_mueble_colores/".$request->id_producto;
                        $file2->move($path,$filename); 
          
                        $result  =  DB::table('imagen')
                          ->where("id_imagen",$id_imagen_2)
                          ->update([
                            'url_image' => '/img/mc_mueble_colores/'.$request->id_producto.'/'.$filename, 
                            'updated_at' =>date("Y-m-d H:i:s")
                          ]); 
         
                         // return json_encode(['data' => 'Actualizado el registro correctamente!','state' => 'ok','src2' => '/img/mc_mueble_colores/'.$request->id_producto.'/'.$filename]);
    
                      }
                      
                      if($file3 != NULL &&  $id_imagen_3 != NULL){
                        $url_imagen =  DB::table('imagen')->where('id_imagen', '=', $id_imagen_3)->get();
                      
                        if(file_exists(str_replace('/img/', 'img/',  $url_imagen[0]->url_image))){
                          unlink(str_replace('/img/', 'img/',  $url_imagen[0]->url_image));
                        }
                        
                          $filename  =  time() .'_'.$file3->getClientOriginalName(); 
                          $path = "img/mc_mueble_colores/".$request->id_producto;
                          $file3->move($path,$filename); 
            
                          $result  =  DB::table('imagen')
                            ->where("id_imagen",$id_imagen_3)
                            ->update([
                              'url_image' => '/img/mc_mueble_colores/'.$request->id_producto.'/'.$filename, 
                              'updated_at' =>date("Y-m-d H:i:s")
                            ]); 
           
                            //return json_encode(['data' => 'Actualizado el registro correctamente!','state' => 'ok','src3' => '/img/mc_mueble_colores/'.$request->id_producto.'/'.$filename]);
      
                        }
                        
                        if($file4 != NULL &&  $id_imagen_4 != NULL){
                          $url_imagen =  DB::table('imagen')->where('id_imagen', '=', $id_imagen_4)->get();
                        
                          if(file_exists(str_replace('/img/', 'img/',  $url_imagen[0]->url_image))){
                            unlink(str_replace('/img/', 'img/',  $url_imagen[0]->url_image));
                          }
                          
                            $filename  =  time() .'_'.$file4->getClientOriginalName(); 
                            $path = "img/mc_mueble_colores/".$request->id_producto;
                            $file4->move($path,$filename); 
              
                            $result  =  DB::table('imagen')
                              ->where("id_imagen",$id_imagen_4)
                              ->update([
                                'url_image' => '/img/mc_mueble_colores/'.$request->id_producto.'/'.$filename, 
                                'updated_at' =>date("Y-m-d H:i:s")
                              ]); 
             
                              //return json_encode(['data' => 'Actualizado el registro correctamente!','state' => 'ok','src4' => '/img/mc_mueble_colores/'.$request->id_producto.'/'.$filename]);
        
                          }
                          
                          if($file5 != NULL &&  $id_imagen_5 != NULL){
                            $url_imagen =  DB::table('imagen')->where('id_imagen', '=', $id_imagen_5)->get();
                          
                            if(file_exists(str_replace('/img/', 'img/',  $url_imagen[0]->url_image))){
                              unlink(str_replace('/img/', 'img/',  $url_imagen[0]->url_image));
                            }
                            
                              $filename  =  time() .'_'.$file5->getClientOriginalName(); 
                              $path = "img/mc_mueble_colores/".$request->id_producto;
                              $file5->move($path,$filename); 
                
                              $result  =  DB::table('imagen')
                                ->where("id_imagen",$id_imagen_5)
                                ->update([
                                  'url_image' => '/img/mc_mueble_colores/'.$request->id_producto.'/'.$filename, 
                                  'updated_at' =>date("Y-m-d H:i:s")
                                ]); 
               
                               // return json_encode(['data' => 'Actualizado el registro correctamente!','state' => 'ok','src5' => '/img/mc_mueble_colores/'.$request->id_producto.'/'.$filename]);
          
                            }


                            // if($file0 == NULL &&  $file1=== NULL &&  $file2 == NULL &&  $file3 == NULL &&  $file4 == NULL &&  $file5 == NULL ){

                            
                               DB::table('products')->where("id",$request->id_producto)->update(['pro_info' => $request->txt_descripcion,'pro_name' => $request->txt_pro_name,'updated_at' =>date("Y-m-d H:i:s")]); 


                              //  :::::::::::::::::::: 1: COLORES :::::::::::::::::::::::::::::::
                               DB::table('mc_colores_intermedio')->where('id_producto', '=', $request->id_producto)->delete();
                               foreach ($arraysColores as $value) {
                                  DB::table('mc_colores_intermedio')->insert(['id_producto' => $request->id_producto,'id_color' => $value]);
                                }
                               //  :::::::::::::::::::: 2: TIRADOR :::::::::::::::::::::::::::::::
                               DB::table('mc_tirador_intermedio')->where('id_producto', '=', $request->id_producto)->delete();
                               foreach ($arraysTirador as $value) {
                                  DB::table('mc_tirador_intermedio')->insert(['id_producto' => $request->id_producto,'id_tirador' => $value]);
                                }

                              //  :::::::::::::::::::: 3: ENZIMERA :::::::::::::::::::::::::::::::
                               DB::table('mc_enzimera_intermedio')->where('id_producto', '=', $request->id_producto)->delete();
                               foreach ($arraysEnzimera as $value) {
                                  DB::table('mc_enzimera_intermedio')->insert(['id_producto' => $request->id_producto,'id_enzimera' => $value]);
                                }


                               $result  = DB::table('medida')->where("id_imagen",$id_imagen_0)->update(['price' => $request->txt_price,'copete' => $request->txt_copete,'updated_at' =>date("Y-m-d H:i:s")]); 
                              return json_encode(['data' => 'Actualizado el registro correctamente!','state' => 'ok']);
                         
                              // }

                  break;

            case 'ELIMINAR': 
    
              DB::beginTransaction();

              try {
           
                  //::::::::::::::::ACTUALIZA EL CONTADOR :::::::::::::::::::::::
                  $count = DB::table('products')->where('id_item','43')->count();
                  DB::table('menu_items')->where('id_item', '43')->update(['numbers' => $count-1]);
                  $id_imagen_ = DB::table('imagen')->where('id_product', '=', $request->id_producto)->skip(0)->take(1)->get();


                  // var_dump($id_imagen_[0]->id_imagen);
                  // exit;
                  // $user=User::find($request->id);


                  if(file_exists('img/mc_mueble_colores/'.$request->id_producto)){
                    $folderPath=public_path('img/mc_mueble_colores/'.$request->id_producto);
                    File::deleteDirectory($folderPath);
                  }

                  DB::table('medida')->where('id_imagen', '=', $id_imagen_[0]->id_imagen)->delete();
                  DB::table('imagen')->where('id_product', '=',  $request->id_producto)->delete();
                  DB::table('products')->where('id', '=',  $request->id_producto)->delete();
                 

                  DB::table('mc_colores_intermedio')->where('id_producto', '=', $request->id_producto)->delete();
                  DB::table('mc_tirador_intermedio')->where('id_producto', '=', $request->id_producto)->delete();
                  DB::table('mc_enzimera_intermedio')->where('id_producto', '=', $request->id_producto)->delete();

      
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


    public function mueble_colores_editar(Request $request) {
     
      $rowData_ = DB::select("
            SELECT 
            im.id_imagen, 
            im.url_image,
            p.pro_name,
            p.pro_info,
            (SELECT price FROM medida WHERE id_imagen= im.id_imagen)  AS price,
            (SELECT copete FROM medida WHERE id_imagen= im.id_imagen)  AS copete
                        
          FROM products p INNER JOIN imagen im on p.id=im.id_product 
          WHERE p.id_item=43 AND p.id=?
          ORDER BY im.id_imagen asc ", [$request->id_producto]);

      return json_encode($rowData_) ;
    }

}