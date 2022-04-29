<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\hijo;
use App\Models\padre;
use App\Models\archivo;
use App\Models\familia;
use App\Models\provincia;
use App\Models\distrito;
use App\Models\pais;
use App\Models\corregimiento;
use App\Models\ocupacion;
use App\Models\estado;
use App\Models\carpeta;
use App\Models\seguimiento;
use App\Models\notification;
use App\Models\padreHijo;


class baseDatosController extends Controller
{
    
    public function indexAdultos(){

        if(Auth::user()){ 

            if(Auth::user()->rol_id == 1){

                $resultado = padre::where('estado',1)->get();                

                return view('baseDatos.adultos',['resultado'=>$resultado]);

            }else{

                return view('index');

            }
            

        }else {

            return redirect(route('login.index'));
            
        }

        
    }

    public function indexBloqueadosAdultos(){

        if(Auth::user()){ 

            if(Auth::user()->rol_id == 1){

                $resultado = padre::where('estado',2)->get();  
                           

                return view('baseDatos.adultos',['resultado'=>$resultado]);

            }else{

                return view('index');

            }
            

        }else {

            return redirect(route('login.index'));
            
        }

        
    }
    public function indexBloqueadosHijos(){

        if(Auth::user()){ 

            if(Auth::user()->rol_id == 1){

                $resultado = hijo::where('estado',2)->get();  
                           

                return view('baseDatos.hijos',['resultado'=>$resultado]);

            }else{

                return view('index');

            }
            

        }else {

            return redirect(route('login.index'));
            
        }

        
    }

    public function indexAdultosPendientes(){

        if(Auth::user()){ 

            if(Auth::user()->rol_id == 1){

                $resultado = padre::where('estado',0)->orderBy('nombres')->get();                

                return view('baseDatos.adultosPendientes',['resultado'=>$resultado]);

            }else{

                return view('index');

            }
            

        }else {

            return redirect(route('login.index'));
            
        }

        
    }

    public function indexNiñosPendientes(){

        if(Auth::user()){ 

            if(Auth::user()->rol_id == 1){

                $resultado = hijo::where('estado',0)->get();                

                return view('baseDatos.ninosPendientes',['resultado'=>$resultado]);

            }else{

                return view('index');

            }
            

        }else {

            return redirect(route('login.index'));
            
        }

        
    }

    public function perfilAdulto($id){

        if(Auth::user()){ 

            if(Auth::user()->rol_id == 1){

                $dato = padre::find($id);
                

                $familias = familia::orderBy('nombre')->get();
                $provincias = provincia::get();
                $distritos = distrito::where('provincia_id',$dato->corregimiento->distrito->provincia->id)->get();
                $corregimientos = corregimiento::where('distrito_id',$dato->corregimiento->distrito->id)->get();
                $paises = pais::orderBy('frecuencia')->orderBy('nombre')->get();
                $ocupaciones = ocupacion::get();
                $estados = estado::get();
                if ($dato->sexo=='M') {
                    $esposos = padre::where('pareja_id',0)->where('sexo','F')->orderBy('nombres')->get();
                } else {
                    $esposos = padre::where('pareja_id',0)->where('sexo','M')->orderBy('nombres')->get();
                }
                
                return view('baseDatos.perfilAdulto',['dato'=>$dato,'estados'=>$estados,'esposos'=>$esposos,'ocupaciones'=>$ocupaciones,'paises'=>$paises,'familias'=>$familias,'provincias'=>$provincias,'distritos'=>$distritos,'corregimientos'=>$corregimientos]);

            }else{

                return view('index');

            }
            

        }else {

            return redirect(route('login.index'));
            
        }
        
        
    }

    public function perfilHijo($id){

        if(Auth::user()){ 

            if(Auth::user()->rol_id == 1){

                $dato = hijo::find($id);
                $familias = familia::orderBy('nombre')->get();
                $provincias = provincia::get();
                $distritos = distrito::where('provincia_id',$dato->corregimiento->distrito->provincia->id)->get();
                $corregimientos = corregimiento::where('distrito_id',$dato->corregimiento->distrito->id)->get();
                $paises = pais::orderBy('frecuencia')->orderBy('nombre')->get();
                $padre = padre::where('sexo','M')->where('estado',1)->orderBy('nombres')->get();
                $madre = padre::where('sexo','F')->where('estado',1)->orderBy('nombres')->get();
                
                $estados = estado::get();
                return view('baseDatos.perfilHijo',['dato'=>$dato,'padre'=>$padre,'madre'=>$madre,'estados'=>$estados,'paises'=>$paises,'familias'=>$familias,'provincias'=>$provincias,'distritos'=>$distritos,'corregimientos'=>$corregimientos]);
            }else{

                return view('index');

            }
            

        }else {

            return redirect(route('login.index'));
            
        }
        
        
    }

