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
     
      if(file_exists(str_replace('/template_admin/', 'template_admin/',  $url_imagen[0]->url_image))){
        unlink(str_replace('/template_admin/', 'template_admin/',  $url_imagen[0]->url_image));
      }
      
      $filename  =  time() .'_'.$file->getClientOriginalName(); // name of file
      $path = "template_admin/img/home";
      $file->move($path,$filename); // save to our local folder

      DB::table('web_home')
        ->where("id_home",$request->txt_id_home)
        ->update([
        'title1' => $request->txt_titulo1,
        'url_image' => '/template_admin/img/home/'.$filename, 
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

  public function admin_home_bienvenidos() {
    $clases_ = DB::table('web_home')->whereIn('id_home', array(6, 21,22,23))->get();
    return view('admin.pages.home.admin_home_bienvenidos')->with(compact('clases_'));
  }

  public function admin_home_bienvenidos_update_text(Request $request) 
  {       
    $result = DB::table('web_home')->where("id_home",$request->txt_values0)->update([ 'title1' => $request->txt_title0,'descripcion' => $request->txt_descripcion0]);
              DB::table('web_home')->where("id_home",$request->txt_values1)->update([ 'title1' => $request->txt_title1,'descripcion' => $request->txt_descripcion1]);
              DB::table('web_home')->where("id_home",$request->txt_values2)->update([ 'title1' => $request->txt_title2,'descripcion' => $request->txt_descripcion2]);
              DB::table('web_home')->where("id_home",$request->txt_values3)->update([ 'title1' => $request->txt_title3,'descripcion' => $request->txt_descripcion3]);

        return json_encode(['data' => 'Actualizado el registro correctamente!','state' => $result]);
  }

  public function admin_home_bienvenidos_update_image(Request $request) 
  {        
    $file = $request->file('image');
    if($file){
        $url_imagen =  DB::table('web_home')->where('id_home', '=', 6)->get();
      
        if(file_exists(str_replace('/template_admin/', 'template_admin/',  $url_imagen[0]->url_image))){
            unlink(str_replace('/template_admin/', 'template_admin/',  $url_imagen[0]->url_image));
        }
      
      $filename  =  time() .'_'.$file->getClientOriginalName();
          $path = "template_admin/img/home";
          $file->move($path,$filename);

      DB::table('web_home')
        ->where("id_home",6)
        ->update([
        'url_image' => '/template_admin/img/home/'.$filename, 
        ]); 
   
        $data=  DB::table('web_home')->where('id_home', '=', 6)->get();
        return [$data[0]->url_image,$data[0]->id_home];
      }else{
        return back()->with('message','Se Actualizo');
      }
  }



  public function admin_home_footer_update(Request $request) 
  {        
        $file = $request->file('txt_footer_image');
          if($file){
              $url_imagen =  DB::table('web_footer')->where('id_footer', '=',1)->get();

              if(file_exists(str_replace('/template_admin/', 'template_admin/',  $url_imagen[0]->url_image))){
               unlink(str_replace('/template_admin/', 'template_admin/',  $url_imagen[0]->url_image));
             }

              $filename  =  time() .'_'.$file->getClientOriginalName();
              $path = "template_admin/img/logo";
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

                'url_image' => '/template_admin/img/logo/'.$filename, 
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

  public function admin_ventajas() {
    $data_ = DB::table('web_codemirror')->whereIn('id', array(23))->get();
    return view('admin.pages.home.admin_ventajas')->with(compact('data_'));
  }

  public function admin_ventajas_update(Request $request) 
  {       
      $data =  DB::table('web_codemirror')->where("id",23)->update(['descripcion' => $request->txt_descripcion]); 
      return $data;
  }
   
    // ::::::::::::::::::::::::::::::::: NUESTRAS ACTIVIDADES ::::::::::::::::::::::::::::::::

  public function admin_nuestra_actividad() {
    return view('admin.pages.home.admin_nuestra_actividad');
  }

  public function listData_NuestraActividad(Request $request) {
    if(intval($request->txt_id_actividad) > 0){
        $rowData_ = DB::table('web_nuestra_actividad')
        ->where("web_nuestra_actividad.id_actividad", $request->txt_id_actividad)
        ->get()->toArray();
    }else{
        $rowData_ = DB::table('web_nuestra_actividad')->get()->toArray();
    }

    return view('admin.pages.home.ajax.tablaNuestroServicio')->with(compact('rowData_'));
  }

  public function editData_NuestraActividad(Request $request) {
      $rowData_ = DB::table('web_nuestra_actividad')
      ->where("web_nuestra_actividad.id_actividad", $request->txt_id_actividad)
      ->get()->toArray();
      return json_encode($rowData_);
  }

  public function selectData_NuestraActividad(Request $request) 
  {        

      switch($request->isValues) {
        case 'CREAR': 

              $result = DB::table('web_nuestra_actividad')->insert([
                  'titulo' => $request->txt_titulo, 
                  'descripcion' => $request->txt_descripcion,
                  'created_at' => date("Y-m-d H:i:s"),
                  'updated_at' =>date("Y-m-d H:i:s")
                ]);
                return json_encode(['data' => 'Creado el registro correctamente!','state' => 'ok']);

              break;
        case 'ACTUALIZAR': 

              $result  =  DB::table('web_nuestra_actividad')
                ->where("id_actividad",$request->txt_id_actividad)
                ->update([
                  'titulo' => $request->txt_titulo, 
                  'descripcion' => $request->txt_descripcion,
                  'updated_at' =>date("Y-m-d H:i:s")
                  
                ]); 
              return json_encode( $result);

              break;

          case 'ELIMINAR': 
              DB::table('web_nuestra_actividad')->where('id_actividad', '=', $request->txt_id_actividad)->delete();
              return json_encode(['data' => 'Elimino el registro correctamente!','state' => 'ok']);
    
              break;

          case 'TEXTO': 

            $result  =  DB::table('web_nuestra_actividad')
                ->where("id_actividad",$request->txt_id_actividad)
                ->update([
                  'descripcion_texto' => $request->txt_descripcion_texto,
                  'updated_at' =>date("Y-m-d H:i:s")
                  
                ]); 
              return json_encode( $result);

            break;


        }
  }

  
  //:::::::::::::::::::::::::: CRUD DE ESTUDIOS ::::::::::::::::::::::::::

  public function admin_nuestro_estudio() {
    $rowData_ = DB::table('web_nuestro_estudio_categoria')->get()->toArray();
    return view('admin.pages.home.admin_nuestro_estudio')->with(compact('rowData_'));

  }

  public function listarGaleriaDataTable(Request $request) {
    
    if(intval($request->txt_id_estudio_categoria) > 0){
      $rowData_ = DB::table('web_nuestro_estudio')->join('web_nuestro_estudio_categoria', 'web_nuestro_estudio.id_estudio_categoria', '=', 'web_nuestro_estudio_categoria.id_estudio_categoria')
      ->where("web_nuestro_estudio.id_estudio_categoria", $request->txt_id_estudio_categoria)
      ->get()->toArray();
    }else{
      $rowData_ = DB::table('web_nuestro_estudio')->join('web_nuestro_estudio_categoria', 'web_nuestro_estudio.id_estudio_categoria', '=', 'web_nuestro_estudio_categoria.id_estudio_categoria')
      ->get()->toArray();
    }
    return view('admin.pages.home.ajax.tablaNuestroEstudio')->with(compact('rowData_'));
  }

  public function editServicioGaleria(Request $request) {
    $rowData_ = DB::table('web_nuestro_estudio')
    ->where("web_nuestro_estudio.id_estudio", $request->txt_id_estudio)
    ->get()->toArray();
    return json_encode($rowData_);
  }

  public function createServicioGaleria(Request $request) 
  {        
      switch($request->isValues) {
        case 'CREAR': 
          $file = $request->file('image');
          
          if($file != NULL){
              $filename  =  time() .'_'.$file->getClientOriginalName();
              $path = "template_admin/img/diapositiva";
              $file->move($path,$filename);

              $result = DB::table('web_nuestro_estudio')->insert([
                  'titulo' => $request->txt_titulo, 
                  'descripcion' => $request->txt_descripcion,
                  'id_estudio_categoria' => $request->txt_id_estudio_categoria,
                  'url_image' => '/template_admin/img/diapositiva/'.$filename, 
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
                $url_imagen =  DB::table('web_nuestro_estudio')->where('id_estudio', '=', $request->txt_id_estudio)->get();
              
                if(file_exists(str_replace('/template_admin/', 'template_admin/',  $url_imagen[0]->url_image))){
                  unlink(str_replace('/template_admin/', 'template_admin/',  $url_imagen[0]->url_image));
                }
                
                  $filename  =  time() .'_'.$file->getClientOriginalName(); 
                  $path = "template_admin/img/diapositiva";
                  $file->move($path,$filename); 
    
                  $result  =  DB::table('web_nuestro_estudio')
                    ->where("id_estudio",$request->txt_id_estudio)
                    ->update([
                      'titulo' => $request->txt_titulo, 
                      'descripcion' => $request->txt_descripcion,
                      'id_estudio_categoria' => $request->txt_id_estudio_categoria,
                      'url_image' => '/template_admin/img/diapositiva/'.$filename, 
                      'updated_at' =>date("Y-m-d H:i:s")
                      
                    ]); 
  
                    return json_encode(['data' => 'Actualizado el registro correctamente!','state' => 'ok','src' => '/template_admin/img/diapositiva/'.$filename]);

                }else{
                  $result  =  DB::table('web_nuestro_estudio')
                  ->where("id_estudio",$request->txt_id_estudio)
                  ->update([
                    'titulo' => $request->txt_titulo, 
                    'descripcion' => $request->txt_descripcion,
                    'id_estudio_categoria' => $request->txt_id_estudio_categoria,
                    'updated_at' =>date("Y-m-d H:i:s")
                  ]); 
                  return json_encode(['data' => 'Actualizado el registro correctamente!','state' => 'ok']);
                }

                break;

          case 'ELIMINAR': 
            $url_imagen =  DB::table('web_nuestro_estudio')->where('id_estudio', '=', $request->txt_id_estudio)->get();
            if(file_exists(str_replace('/template_admin/', 'template_admin/',  $url_imagen[0]->url_image))){
              unlink(str_replace('/template_admin/', 'template_admin/',  $url_imagen[0]->url_image));
            }
            DB::table('web_nuestro_estudio')->where('id_estudio', '=', $request->txt_id_estudio)->delete();
            return json_encode(['data' => 'Elimino el registro correctamente!','state' => 'ok']);
    
                break;

          case 'TEXTO': 

            $result  =  DB::table('web_nuestro_estudio')
                ->where("id_estudio",$request->txt_id_actividad)
                ->update([
                  'descripcion_texto' => $request->txt_descripcion_texto,
                  'updated_at' =>date("Y-m-d H:i:s")
                  
                ]); 
              return json_encode( $result);

          case 'TEXTO_CATEGORIA': 
            DB::table('web_nuestro_estudio_categoria')->where("id_estudio_categoria",1)->update(['nombre' => $request->txt_categoria_1,'updated_at' =>date("Y-m-d H:i:s")]); 
            DB::table('web_nuestro_estudio_categoria')->where("id_estudio_categoria",2)->update(['nombre' => $request->txt_categoria_2,'updated_at' =>date("Y-m-d H:i:s")]); 
            DB::table('web_nuestro_estudio_categoria')->where("id_estudio_categoria",3)->update(['nombre' => $request->txt_categoria_3,'updated_at' =>date("Y-m-d H:i:s")]); 
            DB::table('web_nuestro_estudio_categoria')->where("id_estudio_categoria",4)->update(['nombre' => $request->txt_categoria_4,'updated_at' =>date("Y-m-d H:i:s")]); 
            $result  =  DB::table('web_nuestro_estudio_categoria')->where("id_estudio_categoria",5)->update(['nombre' => $request->txt_categoria_5,'updated_at' =>date("Y-m-d H:i:s")]); 
            return json_encode( $result);

    }
  }


  public function editData_NuestroEstudio(Request $request) {
    $rowData_ = DB::table('web_nuestro_estudio')
    ->where("web_nuestro_estudio.id_estudio", $request->txt_id_estudio)
    ->get()->toArray();
    return json_encode($rowData_);
}



}