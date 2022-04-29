<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\comentario;
use App\Models\estado;

class ayudasController extends Controller
{
    
    public function index(){

        if(Auth::user()){ 

            if(Auth::user()->rol_id == 1){
                
                $resultado = comentario::where('status',1)->get();
                $tipos = estado::where('tipo','ayuda')->orderBy('nombre')->get();

                return view('ayuda.index',['resultado' => $resultado,'tipos'=>$tipos]);

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
                
                $obj_comentario = new comentario();
                $obj_comentario->nombre = $request->txtNombre;
                $obj_comentario->estado_id = $request->txtTipo;
                $obj_comentario->comentario = $request->txtMensaje;
                $obj_comentario->save();

                return redirect()->back()->withErrors(['success' => "Ayuda creada exitosamente"]);

            }else{

                return view('index');

            }
            

        }else {

            return redirect(route('login.index'));
            
        }
    }

    public function tipo($id){

        $ayudas = comentario::where('estado_id',$id)->get();

        return $ayudas;


    }

    public function editar($id){

        if(Auth::user()){ 

            if(Auth::user()->rol_id == 1){
                
                $resultado = comentario::find($id);
                $tipos = estado::where('tipo','ayuda')->orderBy('nombre')->get();

                return view('ayuda.editar',['resultado' => $resultado,'tipos'=>$tipos]);

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
                
                $obj_comentario = comentario::find($request->txtId);
                $obj_comentario->nombre = $request->txtNombre;
                $obj_comentario->estado_id = $request->txtTipo;
                $obj_comentario->comentario = $request->txtMensaje;
                $obj_comentario->save();

                return redirect(route('ayudas.index'))->withErrors(['success' => "Ayuda guardada exitosamente"]);

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
                
                $obj_comentario = comentario::find($id);
                $obj_comentario->status = 0;              
                $obj_comentario->save();

                return redirect(route('ayudas.index'))->withErrors(['danger' => "Ayuda eliminada exitosamente"]);

            }else{

                return view('index');

            }
            

        }else {

            return redirect(route('login.index'));
            
        }


    }




}
