<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $deptos=DB::select("CALL obtener_depto()");
        return view('home',compact('deptos'));
    }
    public function consulta_art(Request $request)
    {
        
        $sku=$request->Sku;
        $articulos = DB::select("CALL obtener_articulo(".$sku.")");
        $data=array();
        $ban=0;
        foreach($articulos as $articulo)
        {
            $ban=1;
            $data['status']="true";
            $data['Dart_art']=$articulo->Dart_art;
            $data['Marc_art']=$articulo->Marc_art;
            $data['Mode_art']=$articulo->Mode_art;
            $data['Dept_art']=$articulo->Dept_art;
            $data['Clas_art']=$articulo->Clas_art;
            $data['Fami_art']=$articulo->Fami_art;
            $data['Cant_art']=$articulo->Cant_art;
            $data['Stok_art']=$articulo->Stok_art;
            $data['Feca_art']=$articulo->Feca_art;
            $data['Fecb_art']=$articulo->Fecb_art;
        }
        if($ban==0)
        {
            $data['status']="false";
        }
        echo json_encode($data);
    }
    public function consulta_clase(Request $request)
    {
        $depto=$request->Id_dept;
        $clase1=$request->clase;
        $html= "<option value='0'>Seleccionar clase</option>";
        //Se ejcuta SP
        $clases= DB::select("CALL obtener_clase(".$depto.")");
        foreach($clases as $clase)
        {
            if($clase1==$clase->Id_clase)
            {
                $html.= "<option selected='selected' value='".$clase->Id_clase."'>".$clase->Nom_clase."</option>";
            }
            else
            {
                $html.= "<option value='".$clase->Id_clase."'>".$clase->Nom_clase."</option>";
            }
           
        }
        echo $html;
    }
    public function consulta_familia(Request $request)
    {
        $clase=$request->Clase;
        $familia1=$request->Familia;
        $html= "<option value='0'>Seleccionar familia</option>";
        $familias= DB::select("CALL obtener_familia(".$clase.")");
        foreach($familias as $familia)
        {
            if($familia1==$familia->Id_fam)
            {
                $html.= "<option selected='selected' value='".$familia->Id_fam."'>".$familia->Nom_fam."</option>";
            }
            else
            {
                $html.= "<option value='".$familia->Id_fam."'>".$familia->Nom_fam."</option>";
            }
           
        }
        echo $html;
    }  
    public function add_articulos(Request $request)
    {
        
        $sku_art=$request->Sku_art;
        $dart_art=$request->Dart_art;
        $marc_art=$request->Marc_art;
        $mode_art=$request->Mode_art;
        $id_depto=$request->Id_depto;
        $clas_art=$request->Clas_art;
        $fami_art=$request->Fami_art;
        $stok_art=$request->Stok_art;
        $cant_art=$request->Cant_art;
        $articulos = DB::select("CALL obtener_articulo(".$sku_art.")");
        $ban=0;
        foreach($articulos as $articulo)
        {
            $ban=1;
        }
        if($ban==0)
        {
            $articulos = DB::select("CALL add_articulos(".$sku_art.",'".$dart_art."','".$marc_art."','".$mode_art."',
            ".$id_depto.",".$clas_art.",".$fami_art.",".$stok_art.",".$cant_art.")"); 
           echo "1";  
        }
        else
        {
            echo "0";
        }
            
    } 
    public function update_articulos(Request $request)
    {
        $sku_art=$request->Sku_art;
        $dart_art=$request->Dart_art;
        $marc_art=$request->Marc_art;
        $mode_art=$request->Mode_art;
        $id_depto=$request->Id_depto;
        $clas_art=$request->Clas_art;
        $fami_art=$request->Fami_art;
        $stok_art=$request->Stok_art;
        $cant_art=$request->Cant_art;
        $fecb_art=$request->Fecb_art;
        if($fecb_art=="1900-01-01")
        {
            $desc_art=0;
        }
        else
        {
            $desc_art=1;
        }
        $articulos=DB::select("CALL update_articulos(".$sku_art.",'".$dart_art."','".$marc_art."','".$mode_art."',".$id_depto.",".$clas_art.",".$fami_art.",".$stok_art.",".$cant_art.",'".$fecb_art."',".$desc_art.")");
        echo "Se actualizo correctamente la información";       
    } 
    public function delete_articulos(Request $request)
    {
        $sku_art=$request->Sku_art;
        $articulos = DB::select("CALL delete_articulo(".$sku_art.")"); 
        echo "Se borro correctamente la información";       
    } 
}

