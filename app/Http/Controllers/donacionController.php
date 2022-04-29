<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\donacion;
use Illuminate\Support\Facades\Auth;

class donacionController extends Controller
{
    public function indexDonacion(){
        $resultado = donacion::where('estado',1)->get(); 

        return view('donacion',['resultado'=>$resultado]);
    }


    public function index(){

        if(Auth::user()){ 

            if(Auth::user()->rol_id == 1){

                $resultado = donacion::get(); 

                return view('donacion.index',['resultado'=>$resultado]);

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

                return view('donacion.create');

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
                    
                    
                    $path = $file->storeAs('public/imagen/donaciones/'.now()->toArray()['year'].'/'.now()->toArray()['month'],$file_name,'s3');
                    
                    
                    
                    
                    $obj_donacion = new donacion();
                    $obj_donacion->monto = $request->txtMonto;          
                    $obj_donacion->descripcion = $request->txtDescripcion;          
                    $obj_donacion->nombre = $request->txtNombre;                
                    $obj_donacion->imagen = env('AWS_URL').$path;
                    $obj_donacion->estado = 1;

                    $obj_donacion->save();

                    
                    
                    return redirect(route('donaciones.index'))->withErrors(['success' => "Se a Guardado la donación correctamente"]);

                    
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

                $obj_donacion = donacion::find($request->txtId);
                $file = $request->file('archivo');   
                if($file != null){

                    

                    $file_name = now()->toArray()['day'].'_'.now()->toArray()['month'].'_'.mt_rand(1000,10000);
                    $extencion= $file->getClientOriginalExtension();

                    $file_name = $file_name.'.'.$extencion;
                    
                    
                    $path = $file->storeAs('public/imagen/donaciones/'.now()->toArray()['year'].'/'.now()->toArray()['month'],$file_name,'s3');
                    
                    
                    $obj_donacion->monto = $request->txtMonto;          
                    $obj_donacion->descripcion = $request->txtDescripcion;          
                    $obj_donacion->nombre = $request->txtNombre;                
                    $obj_donacion->imagen = env('AWS_URL').$path;
                    $obj_donacion->save();

                    
                    
                    return redirect(route('donaciones.index'))->withErrors(['success' => "Se a actualizado la donación correctamente"]);

                    
                }else{
                    
                    
                    $obj_donacion->monto = $request->txtMonto;          
                    $obj_donacion->descripcion = $request->txtDescripcion;          
                    $obj_donacion->nombre = $request->txtNombre;
                    $obj_donacion->save();
                
                    return redirect(route('donaciones.index'))->withErrors(['success' => "Se a actualizado la donación correctamente"]);
                }


                


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

                $obj_donacion = donacion::find($id);
                $obj_donacion->estado = 0;

                $obj_donacion->save();
                

                return redirect(route('donaciones.index'))->withErrors(['success' => "Se a eliminado la donación correctamente"]);
                


            }else{

                return view('index');

            }
            

        }else {

            return redirect(route('login.index'));
            
        } 

    }

    public function update($id){

        if(Auth::user()){ 

            if(Auth::user()->rol_id == 1){

                $resultado = donacion::find($id);

                return view('donacion.update',['resultado'=>$resultado]);
                


            }else{

                return view('index');

            }
            

        }else {

            return redirect(route('login.index'));
            
        } 

    }


}
