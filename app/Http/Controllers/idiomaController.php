<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Auth;
use App\Models\idioma;

class idiomaController extends Controller
{
    
    public function idioma($idioma){

        Session::put('idioma', $idioma);
        return redirect()->back();
    }

    

    public function index(){

        if(Auth::user()){ 

            if(Auth::user()->rol_id == 1){

                $resultado = idioma::get();

                return view('idioma.index',['resultado'=>$resultado]);

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

                

                $obj_idioma = new idioma();

                $obj_idioma->nombre = $request->txtNombre;
                $obj_idioma->slug = str_replace(" ", "_", $request->txtNombre);
                $obj_idioma->texto = $request->txtTexto;
                $obj_idioma->idioma = $request->txtIdioma;
                $obj_idioma->save();
                
                
                    
                    
                return redirect()->back()->withErrors(['success' => "Se a Guardado el archivo correctamente"]);

                    
                
                

                

            }else{

                return view('index');

            }
            

        }else {

            return redirect(route('login.index'));
            
        }   
    }

    
    public function edit($id){

        
        if(Auth::user()){ 

            if(Auth::user()->rol_id == 1){

                

                $obj_idioma = idioma::find($id);

               
                return view('idioma.editar',['fila'=>$obj_idioma]);
                

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

                

                $obj_idioma = idioma::find($request->txtId);

                $obj_idioma->nombre = $request->txtNombre;
                $obj_idioma->slug = str_replace(" ", "_", $request->txtNombre);
                $obj_idioma->texto = $request->txtTexto;
                $obj_idioma->idioma = $request->txtIdioma;
                $obj_idioma->save();
                
                
                    
                    
                return redirect(route('idioma.index'))->withErrors(['success' => "Se a Guardado el archivo correctamente"]);

                    
                
                

                

            }else{

                return view('index');

            }
            

        }else {

            return redirect(route('login.index'));
            
        }   
    }

    public function delete($id){

        
        if(Auth::user()){ 

            if(Auth::user()->rol_id == 1){

                

                $obj_idioma = idioma::find($id);

               
                $obj_idioma->delete();
                
                
                    
                    
                return redirect()->back()->withErrors(['danger' => "Se a eliminado correctamente"]);

                    
                
                

                

            }else{

                return view('index');

            }
            

        }else {

            return redirect(route('login.index'));
            
        }   
    }

    public static function traerTexto($nombre,$idioma){

        
            
        $texto = idioma::where('slug',$nombre)->where('idioma',$idioma)->first();

        if ($texto) {
            return $texto->texto;

        } else {
            return 'sin texto';
        }
        
        
    
        
    }

    

    

}
