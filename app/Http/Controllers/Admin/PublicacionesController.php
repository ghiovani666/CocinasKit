<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Storage;
use Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Filesystem\Filesystem;


class PublicacionesController extends Controller {

  public function admin_publicacion_internacional() {
    $data_ = DB::table('web_codemirror')->whereIn('id', array(12))->get();
    return view('admin.pages.publicacion.admin_publicacion_internacional')->with(compact('data_'));
  }

  public function admin_publicacion_internacional_update(Request $request) 
  {       
      $data =  DB::table('web_codemirror')->where("id",12)->update(['descripcion' => $request->txt_descripcion]); 
      return $data;
  }

  public function admin_saludnatural() {
    $data_ = DB::table('web_codemirror')->whereIn('id', array(13))->get();
    return view('admin.pages.publicacion.admin_saludnatural')->with(compact('data_'));
  }

  public function admin_saludnatural_update(Request $request) 
  {       
      $data =  DB::table('web_codemirror')->where("id",13)->update(['descripcion' => $request->txt_descripcion]); 
      return $data;
  }

  public function admin_informativos() {
    $data_ = DB::table('web_codemirror')->whereIn('id', array(14))->get();
    return view('admin.pages.publicacion.admin_informativos')->with(compact('data_'));
  }

  public function admin_informativos_update(Request $request) 
  {       
      $data =  DB::table('web_codemirror')->where("id",14)->update(['descripcion' => $request->txt_descripcion]); 
      return $data;
  }

  public function admin_revistas() {
    $data_ = DB::table('web_codemirror')->whereIn('id', array(15))->get();
    return view('admin.pages.publicacion.admin_revistas')->with(compact('data_'));
  }

  public function admin_revistas_update(Request $request) 
  {       
      $data =  DB::table('web_codemirror')->where("id",15)->update(['descripcion' => $request->txt_descripcion]); 
      return $data;
  }

  public function admin_productos_saludables() {
    $data_ = DB::table('web_codemirror')->whereIn('id', array(16))->get();
    return view('admin.pages.publicacion.admin_productos_saludables')->with(compact('data_'));
  }

  public function admin_productos_saludables_update(Request $request) 
  {       
      $data =  DB::table('web_codemirror')->where("id",16)->update(['descripcion' => $request->txt_descripcion]); 
      return $data;
  }

  public function admin_investigaciones() {
    $data_ = DB::table('web_codemirror')->whereIn('id', array(17))->get();
    return view('admin.pages.publicacion.admin_investigaciones')->with(compact('data_'));
  }

  public function admin_investigaciones_update(Request $request) 
  {       
      $data =  DB::table('web_codemirror')->where("id",17)->update(['descripcion' => $request->txt_descripcion]); 
      return $data;
  }

  public function admin_libros() {
    $data_ = DB::table('web_codemirror')->whereIn('id', array(18))->get();
    return view('admin.pages.publicacion.admin_libros')->with(compact('data_'));
  }

  public function admin_libros_update(Request $request) 
  {       
      $data =  DB::table('web_codemirror')->where("id",18)->update(['descripcion' => $request->txt_descripcion]); 
      return $data;
  }

  public function admin_barletta() {
    $data_ = DB::table('web_codemirror')->whereIn('id', array(19))->get();
    return view('admin.pages.publicacion.admin_barletta')->with(compact('data_'));
  }

  public function admin_barletta_update(Request $request) 
  {       
      $data =  DB::table('web_codemirror')->where("id",19)->update(['descripcion' => $request->txt_descripcion]); 
      return $data;
  }

  public function admin_boletines() {
    $data_ = DB::table('web_codemirror')->whereIn('id', array(20))->get();
    return view('admin.pages.publicacion.admin_boletines')->with(compact('data_'));
  }

  public function admin_boletines_update(Request $request) 
  {       
      $data =  DB::table('web_codemirror')->where("id",20)->update(['descripcion' => $request->txt_descripcion]); 
      return $data;
  }
}