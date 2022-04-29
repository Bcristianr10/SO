<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\notification;
use Illuminate\Support\Facades\Auth;
use App\Models\mensaje;
use Carbon\Carbon;

class mensajesController extends Controller
{
    public function index(){

        if(Auth::user()){ 

            if(Auth::user()->rol_id == 1){

               $notificaciones = Auth::user()->notificaciones_mensajes();
               
               $lista_notificaciones= array();
                foreach($notificaciones as $notificacion){
                    $data = json_decode($notificacion->data, true); 

                    array_push($lista_notificaciones,$data['id']);
                }

                $mensajes = mensaje::whereIn('id',$lista_notificaciones)->orderBy('created_at','desc')->get();

                $notificaciones_sin_leer = Auth::user()->notificaciones_mensajes_sin_leer();
               
                $mensajes_sin_leer= array();
                foreach($notificaciones_sin_leer as $notificacion){
                    $data = json_decode($notificacion->data, true); 

                    array_push($mensajes_sin_leer,$data['id']);
                }


                return view('mensajes.index',['mensajes'=>$mensajes,'mensajes_sin_leer'=>$mensajes_sin_leer]);

            }else{

                return view('index');

            }
            

        }else {

            return redirect(route('login.index'));
            
        }
    }

    public function leido($id){

        if(Auth::user()){ 

            if(Auth::user()->rol_id == 1){               

                

                $notificaciones_sin_leer = Auth::user()->notificaciones_mensajes_sin_leer();               
                
                
                foreach($notificaciones_sin_leer as $notificacion){
                    $data = json_decode($notificacion->data, true); 

                    if($data['id']==$id){

                        $notificacion->read_at = Carbon::now();
                        $notificacion->save();

                        return redirect()->back();
                    }
                }

            return redirect()->back();
                

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

                

                $mensaje = mensaje::find($id);


                $notificaciones = notification::where('notifiable_id',Auth::user()->id)->get();

                foreach ($notificaciones as  $notificacion) {
                    $data = json_decode($notificacion->data, true); 

                    if($data['id'] == $id){

                        $notificacion->delete();
                        return redirect()->back()->withErrors(['danger' => "El mensaje a sido eliminado."]);

                    }
                }

           

                
                

            }else{

                return view('index');

            }
            

        }else {

            return redirect(route('login.index'));
            
        }
    }
}
