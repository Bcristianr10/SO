<?php

namespace App\Http\Controllers;

use App\Models\padre;
use App\Models\hijo;
use App\Models\carpeta;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Models\pais;
use App\Models\provincia;
use App\Models\distrito;
use App\Models\corregimiento;
use App\Models\ocupacion;
use App\Models\estado;
use App\Models\mensaje;
use App\Models\padreHijo;
use App\Models\visita;
use App\Models\User;
use App\Notifications\nuevoMensaje;
use App\Notifications\nuevoUsuario;
use App\Mail\notificationsMailable;

use Session;
use Carbon\Carbon;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index(){

        
        Controller::validarVisita();

        return view('home');
            
     
        
    }
    
    public function aboutUs(){


        Controller::validarVisita();
        return view('about');
            
     
        
    }
    
    public function contact(){

        Controller::validarVisita();
        
        return view('contact');
            
     
        
    }

    public function inicio(){

        if(Auth::user()){ 

            

            return view('index');
            
            

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
        
    public function form(){
        $pais = pais::orderBy('frecuencia','desc')->orderBy('nombre')->get();
        $provincia = provincia::get();
        $ocupacion = ocupacion::get();
        $estados = estado::get();
        
        
        
        return view('forms.formIngreso',['pais'=>$pais,'pais2'=>$pais,'provincia'=>$provincia,'ocupacion'=>$ocupacion,'estados'=>$estados]);
    }
    public function distrito($id){
        $distrito = distrito::where('provincia_id',$id)->get();
        return $distrito;
        
    }
    public function corregimiento($id){
        $corregimiento = corregimiento::where('distrito_id',$id)->get();
        return $corregimiento;
        
    }
    public function noPasaporte($id){
        $noPasaporte = padre::where('pasaporte',$id)->count();
        return $noPasaporte;
        
    }

    public function insert(Request $request){
        // return $request;
        
        $existe = padre::where('pasaporte',$request->txtPrincipal__Pasaporte)->count();    
        if($existe == 1){
            return back()->withInput()->withErrors(['error' => "La persona con No. de Pasaporte: $request->txtPrincipal__Pasaporte, ya se encuentra inscrita." ]); 
        }else{

            if($request->txtPrincipal__EstatusMigratorio == 0){
                $EstatusMigratorio = $request->txtPrincipal__EstatusMigratorio__Otro;
                
            }else{
                $EstatusMigratorio = $request->txtPrincipal__EstatusMigratorio;
            }


            if($request->txtPrincipal__SituacionLaboral == 0){
                $SituacionLaboral = $request->txtPrincipal__SituacionLaboral__Otro;
                
            }else{
                $SituacionLaboral = $request->txtPrincipal__SituacionLaboral;
            }

            if($request->txtPrincipal__Ocupacion == 0){
                $Ocupacion = $request->txtPrincipal__Ocupacion__Otro;
                
            }else{
                $Ocupacion = $request->txtPrincipal__Ocupacion;
            }

            if($request->txtPrincipal__Instruccion == 0){
                $Instruccion = $request->txtPrincipal__Instruccion__Otro;
                
            }else{
                $Instruccion = $request->txtPrincipal__Instruccion;
            }



            if( $padre = padre::where('pasaporte',$request->txtPrincipal__PasaporteConyuge)->count() == 1){
                $pasaporte_conyuge = padre::where('pasaporte',$request->txtPrincipal__PasaporteConyuge)->first('id');
                $id_pareja = $pasaporte_conyuge->id;

            }else{
                $id_pareja = 0;
            }
            


            $obj__form = new padre();
            $obj__form->nombres =ucwords(strtolower($request->txtPrincipal__Nombre));
            $obj__form->apellidos=ucwords(strtolower($request->txtPrincipal__Apellido));
            $obj__form->email=$request->txtPrincipal__Email;
            $obj__form->fecha_nacimiento=$request->txtPrincipal__FechaNacimiento;
            $obj__form->pais_id=$request->txtPrincipal__Pais;
            $obj__form->pasaporte=$request->txtPrincipal__Pasaporte;
            $obj__form->sexo=$request->txtPrincipal__Sexo;

            $obj__form->estado_migratorio=$EstatusMigratorio;

            $obj__form->estado_civil=$request->txtPrincipal__Estado;

            $obj__form->corregimiento_id=$request->txtPrincipal__Corregimiento;
            $obj__form->direccion=$request->txtPrincipal__Direccion;
            $obj__form->telefono=$request->txtPrincipal__Telefono;

            $obj__form->nivel_academico=$Instruccion;

            $obj__form->ocupacion_id=$request->txtPrincipal__Ocupacion;

            $obj__form->ingreso_mensual=$request->txtPrincipal__Ingreso;

            $obj__form->situacion_laboral=$SituacionLaboral;

            $obj__form->comentario=$request->txtPrincipal__Comentario;
            $obj__form->save();

            $pais = pais::find($obj__form->pais_id);
            $pais->frecuencia = $pais->frecuencia+1;
            $pais->save();


            if($request->txtHijo__Cantidad == null || $request->txtHijo__Cantidad == 0){
                return redirect (route('gracias')); 
            }else{



                for ($i = 0; $i <$request->txtHijo__Cantidad; $i++) {

                    if($request->txtHijo__EstatusMigratorio[$i]==0){
                        $hijoMigra = $request->txtHijo__EstatusMigratorio__Otro[$i];
                    }else{
                        $hijoMigra = $request->txtHijo__EstatusMigratorio[$i];
                    }
                    if($request->txtHijo__Instruccion[$i]==0){
                        $hijoInstruccion = $request->txtHijo__Instruccion__otro[$i];
                    }else{
                        $hijoInstruccion = $request->txtHijo__Instruccion[$i];
                    }

                    $obj__hijo = new hijo();
                    $obj__hijo->nombres =$request->txtHijo__Nombre[$i];
                    $obj__hijo->apellidos=$request->txtHijo__Apellido[$i];
                    $obj__hijo->email=$request->txtHijo__Email[$i];
                    $obj__hijo->fecha_nacimiento=$request->txtHijo__FechaNacimiento[$i];
                    $obj__hijo->pais_id=$request->txtHijo__Pais[$i];
                    $obj__hijo->pasaporte=$request->txtHijo__Pasaporte[$i];
                    $obj__hijo->sexo=$request->txtHijo__Sexo[$i];
                    $obj__hijo->estado_migratorio=$hijoMigra;
                    $obj__hijo->nivel_academico=$hijoInstruccion;
                    $obj__hijo->corregimiento_id=$request->txtPrincipal__Corregimiento;
                    $obj__hijo->direccion=$request->txtPrincipal__Direccion;
                    $obj__hijo->telefono="Null";
                    $obj__hijo->comentario="Null";
                    
                    $obj__hijo->save();
                     
                    $obj_padreHijo =  new padreHijo();
                    
                    $obj_padreHijo->padre_id = $obj__form->id;
                    $obj_padreHijo->hijo_id = $obj_hijo->id;

                    if($obj__form->sexo =='M'){
                        $obj_padreHijo->parentesco = 1;
                    }else{
                        $obj_padreHijo->parentesco = 2;
                    }

                    $obj_padreHijo->save();
                    
                    
                    
                }

            }


            
            
        }


    }

    public function mensajeSave(Request $request){

        if (str_contains($request->txtEmail, 'no-reply')){
            
            return redirect(route('index'));

        }

        $obj_mensaje = new mensaje();
        $obj_mensaje->nombre = $request->txtNombre;
        $obj_mensaje->email = $request->txtEmail;
        $obj_mensaje->telefono = $request->txtTelefono;
        $obj_mensaje->mensaje = $request->txtMensaje;
        $obj_mensaje->save();

        //Enviar notificacionea a usuarios
        $notificacion['nombre'] = $obj_mensaje->nombre;
        $notificacion['id'] = $obj_mensaje->id;
        
        
        
        user::where('rol_id',1)                            
                ->each(function(user $user) use ($notificacion){
                    $user->notify(new nuevoMensaje($notificacion));
                });

        return redirect(route('index'));

        
    }

    
    public function gracias(){
        return view('gracias');
    }


    public function formHijo(){
        $pais = pais::orderBy('frecuencia','desc')->orderBy('nombre')->get();
        $provincia = provincia::get();
        $ocupacion = ocupacion::get();
        $estados = estado::get();
        
        
        
        return view('forms.formIngresoHijo',['pais'=>$pais,'pais2'=>$pais,'provincia'=>$provincia,'ocupacion'=>$ocupacion,'estados'=>$estados]);
    }
    public function noPasaporteHijo($id){
        $noPasaporteHijo = hijo::where('pasaporte',$id)->count();
        return $noPasaporteHijo;
        
    }

    public function insertHijo(Request $request){
        // return $request;
        

        if(substr($request->txtPrincipal__Telefono,0,1) == "6" && strlen($request->txtPrincipal__Telefono) == "8" || strlen($request->txtPrincipal__Telefono) == "9" && substr($request->txtPrincipal__Telefono,4,1) == "-" || substr($request->txtPrincipal__Telefono,0,3) == "507" || substr($request->txtPrincipal__Telefono,0,4) == "+507" || $request->txtPrincipal__Telefono == ""){


        $existe = hijo::where('pasaporte',$request->txtPrincipal__Pasaporte)->count();    
        if($existe == 1){
            return back()->withInput()->withErrors(['error' => "La persona con No. de Pasaporte: $request->txtPrincipal__Pasaporte, ya se encuentra inscrita." ]); 
        }else{
            // return "hola";
            if($request->txtPrincipal__EstatusMigratorio == 0){
                $EstatusMigratorio = $request->txtPrincipal__EstatusMigratorio__Otro;
                
            }else{
                $EstatusMigratorio = $request->txtPrincipal__EstatusMigratorio;
            }
            if($request->txtPrincipal__Instruccion == 0){
                $Instruccion = $request->txtPrincipal__Instruccion__Otro;
                
            }else{
                $Instruccion = $request->txtPrincipal__Instruccion;
            }


            $obj__formHijo = new hijo();
            $obj__formHijo->nombres =ucwords(strtolower($request->txtPrincipal__Nombre));
            $obj__formHijo->apellidos=ucwords(strtolower($request->txtPrincipal__Apellido));         
            $obj__formHijo->email=$request->txtPrincipal__Email;
            $obj__formHijo->fecha_nacimiento=$request->txtPrincipal__FechaNacimiento;
            $obj__formHijo->pais_id=$request->txtPrincipal__Pais;
            $obj__formHijo->pasaporte=$request->txtPrincipal__Pasaporte;
            $obj__formHijo->sexo=$request->txtPrincipal__Sexo;

            $obj__formHijo->estado_migratorio=$request->txtPrincipal__EstatusMigratorio;

            

            $obj__formHijo->corregimiento_id=$request->txtPrincipal__Corregimiento;
            $obj__formHijo->direccion=$request->txtPrincipal__Direccion;
            $obj__formHijo->telefono=$request->txtPrincipal__Telefono;

            $obj__formHijo->nivel_academico=$request->txtPrincipal__Instruccion;

            $obj__formHijo->comentario = 'Persona Responsable: '.$request->txtPersonaResponsable;
            $obj__formHijo->comentario .= '<br> Parentesco: '.$request->txtParentesco;
            $obj__formHijo->comentario .= '<br>';
            $obj__formHijo->comentario .= $request->txtPrincipal__Comentario;
            $obj__formHijo->save();

            $pais = pais::find($obj__formHijo->pais_id);
            $pais->frecuencia = $pais->frecuencia+1;
            $pais->save();
                //Enviar notificacionea a usuarios
            $notificacion['nombre'] = $obj__formHijo->nombres.' '.$obj__formHijo->apellidos;
            $notificacion['mensaje'] = 'Este Niño se acaba de registrar';
            $notificacion['id'] = $obj__formHijo->id;
            $notificacion['tipo'] = 'hijo';
                
                
                
            user::where('rol_id',1)                            
                ->each(function(user $user) use ($notificacion){
                    $user->notify(new nuevoUsuario($notificacion));
                });

            return redirect (route('gracias'));
        }
    }else{
        return back()->withInput()->withErrors(['error' => "Número de teléfono invalido" ]); 
    }

    }

    public function enviarCorreo($id){

        $hijo = hijo::find($id);
        
        

        $users = User::where('rol_id',1)->where('id','>',3)->get();        
      
        foreach ($users as $user) {

            $correo = new notificationsMailable($user,$hijo,'padre');
        

            Mail::to($user->email)->send($correo);
        }



        

        return 'se envio el correo';
    }

    public static function validarVisita(){

        $id = Session::getId();

        $existe = visita::find($id);

        if (!isset($existe)) {
        
            $hoy = Carbon::now();

            
            $numero = $hoy->format('m');
            $ano = $hoy->format('Y');

            $obj_visita = new visita();
            $obj_visita->id = $id;
            $obj_visita->mes = $numero;
            $obj_visita->ano = $ano;
           

            $obj_visita->save();       

            
            
        }
         

    }

  
}
