<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\blog;
use App\Models\fotoBlog;

class blogController extends Controller
{
    public function index(){

               

        $resultado = blog::orderBy('fecha','DESC')->paginate(6);
       
        return view('blog',['resultado'=>$resultado]);
    }

    public function detalle($id){

        $resultado = blog::where('slug', $id)->firstOrFail();
        
        return view('detalle',['resultado'=>$resultado]);
    }

    public function planes($id){

        return view('planes',['plan'=>$id]);

    }
    public function indexBlog(){

        $resultado = blog::get();
        
        return view('blog.index',['resultado'=>$resultado]);
    }

    public function create(){        
        
        return view('blog.createx');
    }

    public function create2($id){
        
        return view('blog.create2',['id'=>$id]);
    }

    public function create3($id){
        
        return view('blog.create3',['id'=>$id]);
    }

    public function insert(Request $request){
        
        if(Auth::user()){ 

            if(Auth::user()->rol_id == 1){

                

                $file = $request->file('archivo');                
                if($file != null){

                    $obj_blog = new blog();
                    $obj_blog->titulo_1 = $request->txtTitulo1;
                    $obj_blog->slug = Str::slug($obj_blog->titulo_1,'_');     
                    $obj_blog->resena = $request->txtResena;          
                    $obj_blog->comentario = $request->comentario;  
                    $obj_blog->texto_1 = $request->textoUno;                               
                              
                    $obj_blog->escritor = $request->escritor;          
                    $obj_blog->programa = str_replace(" ", "_", $request->txtPrograma);
                    $obj_blog->fecha = $request->txtFecha; 

                    $obj_blog->save(); 

                    $id = $obj_blog->id;

                    $file_name = now()->toArray()['day'].'_'.now()->toArray()['month'].'_'.mt_rand(1000,10000);
                    $extencion= $file->getClientOriginalExtension();
                    $file_name = $file_name.'.'.$extencion;
                    $path = $file->storeAs('public/imagen/blog/'.now()->toArray()['year'].'/'.now()->toArray()['month'],$file_name,'s3');     

                    $obj_fotoBlog = new fotoBlog();
                    $obj_fotoBlog->tipo = 1;
                    $obj_fotoBlog->ruta = env('AWS_URL').$path;
                    $obj_fotoBlog->blog_id = $id;
                    $obj_fotoBlog->save();

                    return redirect(route('adminBlog.create2',['id'=>$obj_blog->id]));
                    
                 
                }else{

                    return redirect()->back()->withErrors(['danger' => "Algo salio mal"]);

                }
               
                    
                //     



                    
                    
                //     return redirect(route('adminBlog.index'))->withErrors(['success' => "Se a Guardado el blog correctamente"]);

                    
               
                

                // 

            }else{

                return view('index');

            }
            

        }else {

            return redirect(route('login.index'));
            
        }   

    }

    public function insert2(Request $request){

        if(Auth::user()){ 

            if(Auth::user()->rol_id == 1){

               
                
                $files = $request->file('imagenes');                
                if($files != null){
                    
                    $obj_blog = blog::find($request->txtId);
                    $obj_blog->titulo_2 = $request->txtTitulo2;  
                    $obj_blog->texto_2 = $request->textoDos;
                    
                    $obj_blog->save();  

                    $id = $obj_blog->id;

                   
                    
                    foreach($files as $key => $file){

                        
                        
                        $file_name = now()->toArray()['day'].'_'.now()->toArray()['month'].'_'.mt_rand(1000,10000);
                        $extencion= $file->getClientOriginalExtension();
                        $file_name = $file_name.'.'.$extencion;
                        $path = $file->storeAs('public/imagen/blog/'.now()->toArray()['year'].'/'.now()->toArray()['month'],$file_name,'s3');     

                        $obj_fotoBlog = new fotoBlog();
                        $obj_fotoBlog->tipo = 2;
                        $obj_fotoBlog->ruta = env('AWS_URL').$path;
                        $obj_fotoBlog->blog_id = $id;
                        $obj_fotoBlog->save();
                        
                    }

                    return redirect(route('adminBlog.create3',['id'=>$obj_blog->id]));

                }else{

                   

                    return redirect()->back()->withErrors(['danger' => "Algo salio mal"]);

                }

                
            }else{

                return view('index');
            }
        }else {

            return redirect(route('login.index'));
            
        }
    }
        
    public function insert3(Request $request){

        if(Auth::user()){ 

            if(Auth::user()->rol_id == 1){
                   
                        
                $obj_blog = blog::find($request->txtId);
                $obj_blog->titulo_3 = $request->txtTitulo3;    
                $obj_blog->texto_3 = $request->textoTres;

                $obj_blog->save();
                        
    
                return redirect(route('adminBlog.index'));
    
                    
    
                    
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

                $resultado = blog::find($id);
                $fotoBlog = fotoBlog::where('blog_id',$id)->get();
                $blogID = $id;


                // return $fotoBlog;
                return view('blog.update',['resultado'=>$resultado,'fotoBlog'=>$fotoBlog,'blogID'=>$blogID]);
            }else{

                return view('index');
            }
        }else {

            return redirect(route('login.index'));
            
        } 

    }

