<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\products;
use Illuminate\Http\Request;
use Storage;
use App\pro_cat;
use Image;
use App\products_properties;

use Illuminate\Support\Facades\Auth;


class AdminController extends Controller {

    public function index() {

    return view('admin.index');
    }

    public function addpro_form(){
      $menu = DB::table('menu')->get();

      return view('admin.home', compact('menu'));
    }

    public function getCategory($id) 
    {        
            $states = DB::table("menu_category")->where("id_menu",$id)->get();
            return json_encode($states);
    }
    public function getItems($id) 
    {        
            $states = DB::table("menu_items")->where("id_cat",$id)->get();
            return json_encode($states);
    }

    //===AGREGAR NUEVO PRODUCTO
    public function add_product(Request $request) {
      if(products::orderBy('id', 'desc')->first()){
        $pro= products::orderBy('id', 'desc')->first();
        $suma=intval($pro->id)+intval('1');
      }else{
        $suma=1;
      }
       
        // $products = new products;
        // $products->pro_name = $request->pro_name;
        // $products->id_item = $request->txt_item;
        // $products->pro_code = 'BALDA_CCL'.$suma;
        // $products->pro_info = $request->pro_info;
        // $products->created_at =date("Y-m-d H:i:s");
        // $products->updated_at = date("Y-m-d H:i:s");
        // $products->save();

        $id_ultimate = DB::table('products')->insertGetId([
          'pro_name' => $request->pro_name,
          'id_item' =>  $request->txt_item,
          'pro_code' => 'BALDA_CCL'.$suma,
          'pro_info' => $request->pro_info,
          'created_at' =>date("Y-m-d H:i:s"),
          'updated_at' =>date("Y-m-d H:i:s")
      ]);

      //  $count = DB::table('products')->where('id_item',$request->txt_item)->count();
       // DB::table('menu_items')->where('id_item', $request->txt_item)->update(['numbers' => $count]);

       //------ACTUALIZA EL CONTADOR 
       $id_item = DB::table('products')->select('id_item')->where('id',$id_ultimate)->get();
       $count = DB::table('products')->where('id_item',$id_item[0]->id_item)->count();
       DB::table('menu_items')->where('id_item', $id_item[0]->id_item)->update(['numbers' => $count]);

       return redirect('/admin/products');
    }
    //===ACTUALIZAR PRODUCTO
    public function update_product(Request $request) {

      DB::table('products')->where('id',$request->txt_id_pro)->update([
        'id_item' => $request->txt_item == '0' ||  $request->txt_item ==null  ? $request->txt_item_hiden : $request->txt_item,
        'pro_name' => $request->pro_name,
        'pro_info' => $request->pro_info
        ]); 
        return back()->with('msg','Se Actualizo');
    }

    public function view_products() {
      $Products = DB::table('products')
      ->orderby('products.id', 'DESC')
      ->get();
        return view('admin.products', compact('Products'));
    }

    public function products_filter(Request $request) {
       $Products = DB::select("call sp_list_products(".$request->id.")");
        return view('admin.products', compact('Products'));
    }


    public function add_cat() {
        return view('admin.addCat');
    }
    //====================INSERTAR========
    public function insertColorUnero(Request $request) {

      $file = $request->file('image');
      $filename = time() . '.' . $file->getClientOriginalName();
      $path = "img/color_imagen";
      $file->move($path,$filename); // save to our local folder

      DB::table('color_image')->insert([
        'name_color' => $request->name_color, 
        'description' => $request->description, 
        'id_cat' => $request->txt_color_category, 
        'url_image' => '/img/color_imagen/'.$filename, 
        'created_at' => date("Y-m-d H:i:s")
        ]);

        $colores = DB::table('color_image')->orderby('id', 'DESC')->get();
        return view('admin.categories', compact('colores'));
    }

    //====================EDITAR========
    public function editColorUnero(Request $request) {
        $cats = DB::table('color_image')->where('id', $request->id)->get();
        return view('admin.CatEditForm', compact('cats'));
    }
    //====================DELETE========
    public function deleteColorUnero($id) {
      $url_imagen =  DB::table('color_image')->where('id', '=',$id)->get();
      unlink(str_replace('/img/', 'img/',  $url_imagen[0]->url_image));
      DB::table('color_image')->where('id', '=', $id)->delete();
      return back()->with('msg', 'Eliminado');
    }


      
    //update query to edit cat
    public function editCat(Request $request) {

        $catid = $request->id;
        $catName = $request->cat_name;
        $status = $request->status;
        DB::table('pro_cat')->where('id', $catid)->update(['name' => $catName, 'status' => $status]);
        $cats = DB::table('pro_cat')->orderby('id', 'DESC')->get();

        return view('admin.categories', compact('cats'));
    }
//-------------------------------------------------------------

