<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\padre;
use App\Models\rol;
use App\Models\notification;
use App\Notifications\nuevoUsuario;
use Carbon\Carbon;
use Intervention\Image\ImageManager;

class usuarioController extends Controller
{
    public function index(){

        if(Auth::user()){ 

            if(Auth::user()->rol_id == 1){

                $resultado = user::get();
                $roles = rol::get();
                return view('usuario.index',['resultado'=>$resultado,'roles'=>$roles]);

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

                                
                $count = user::where('nombre',$request->nombre)->count();

                if ($count== 0) {

                    

                    $obj_usuario = new user();
                    $obj_usuario->nombre = $request->nombre;
                    $obj_usuario->email = $request->email;
                    $obj_usuario->password = md5($request->password);
                    $obj_usuario->rol_id = $request->rol_id;
                    
                    $obj_usuario->save();
                    
                    return redirect()->back()->withErrors(['success' => "Usuario Creado Exitosamente"])->withInput($request->all());
                    

                } else {
                    
                    return redirect()->back()->withErrors(['danger' => "Este Usuario ya existe"])->withInput($request->all());

                }
                
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

                $roles = rol::get();
                return view('usuario.create',['roles'=>$roles]);

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

                $obj_usuario = user::find($request->txtId);

        
                if($request->password==($obj_usuario->password)){
                    $contraseña_verificada = $obj_usuario->password;
                    
                }else{
                    $contraseña_verificada = md5($request->password); 
                    
                }
        
               
                        
                $nombre_existe = user::where('nombre', $request->nombre )->count();
                if($nombre_existe>=1){
                    $obj_usuario = user::where('nombre', $request->nombre )->first();
                    if($obj_usuario->id == $request->txtId){
                        $email_existe = user::where('email', $request->email )->count();
                        if($email_existe>=1){
                            $obj_email = user::where('email', $request->email )->first();
                            if($obj_email->id == $request->txtId){ 
        
                                $obj_usuario->nombre = $request->nombre;
                                $obj_usuario->email = $request->email;
                                $obj_usuario->password = $contraseña_verificada;
                                $obj_usuario->rol_id = $request->rol_id;
                                $obj_usuario->estado = $request->estado;
                                
                                try {
                                    $obj_usuario->save();
                                    return redirect(route('usuario.index'))->withErrors(['success'=> "Se ha actualizado el usuario: ".$obj_usuario->nombre ]);
                
                                } catch (\Illuminate\Database\QueryException $qe) {
                                    
                                    return redirect()->back()->withErrors(['danger' => 'Usuario o Correo duplicados' ]);
                                } catch (Exception $e) {
                                    return redirect()->back()->withErrors(['danger' => $e->getMessage()]);
                                } catch (\Throwable $th) {
                                    return redirect()->back()->withErrors(['danger' => $th]);
                                }  
                                       
                                        
                            }else{
                                
                                return redirect()->back()->withErrors(['danger' => 'Ingreso un correo que ya esta en uso' ]);
                            }
                                
                        }else{
                            $obj_usuario->nombre = $request->nombre;
                            $obj_usuario->email = $request->email;
                            $obj_usuario->password = $contraseña_verificada;
                            $obj_usuario->rol_id = $request->rol_id;
                            $obj_usuario->estado = $request->estado;
                            try {
                                $obj_usuario->save();
                                return redirect(route('usuario.index'))->withErrors(['success'=> "Se ha actualizado el usuario: ".$obj_usuario->nombre ]);
            
                            } catch (\Illuminate\Database\QueryException $qe) {
                                
                                return redirect()->back()->withErrors(['danger' => 'Usuario o Correo duplicados' ]);
                            } catch (Exception $e) {
                                return redirect()->back()->withErrors(['danger' => $e->getMessage()]);
                            } catch (\Throwable $th) {
                                return redirect()->back()->withErrors(['danger' => $th]);
                            } 
                        }
                            
                    }else{
                        return redirect()->back()->withErrors(['danger' => 'Ingreso un nombre que ya esta en uso' ]);
                    }
                }else{
                    
                    $email_existe = user::where('email', $request->email )->count();
                    if($email_existe>=1){
                        $obj_email = user::where('email', $request->email )->first();
                        if($obj_email->id == $request->txtId){         
                            $obj_usuario->nombre = $request->nombre;
                            $obj_usuario->email = $request->email;
                            $obj_usuario->password = $contraseña_verificada;
                            $obj_usuario->rol_id = $request->rol_id;
                            $obj_usuario->estado = $request->estado;
                            try {
                                $obj_usuario->save();
                                return redirect(route('usuario.index'))->withErrors(['success'=> "Se ha actualizado el usuario: ".$obj_usuario->nombre ]);
            
                            } catch (\Illuminate\Database\QueryException $qe) {
                                
                                return redirect()->back()->withErrors(['danger' => 'Usuario o Correo duplicados' ]);
                            } catch (Exception $e) {
                                return redirect()->back()->withErrors(['danger' => $e->getMessage()]);
                            } catch (\Throwable $th) {
                                return redirect()->back()->withErrors(['danger' => $th]);
                            } 
                        }else{
                            return redirect()->back()->withErrors(['danger' => 'Ingreso un email que ya esta en uso' ]);
                        }
                    
                    }else{
                        return redirect()->back()->withErrors(['danger' => 'Ingreso un nombre que ya esta en uso' ]);
                    }
                }              
                
                
            }else{

                return view('index');

            }
            

        }else {

            return redirect(route('login.index'));
            
        }

    }

