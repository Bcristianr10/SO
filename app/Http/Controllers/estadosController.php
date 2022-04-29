<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\estado;

class estadosController extends Controller
{
    public function index(){

        if(Auth::user()){ 

            if(Auth::user()->rol_id == 1){

                $resultado = estado::get();

                return view('estados.index',['resultado'=>$resultado]);

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

                $obj_estado = new estado();
                $obj_estado->tipo = $request->txtTipo;
                $obj_estado->nombre = $request->txtEstado;
                $obj_estado->save();

                return redirect()->back()->withErrors(['success' => "Estado Creado Exitosamente"]);

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

                $obj_estado = estado::find($request->txtId);
                $obj_estado->tipo = $request->txtTipo;
                $obj_estado->nombre = $request->txtEstado;
                $obj_estado->save();

                return redirect()->back()->withErrors(['success' => "Estado actualizado Exitosamente"]);

            }else{

                return view('index');

            }
            

        }else {

            return redirect(route('login.index'));
            
        }
    }

    public function eliminar($id){

        if(Auth::user()){ 

            if(Auth::user()->rol_id == 1){

                $obj_estado = estado::find($id);
                
                $obj_estado->delete();

                return redirect()->back()->withErrors(['danger' => "Estado eliminado Exitosamente"]);

            }else{

                return view('index');

            }
            

        }else {

            return redirect(route('login.index'));
            
        }
    }
}
