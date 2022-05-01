<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\blog;
use App\Models\fotoBlog;

class blogController extends Controller
{
    public function index(){

        $resultado = blog::paginate(6);
       
        return view('blog',['resultado'=>$resultado]);
    }

    public function detalle($id){

        $resultado = blog::find($id);
        
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
        return view('blog.create');
    }

    public function insert(Request $request){
        
        if(Auth::user()){ 

            if(Auth::user()->rol_id == 1){

                // $file2 = $request->file('imagenes');
                // $file = $request->file('archivo'); 
                // return $file2[0];

                $file = $request->file('archivo');                
                if($file != null){

                    $file_name = now()->toArray()['day'].'_'.now()->toArray()['month'].'_'.mt_rand(1000,10000);
                    $extencion= $file->getClientOriginalExtension();
                    $file_name = $file_name.'.'.$extencion;
                    $path = $file->storeAs('public/imagen/blog/'.now()->toArray()['year'].'/'.now()->toArray()['month'],$file_name,'s3');                                                        
                    
                    $obj_blog = new blog();
                    $obj_blog->titulo_1 = $request->txtTitulo1;          
                    $obj_blog->titulo_2 = $request->txtTitulo2;          
                    $obj_blog->titulo_3 = $request->txtTitulo3;          
                    $obj_blog->resena = $request->resena;          
                    $obj_blog->comentario = $request->comentario;  
                    $obj_blog->texto_1 = $request->textoUno;  
                    $obj_blog->texto_2 = $request->textoDos;          
                    $obj_blog->texto_3 = $request->textoTres;          
                    $obj_blog->escritor = $request->escritor;          
                    $obj_blog->programa = $request->programa; 
                    $obj_blog->fecha = date('Y-m-d'); 

                    $obj_blog->save();                    
                    $id = $obj_blog->id;

                    $obj_fotoBlog = new fotoBlog();
                    $obj_fotoBlog->tipo = 1;
                    $obj_fotoBlog->ruta = env('AWS_URL').$path;
                    $obj_fotoBlog->blog_id = $id;
                    $obj_fotoBlog->save();
                    
                    $file2 = $request->file('imagenes');

                    foreach($_FILES['imagenes']['name'] as $key => $value){
                        if(file_exists($_FILES['imagenes']['tmp_name'][$key])){
                            $file_name = now()->toArray()['day'].'_'.now()->toArray()['month'].'_'.mt_rand(1000,10000);
                            $file_name = $file_name.''.$_FILES['imagenes']['name'][$key];
                            
                            $path = $file2[$key]->storeAs('public/imagen/blog/'.now()->toArray()['year'].'/'.now()->toArray()['month'],$file_name,'s3');                                                        
                            
                            $obj_fotoBlog = new fotoBlog();
                            $obj_fotoBlog->tipo = 2;
                            $obj_fotoBlog->ruta = env('AWS_URL').$path;
                            $obj_fotoBlog->blog_id = $id;
                            $obj_fotoBlog->save();
                        }
                    }



                    
                    
                    return redirect(route('adminBlog.index'))->withErrors(['success' => "Se a Guardado el blog correctamente"]);

                    
                }
                

                return redirect()->back()->withErrors(['danger' => "Algo salio mal"]);

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

    public function save(Request $request){
        
        if(Auth::user()){ 

            if(Auth::user()->rol_id == 1){

                // $file2 = $request->file('imagenes');
                // $file = $request->file('archivo'); 
                // return $file2[0];

                $file = $request->file('archivo');                
                if($file != null){

                    $file_name = now()->toArray()['day'].'_'.now()->toArray()['month'].'_'.mt_rand(1000,10000);
                    $extencion= $file->getClientOriginalExtension();
                    $file_name = $file_name.'.'.$extencion;
                    $path = $file->storeAs('public/imagen/blog/'.now()->toArray()['year'].'/'.now()->toArray()['month'],$file_name,'s3');                                                        
                    
                    $obj_blog = blog::find($request->txtId);
                    $obj_blog->titulo_1 = $request->txtTitulo1;          
                    $obj_blog->titulo_2 = $request->txtTitulo2;          
                    $obj_blog->titulo_3 = $request->txtTitulo3;          
                    $obj_blog->resena = $request->resena;          
                    $obj_blog->comentario = $request->comentario;  
                    $obj_blog->texto_1 = $request->textoUno;  
                    $obj_blog->texto_2 = $request->textoDos;          
                    $obj_blog->texto_3 = $request->textoTres;          
                    $obj_blog->escritor = $request->escritor;          
                    $obj_blog->programa = $request->programa; 
                    $obj_blog->fecha = date('Y-m-d'); 

                    $obj_blog->save();                    
                    $id = $obj_blog->id;

                    $obj_fotoBlog = new fotoBlog();
                    $obj_fotoBlog->tipo = 1;
                    $obj_fotoBlog->ruta = env('AWS_URL').$path;
                    $obj_fotoBlog->blog_id = $id;
                    $obj_fotoBlog->save();

                    $file2 = $request->file('imagenes');
                    foreach($_FILES['imagenes']['name'] as $key => $value){
                        if(file_exists($_FILES['imagenes']['tmp_name'][$key])){
                            $file_name = now()->toArray()['day'].'_'.now()->toArray()['month'].'_'.mt_rand(1000,10000);
                            $file_name = $file_name.''.$_FILES['imagenes']['name'][$key];
                            
                            $path = $file2[$key]->storeAs('public/imagen/blog/'.now()->toArray()['year'].'/'.now()->toArray()['month'],$file_name,'s3');                                                        
                            
                            $obj_fotoBlog = new fotoBlog();
                            $obj_fotoBlog->tipo = 2;
                            $obj_fotoBlog->ruta = env('AWS_URL').$path;
                            $obj_fotoBlog->blog_id = $id;
                            $obj_fotoBlog->save();
                        }
                    }
                    
                    return redirect(route('adminBlog.index'))->withErrors(['success' => "Se a Actualizó el blog correctamente"]);

                    
                }else{

                    $obj_blog = blog::find($request->txtId);
                    $obj_blog->titulo_1 = $request->txtTitulo1;          
                    $obj_blog->titulo_2 = $request->txtTitulo2;          
                    $obj_blog->titulo_3 = $request->txtTitulo3;          
                    $obj_blog->resena = $request->resena;          
                    $obj_blog->comentario = $request->comentario;  
                    $obj_blog->texto_1 = $request->textoUno;  
                    $obj_blog->texto_2 = $request->textoDos;          
                    $obj_blog->texto_3 = $request->textoTres;          
                    $obj_blog->escritor = $request->escritor;          
                    $obj_blog->programa = $request->programa; 
                    $obj_blog->fecha = date('Y-m-d'); 

                    $obj_blog->save();  

                    $file2 = $request->file('imagenes');
                    foreach($_FILES['imagenes']['name'] as $key => $value){
                        if(file_exists($_FILES['imagenes']['tmp_name'][$key])){
                            $file_name = now()->toArray()['day'].'_'.now()->toArray()['month'].'_'.mt_rand(1000,10000);
                            $file_name = $file_name.''.$_FILES['imagenes']['name'][$key];
                            
                            $path = $file2[$key]->storeAs('public/imagen/blog/'.now()->toArray()['year'].'/'.now()->toArray()['month'],$file_name,'s3');                                                        
                            
                            $obj_fotoBlog = new fotoBlog();
                            $obj_fotoBlog->tipo = 2;
                            $obj_fotoBlog->ruta = env('AWS_URL').$path;
                            $obj_fotoBlog->blog_id = $id;
                            $obj_fotoBlog->save();
                        }
                    }

                    return redirect(route('adminBlog.index'))->withErrors(['success' => "Se a Actualizó el blog correctamente"]);
                }

                

                return redirect()->back()->withErrors(['danger' => "Algo salio mal"]);

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
