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
                  p.*,
                  m.id_menu,
                  mc.id_cat,
                  mi.id_item as id_items,
                  (SELECT names FROM menu WHERE  id_menu=m.id_menu) as menus,
                  (SELECT names FROM menu_category WHERE  id_cat=mc.id_cat) as categoria,
                  (SELECT names FROM menu_items WHERE  id_item=mi.id_item) as items,
                  im.url_image
                  
                  FROM menu m INNER JOIN  menu_category mc on m.id_menu=mc.id_menu
                  INNER JOIN menu_items mi on mc.id_cat=mi.id_cat
                  INNER JOIN products p on mi.id_item=p.id_item
                  INNER JOIN imagen im on p.id=im.id_product 
                  WHERE p.id_item=43 -- IDENTIFICA: COMPOSICION OFERTA EN LA TABLA: MENU_ITEM
            WHERE mc.id_cat=? 
            GROUP BY P.id
            ORDER BY p.id desc ", [$request->id_categoria]);

      }else{
     
        $rowData_ = DB::select("
              SELECT 
                    p.*,
                    m.id_menu,
                    mc.id_cat,
                    mi.id_item as id_items,
                    (SELECT names FROM menu WHERE  id_menu=m.id_menu) as menus,
                    (SELECT names FROM menu_category WHERE  id_cat=mc.id_cat) as categoria,
                    (SELECT names FROM menu_items WHERE  id_item=mi.id_item) as items,
                    im.url_image
              
                    FROM menu m INNER JOIN  menu_category mc on m.id_menu=mc.id_menu
                    INNER JOIN menu_items mi on mc.id_cat=mi.id_cat
                    INNER JOIN products p on mi.id_item=p.id_item
                    INNER JOIN imagen im on p.id=im.id_product 
                    WHERE p.id_item=43 -- IDENTIFICA: COMPOSICION OFERTA EN LA TABLA: MENU_ITEM
                GROUP BY P.id
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


    public function composicion_oferta_editar(Request $request) {
      $rowData_ = DB::table('web_producto_galeria')
      ->where("web_producto_galeria.id_gallery", $request->txt_id_gallery)
      ->get()->toArray();
      return json_encode($rowData_);
    }

}