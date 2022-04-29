<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\padre;
use App\Models\hijo;
use App\Models\carpeta;

class funcionesController extends Controller
{
    public static function CrearCarpeta($tipo,$id){


        if($tipo == 'padre'){

            $obj_padre= padre::find($id);
            $obj_carpeta = new carpeta();
            $obj_carpeta->descripcion = 'Carpeta de '.$obj_padre->nombres.' '.$obj_padre->apellidos;
            $obj_carpeta->save();
            
            $obj_padre->carpeta_id = $obj_carpeta->id;
            $obj_padre->save();

        }else{

            $obj_hijo = hijo::find($id);
            $obj_carpeta = new carpeta();
            $obj_carpeta->descripcion = 'Carpeta de '.$obj_hijo->nombres.' '.$obj_hijo->apellidos;
            $obj_carpeta->save();
            
            $obj_hijo->carpeta_id = $obj_carpeta->id;
            $obj_hijo->save();

        }

        return $obj_carpeta->id;   
    }       
}
