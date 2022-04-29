<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\imagen;

class imagenesController extends Controller
{
    
    public function index(){

        if(Auth::user()){ 

            if(Auth::user()->rol_id == 1){

                $resultado = imagen::get();

                return view('imagenes.index',['resultado'=>$resultado]);

            }else{

                return view('index');

            }
            

        }else {

            return redirect(route('login.index'));
            
        }
    }

    public function create(){

        if(Auth::user()){ 

            if(Auth::user()->rol_id == 1){

                return view('imagenes.create');

            }else{

                return view('index');

            }
            

        }else {

            return redirect(route('login.index'));
            
        }
    }

    public function insert(Request $request){

        
        if(Auth::user()){ 

            if(Auth::user()->rol_id == 1){

                $file = $request->file('archivo');
                
                
                if($file != null){

                    $file_name = now()->toArray()['day'].'_'.now()->toArray()['month'].'_'.mt_rand(1000,10000);
                    $extencion= $file->getClientOriginalExtension();

                    $file_name = $file_name.'.'.$extencion;
                    
                    $path = $file->storeAs('public/imagen/'.now()->toArray()['year'].'/'.now()->toArray()['month'],$file_name,'s3');
                    
                    
                    

                    $obj_imagen = new imagen();          
                    $obj_imagen->ruta = env('AWS_URL').$path;
                    $obj_imagen->nombre = $request->txtNombre;
                    $obj_imagen->slug =  str_replace(" ", "_", $request->txtNombre);
                    $obj_imagen->estado = 1;
                    
                    $obj_imagen->save();

                    
                    
                    return redirect(route('imagenes.index'))->withErrors(['success' => "Se a Guardado el archivo correctamente"]);

                    
                }
                

                return redirect()->back()->withErrors(['danger' => "Algo salio mal"]);

            }else{

                return view('index');

            }
            

        }else {

            return redirect(route('login.index'));
            
        }   

    }

    public function save(Request $request){

        if(Auth::user()){ 

            if(Auth::user()->rol_id == 1){

                if (isset($request->estado)) {
                    $estado = 1;
                } else {
                    $estado = 0 ;
                }

                $imagen = imagen::find($request->txtId);

                $imagen->nombre = $request->txtNombre;
                $imagen->slug = str_replace(" ", "_", $request->txtNombre);
                $imagen->estado = $estado;
                $imagen->save();
                
                return redirect(route('imagenes.index'))->withErrors(['success' => "Se a Guardado el archivo correctamente"]);

            }else{

                return view('index');

            }
            

        }else {

            return redirect(route('login.index'));
            
        } 

    }

    public static function traerImagen($nombre){


        $imagen = imagen::where('slug',$nombre)->where('estado',1)->first();

        
       
        return $imagen;

    }

    public static function traerGaleria($nombre , $cantidad){


        $imagen = imagen::where('slug',$nombre)->where('estado',1)->paginate($cantidad);

        
       
        return $imagen;

    }



}
