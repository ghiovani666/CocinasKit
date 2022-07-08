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
                    `id`, `name`, `email`, `telefono`, `ubicacion`, `updated_at`, `created_at`, `oferta_estado`, `oferta_precio`
                    FROM users u

                  WHERE u.name=? 
                  ORDER BY u.id desc ", [$request->id_categoria]);

      }else{
     
        $rowData_ = DB::select("
                  SELECT 
                  `id`, `name`, `email`, `telefono`, `ubicacion`, `updated_at`, `created_at`, `oferta_estado`, `oferta_precio`
                  FROM users u
                  ORDER BY u.id desc ");

      }

      return view('admin.pages.descuento_usuario.ajax.tablaProducto')->with(compact('rowData_'));
    }


    
 public function descuento_usuario_crear(Request $request) 
 {        

        $id_imagen_0       = $request->id_producto;

         switch($request->isValues) {
          case 'ACTUALIZAR': 

              DB::beginTransaction();

            try {

              // $checkShopkeepers = DB::table('users')->where('email', '=', $request->lbl_email)->first();

              // if ($checkShopkeepers === $request->lbl_email) {
  
                DB::table('users')
                ->where("id",$id_imagen_0)
                ->update([
                  'name'                  => $request->lbl_name, 
                  'email'                 => $request->lbl_email, 
                  'password'              => Hash::make($request->lbl_password), 
                  'password_new'          => $request->lbl_password,
                  'telefono'              => $request->lbl_telefono, 
                  'ubicacion'             => $request->lbl_ubicacion, 
                  'oferta_precio'         => $request->lbl_oferta_precio, 
                  'oferta_estado'         => $request->lbl_oferta_estado, 
                  'updated_at'            =>date("Y-m-d H:i:s")
                ]); 
            //  }
             
            //  if ($checkShopkeepers === null) {               
            //     // return json_encode(['data' => 'Duplicado!','state' => 'ok']);
            //     return redirect()->back()->withErrors(['error' => $e->getMessage()]);
             
            //  }


                  DB::commit();
                  // all good
                  return json_encode(['data' => 'Actualizado correctamente!','state' => 'ok']);
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
                  `id`, `name`, `email`, `telefono`, `ubicacion`, `updated_at`, `created_at`, `oferta_estado`, `oferta_precio`,password_new
                  FROM users u WHERE u.id=?  ", [$request->id_producto]);

      return json_encode($rowData_) ;
    }

}