    public function view_cats() {
      $colores = DB::table('color_image')->orderby('id', 'DESC')->get();
      return view('admin.categories', compact('colores'));
    }




        

    public function ProductEditForm($id) {  
        $menu = DB::table('menu')->get();
        $Products = DB::table('products')->where('id', '=', $id)->get(); // now we are fetching all products       
        return view('admin.editPproducts')
        ->with(compact('menu'))
        ->with(compact('Products'));
    }
//-----ELIMINA TODOS LOS PRODUCTOS: products, imagen, medida
    public function ProductDelete(Request $request) {  
      $imagen = DB::table('imagen')->where('id_product', '=', $request->id)->get();
      
        foreach ($imagen as $key => $value) {
          unlink(str_replace('/img/', 'img/',$value->url_image));
          DB::table('medida')->where('id_medida', '=',$value->id_medida)->delete();
        }
          DB::table('imagen')->where('id_product', '=',$request->id)->delete();

        //------ACTUALIZA EL CONTADOR 
        $id_item = DB::table('products')->select('id_item')->where('id',$request->id)->get();
        $count = DB::table('products')->where('id_item',$id_item[0]->id_item)->count();
        DB::table('menu_items')->where('id_item', $id_item[0]->id_item)->update(['numbers' => $count-1]);
        DB::table('products')->where('id', '=',$request->id)->delete();
      
    return back()->with('msg', 'Eliminado');
  }

    public function editProduct(Request $request) {

        $proid = $request->id;
        $pro_name = $request->pro_name;
        $cat_id = $request->cat_id;
        $pro_code = $request->pro_code;
        $pro_price = $request->pro_price;
        $pro_info = $request->pro_info;
        $spl_price = $request->spl_price;
        if(!empty($request->new_arrival)){
          $new_arrival = $request->new_arrival;
        }else {
          $new_arrival = '0';
        }

        DB::table('products')->where('id', $proid)->update([
            'pro_name' => $pro_name,
            'cat_id' => $cat_id,
            'pro_code' => $pro_code,
            'pro_price' => $pro_price,
            'pro_info' => $pro_info,
            'spl_price' => $spl_price,
            'new_arrival' => $new_arrival

        ]);
        return redirect('/admin/products');
    }

    public function ImageEditForm($id) {
        $Products = DB::table('products')->where('id', '=', $id)->get(); // now we are fetching all products
        return view('admin.ImageEditForm', compact('Products'));
    }

    public function editProImage(Request $request) {

        $proid = $request->id;
        $file = $request->file('new_image');
        $filename = time() . '.' . $file->getClientOriginalName();

        $S_path = 'upload/images/small';
        $M_path = 'upload/images/medium';
        $L_path = 'upload/images/large';

        $img = Image::make($file->getRealPath());
        //$img->crop(300, 150, 25, 25);
        $img->resize(100, 100)->save($S_path . '/' . $filename);
        $img->resize(500, 500)->save($M_path . '/' . $filename);
        $img->resize(1000, 1000)->save($L_path . '/' . $filename);
       // $file->move($path, $filename);

        DB::table('products')->where('id', $proid)->update(['pro_img' => $filename]);
        return redirect('/admin/products');
    }



  public function sumbitProperty(Request $request){

    $properties = new products_properties;
    $properties->pro_id = $request->pro_id;
    $properties->size = $request->size;
    $properties->color = $request->color;
    $properties->p_price = $request->p_price;
    $properties->save();

    return redirect('/admin/ProductEditForm/'.$request->pro_id);

  }

  public function editProperty(Request $request){
         $uptProts = DB::table('products_properties')
          ->where('pro_id', $request->pro_id)
          ->where('id', $request->id)
          ->update($request->except('_token'));
          if($uptProts){
          return back()->with('msg', 'updated');
        }else {
        return back()->with('msg', 'check value again');
      }
  }