    public function lock($id){

        if(Auth::user()){ 

            if(Auth::user()->rol_id == 1){

                $user = user::find($id);
                $user->estado = 0;
                $user->save();

                return redirect(route('usuario.index'))->withErrors(['danger'=> "Se ha eliminado el usuario: ".$user->nombre ]);

            }else{

                return view('index');

            }
            

        }else {

            return redirect(route('login.index'));
            
        }

    }

    public function unlock($id){

        if(Auth::user()){ 

            if(Auth::user()->rol_id == 1){

                $user = user::find($id);
                $user->estado = 1;
                $user->save();

                return redirect(route('usuario.index'))->withErrors(['success'=> "Se ha activado el usuario: ".$user->nombre ]);

            }else{

                return view('index');

            }
            

        }else {

            return redirect(route('login.index'));
            
        }

    }

    public function cambiarImagenPerfil (Request $request){

        if(Auth::user()){ 
            
            
            $file = $request->file('imagen');

            
            if($file != null){  
                
                $img = ImageManager::make($file)->resize(300, 200);

                return $img;


                $file_name = now()->toArray()['day'].'_'.now()->toArray()['month'].'_'.mt_rand(1000,10000);
                $extencion= $file->getClientOriginalExtension();

                $file_name = $file_name.'.'.$extencion;

                
                $path = $file->storeAs('public/imagenPerfil/'.now()->toArray()['year'].'/'.now()->toArray()['month'],$file_name,'s3');
                
                $usuario = Auth::user();  

                $usuario->imagen_url = env('AWS_URL').$path;     
                
                $usuario->save();

                
                
                return redirect()->back()->withErrors(['success' => "Se actualizo la imagen de perfil correctamente"]);
            }else{

                return redirect()->back()->withErrors(['danger' => "Upss.. Algo salio Mal"]);
            }

            
        

        }else {

            return redirect(route('login.index'));
            
        }
        
    }


    public function notificacion($id){

        $padre = padre::find($id);

        if($padre!=null){

            //Enviar notificacionea a usuarios
            $notificacion['nombre'] = $padre->nombres.' '.$padre->apellidos;
            $notificacion['mensaje'] = 'este usuario se acaba de registrar';
            
            
            
            user::where('rol_id',1)                            
                    ->each(function(user $user) use ($notificacion){
                        $user->notify(new nuevoUsuario($notificacion));
                    });

            return redirect(route('inicio'))->withErrors(['success' => "Se envio la notificacion"]);

        } else{
            return redirect()->back()->withErrors(['danger' => "Upss.. Algo salio Mal"]);
        }
    }

    public function eliminarNotificaciones(){

        if(Auth::user()){ 

            $notificaciones = notification::where('notifiable_id', Auth::user()->id)->get();

            foreach ($notificaciones as $notificacion) {
                
                if($notificacion->type == 'App\Notifications\nuevoMensaje'){

                    $notificacion->read_at = Carbon::now();
                    $notificacion->save();
                }

                
                
                if($notificacion->type == 'App\Notifications\nuevoUsuario'){

                    $notificacion->delete();

                }

                
            }

            return redirect()->back();
            

        }else {

            return redirect(route('login.index'));
            
        }

    }



}
