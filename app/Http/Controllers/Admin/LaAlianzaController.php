<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Storage;
use Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Filesystem\Filesystem;


class LaAlianzaController extends Controller {

  public function admin_alianza() {
    $data_ = DB::table('web_codemirror')->whereIn('id', array(4))->get();
    return view('admin.pages.alianza.admin_alianza')->with(compact('data_'));
  }

  public function admin_alianza_update(Request $request) 
  {       
      $data =  DB::table('web_codemirror')->where("id",4)->update(['descripcion' => $request->txt_descripcion]); 
      return $data;
  }

  public function admin_mathias_rath() {
    $data_ = DB::table('web_codemirror')->whereIn('id', array(5))->get();
    return view('admin.pages.alianza.admin_mathias_rath')->with(compact('data_'));
  }

  public function admin_mathias_rath_update(Request $request) 
  {       
      $data =  DB::table('web_codemirror')->where("id",5)->update(['descripcion' => $request->txt_descripcion]); 
      return $data;
  }

  public function admin_sustancias_vitales() {
    $data_ = DB::table('web_codemirror')->whereIn('id', array(7))->get();
    return view('admin.pages.alianza.admin_sustancias_vitales')->with(compact('data_'));
  }

  public function admin_sustancias_vitales_update(Request $request) 
  {       
      $data =  DB::table('web_codemirror')->where("id",7)->update(['descripcion' => $request->txt_descripcion]); 
      return $data;
  }

  public function admin_productos_naturales() {
    $data_ = DB::table('web_codemirror')->whereIn('id', array(8))->get();
    return view('admin.pages.alianza.admin_productos_naturales')->with(compact('data_'));
  }

  public function admin_productos_naturales_update(Request $request) 
  {       
      $data =  DB::table('web_codemirror')->where("id",8)->update(['descripcion' => $request->txt_descripcion]); 
      return $data;
  }

  public function admin_formacion() {
    $data_ = DB::table('web_codemirror')->whereIn('id', array(9))->get();
    return view('admin.pages.alianza.admin_formacion')->with(compact('data_'));
  }

  public function admin_formacion_update(Request $request) 
  {       
      $data =  DB::table('web_codemirror')->where("id",9)->update(['descripcion' => $request->txt_descripcion]); 
      return $data;
  }

  public function admin_grupo_barcelona() {
    $data_ = DB::table('web_codemirror')->whereIn('id', array(10))->get();
    return view('admin.pages.alianza.admin_grupo_barcelona')->with(compact('data_'));
  }

  public function admin_grupo_barcelona_update(Request $request) 
  {       
      $data =  DB::table('web_codemirror')->where("id",10)->update(['descripcion' => $request->txt_descripcion]); 
      return $data;
  }

}