    public function addSale(Request $request){
      $salePrice = $request->salePrice;
      $pro_id = $request->pro_id;
      DB::table('products')->where('id', $pro_id)->update(['spl_price' => $salePrice]);
      echo 'added successfully';
    }
      //========Editar 1
        public function agregarProduct($id){
          $proInfo = DB::table('products')
          ->join('imagen', 'imagen.id_product', '=', 'products.id')
          ->where('products.id', $id)->get();
          return view('admin.agregarProduct')
          ->with(compact('proInfo'));
        }
        //========Eliminar imagen y medida
        public function deleteImagen(Request $request) {
          $url_imagen =  DB::table('imagen')->where('id_imagen', '=',  $request->id_imagen)->get();
          unlink(str_replace('/img/', 'img/',  $url_imagen[0]->url_image));
          DB::table('medida')->where('id_imagen', '=',  $request->id_imagen)->delete();
          DB::table('imagen')->where('id_imagen', '=',  $request->id_imagen)->delete();
          return back()->with('msg','Se Elimino correctamente');
        }

    //------------INSERTA LAS SUBIMAGEN
    public function crearImagen(Request $request){
      
      $file = $request->file('image');
      $filename  = time() .'_'.$file->getClientOriginalName();
      $path = "img/alt_images";
      $file->move($path,$filename);
      $add_lat = DB::table('imagen')->insert([
        'id_product' => $request->txt_id_product, 
         'url_image' => '/img/alt_images/'.$filename, 
        'check' => $request->flexRadioDefault
        ]);
        
      return back();
    }

        //------------UPDATE LAS SUBIMAGEN
        public function updateImagen(Request $request){
      
          if($request->file('image')){
            $url_imagen =  DB::table('imagen')->where('id_imagen', '=',  $request->txt_id_imagen)->get();
            unlink(str_replace('/img/', 'img/',  $url_imagen[0]->url_image));
  
            $file = $request->file('image');
            $filename  = time() .'_'.$file->getClientOriginalName();
            $path = "img/alt_images";
            $file->move($path,$filename);
  
               DB::table('imagen')
              ->where('id_imagen', $request->txt_id_imagen)
              ->update([
                'check' => $request->flexRadioDefault,
                'url_image' => '/img/alt_images/'.$filename, 
            ]);
          }else{

            DB::table('imagen')
            ->where('id_imagen', $request->txt_id_imagen)
            ->update([
              'check' => $request->flexRadioDefault
            ]);

            DB::table('medida')
            ->where('id_imagen', $request->txt_id_imagen)
            ->update([
              'id_color' => $request->txt_color
            ]);

          }
                    
          return back();
        }

  //------------ACTUALIZAR SUBIMAGEN
  public function submitAltUpdate(Request $request){ 

          DB::table('medida')
          ->where('id_medida', $request->txt_id_medida)
          ->update([
            'ancho' => $request->txt_ancho,
            'alto' => $request->txt_alto,
            'fondo' => $request->txt_fondo,
            'largo' => $request->txt_largo,
            'price' => $request->txt_price,

            'unidad_ancho' => $request->txt_unidad_ancho,
            'unidad_alto' => $request->txt_unidad_alto,
            'unidad_fondo' => $request->txt_unidad_fondo,
            'unidad_largo' => $request->txt_unidad_largo,
        ]);

      return back();
  }


  //------------REGISTRAR MEDIDAS
  public function submitRegistrar(Request $request){ 

    $addPro =  DB::table('medida')->insert([
      'id_imagen' => $request->txt_id_imagen,
      'ancho' => $request->txt_ancho,
      'alto' => $request->txt_alto,
      'fondo' => $request->txt_fondo,
      'largo' => $request->txt_largo,
      'price' => $request->txt_price,

      'unidad_ancho' => $request->txt_unidad_ancho,
      'unidad_alto' => $request->txt_unidad_alto,
      'unidad_fondo' => $request->txt_unidad_fondo,
      'unidad_largo' => $request->txt_unidad_largo,
      
      'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
      'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
     ]);


return back();
}


  //------------REGISTRAR MEDIDAS
  public function deleteMedida(Request $request){ 
    DB::table('medida')->where('id_medida', '=',$request->id_medida)->delete();
    return back();
}