    public function indexHijos(){

        if(Auth::user()){ 

            if(Auth::user()->rol_id == 1){

                $resultado = hijo::where('estado',1)->get();

                return view('baseDatos.hijos',['resultado'=>$resultado]);

            }else{

                return view('index');

            }
            

        }else {

            return redirect(route('login.index'));
            
        }

        
    }


    public function guardarArchivo(Request $request){

        if(Auth::user()){ 

            if(Auth::user()->rol_id == 1){

                $file = $request->file('archivo');
                if($file != null){

                    $file_name = now()->toArray()['day'].'_'.now()->toArray()['month'].'_'.mt_rand(1000,10000);
                    $extencion= $file->getClientOriginalExtension();

                    $file_name = $file_name.'.'.$extencion;

                    
                    $path = $file->storeAs('public/archivo/'.now()->toArray()['year'].'/'.now()->toArray()['month'],$file_name,'s3');
                    
                    $padre = padre::find($request->txtId);            
                    $carpeta_id = $padre->carpeta_id;

                
                    if(!$padre->carpeta_id){ 

                        $carpeta_id = baseDatosController::crearCarpeta('padre',$padre->id);
                    }            

                    

                    $obj_archivo = new archivo();          
                    $obj_archivo->url = env('AWS_URL').$path;
                    $obj_archivo->descripcion = $request->txtDescripcion;
                    $obj_archivo->carpeta_id = $carpeta_id;
                    $obj_archivo->save();

                    
                    
                    return redirect()->back()->withErrors(['success' => "Se a Guardado el archivo correctamente"]);

                    
                }
                

                return redirect()->back()->withErrors(['danger' => "Algo salio mal"]);

            }else{

                return view('index');

            }
            

        }else {

            return redirect(route('login.index'));
            
        }        

    }

    public function asignarFamilia(Request $request){

        if(Auth::user()){ 

            if(Auth::user()->rol_id == 1){

                $padre = padre::find($request->txtId);
                $padre->familia_id = $request->txtFamilia;
                $padre->save();

                
                    
                return redirect()->back()->withErrors(['success' => "Se asigno Correctamente a la Familia"]);

            }else{

                return view('index');

            }
            

        }else {

            return redirect(route('login.index'));
            
        }

    }


    public function perfilFamilia(Request $request){

        $familia = familia::find($request->id);
        return $familia;

    }
    

    public function editarContactoPadre(Request $request){

        if(Auth::user()){ 

            if(Auth::user()->rol_id == 1){

                $dato = padre::find($request->txtId);

                $dato->telefono = $request->txtTelefono;
                $dato->email = $request->txtEmail;
                $dato->corregimiento_id = $request->corregimiento_id;
                $dato->direccion = $request->txtDireccion;
                $dato->pasaporte = $request->txtPasaporte;
                $dato->save();

                return redirect()->back()->withErrors(['success' => "Se guardo correctamente"]);

            }else{

                return view('index');

            }
            

        }else {

            return redirect(route('login.index'));
            
        }
    } 
    
    public function editarInformacionPadre(Request $request){

        if(Auth::user()){ 

            if(Auth::user()->rol_id == 1){

                if ($request->ocupacion_id == 0) {
                    $ocupacion = new ocupacion();
                    $ocupacion->nombre = $request->txtOcupacion;
                    $ocupacion->save();
                }else{

                    $ocupacion = ocupacion::find($request->ocupacion_id);
                }

                $dato = padre::find($request->txtId);
                
                $dato->comentario = $request->txtComentario;
                $dato->fecha_nacimiento = $request->txtNacimiento;
                $dato->pais_id = $request->pais_id;
                $dato->ocupacion_id = $ocupacion->id;
                $dato->nivel_academico = $request->nivel_academico;
                $dato->situacion_laboral = $request->estatus_laboral;
                $dato->ingreso_mensual = $request->txtIngreso;
                $dato->save();

                return redirect()->back()->withErrors(['success' => "Se guardo correctamente"]);

            }else{

                return view('index');

            }
            

        }else {

            return redirect(route('login.index'));
            
        }
    }

