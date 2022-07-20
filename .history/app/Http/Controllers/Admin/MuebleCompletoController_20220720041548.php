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


class MuebleCompletoController extends Controller {

    //:::::::::::::::::::::::::: CRUD COMPOSICION OFERTA::::::::::::::::::::::::::

    public function mueble_completo() {
        // :::::::::::::::::: COMBO DEPENDIENTES SOLO PARA INICIAR LA CATEGORIA ::::::::::::::::::::
      $cbCategoria = DB::select("SELECT * FROM menu_category M  WHERE M.id_menu=4 ORDER BY M.id_cat asc");
      return view('admin.pages.mueble_completo.admin_mueble_completo')
      ->with(compact('cbCategoria'));
    }

    // :::::::::::::::::: COMBO DEPENDIENTES PARA LA TABLA PRINCIPAL Y EL MODAL ::::::::::::::::::::
    public function filtro_combobox_table(Request $request) {
      $cbItem = DB::select("SELECT * FROM menu_items M  WHERE M.id_cat=? ORDER BY M.id_item asc", [$request->id_categoria]);
      return json_encode(['data' => $cbItem,'state' => 'ok']);
    }

    public function mueble_completo_listar(Request $request) {

      if($request->isValues =="LISTA_ITEM" && intval($request->id_categoria) > 0){
       
        $rowData_ = DB::select("
        SELECT 
        p.id, 
        mc.id_cat, 
        p.id_item, 
        p.pro_name, 
        p.pro_code, 
        p.pro_info, 
        p.state, 
        m.names AS menus,
        mc.names AS categoria,
        mi.names AS items,
        (SELECT url_image FROM imagen  WHERE id_product=p.id LIMIT 1) AS url_image,
        (SELECT id_imagen FROM imagen  WHERE id_product=p.id LIMIT 1) AS id_imagen
             
      FROM menu m INNER JOIN  menu_category mc on m.id_menu=mc.id_menu
      INNER JOIN menu_items mi on mc.id_cat=mi.id_cat
      INNER JOIN products p on mi.id_item=p.id_item
      WHERE p.id_item IN (SELECT id_item FROM menu_items WHERE id_cat in (SELECT id_cat FROM menu_category WHERE id_menu=4)) AND p.id_item = ?
      ORDER BY p.id desc ", [$request->id_categoria]);

      }elseif($request->isValues =="LISTA_CATEGORIA" && intval($request->id_categoria) > 0){
       
        $rowData_ = DB::select("
        SELECT 
        p.id, 
        mc.id_cat, 
        p.id_item, 
        p.pro_name, 
        p.pro_code, 
        p.pro_info, 
        p.state, 
        m.names AS menus,
        mc.names AS categoria,
        mi.names AS items,
        (SELECT url_image FROM imagen  WHERE id_product=p.id LIMIT 1) AS url_image,
        (SELECT id_imagen FROM imagen  WHERE id_product=p.id LIMIT 1) AS id_imagen
                    
      FROM menu m INNER JOIN  menu_category mc on m.id_menu=mc.id_menu
      INNER JOIN menu_items mi on mc.id_cat=mi.id_cat
      INNER JOIN products p on mi.id_item=p.id_item
      WHERE p.id_item IN (SELECT id_item FROM menu_items WHERE id_cat in (SELECT id_cat FROM menu_category WHERE id_menu=4)) AND mc.id_cat = ?
      ORDER BY p.id desc ", [$request->id_categoria]);

      }else{
     
        $rowData_ = DB::select("
        SELECT 
        p.id,
        mc.id_cat, 
        p.id_item, 
        p.pro_name, 
        p.pro_code, 
        p.pro_info, 
        p.state, 
        m.names AS menus,
        mc.names AS categoria,
        mi.names AS items,
        (SELECT url_image FROM imagen  WHERE id_product=p.id LIMIT 1) AS url_image,
        (SELECT id_imagen FROM imagen  WHERE id_product=p.id LIMIT 1) AS id_imagen

      FROM menu m INNER JOIN  menu_category mc on m.id_menu=mc.id_menu
      INNER JOIN menu_items mi on mc.id_cat=mi.id_cat
      INNER JOIN products p on mi.id_item=p.id_item
      WHERE p.id_item IN (SELECT id_item FROM menu_items WHERE id_cat in (SELECT id_cat FROM menu_category WHERE id_menu=4))
      ORDER BY p.id desc  ");

      }

      return view('admin.pages.mueble_completo.ajax.tablaProducto')->with(compact('rowData_'));
    }


    
    public function mueble_completo_listar_combobox(Request $request) {

      $cbColores = DB::select("SELECT * FROM mc_colores M LEFT JOIN (SELECT cin.id_color,cin.id_producto FROM mc_colores c INNER JOIN mc_colores_intermedio cin ON c.id=cin.id_color WHERE cin.id_producto = ?)  AS T ON M.id=T.id_color ORDER BY M.id asc", [$request->id_producto]);
      $cbTirador = DB::select("SELECT * FROM mc_tirador M LEFT JOIN (SELECT cin.id_tirador,cin.id_producto FROM mc_tirador c INNER JOIN mc_tirador_intermedio cin ON c.id=cin.id_tirador WHERE cin.id_producto = ?) AS T ON M.id=T.id_tirador ORDER BY M.id asc", [$request->id_producto]);
      $cbModelo = DB::select("SELECT * FROM mc_modelo_puerta M LEFT JOIN (SELECT cin.id_modelo_puerta,cin.id_producto FROM mc_modelo_puerta c INNER JOIN mc_modelo_puerta_intermedio cin ON c.id=cin.id_modelo_puerta WHERE cin.id_producto = ?) AS T ON M.id=T.id_modelo_puerta ORDER BY M.id asc", [$request->id_producto]);
      $cbTiradorUnero = DB::select("SELECT * FROM mc_tirador_unero M LEFT JOIN (SELECT cin.id_tirador_unero,cin.id_producto FROM mc_tirador_unero c INNER JOIN mc_tirador_unero_intermedio cin ON c.id=cin.id_tirador_unero WHERE cin.id_producto = ?) AS T ON M.id=T.id_tirador_unero ORDER BY M.id asc", [$request->id_producto]);

      return view('admin.pages.mueble_completo.ajax.opcionesComboBox')
      ->with(compact('cbColores'))
      ->with(compact('cbTirador'))
      ->with(compact('cbModelo'))
      ->with(compact('cbTiradorUnero'));
    }

 public function mueble_completo_crear(Request $request) 
 {        

        $file0 = $request->file('image0');
        $id_imagen_0 = $request->id_image0;

        $txt_pro_name     = $request->txt_pro_name;
        $txt_descripcion  = $request->txt_descripcion;
        $txt_price        = $request->txt_price;
        $txt_id_item      = $request->menu_itemsRegistrar;

        $arraysColores = $request->nameColor;
        $arraysTirador = $request->nameTirador;
        $arraysUnero = $request->nameUnero;
        $arraysModelo = $request->nameModelo;

        $arraysCheck_1 = $request->check_1;
        $arraysCheck_2 = $request->check_2;
        $arraysCheck_3 = $request->check_3;
        $arraysCheck_4 = $request->check_4;




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
                'pro_name' => $txt_pro_name,
                'pro_info' => $txt_descripcion,
                'id_item' =>  $txt_id_item,
                'pro_code' => 'PRO_'.$suma,
                'created_at' =>date("Y-m-d H:i:s"),
                'updated_at' =>date("Y-m-d H:i:s")
              ]);

 
               //::::::::::::::::ACTUALIZA EL CONTADOR :::::::::::::::::::::::
               $count = DB::table('products')->where('id_item',$txt_id_item)->count();
               DB::table('menu_items')->where('id_item', $txt_id_item)->update(['numbers' => $count]);
  
                if($file0 != NULL){
                  $filename  =  time() .'_'.$file0->getClientOriginalName();
                  $path = "img/mc_mueble_completo/".$id_producto;
                  $file0->move($path,$filename);
  
                  $id_imagen__ = DB::table('imagen')->insertGetId([
                      'id_product' =>$id_producto, 
                      'url_image' => '/img/mc_mueble_completo/'.$id_producto.'/'.$filename, 
                      'created_at' => date("Y-m-d H:i:s"),
                      'updated_at' =>date("Y-m-d H:i:s")
                    ]);
                }
                      //  :::::::::::::::::::: 1: COLORES :::::::::::::::::::::::::::::::
                      if($arraysCheck_1 != NULL){
                          $data1 = DB::select("SELECT * FROM mc_colores M");
                          foreach($data1 as $value) {
                              DB::table('mc_colores_intermedio')->insert(['id_producto' => $id_producto,'id_color' => $value->id]);
                            }
                      }else{
                        if (!empty($arraysColores) && count($arraysColores) > 0)
                            foreach($arraysColores as $value) {
                              DB::table('mc_colores_intermedio')->insert(['id_producto' => $id_producto,'id_color' => $value]);
                            }
                      }

                      //  :::::::::::::::::::: 2: TIRADOR :::::::::::::::::::::::::::::::
                      if($arraysCheck_2 != NULL){
                          $data2 = DB::select("SELECT * FROM mc_tirador M");
                          foreach($data2 as $value) {
                              DB::table('mc_tirador_intermedio')->insert(['id_producto' => $id_producto,'id_tirador' => $value->id]);
                            }
                      }else{
                        if (!empty($arraysTirador) && count($arraysTirador) > 0)
                          foreach($arraysTirador as $value) {
                            DB::table('mc_tirador_intermedio')->insert(['id_producto' => $id_producto,'id_tirador' => $value]);
                          }
                      }
        
                      //  :::::::::::::::::::: 3: UÑERO :::::::::::::::::::::::::::::::
                        if($arraysCheck_3 != NULL){
                          $data3 = DB::select("SELECT * FROM mc_tirador_unero M");
                          foreach($data3 as $value) {
                              DB::table('mc_tirador_unero_intermedio')->insert(['id_producto' => $id_producto,'id_tirador_unero' => $value->id]);
                            }
                      }else{
                        if (!empty($arraysUnero) && count($arraysUnero) > 0)
                          foreach($arraysUnero as $value) {
                            DB::table('mc_tirador_unero_intermedio')->insert(['id_producto' => $id_producto,'id_tirador_unero' => $value]);
                          }
                      }

                      //  :::::::::::::::::::: 4: MODELO PUERTA :::::::::::::::::::::::::::::::
                      if($arraysCheck_4 != NULL){
                        $data4 = DB::select("SELECT * FROM mc_modelo_puerta M");
                        foreach($data4 as $value) {
                            DB::table('mc_modelo_puerta_intermedio')->insert(['id_producto' => $id_producto,'id_modelo_puerta' => $value->id]);
                          }
                      }else{
                        if (!empty($arraysModelo) && count($arraysModelo) > 0)
                          foreach ($arraysModelo as $value) {
                            DB::table('mc_modelo_puerta_intermedio')->insert(['id_producto' => $id_producto,'id_modelo_puerta' => $value]);
                          }
                      }
 
                DB::commit();
                // all good
                return json_encode(['data' => 'Registrado correctamente!','state' => 'ok']);
            } catch (\Exception $e) {
                DB::rollback();
                // something went wrong
                return json_encode(['data' =>  $e->getMessage(),'state' => 'error']);
            }

                break;
          case 'ACTUALIZAR': 

            // var_dump($request->id_producto);
            // exit;


            DB::beginTransaction();

            try {

                if($file0 != NULL &&  $id_imagen_0 != NULL){

                    $url_imagen =  DB::table('imagen')->where('id_imagen', '=', $id_imagen_0)->get();

                    if(file_exists(str_replace('/img/', 'img/',  $url_imagen[0]->url_image))){
                      unlink(str_replace('/img/', 'img/',  $url_imagen[0]->url_image));
                    }
                  
                    $filename  =  time() .'_'.$file0->getClientOriginalName(); 
                    $path = "img/mc_mueble_completo/".$request->id_producto;
                    $file0->move($path,$filename); 
      
                    DB::table('imagen')
                      ->where("id_imagen",$id_imagen_0)
                      ->update([
                        'url_image' => '/img/mc_mueble_completo/'.$request->id_producto.'/'.$filename, 
                        'updated_at' =>date("Y-m-d H:i:s")
                      ]); 
                  }
                  
                            
                    DB::table('products')->where("id",$request->id_producto)->update([
                      'pro_name' => $txt_pro_name,
                      'pro_info' => $txt_descripcion,
                      'id_item' =>  $txt_id_item,
                      'updated_at' =>date("Y-m-d H:i:s")
                    ]); 


                    //  :::::::::::::::::::: 1: COLORES :::::::::::::::::::::::::::::::
                    DB::table('mc_colores_intermedio')->where('id_producto', '=', $request->id_producto)->delete();
                    if($arraysCheck_1 != NULL){
                      
                        $data1 = DB::select("SELECT * FROM mc_colores M");
                        foreach($data1 as $value) {
                            DB::table('mc_colores_intermedio')->insert(['id_producto' => $request->id_producto,'id_color' => $value->id]);
                          }
                    }else{
                      if (!empty($arraysColores) && count($arraysColores) > 0)
                          foreach($arraysColores as $value) {
                            DB::table('mc_colores_intermedio')->insert(['id_producto' => $request->id_producto,'id_color' => $value]);
                          }
                    }


                    
                    //  :::::::::::::::::::: 2: TIRADOR :::::::::::::::::::::::::::::::
                    DB::table('mc_tirador_intermedio')->where('id_producto', '=', $request->id_producto)->delete();
                    if($arraysCheck_2 != NULL){
                       $data2 = DB::select("SELECT * FROM mc_tirador M");
                       foreach($data2 as $value) {
                           DB::table('mc_tirador_intermedio')->insert(['id_producto' => $request->id_producto,'id_tirador' => $value->id]);
                         }
                     }else{
                       if (!empty($arraysTirador) && count($arraysTirador) > 0)
                         foreach($arraysTirador as $value) {
                           DB::table('mc_tirador_intermedio')->insert(['id_producto' => $request->id_producto,'id_tirador' => $value]);
                         }
                     }

                    //  :::::::::::::::::::: 3: UÑERO :::::::::::::::::::::::::::::::
                    DB::table('mc_tirador_unero_intermedio')->where('id_producto', '=', $request->id_producto)->delete();
                    if($arraysCheck_4 != NULL){
                      $data4 = DB::select("SELECT * FROM mc_tirador_unero M");
                      foreach($data4 as $value) {
                          DB::table('mc_tirador_unero_intermedio')->insert(['id_producto' => $request->id_producto,'id_tirador_unero' => $value->id]);
                        }
                    }else{
                      if (!empty($arraysUnero) && count($arraysUnero) > 0)
                        foreach ($arraysUnero as $value) {
                          DB::table('mc_tirador_unero_intermedio')->insert(['id_producto' => $request->id_producto,'id_tirador_unero' => $value]);
                        }
                    }


                    //  :::::::::::::::::::: 4: MODELO PUERTA :::::::::::::::::::::::::::::::
                    DB::table('mc_modelo_puerta_intermedio')->where('id_producto', '=', $request->id_producto)->delete();
                    if($arraysCheck_4 != NULL){
                      $data4 = DB::select("SELECT * FROM mc_modelo_puerta M");
                      foreach($data4 as $value) {
                          DB::table('mc_modelo_puerta_intermedio')->insert(['id_producto' => $request->id_producto,'id_modelo_puerta' => $value->id]);
                        }
                    }else{
                      if (!empty($arraysModelo) && count($arraysModelo) > 0)
                        foreach ($arraysModelo as $value) {
                          DB::table('mc_modelo_puerta_intermedio')->insert(['id_producto' => $request->id_producto,'id_modelo_puerta' => $value]);
                        }
                    }


                    // DB::table('medida')->where("id_imagen",$id_imagen_0)->update([
                    //     'price' => $txt_price,
                    //     'updated_at' =>date("Y-m-d H:i:s")
                    //   ]); 

                    DB::commit();
                    // all good
                    return json_encode(['data' => 'Registrado correctamente!','state' => 'ok']);
                } catch (\Exception $e) {
                    DB::rollback();
                    // something went wrong
                    return json_encode(['data' =>  $e->getMessage(),'state' => 'error']);
                }

                  break;

            case 'ELIMINAR': 
    
              DB::beginTransaction();

              try {
           
                  //::::::::::::::::ACTUALIZA EL CONTADOR :::::::::::::::::::::::
                  $count = DB::table('products')->where('id_item',$txt_id_item)->count();
                  DB::table('menu_items')->where('id_item', $txt_id_item)->update(['numbers' => $count-1]);
                  $id_imagen_ = DB::table('imagen')->where('id_product', '=', $request->id_producto)->skip(0)->take(1)->get();

                  if(!empty($id_imagen_) && count($id_imagen_) > 0){
                    DB::table('medida')->where('id_imagen', '=', $id_imagen_[0]->id_imagen)->delete();
                    DB::table('imagen')->where('id_product', '=',  $request->id_producto)->delete();
                  }

                  if(file_exists('img/mc_mueble_completo/'.$request->id_producto)){
                    $folderPath=public_path('img/mc_mueble_completo/'.$request->id_producto);
                    File::deleteDirectory($folderPath);
                  }


                  DB::table('products')->where('id', '=',  $request->id_producto)->delete();

                  DB::table('mc_colores_intermedio')->where('id_producto', '=', $request->id_producto)->delete();
                  DB::table('mc_tirador_intermedio')->where('id_producto', '=', $request->id_producto)->delete();
                  DB::table('mc_tirador_unero_intermedio')->where('id_producto', '=', $request->id_producto)->delete();
                  DB::table('mc_modelo_puerta_intermedio')->where('id_producto', '=', $request->id_producto)->delete();


      
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


    public function mueble_completo_editar(Request $request) {
     
      $rowData_ = DB::select("
            SELECT 
            p.id_item,
            im.id_imagen, 
            im.url_image,
            p.pro_name,
            p.pro_info
            -- ,(SELECT price FROM medida WHERE id_imagen= im.id_imagen)  AS price
            -- ,(SELECT copete FROM medida WHERE id_imagen= im.id_imagen)  AS copete
                        
          FROM products p INNER JOIN imagen im on p.id=im.id_product 
          WHERE  p.id=?
          ORDER BY im.id_imagen asc ", [$request->id_producto]);

      return json_encode($rowData_) ;
    }


    public function mueble_completo_listar_medidas(Request $request) 
    {        
     $rowData_ = DB::select("
          SELECT

          me.id_medida,
          p.pro_name,
          me.ancho,
          me.alto,
          me.fondo,
          im.url_image,
          me.price,

          me.apert_derecha,
          me.apert_izquierda,
          me.apert_doble
          
          FROM products p INNER JOIN  imagen im on p.id=im.id_product 
          INNER JOIN  medida me on im.id_imagen=me.id_imagen 
          WHERE p.id = ?
          ORDER BY me.id_medida desc", [$request->id_producto]);

      return view('admin.pages.mueble_completo.ajax.tablaMedida')->with(compact('rowData_'));

    }  

    public function mueble_completo_crear_medida(Request $request) 
    {        

      $isValues_        = $request->isValues;
      $txt_id_imagen_    = $request->txt_id_imagen_;

      $txt_ancho_  = $request->txt_ancho_;
      $txt_alto_   = $request->txt_alto_;
      $txt_fondo_  = $request->txt_fondo_;

      $check_derecha     = $request->check_derecha;
      $check_izquierda   = $request->check_izquierda;
      $check_doble       = $request->check_doble;

      $txt_precio        = $request->txt_precio;



    DB::beginTransaction();

    try {

      if($isValues_ > 0){
        $cantidad = DB::select("SELECT count(*) AS cantidad FROM medida WHERE ancho=? AND alto=? AND fondo=? AND id_imagen=? ", [$request->txt_ancho_, $request->txt_alto_, $request->txt_fondo_, $request->txt_id_imagen_]);
        
        var_dump("holaaaaaaaaaa");exit;
        if((int)$cantidad[0]->cantidad == 0){
          return json_encode(['data' =>  "Ya tiene medida, No se permite duplicar",'state' => 'error']);

        }else
          DB::table('medida')->insert([
            'id_imagen'       =>  $txt_id_imagen_, 
            'ancho'           =>  $txt_ancho_, 
            'alto'            =>  $txt_alto_, 
            'fondo'           =>  $txt_fondo_,
            'apert_derecha'   =>  $check_derecha, 
            'apert_izquierda' =>  $check_izquierda, 
            'apert_doble'     =>  $check_doble, 
            'price'           =>  $txt_precio, 
            'created_at'      =>  date("Y-m-d H:i:s")
          ]);

      }else{

        DB::table('medida')
        ->where("id_medida",$request->txt_id_medida)
        ->update([
          'ancho'           =>  $txt_ancho_, 
          'alto'            =>  $txt_alto_, 
          'fondo'           =>  $txt_fondo_,
          'apert_derecha'   =>  $check_derecha, 
          'apert_izquierda' =>  $check_izquierda, 
          'apert_doble'     =>  $check_doble, 
          'price'           =>  $txt_precio, 

          'updated_at' =>date("Y-m-d H:i:s")
        ]); 
      }

        DB::commit();
        // all good
        return json_encode(['data' => 'Procesado correctamente!','state' => 'ok']);
    } catch (\Exception $e) {
        DB::rollback();
        // something went wrong
        return json_encode(['data' =>  $e->getMessage(),'state' => 'error']);
    }
  }

  public function mueble_completo_editar_medida(Request $request) {
    $rowData_ = DB::select("SELECT * FROM medida WHERE  id_medida=? ", [$request->id_medida]);
    return json_encode($rowData_);
  }


  
  public function mueble_completo_eliminar_medida(Request $request) {
    DB::beginTransaction();

    try {
 
        DB::table('medida')->where('id_medida', '=', $request->id_medida)->delete();
        DB::commit();
        // all good
        return json_encode(['data' => 'Elimino el registro correctamente!','state' => 'ok']);
    } catch (\Exception $e) {
        DB::rollback();
        // something went wrong
        return json_encode(['data' =>  $e->getMessage(),'state' => 'error']);
    }
  }

  public function mueble_puertas_listar_(Request $request) {

    $cbColores = DB::select("
                    SELECT M.id as id__, M.id_modelo_puerta as id_modelo_puerta__,T.id_color, M.name_color FROM mc_colores M
                    LEFT JOIN ( SELECT cin.id_color,cin.id_producto,cin.id_modelo_puerta FROM mc_colores c
                      INNER JOIN md_modelo_puerta_color_intermedio cin ON c.id = cin.id_color
                      WHERE cin.id_producto = ?
                    ) AS T ON M.id = T.id_color
                    ORDER BY
                    M.id ASC", [$request->id_producto]);

    $rowData_ = DB::select("SELECT mp.id as id_modelo_puerta_s , mp.nombre, mp.url_image,mps.id_producto FROM mc_modelo_puerta mp INNER JOIN mc_modelo_puerta_intermedio mps ON mp.id = mps.id_modelo_puerta
                          WHERE mps.id_producto =? ORDER BY mp.id desc ", [$request->id_producto]);

    return view('admin.pages.mueble_completo.ajax.tablaProductoAsignar')
    ->with(compact('cbColores'))
    ->with(compact('rowData_'));
  }



  public function mueble_completo_asignar_color(Request $request) 
  {        

    $id_producto        = $request->id_producto;
    $id_modelo_puerta   = $request->id_modelo_puerta;
    $arrays_id_colores  = explode(',', $request->id_colores);

  DB::beginTransaction();

  try {
      //  :::::::::::::::::::: 1: COLORES :::::::::::::::::::::::::::::::
      DB::table('md_modelo_puerta_color_intermedio')
      ->where('id_producto', '=', $id_producto)
      ->where('id_modelo_puerta', '=', $id_modelo_puerta)
      ->delete();


      if (!empty($arrays_id_colores) && count($arrays_id_colores) > 0)
          foreach($arrays_id_colores as $value) {
            DB::table('md_modelo_puerta_color_intermedio')->insert([
              'id_producto'       => $id_producto,
              'id_modelo_puerta'  => $id_modelo_puerta,
              'id_color'          => $value]);
          }
 
      DB::commit();
      // all good
      return json_encode(['data' => 'Procesado correctamente!','state' => 'ok']);
  } catch (\Exception $e) {
      DB::rollback();
      // something went wrong
      return json_encode(['data' =>  $e->getMessage(),'state' => 'error']);
  }
}



public function listarDataTableInfo(Request $request) {
      
  $rowData_ =  DB::table('products')->where("id", $request->id_producto)->get(); 
 
  return view('admin.pages.mueble_completo.ajax.tablaProductoFicha')->with(compact('rowData_'));
}

public function listarDataTableInfoUpdate(Request $request) 
{       
    $data =  DB::table('products')->where("id", $request->id_producto)->update(['info_descripcion' => $request->txt_descripcion_info]); 
    return $data;
}

public function general_imagen_ficha_tecnica(Request $request) 
{        
    $file = $request->file('image');
    if($file){
        $filename  =  time() .'_'.$file->getClientOriginalName(); // name of file

        $path = "img/ficha_tecnica";
        $file->move($path,$filename); // save to our local folder
      return $filename;
    }
}

}