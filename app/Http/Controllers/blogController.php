<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\blog;

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

}
