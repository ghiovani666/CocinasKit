<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Storage;
use Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Filesystem\Filesystem;


class AdminController extends Controller {

    public function index() {
      return view('admin.pages.home.index');
    }
    
    public function general_imagen(Request $request) 
    {        
        $file = $request->file('image');
        if($file){
            $filename  =  time() .'_'.$file->getClientOriginalName(); // name of file

            $path = "template_admin/img";
            $file->move($path,$filename); // save to our local folder
          return $filename;
        }
    }

}