<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Storage;
use Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Filesystem\Filesystem;


class ComposicionOfertaController extends Controller {

    //:::::::::::::::::::::::::: CRUD DE GALERIAS ::::::::::::::::::::::::::

    public function composicion_oferta() {
      $rowData_ = DB::table('products')->get()->toArray();
      $cb_listCategoria = DB::table('menu_category')->get();

      return view('admin.pages.composicion_oferta.admin_composicion_oferta')->with(compact('cb_listCategoria'));
    }

    public function composicion_oferta_listar(Request $request) {

      if(intval($request->id_categoria) > 0){
       
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
          (SELECT url_image FROM imagen  WHERE id_product=349 LIMIT 1) AS url_image
                      
        FROM menu m INNER JOIN  menu_category mc on m.id_menu=mc.id_menu
        INNER JOIN menu_items mi on mc.id_cat=mi.id_cat
        INNER JOIN products p on mi.id_item=p.id_item
        -- INNER JOIN imagen im on p.id=im.id_product 

            WHERE mc.id_cat=? 
            ORDER BY p.id desc ", [$request->id_categoria]);

      }else{
     
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
          (SELECT url_image FROM imagen  WHERE id_product=349 LIMIT 1) AS url_image
                      
        FROM menu m INNER JOIN  menu_category mc on m.id_menu=mc.id_menu
        INNER JOIN menu_items mi on mc.id_cat=mi.id_cat
        INNER JOIN products p on mi.id_item=p.id_item
        -- INNER JOIN imagen im on p.id=im.id_product 
        WHERE p.id_item=43 -- IDENTIFICA: COMPOSICION OFERTA EN LA TABLA: MENU_ITEM
        ORDER BY p.id desc ");

      }


      return view('admin.pages.composicion_oferta.ajax.tablaProducto')->with(compact('rowData_'));
    }


    public function filtrarCategoriaProducto(Request $request)
    {
        $variable = DB::table('menu_category')->where("id_servicio", $request->txt_id_servicio)->get();
          $html="";
          foreach ($variable as $key => $value) {
          $html.=' <option value="'.$value->id_titulo.'">'.$value->titulo_principal.'</option>';
          }
        return $html;
    }

 public function composicion_oferta_crear(Request $request) 
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

                  /*
                  var_dump($id_imagen_0);
                  var_dump($id_imagen_1);
                  var_dump($id_imagen_2);
                  var_dump($id_imagen_3);
                  var_dump($id_imagen_4);
                  var_dump($id_imagen_5);
                  exit;
                  */