    public function asignarEsposa(Request $request){

        if(Auth::user()){ 

            if(Auth::user()->rol_id == 1){

                $esposo = padre::find($request->txtId);
                $esposo->pareja_id = $request->txtEsposa;
                $esposo->save();

                $esposa = padre::find($esposo->pareja_id);
                $esposa->pareja_id = $esposo->id;
                $esposa->save();

                return redirect()->back()->withErrors(['success' => "Se guardo correctamente"]);

            }else{

                return view('index');

            }
            

        }else {

            return redirect(route('login.index'));
            
        }
    }

    public function cambiarImagenPerfilP(Request $request){

        if(Auth::user()){ 

            if(Auth::user()->rol_id == 1){

                $file = $request->file('imagen');
                if($file != null){

                    $file_name = now()->toArray()['day'].'_'.now()->toArray()['month'].'_'.mt_rand(1000,10000);
                    $extencion= $file->getClientOriginalExtension();

                    $file_name = $file_name.'.'.$extencion;

                    
                    $path = $file->storeAs('public/imagenPerfil/'.now()->toArray()['year'].'/'.now()->toArray()['month'],$file_name,'s3');
                    
                    $padre = padre::find($request->txtId);  

                    $padre->imagen_url = env('AWS_URL').$path;     
                 
                    $padre->save();

                    
                    
                    return redirect()->back()->withErrors(['success' => "Se actualizo la imagen de perfil correctamente"]);
                }else{

                    return redirect()->back()->withErrors(['danger' => "Upss.. Algo salio Mal"]);
                }

            }else{

                return view('index');

            }
        

        }else {

            return redirect(route('login.index'));
            
        }
        
    }

    public function activarPerfilAdulto($id){

        if(Auth::user()){ 

            if(Auth::user()->rol_id == 1){

                $padre = padre::find($id);
                $padre->estado = 1;
                $padre->save();

                return redirect()->back()->withErrors(['success' => "Se activo el perfil correctamente"]);

            }else{

                return view('index');

            }
            

        }else {

            return redirect(route('login.index'));
            
        }

        
    }

    public function activarPerfilHijo($id){

        if(Auth::user()){ 

            if(Auth::user()->rol_id == 1){

                $padre = hijo::find($id);
                $padre->estado = 1;
                $padre->save();

                return redirect()->back()->withErrors(['success' => "Se activo el perfil correctamente"]);

            }else{

                return view('index');

            }
            

        }else {

            return redirect(route('login.index'));
            
        }

        
    }

    public function verPerfilHijo($id){

        if(Auth::user()){ 

            if(Auth::user()->rol_id == 1){                
                
                             
                
                $notificaciones = notification::where('notifiable_id',Auth::user()->id)->where('type','App\Notifications\nuevoUsuario')->get();

                foreach ($notificaciones as $notificacion) {
                    
                    $data = json_decode($notificacion->data, true);
                    $tipo = $data['tipo'];
                    $data_id = $data['id'];
                  

                    if( $tipo == 'hijo'  ){  
                                            
                        if($data_id == $id){ 

                            $notificacion->delete();                        
                            return redirect(route('perfil.hijo',['id'=>$data_id]));
                        }
                        
                    }

                }

                
                

            }else{

                return view('index');

            }
            

        }else {

            return redirect(route('login.index'));
            
        }
        

    }