    public function users(){
      $usersData = DB::table('users')
      ->get();
      return view('admin.users',compact('usersData', $usersData));
    }

    public function updateRole(Request $request){
      $userId = $request->userID;
       $role_val = $request->role_val;

      $upd_role = DB::table('users')->where('id',$userId)->update(['admin' =>$role_val]);
      if($upd_role){
        echo "role is updated successfully";
      }
    }

    public function import_products(Request $request){
      $this->validate($request,[
        'file' => 'required|mimes:csv,txt'
      ]);

      if(($handle = fopen($_FILES['file']['tmp_name'],"r")) !== FALSE){
        fgetcsv($handle); // remove first row of excel file such as product name,price,code

        while(($data = fgetcsv($handle,1000,",")) !==FALSE){

        $addPro =  DB::table('products')->insert([
            'pro_name' => $data[0],
            'pro_code' => $data[1],
            'pro_info' => $data[2],
            'pro_img' => $data[3],
            'pro_price' => $data[4],
            'cat_id' => $data[5],
            'stock' => '10',
            'new_arrival' => '0',
            'spl_price' => '0',
            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
           ]);
        }
      }
    }

//---------------------pruebas------------------
    public function list_pro(){
      $data = DB::table('prueba')->get();
      return response()->json($data);
      
    }
//--------------------------------------

public function listar_pedidos() {
  $orders = DB::select("call sp_list_ordens(".Auth::user()->id.")");
  return view('admin.listPedidos', compact('orders'));
}


    //======================TIRADORES O ACCESORIOS =====================
    public function listTiradores() {
      $tirador = DB::table('accesorio')->orderby('id_accesorio', 'DESC')->get();
      return view('admin.tiradorList', compact('tirador'));
    }

    public function listAccesorios() {
      return view('admin.ajax.listAccesorios');
    }

    public function addTirador() {
      return view('admin.tiradorAdd');
    }

    public function registerTirador(Request $request) {

      $file = $request->file('image');
       $filename  =  time() .'_'.$file->getClientOriginalName();
      $path = "img/accesorio_imagen";
      $file->move($path,$filename); 

      DB::table('accesorio')->insert([
        'names' => $request->txt_nombre, 
        'codigo' => $request->txt_codigo, 
        'price' => $request->txt_precio, 
        'url_image' => '/img/accesorio_imagen/'.$filename, 
        'created_at' => date("Y-m-d H:i:s")
        ]);
        return redirect('/admin/listTiradores');
    }

     public function updateTirador(Request $request){

      if($request->file('image')){
        $url_imagen =  DB::table('accesorio')->where('id_accesorio', '=',  $request->txt_id_accesorio)->get();
        unlink(str_replace('/img/', 'img/',  $url_imagen[0]->url_image));

        $file = $request->file('image');
        $filename  = time() .'_'.$file->getClientOriginalName();
        $path = "img/accesorio_imagen";
        $file->move($path,$filename);

           DB::table('accesorio')
          ->where('id_accesorio', $request->txt_id_accesorio)
          ->update([
            'names' => $request->txt_nombre,
            'codigo' => $request->txt_codigo,
            'price' => $request->txt_precio, 
            'url_image' => '/img/accesorio_imagen/'.$filename, 
        ]);
      }else{

        DB::table('accesorio')
        ->where('id_accesorio', $request->txt_id_accesorio)
        ->update([
          'names' => $request->txt_nombre,
          'codigo' => $request->txt_codigo,
          'price' => $request->txt_precio, 
        ]);
      }
      return back();
    }

   
    public function deleteTirador(Request $request) {
      $url_imagen =  DB::table('accesorio')->where('id_accesorio', '=',  $request->id_accesorio)->get();
      unlink(str_replace('/img/', 'img/',  $url_imagen[0]->url_image));
      DB::table('accesorio')->where('id_accesorio', '=',  $request->id_accesorio)->delete();
      return back()->with('msg','Se Elimino correctamente');
    }

    //==================================================

    //-----------------------AJAX---------------
    public function listMedidas(Request $request)
    {
        $id_imagen =  $request->id_imagen;
       return view('admin.ajax.listMedidas', compact('id_imagen'));
      
    }
    public function listImages(Request $request)
    {
        $id_product =  $request->id_product;
       return view('admin.ajax.listImagenes', compact('id_product'));
      
    }

}