<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class loginController extends Controller
{
    public function index(){

        return view('auth.login');

    }

    public function login(Request $request){

        $nombre=$request->txtUsuario;
        $contraseña=$request->txtPassword;        
        
        $existe=user::where('nombre',$nombre)->count();
        
        if ($existe==1) {
            $usuario=user::where('nombre',$nombre)->first(); 
            
            if ($usuario['password']==md5($contraseña)) {

                if ($usuario->estado == 1) {

                    Auth::login($usuario);

                    return redirect(route('inicio'));

                } else {
                   return redirect()->back()->withErrors(['danger' => "Su usuario ha sido bloqueado"])->withInput($request->all());
                }              
                
                
            }
            else {                
                
                return redirect()->back()->withErrors(['password' => "Contraseña incorrecta."])->withInput($request->all());
            }
        }
        else {            
           
            return redirect()->back()->withErrors(['usuario' => "El usuario es incorrecto."])->withInput($request->all());
        }
    }

    public function logout(){
        
        Auth::logout();

        return redirect(route('login.index'));
    }

    public function cambiarContrasenaSave(Request $request){

        if(Auth::user()){

            if(md5($request->txtContrasenaActual) == Auth::user()->password){
                
                if ($request->txtContrasenaNueva == $request->txtContrasenaConfirmacion) {
                    
                    $usuario = Auth::user();
                    $usuario->password = md5($request->txtContrasenaConfirmacion);
                    $usuario->save();

                    return redirect()->back()->withErrors(['success' => "Se ha actualizado su contraseña"]);
            
                } else {

                    return redirect()->back()->withErrors(['danger' => "Ingreso mal la confirmacion de la nueva contraseña"]);
                }
                
                
            }else{

                return redirect()->back()->withErrors(['danger' => "Ingreso mal su contraseña Actual"]);
            }

        }
    }

   
}