                if($file0 != NULL &&  $id_imagen_0 != NULL){
                  $url_imagen =  DB::table('imagen')->where('id_imagen', '=', $id_imagen_0)->get();
                
                    if(file_exists(str_replace('/img/', 'img/',  $url_imagen[0]->url_image))){
                      unlink(str_replace('/img/', 'img/',  $url_imagen[0]->url_image));
                    }
                  
                    $filename  =  time() .'_'.$file0->getClientOriginalName(); 
                    $path = "img/mc_composicion_oferta/".$request->id_producto;
                    $file0->move($path,$filename); 
      
                    $result  =  DB::table('imagen')
                      ->where("id_imagen",$id_imagen_0)
                      ->update([
                        'url_image' => '/img/mc_composicion_oferta/'.$request->id_producto.'/'.$filename, 
                        'updated_at' =>date("Y-m-d H:i:s")
                      ]); 
     
                      return json_encode(['data' => 'Actualizado el registro correctamente!','state' => 'ok','src0' => '/img/mc_composicion_oferta/'.$request->id_producto.'/'.$filename]);

                  }elseif($file1 != NULL &&  $id_imagen_1 != NULL){
                    $url_imagen =  DB::table('imagen')->where('id_imagen', '=', $id_imagen_1)->get();
                  
                    if(file_exists(str_replace('/img/', 'img/',  $url_imagen[0]->url_image))){
                      unlink(str_replace('/img/', 'img/',  $url_imagen[0]->url_image));
                    }
                    
                      $filename  =  time() .'_'.$file1->getClientOriginalName(); 
                      $path = "img/mc_composicion_oferta/".$request->id_producto;
                      $file1->move($path,$filename); 
        
                      $result  =  DB::table('imagen')
                      ->where("id_imagen",$id_imagen_1)
                        ->update([
                          'url_image' => '/img/mc_composicion_oferta/'.$request->id_producto.'/'.$filename, 
                          'updated_at' =>date("Y-m-d H:i:s")
                        ]); 
       
                        return json_encode(['data' => 'Actualizado el registro correctamente!','state' => 'ok','src1' => '/img/mc_composicion_oferta/'.$request->id_producto.'/'.$filename]);
  
                    }elseif($file2 != NULL &&  $id_imagen_2 != NULL){
                      $url_imagen =  DB::table('imagen')->where('id_imagen', '=', $id_imagen_2)->get();
                    
                      if(file_exists(str_replace('/img/', 'img/',  $url_imagen[0]->url_image))){
                        unlink(str_replace('/img/', 'img/',  $url_imagen[0]->url_image));
                      }
                      
                        $filename  =  time() .'_'.$file2->getClientOriginalName(); 
                        $path = "img/mc_composicion_oferta/".$request->id_producto;
                        $file2->move($path,$filename); 
          
                        $result  =  DB::table('imagen')
                          ->where("id_imagen",$id_imagen_2)
                          ->update([
                            'url_image' => '/img/mc_composicion_oferta/'.$request->id_producto.'/'.$filename, 
                            'updated_at' =>date("Y-m-d H:i:s")
                          ]); 
         
                          return json_encode(['data' => 'Actualizado el registro correctamente!','state' => 'ok','src2' => '/img/mc_composicion_oferta/'.$request->id_producto.'/'.$filename]);
    
                      }elseif($file3 != NULL &&  $id_imagen_3 != NULL){
                        $url_imagen =  DB::table('imagen')->where('id_imagen', '=', $id_imagen_3)->get();
                      
                        if(file_exists(str_replace('/img/', 'img/',  $url_imagen[0]->url_image))){
                          unlink(str_replace('/img/', 'img/',  $url_imagen[0]->url_image));
                        }
                        
                          $filename  =  time() .'_'.$file3->getClientOriginalName(); 
                          $path = "img/mc_composicion_oferta/".$request->id_producto;
                          $file3->move($path,$filename); 
            
                          $result  =  DB::table('imagen')
                            ->where("id_imagen",$id_imagen_3)
                            ->update([
                              'url_image' => '/img/mc_composicion_oferta/'.$request->id_producto.'/'.$filename, 
                              'updated_at' =>date("Y-m-d H:i:s")
                            ]); 
           
                            return json_encode(['data' => 'Actualizado el registro correctamente!','state' => 'ok','src3' => '/img/mc_composicion_oferta/'.$request->id_producto.'/'.$filename]);
      
                        }elseif($file4 != NULL &&  $id_imagen_4 != NULL){
                          $url_imagen =  DB::table('imagen')->where('id_imagen', '=', $id_imagen_4)->get();
                        
                          if(file_exists(str_replace('/img/', 'img/',  $url_imagen[0]->url_image))){
                            unlink(str_replace('/img/', 'img/',  $url_imagen[0]->url_image));
                          }
                          
                            $filename  =  time() .'_'.$file4->getClientOriginalName(); 
                            $path = "img/mc_composicion_oferta/".$request->id_producto;
                            $file4->move($path,$filename); 
              
                            $result  =  DB::table('imagen')
                              ->where("id_imagen",$id_imagen_4)
                              ->update([
                                'url_image' => '/img/mc_composicion_oferta/'.$request->id_producto.'/'.$filename, 
                                'updated_at' =>date("Y-m-d H:i:s")
                              ]); 
             
                              return json_encode(['data' => 'Actualizado el registro correctamente!','state' => 'ok','src4' => '/img/mc_composicion_oferta/'.$request->id_producto.'/'.$filename]);
        
                          }elseif($file5 != NULL &&  $id_imagen_5 != NULL){
                            $url_imagen =  DB::table('imagen')->where('id_imagen', '=', $id_imagen_5)->get();
                          
                            if(file_exists(str_replace('/img/', 'img/',  $url_imagen[0]->url_image))){
                              unlink(str_replace('/img/', 'img/',  $url_imagen[0]->url_image));
                            }
                            
                              $filename  =  time() .'_'.$file5->getClientOriginalName(); 
                              $path = "img/mc_composicion_oferta/".$request->id_producto;
                              $file5->move($path,$filename); 
                
                              $result  =  DB::table('imagen')
                                ->where("id_imagen",$id_imagen_5)
                                ->update([
                                  'url_image' => '/img/mc_composicion_oferta/'.$request->id_producto.'/'.$filename, 
                                  'updated_at' =>date("Y-m-d H:i:s")
                                ]); 
               
                                return json_encode(['data' => 'Actualizado el registro correctamente!','state' => 'ok','src5' => '/img/mc_composicion_oferta/'.$request->id_producto.'/'.$filename]);
          
                            }else{
                            
                              $result  =  DB::table('products')
                              ->where("id",$request->id_producto)
                              ->update([
                                'descripcion' => $request->txt_descripcion,
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


    public function composicion_oferta_editar(Request $request) {
     
      $rowData_ = DB::select("
            SELECT 
            im.id_imagen, 
            im.url_image
                        
          FROM products p INNER JOIN imagen im on p.id=im.id_product 
          WHERE p.id_item=43 AND p.id=?
          ORDER BY im.id_imagen asc ", [$request->id_producto]);

      return json_encode($rowData_);
    }

}