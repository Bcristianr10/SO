<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\emprendimiento;
use Illuminate\Support\Facades\Auth;


class emprendimientoController extends Controller
{
    public function indexEmprendimineto(){
        $resultado = emprendimiento::where('estado',1)->get();        
        return view('emprendimiento',['resultado'=>$resultado]);
    }


    public function index(){

        if(Auth::user()){ 

            if(Auth::user()->rol_id == 1){

                $resultado = emprendimiento::get(); 

                return view('emprendimiento.index',['resultado'=>$resultado]);

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

                return view('emprendimiento.create');

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
                    
                    
                    $path = $file->storeAs('public/imagen/emprendimientos/'.now()->toArray()['year'].'/'.now()->toArray()['month'],$file_name,'s3');
                    
                    
                    
                    
                    $obj_emprendimiento = new emprendimiento();
                    $obj_emprendimiento->titulo = $request->txtTitulo;          
                    $obj_emprendimiento->descripcion = $request->txtDescripcion;          
                    $obj_emprendimiento->persona = $request->txtNombre;          
                    $obj_emprendimiento->telefono = $request->txtTelefono;          
                    $obj_emprendimiento->imagen = env('AWS_URL').$path;
                    $obj_emprendimiento->estado = 1;

                    $obj_emprendimiento->save();

                    
                    
                    return redirect(route('emprendimientos.index'))->withErrors(['success' => "Se a Guardado el emprendimiento correctamente"]);

                    
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

                $obj_emprendimiento = emprendimiento::find($request->txtId);
                $files = $request->file('archivo');   
                if($file != null){


                                        

                    $file_name = now()->toArray()['day'].'_'.now()->toArray()['month'].'_'.mt_rand(1000,10000);
                    $extencion= $file->getClientOriginalExtension();

                    $file_name = $file_name.'.'.$extencion;
                    
                    
                    $path = $file->storeAs('public/imagen/emprendimientos/'.now()->toArray()['year'].'/'.now()->toArray()['month'],$file_name,'s3');
                    
                    
                    $obj_emprendimiento->titulo = $request->txtTitulo;          
                    $obj_emprendimiento->descripcion = $request->txtDescripcion;          
                    $obj_emprendimiento->persona = $request->txtNombre;          
                    $obj_emprendimiento->telefono = $request->txtTelefono; 
                    $obj_emprendimiento->imagen = env('AWS_URL').$path;
                    $obj_emprendimiento->save();

                    
                    
                    return redirect(route('emprendimientos.index'))->withErrors(['success' => "Se a actualizado el emprendimiento correctamente"]);

                    
                }else{
                    
                    
                $obj_emprendimiento->titulo = $request->txtTitulo;          
                $obj_emprendimiento->descripcion = $request->txtDescripcion;          
                $obj_emprendimiento->persona = $request->txtNombre;          
                $obj_emprendimiento->telefono = $request->txtTelefono; 
                $obj_emprendimiento->save();
                
                return redirect(route('emprendimientos.index'))->withErrors(['success' => "Se a actualizado el emprendimiento correctamente"]);
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

                $obj_emprendimiento = emprendimiento::find($id);
                $obj_emprendimiento->estado = 0;

                $obj_emprendimiento->save();
                

                return redirect(route('emprendimientos.index'))->withErrors(['success' => "Se a eliminado el emprendimiento correctamente"]);
                


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

                $resultado = emprendimiento::find($id);

                return view('emprendimiento.update',['resultado'=>$resultado]);
                


            }else{

                return view('index');

            }
            

        }else {

            return redirect(route('login.index'));
            
        } 

    }
}
