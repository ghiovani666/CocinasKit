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


class AccesoriosController extends Controller {

    //:::::::::::::::::::::::::: CRUD COMPOSICION OFERTA::::::::::::::::::::::::::

    public function accesorios() {
      return view('admin.pages.accesorios.admin_accesorios');
    }

    public function accesorios_listar(Request $request) {

      $rowData_ = DB::select("
                  SELECT 
                    p.id, 
                    p.id_item, 
                    p.pro_name, 
                    p.pro_code, 
                    p.pro_info, 
                    p.state, 
                    m.names AS menus,
                    mc.names AS categoria,
                    mi.names AS items,
                    (SELECT url_image FROM imagen  WHERE id_product=p.id LIMIT 1) AS url_image
                                
                  FROM menu m INNER JOIN  menu_category mc on m.id_menu=mc.id_menu
                  INNER JOIN menu_items mi on mc.id_cat=mi.id_cat
                  INNER JOIN products p on mi.id_item=p.id_item
                  -- INNER JOIN imagen im on p.id=im.id_product 
                  WHERE p.id_item=43
                  ORDER BY p.id desc ");

       return view('admin.pages.accesorios.ajax.tablaProducto')->with(compact('rowData_'));
     }

 public function accesorios_crear(Request $request) 
 {        

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

         switch($request->isValues) {
          case 'CREAR': 

            DB::beginTransaction();

            try {
  
              if(products::orderBy('id', 'desc')->first()){
                $pro= products::orderBy('id', 'desc')->first();
                $suma=intval($pro->id)+intval('1');
              }else{
                $suma=1;
              }
  
              $id_producto = DB::table('products')->insertGetId([
                'pro_name' => $request->txt_pro_name,
                'pro_info' => $request->txt_descripcion,
                'id_item' =>  '43',//COMPOSICION OFERTA
                'pro_code' => 'PRO_'.$suma,
                'created_at' =>date("Y-m-d H:i:s"),
                'updated_at' =>date("Y-m-d H:i:s")
              ]);

 
               //::::::::::::::::ACTUALIZA EL CONTADOR :::::::::::::::::::::::
               $count = DB::table('products')->where('id_item','43')->count();
               DB::table('menu_items')->where('id_item', '43')->update(['numbers' => $count]);
  
                if($file0 != NULL){
                  $filename  =  time() .'_'.$file0->getClientOriginalName();
                  $path = "img/mc_accesorios/".$id_producto;
                  $file0->move($path,$filename);
  
                  $id_imagen__ = DB::table('imagen')->insertGetId([
                      'id_product' =>$id_producto, 
                      'url_image' => '/img/mc_accesorios/'.$id_producto.'/'.$filename, 
                      'created_at' => date("Y-m-d H:i:s"),
                      'updated_at' =>date("Y-m-d H:i:s")
                    ]);
                }
  
                if($file1 != NULL){
                  $filename1  =  time() .'_'.$file1->getClientOriginalName();
                  $path1 = "img/mc_accesorios/".$id_producto;
                  $file1->move($path1,$filename1);
  
                  $result = DB::table('imagen')->insert([
                      'id_product' =>$id_producto, 
                      'url_image' => '/img/mc_accesorios/'.$id_producto.'/'.$filename1, 
                      'created_at' => date("Y-m-d H:i:s"),
                      'updated_at' =>date("Y-m-d H:i:s")
                    ]);
                }
  
                if($file2 != NULL){
                  $filename2  =  time() .'_'.$file2->getClientOriginalName();
                  $path2 = "img/mc_accesorios/".$id_producto;
                  $file2->move($path2,$filename2);
  
                  $result = DB::table('imagen')->insert([
                      'id_product' =>$id_producto, 
                      'url_image' => '/img/mc_accesorios/'.$id_producto.'/'.$filename2, 
                      'created_at' => date("Y-m-d H:i:s"),
                      'updated_at' =>date("Y-m-d H:i:s")
                    ]);
                }
  
                if($file3 != NULL){
                  $filename3  =  time() .'_'.$file3->getClientOriginalName();
                  $path3 = "img/mc_accesorios/".$id_producto;
                  $file3->move($path3,$filename3);
  
                  $result = DB::table('imagen')->insert([
                      'id_product' =>$id_producto, 
                      'url_image' => '/img/mc_accesorios/'.$id_producto.'/'.$filename3, 
                      'created_at' => date("Y-m-d H:i:s"),
                      'updated_at' =>date("Y-m-d H:i:s")
                    ]);
                }
  
                if($file4 != NULL){
                  $filename4  =  time() .'_'.$file4->getClientOriginalName();
                  $path4 = "img/mc_accesorios/".$id_producto;
                  $file4->move($path4,$filename4);
  
                  $result = DB::table('imagen')->insert([
                      'id_product' =>$id_producto, 
                      'url_image' => '/img/mc_accesorios/'.$id_producto.'/'.$filename4, 
                      'created_at' => date("Y-m-d H:i:s"),
                      'updated_at' =>date("Y-m-d H:i:s")
                    ]);
                }
  
                if($file5 != NULL){
                  $filename5  =  time() .'_'.$file5->getClientOriginalName();
                  $path5 = "img/mc_accesorios/".$id_producto;
                  $file5->move($path5,$filename5);
  
                  $result = DB::table('imagen')->insert([
                      'id_product' =>$id_producto, 
                      'url_image' => '/img/mc_accesorios/'.$id_producto.'/'.$filename5, 
                      'created_at' => date("Y-m-d H:i:s"),
                      'updated_at' =>date("Y-m-d H:i:s")
                    ]);
                }
  
                DB::commit();
                // all good
                return json_encode(['data' => 'Actualizado el registro correctamente!','state' => 'ok']);
            } catch (\Exception $e) {
                DB::rollback();
                // something went wrong
                return redirect()->back()->withErrors(['error' => $e->getMessage()]);
            }

                break;
          case 'ACTUALIZAR': 


                if($file0 != NULL &&  $id_imagen_0 != NULL){
                  $url_imagen =  DB::table('imagen')->where('id_imagen', '=', $id_imagen_0)->get();
                
                    if(file_exists(str_replace('/img/', 'img/',  $url_imagen[0]->url_image))){
                      unlink(str_replace('/img/', 'img/',  $url_imagen[0]->url_image));
                    }
                  
                    $filename  =  time() .'_'.$file0->getClientOriginalName(); 
                    $path = "img/mc_accesorios/".$request->id_producto;
                    $file0->move($path,$filename); 
      
                    $result  =  DB::table('imagen')
                      ->where("id_imagen",$id_imagen_0)
                      ->update([
                        'url_image' => '/img/mc_accesorios/'.$request->id_producto.'/'.$filename, 
                        'updated_at' =>date("Y-m-d H:i:s")
                      ]); 
     
                     // return json_encode(['data' => 'Actualizado el registro correctamente!','state' => 'ok','src0' => '/img/mc_accesorios/'.$request->id_producto.'/'.$filename]);

                  }
                  
                  if($file1 != NULL &&  $id_imagen_1 != NULL){
                    $url_imagen =  DB::table('imagen')->where('id_imagen', '=', $id_imagen_1)->get();
                  
                    if(file_exists(str_replace('/img/', 'img/',  $url_imagen[0]->url_image))){
                      unlink(str_replace('/img/', 'img/',  $url_imagen[0]->url_image));
                    }
                    
                      $filename  =  time() .'_'.$file1->getClientOriginalName(); 
                      $path = "img/mc_accesorios/".$request->id_producto;
                      $file1->move($path,$filename); 
        
                      $result  =  DB::table('imagen')
                      ->where("id_imagen",$id_imagen_1)
                        ->update([
                          'url_image' => '/img/mc_accesorios/'.$request->id_producto.'/'.$filename, 
                          'updated_at' =>date("Y-m-d H:i:s")
                        ]); 
       
                       // return json_encode(['data' => 'Actualizado el registro correctamente!','state' => 'ok','src1' => '/img/mc_accesorios/'.$request->id_producto.'/'.$filename]);
  
                    }
                    if($file2 != NULL &&  $id_imagen_2 != NULL){
                      $url_imagen =  DB::table('imagen')->where('id_imagen', '=', $id_imagen_2)->get();
                    
                      if(file_exists(str_replace('/img/', 'img/',  $url_imagen[0]->url_image))){
                        unlink(str_replace('/img/', 'img/',  $url_imagen[0]->url_image));
                      }
                      
                        $filename  =  time() .'_'.$file2->getClientOriginalName(); 
                        $path = "img/mc_accesorios/".$request->id_producto;
                        $file2->move($path,$filename); 
          
                        $result  =  DB::table('imagen')
                          ->where("id_imagen",$id_imagen_2)
                          ->update([
                            'url_image' => '/img/mc_accesorios/'.$request->id_producto.'/'.$filename, 
                            'updated_at' =>date("Y-m-d H:i:s")
                          ]); 
         
                         // return json_encode(['data' => 'Actualizado el registro correctamente!','state' => 'ok','src2' => '/img/mc_accesorios/'.$request->id_producto.'/'.$filename]);
    
                      }
                      
                      if($file3 != NULL &&  $id_imagen_3 != NULL){
                        $url_imagen =  DB::table('imagen')->where('id_imagen', '=', $id_imagen_3)->get();
                      
                        if(file_exists(str_replace('/img/', 'img/',  $url_imagen[0]->url_image))){
                          unlink(str_replace('/img/', 'img/',  $url_imagen[0]->url_image));
                        }
                        
                          $filename  =  time() .'_'.$file3->getClientOriginalName(); 
                          $path = "img/mc_accesorios/".$request->id_producto;
                          $file3->move($path,$filename); 
            
                          $result  =  DB::table('imagen')
                            ->where("id_imagen",$id_imagen_3)
                            ->update([
                              'url_image' => '/img/mc_accesorios/'.$request->id_producto.'/'.$filename, 
                              'updated_at' =>date("Y-m-d H:i:s")
                            ]); 
           
                            //return json_encode(['data' => 'Actualizado el registro correctamente!','state' => 'ok','src3' => '/img/mc_accesorios/'.$request->id_producto.'/'.$filename]);
      
                        }
                        
                        if($file4 != NULL &&  $id_imagen_4 != NULL){
                          $url_imagen =  DB::table('imagen')->where('id_imagen', '=', $id_imagen_4)->get();
                        
                          if(file_exists(str_replace('/img/', 'img/',  $url_imagen[0]->url_image))){
                            unlink(str_replace('/img/', 'img/',  $url_imagen[0]->url_image));
                          }
                          
                            $filename  =  time() .'_'.$file4->getClientOriginalName(); 
                            $path = "img/mc_accesorios/".$request->id_producto;
                            $file4->move($path,$filename); 
              
                            $result  =  DB::table('imagen')
                              ->where("id_imagen",$id_imagen_4)
                              ->update([
                                'url_image' => '/img/mc_accesorios/'.$request->id_producto.'/'.$filename, 
                                'updated_at' =>date("Y-m-d H:i:s")
                              ]); 
             
                              //return json_encode(['data' => 'Actualizado el registro correctamente!','state' => 'ok','src4' => '/img/mc_accesorios/'.$request->id_producto.'/'.$filename]);
        
                          }
                          
                          if($file5 != NULL &&  $id_imagen_5 != NULL){
                            $url_imagen =  DB::table('imagen')->where('id_imagen', '=', $id_imagen_5)->get();
                          
                            if(file_exists(str_replace('/img/', 'img/',  $url_imagen[0]->url_image))){
                              unlink(str_replace('/img/', 'img/',  $url_imagen[0]->url_image));
                            }
                            
                              $filename  =  time() .'_'.$file5->getClientOriginalName(); 
                              $path = "img/mc_accesorios/".$request->id_producto;
                              $file5->move($path,$filename); 
                
                              $result  =  DB::table('imagen')
                                ->where("id_imagen",$id_imagen_5)
                                ->update([
                                  'url_image' => '/img/mc_accesorios/'.$request->id_producto.'/'.$filename, 
                                  'updated_at' =>date("Y-m-d H:i:s")
                                ]); 
               
                               // return json_encode(['data' => 'Actualizado el registro correctamente!','state' => 'ok','src5' => '/img/mc_accesorios/'.$request->id_producto.'/'.$filename]);
          
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


                  if(file_exists('img/mc_accesorios/'.$request->id_producto)){
                    $folderPath=public_path('img/mc_accesorios/'.$request->id_producto);
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


    public function accesorios_editar(Request $request) {
     
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