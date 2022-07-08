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


class DescuentoUsuarioController extends Controller {

    //:::::::::::::::::::::::::: CRUD COMPOSICION OFERTA::::::::::::::::::::::::::

    public function descuento_usuario() {
      return view('admin.pages.descuento_usuario.admin_descuento_usuario');
    }

    public function descuento_usuario_listar(Request $request) {

      if(intval($request->id_categoria) > 0){
        $rowData_ = DB::select("
                    SELECT 
                    `id`, `name`, `email`, `telefono`, `ubicacion`, `updated_at`, `created_at`, `estado_oferta`
                    FROM users u

                  WHERE u.name=? 
                  ORDER BY u.id desc ", [$request->id_categoria]);

      }else{
     
        $rowData_ = DB::select("
                  SELECT 
                  `id`, `name`, `email`, `telefono`, `ubicacion`, `updated_at`, `created_at`, `estado_oferta`
                  FROM users u
                  ORDER BY u.id desc ");

      }

      return view('admin.pages.descuento_usuario.ajax.tablaProducto')->with(compact('rowData_'));
    }


    
 public function descuento_usuario_crear(Request $request) 
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
                  $path = "img/mc_modelo_puerta";
                  $file0->move($path,$filename);

               
                  DB::table('mc_modelo_puerta')->insert([
                    'nombre'          => $txt_pro_name, 
                    'descripcion'     => $txt_descripcion, 
                    'url_image'       => '/img/mc_modelo_puerta/'.$filename, 
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


              $('textarea[name=lbl_name]').val(response.data[0].name);
              $('textarea[name=lbl_email]').val(response.data[0].email);
              $('textarea[name=lbl_password]').val(response.data[0].password);
              $('textarea[name=lbl_telefono]').val(response.data[0].telefono);
              $('textarea[name=lbl_ubicacion]').val(response.data[0].ubicacion);
              $('input[name=lbl_price]').val(response.data[0].precio_oferta);

              $('input:radio[name="lbl_estado_oferta"]').filter('[value=' + response.data[0].estado_oferta + ']').attr('checked', true);

                    DB::table('users')
                    ->where("id",$id_imagen_0)
                    ->update([

                      'name'                  => $request->lbl_name, 
                      'email'                 => $request->lbl_email, 
                      'password'              => $request->lbl_password, 
                      'telefono'              => $request->lbl_telefono, 
                      'ubicacion'             => $request->lbl_ubicacion, 
                      'ubicacion'             => $request->lbl_price, 
                      'ubicacion'             => $request->lbl_estado_oferta, 
                      'updated_at'            =>date("Y-m-d H:i:s")
                    ]); 

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
                $url_imagen =  DB::table('mc_modelo_puerta')->where('id', '=', $id_imagen_0)->get();
                
                if(file_exists(str_replace('/img/', 'img/',  $url_imagen[0]->url_image))){
                  unlink(str_replace('/img/', 'img/',  $url_imagen[0]->url_image));
                }

                  DB::table('mc_modelo_puerta')->where('id', '=', $id_imagen_0)->delete();
      
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





    public function descuento_usuario_editar(Request $request) {
     
      $rowData_ = DB::select("
                  SELECT 
                  `id`, `name`, `email`, `telefono`, `ubicacion`, `updated_at`, `created_at`, `estado_oferta`
                  FROM users u WHERE u.id=?  ", [$request->id_producto]);

      return json_encode($rowData_) ;
    }

}