    public function verPerfilAdulto($id){

        if(Auth::user()){ 

            if(Auth::user()->rol_id == 1){               
                
                             
                
                $notificaciones = notification::where('notifiable_id',Auth::user()->id)->where('type','App\Notifications\nuevoUsuario')->get();

                foreach ($notificaciones as $notificacion) {
                    
                    $data = json_decode($notificacion->data, true);
                    $tipo = $data['tipo'];
                    $data_id = $data['id'];
                  

                    if( $tipo == 'padre' ){  
                                            
                        if($data_id == $id){ 

                            $notificacion->delete();                        
                            return redirect(route('perfil.adulto',['id'=>$data_id]));
                        }
                        
                    }

                }

                
                

            }else{

                return view('index');

            }
            

        }else {

            return redirect(route('login.index'));
            
        }
        

    }
    public function eliminarPerfilAdulto($id){

        if(Auth::user()){ 

            if(Auth::user()->rol_id == 1){

                $padre = padre::find($id);

               
                foreach ($padre->hijos as $padreHijo) {
                    
                    $hijo = hijo::find($padreHijo->hijo_id);
                    $hijo->delete();                   

                }

                DB::table('padre_hijo')->where('padre_id', '=', $padre->id)->delete();

                $padre->delete();

                return redirect(route('adultos.pendientes.index'))->withErrors(['danger' => "Se elimino correctamente el perfil"]);

            }else{

                return view('index');

            }
            

        }else {

            return redirect(route('login.index'));
            
        }
    }

    public function editarContactoHijo(Request $request){

        if(Auth::user()){ 

            if(Auth::user()->rol_id == 1){

                $dato = hijo::find($request->txtId);

                $dato->telefono = $request->txtTelefono;
                $dato->email = $request->txtEmail;
                $dato->corregimiento_id = $request->corregimiento_id;
                $dato->direccion = $request->txtDireccion;
                $dato->pasaporte = $request->txtPasaporte;
                $dato->save();

                return redirect()->back()->withErrors(['success' => "Se guardo correctamente"]);

            }else{

                return view('index');

            }
            

        }else {

            return redirect(route('login.index'));
            
        }
    } 

    

    public function editarInformacionHijo(Request $request){

        if(Auth::user()){ 

            if(Auth::user()->rol_id == 1){
                // return $request;

                $dato = hijo::find($request->txtId);
                
                $dato->comentario = $request->txtComentario;
                $dato->fecha_nacimiento = $request->txtNacimiento;
                $dato->pais_id = $request->pais_id;
                $dato->nivel_academico = $request->nivel_academico;
                $dato->save();

                return redirect()->back()->withErrors(['success' => "Se guardo correctamente"]);

            }else{

                return view('index');

            }
            

        }else {

            return redirect(route('login.index'));
            
        }
    }

    public function asignarFamiliaHijo(Request $request){

        if(Auth::user()){ 

            if(Auth::user()->rol_id == 1){

                $padre = hijo::find($request->txtId);
                // $padre->familia_id = $request->txtFamilia;
                $padre->save();

                
                    
                return redirect()->back()->withErrors(['success' => "Se asigno Correctamente a la Familia"]);

            }else{

                return view('index');

            }
            

        }else {

            return redirect(route('login.index'));
            
        }

    }

    public function eliminarPerfilHijo($id){

        if(Auth::user()){ 

            if(Auth::user()->rol_id == 1){

                $padre = hijo::find($id);

                DB::table('padre_hijo')->where('hijo_id', '=', $padre->id)->delete();

                $padre->delete();

                return redirect(route('hijos.index'))->withErrors(['danger' => "Se elimino correctamente el perfil"]);

            }else{

                return view('index');

            }
            

        }else {

            return redirect(route('login.index'));
            
        }
    }

    public function asignarPadre(Request $request){

        if(Auth::user()){ 

            if(Auth::user()->rol_id == 1){
                // return $request;
                $padre_hijo = new padreHijo(); 
                $padre_hijo->padre_id = $request->txtPadre;
                $padre_hijo->hijo_id = $request->txtId;
                $padre_hijo->parentesco = 1;
                $padre_hijo->save();
                return redirect()->back()->withErrors(['success' => "Se guardo correctamente"]);

            }else{

                return view('index');

            }
            

        }else {

            return redirect(route('login.index'));
            
        }
    }
    public function asignarMadre(Request $request){

        if(Auth::user()){ 

            if(Auth::user()->rol_id == 1){
                // return $request;
                $padre_hijo = new padreHijo(); 
                $padre_hijo->padre_id = $request->txtPadre;
                $padre_hijo->hijo_id = $request->txtId;
                $padre_hijo->parentesco = 2;
                $padre_hijo->save();
                return redirect()->back()->withErrors(['success' => "Se guardo correctamente"]);

            }else{

                return view('index');

            }
            

        }else {

            return redirect(route('login.index'));
            
        }
    }

   

