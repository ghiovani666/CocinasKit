<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Storage;
use Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Filesystem\Filesystem;


class HomeController extends Controller {

  public function admin_home_slider() {

    $slider_ = DB::table('web_home')->whereIn('id_home', array(1, 2, 3))->get();
    $footer_ = DB::table('web_footer')->get();
    return view('admin.pages.home.admin_home_slider')->with(compact('footer_'))->with(compact('slider_'));
  }

  public function admin_home_slider_edit(Request $request) 
  {        
    if($request->txt_isclass=="slider"){
      $result = DB::table('web_home')
      ->where("id_home",$request->txt_id_home)
      ->get();
      return json_encode($result);
    }else{
      $result = DB::table('web_home')
      ->where("id_home",$request->txt_id_home)
      ->get();
      return json_encode($result);
    }

  }

  public function admin_home_slider_update(Request $request) 
  {        
    $file = $request->file('image');
  
    if($file){
      $url_imagen =  DB::table('web_home')->where('id_home', '=', $request->txt_id_home)->get();
     
      if(file_exists(str_replace('/img/', 'img/',  $url_imagen[0]->url_image))){
        unlink(str_replace('/img/', 'img/',  $url_imagen[0]->url_image));
      }
      
      $filename  =  time() .'_'.$file->getClientOriginalName(); // name of file
      $path = "img/mc_slider";
      $file->move($path,$filename); // save to our local folder

      DB::table('web_home')
        ->where("id_home",$request->txt_id_home)
        ->update([
        'title1' => $request->txt_titulo1,
        'url_image' => '/img/mc_slider/'.$filename, 
        ]); 

      }else{
        DB::table('web_home')
          ->where("id_home",$request->txt_id_home)
          ->update([
          'title1' => $request->txt_titulo1,
          ]); 

      }

          $data=  DB::table('web_home')->where('id_home', '=', $request->txt_id_home)->get();
          $html='';
          $html.='
          <img class="card-img-top" src="'.$data[0]->url_image.'" alt="Photo">
          <h6>'.$data[0]->title1.'</h6>
        ';
          return [$html,$data[0]->id_home];

  }

  public function admin_home_footer_update(Request $request) 
  {        
        $file = $request->file('txt_footer_image');
          if($file){
              $url_imagen =  DB::table('web_footer')->where('id_footer', '=',1)->get();

              if(file_exists(str_replace('/img/', 'img/',  $url_imagen[0]->url_image))){
               unlink(str_replace('/img/', 'img/',  $url_imagen[0]->url_image));
             }

              $filename  =  time() .'_'.$file->getClientOriginalName();
              $path = "img/mc_login";
              $file->move($path,$filename);

              DB::table('web_footer')
                ->where("id_footer",1)
                ->update([
                'descripcion' => $request->txt_footer_descripcion_logo,
                'horario' => $request->txt_footer_horario,
                'direccion' => $request->txt_footer_direccion,
                'telefono' => $request->txt_footer_telefono,
                'web' => $request->txt_footer_web,
                'boletin' => $request->txt_footer_boletin,

                'red_social_facebook' => $request->txt_footer_facebook,
                'red_social_instagram' => $request->txt_footer_instagram,
                'red_social_tweter' => $request->txt_footer_tweter,
                'email' => $request->txt_footer_email,
                'map_url' => $request->txt_map_url,

                'url_image' => '/img/mc_login/'.$filename, 
                'updated_at' =>date("Y-m-d H:i:s")
                ]); 

          }else{
            DB::table('web_footer')
              ->where("id_footer",1)
              ->update([
               'descripcion' => $request->txt_footer_descripcion_logo,
               'horario' => $request->txt_footer_horario,
               'direccion' => $request->txt_footer_direccion,
               'telefono' => $request->txt_footer_telefono,
               'web' => $request->txt_footer_web,
               'boletin' => $request->txt_footer_boletin,
               'red_social_facebook' => $request->txt_footer_facebook,
               'red_social_instagram' => $request->txt_footer_instagram,
               'red_social_tweter' => $request->txt_footer_tweter,
               'email' => $request->txt_footer_email,
               'map_url' => $request->txt_map_url,

               'updated_at' =>date("Y-m-d H:i:s")
              ]); 

          }

          $data=  DB::table('web_footer')->where('id_footer', '=', 1)->get();
          return [$data[0]->url_image,$data[0]->id_footer];

  }

}