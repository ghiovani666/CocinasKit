<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Storage;
use Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Filesystem\Filesystem;


class QuienesSomosController extends Controller {

  public function admin_quienes_somos() {
    $data_ = DB::table('web_codemirror')->whereIn('id', array(1))->get();
    return view('admin.pages.admin_quienes_somos')->with(compact('data_'));
  }

  public function admin_quienes_somos_update(Request $request) 
  {       
      $data =  DB::table('web_codemirror')->where("id",1)->update(['descripcion' => $request->txt_descripcion]); 
      return $data;
  }
  
}