<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
use Session;
//ENVIAR CORREOS
use Mail;
use App\Mail\EnviarCorreosInfo;

class GaleriaController extends Controller
{

 // :::::::::::::::::::::::::: GALERIA DEL PRODUCTO ::::::::::::::::::::::::::::::::::::
    Public function galeriaPrincipal($idMenu) {
        switch ($idMenu) {
            case '7':
                $nombreGaleria='Galería';
                break;
            // case '2':
            //     $nombreGaleria='Proyectos';
            //     break;
            // case '3':
            //     $nombreGaleria='Reformas';
            //     break;
            // case '4':
            //     $nombreGaleria='Decoración';
            //     break;
        }

        return view('web.pages.galeria.galeriaPrincipal')->with(compact('idMenu'))->with(compact('nombreGaleria'));;
    }

    Public function galeriaLoad(Request $request) {
        if($request->ajax()){
            if($request->id > 0){
                $data = DB::table('mc_galeria')
                ->where('id', '<', $request->id)
                ->where('id_menu', '=',$request->txt_id_menu)
                ->orderBy('id', 'DESC')
                ->limit(6)
                ->get();
            }
            else{
                $data = DB::table('mc_galeria')
                ->where('id_menu', '=',$request->txt_id_menu)
                ->orderBy('id', 'DESC')
                ->limit(6)
                ->get();
            }
      $output = '';
      $last_id = '';
      
      if(!$data->isEmpty()) {
        $output .= ' <div class="row portfolio-container">';
        foreach($data as $row){
            $output .= '
            <div class="col-lg-4 col-md-6 portfolio-item  '.$row->id_menu.'">
                <img src="'.$row->url_image.'" class="img-fluid" alt="" style="width: 250px;">
                <div class="portfolio-info">
                    <h4>'.$row->nombre.'</h4>
                    <p>'.$row->description.'</p>
                    <a href="'.$row->url_image.'" data-gall="portfolioGallery" class="venobox preview-link"
                        title="'.$row->nombre.'"><i class="bx bx-plus"></i></a>
                    <a href="#" class="details-link" title="Mas Detalles"><i class="bx bx-link"></i></a>
                </div>
            </div>
            ';

            $last_id = $row->id;
        }

        $output .= '</div>';

        $output .= '
        <div class="row" id="load_more">
            <div class="col-lg-12 d-flex justify-content-center">
                <ul id="portfolio-flters">
                    <li data-filter="*" class="filter-active"><button type="button" name="load_more_button" style="background-color: #274280;border-color: #274280;" class="btn btn-success form-control" data-id="'.$last_id.'" id="load_more_button">Ver Más</button></li>
                </ul>
            </div>
        </div>       
        ';

      }else{

        $output .= '</div>';

        $output .= '
        <div class="row" id="load_more">
            <div class="col-lg-12 d-flex justify-content-center">
                <ul id="portfolio-flters">
                <button type="button" name="load_more_button" style="background-color: #274280;border-color: #274280;" class="btn btn-info form-control">No se encontraron datos</button>
                </ul>
            </div>
        </div>
        ';
        }
      echo $output;
        }


    }  

}