    public function update2($id){

        if(Auth::user()){ 

            if(Auth::user()->rol_id == 1){

                $resultado = blog::find($id);              


                
                return view('blog.update2',['resultado'=>$resultado]);
            }else{

                return view('index');
            }
        }else {

            return redirect(route('login.index'));
            
        } 

    }
    public function update3($id){

        if(Auth::user()){ 

            if(Auth::user()->rol_id == 1){

                $resultado = blog::find($id);              


                
                return view('blog.update3',['resultado'=>$resultado]);
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

                

                

                $obj_blog = blog::find($request->txtId);
                $obj_blog->titulo_1 = $request->txtTitulo1; 
                $obj_blog->slug = Str::slug($obj_blog->titulo_1,'_');     
                $obj_blog->resena = $request->txtResena;          
                $obj_blog->comentario = $request->comentario;  
                $obj_blog->texto_1 = $request->textoUno;                              
                            
                $obj_blog->escritor = $request->escritor; 
                if(isset($request->txtPrograma)){
                    $obj_blog->programa = str_replace(" ", "_", $request->txtPrograma);
                } 
                $obj_blog->fecha = $request->txtFecha; 

                $obj_blog->save(); 

                $file = $request->file('archivo');                
                if($file != null){

                    $file_name = now()->toArray()['day'].'_'.now()->toArray()['month'].'_'.mt_rand(1000,10000);
                    $extencion= $file->getClientOriginalExtension();
                    $file_name = $file_name.'.'.$extencion;
                    $path = $file->storeAs('public/imagen/blog/'.now()->toArray()['year'].'/'.now()->toArray()['month'],$file_name,'s3');                                                        
                    
                    $obj_fotoBlog = new fotoBlog();
                    $obj_fotoBlog->tipo = 1;
                    $obj_fotoBlog->ruta = env('AWS_URL').$path;
                    $obj_fotoBlog->blog_id = $obj_blog->id;
                    $obj_fotoBlog->save();

                    
                }

                

                return redirect(route('adminBlog.update2',['id'=>$obj_blog->id]));
                

                

                

            }else{

                return view('index');

            }
            

        }else {

            return redirect(route('login.index'));
            
        }   

    }

    public function save2(Request $request){
        
        if(Auth::user()){ 

            if(Auth::user()->rol_id == 1){

                

                $obj_blog = blog::find($request->txtId);
                $obj_blog->titulo_2 = $request->txtTitulo2;  
                $obj_blog->texto_2 = $request->textoDos;
                
                $obj_blog->save();  

                $id = $obj_blog->id;

               
                $files = $request->file('imagenes');                
                if($files != null){
                    foreach($files as $key => $file){

                        
                        
                        $file_name = now()->toArray()['day'].'_'.now()->toArray()['month'].'_'.mt_rand(1000,10000);
                        $extencion= $file->getClientOriginalExtension();
                        $file_name = $file_name.'.'.$extencion;
                        $path = $file->storeAs('public/imagen/blog/'.now()->toArray()['year'].'/'.now()->toArray()['month'],$file_name,'s3');     

                        $obj_fotoBlog = new fotoBlog();
                        $obj_fotoBlog->tipo = 2;
                        $obj_fotoBlog->ruta = env('AWS_URL').$path;
                        $obj_fotoBlog->blog_id = $id;
                        $obj_fotoBlog->save();
                        
                    }
                }

                

                return redirect(route('adminBlog.update3',['id'=>$obj_blog->id]));
                

                

               

            }else{

                return view('index');

            }
            

        }else {

            return redirect(route('login.index'));
            
        }   

    }


    public function deleteImage($id,$idB){

        if(Auth::user()){ 

            if(Auth::user()->rol_id == 1){


                
                
                $obj_fotoBlog = fotoBlog::find($id);
                $obj_fotoBlog->delete();
                

                return redirect(route('adminBlog.update',['id'=>$idB]));
                


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


                
                $obj_fotoBlog = fotoBlog::where('blog_id',$id)->get();
                
                foreach($obj_fotoBlog as $obj_fotoBlog){
                    $obj_fotoBlog2 = fotoBlog::find($obj_fotoBlog->id);
                    $obj_fotoBlog2->delete();
                }
                $obj_blog = blog::find($id);
                $obj_blog->delete();


                

                return redirect(route('adminBlog.index'))->withErrors(['success' => "Se a elimiado el blog correctamente"]);
                


            }else{

                return view('index');

            }
            

        }else {

            return redirect(route('login.index'));
            
        } 

    }

}