    public function guardarArchivoHijo(Request $request){

        if(Auth::user()){ 

            if(Auth::user()->rol_id == 1){

                $file = $request->file('archivo');
                if($file != null){

                    $file_name = now()->toArray()['day'].'_'.now()->toArray()['month'].'_'.mt_rand(1000,10000);
                    $extencion= $file->getClientOriginalExtension();

                    $file_name = $file_name.'.'.$extencion;

                    
                    $path = $file->storeAs('public/archivo/'.now()->toArray()['year'].'/'.now()->toArray()['month'],$file_name,'s3');
                    
                    $hijo = hijo::find($request->txtId);            
                    $carpeta_id = $hijo->carpeta_id;

                
                    if(!$hijo->carpeta_id){ 

                    $carpeta_id = Controller::crearCarpeta('hijo',$hijo->id);
                    }            

                    

                    $obj_archivo = new archivo();          
                    $obj_archivo->url = env('AWS_URL').$path;
                    $obj_archivo->descripcion = $request->txtDescripcion;
                    $obj_archivo->carpeta_id = $carpeta_id;
                    $obj_archivo->save();

                    
                    
                    return redirect()->back()->withErrors(['success' => "Se a Guardado el archivo correctamente"]);

                    
                }
                

                return redirect()->back()->withErrors(['danger' => "Algo salio mal"]);

            }else{

                return view('index');

            }
            

        }else {

            return redirect(route('login.index'));
            
        }        

    }


    public function guardarSeguimiento(Request $request){

        if(Auth::user()){ 

            if(Auth::user()->rol_id == 1){

                
                if($request->txtTipo == 'padre'){

                    $usuario = padre::find($request->txtId);

                }else{

                    $usuario = hijo::find($request->txtId);
                }

                if($usuario->carpeta_id == null) {

                    $carpeta_id = baseDatosController::crearCarpeta($request->txtTipo,$usuario->id);

                }else{

                    $carpeta_id = $usuario->carpeta_id;

                }

                $obj_seguimiento = new seguimiento();

                $obj_seguimiento->mensaje = $request->txtComentario ;
                $obj_seguimiento->tipo_id = $request->txtEstado;
                $obj_seguimiento->carpeta_id = $carpeta_id;
                $obj_seguimiento->comentario_id = $request->txtAyuda;
                $obj_seguimiento->created_at = $request->txtFecha;
                $obj_seguimiento->save();

                return redirect()->back();
                

            }else{

                return view('index');

            }
            

        }else {

            return redirect(route('login.index'));
            
        }

    }

    public static function crearCarpeta($tipo,$id){


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

    public function crearPerfilAdulto()  {

        if(Auth::user()){ 

            if(Auth::user()->rol_id == 1){

                $estados = estado::get();
                $pais = pais::get();
                $provincia = provincia::get();
                $ocupacion = ocupacion::get();
                
                return view('baseDatos.crearPerfilAdulto',['estados'=>$estados,
                                                            'pais'=>$pais,
                                                            'pais2'=>$pais,
                                                            'provincia'=>$provincia,
                                                            'ocupacion' => $ocupacion
                                                        ]);
               
                

            }else{

                return view('index');

            }
            

        }else {

            return redirect(route('login.index'));
            
        }

    }

    public function bloquearPerfilAdulto($id){

        if(Auth::user()){ 

            if(Auth::user()->rol_id == 1){

                $padre = padre::find($id);
                $padre->estado = 2;
                $padre->save();

                return redirect(route('adultos.index'))->withErrors(['success' => "Se bloqueo correctamente el usuario"]);
               
                

            }else{

                return view('index');

            }
            

        }else {

            return redirect(route('login.index'));
            
        }

    }

    public function cambiarNombrePerfil(Request $request){

        if(Auth::user()){ 

            if(Auth::user()->rol_id == 1){

                $usuario = hijo::find($request->txtId);
         
                $usuario->nombres = ucwords(strtolower($request->txtNombres));
                $usuario->apellidos = ucwords(strtolower( $request->txtApellidos));
                $usuario->save();

                return redirect()->back()->withErrors(['success' => "Se actualizo el nombre"]);

            }else{

                return view('index');

            }
            

        }else {

            return redirect(route('login.index'));
            
        }
    }



}
