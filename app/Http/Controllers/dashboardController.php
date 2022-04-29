<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\hijo;
use App\Models\padre;
use App\Models\pais;
use App\Models\corregimiento;

class dashboardController extends Controller
{
    public function index(){
        
        if(Auth::user()){ 

            if(Auth::user()->rol_id == 1){

                
                
                $datos = hijo::select('corregimiento_id', DB::raw('count(*) as total'))
                 ->groupBy('corregimiento_id')->orderBy('total','desc')->take(10)
                 ->get();

                // return $datos;
                $corregimientos = array();
                $totales = array();
                foreach ($datos as $hijo) {
                    
                    $corregimiento = corregimiento::find($hijo->corregimiento_id);
                    array_push($corregimientos,$corregimiento->nombre);
                    array_push($totales,$hijo->total);
                    
                }

                $datos = padre::select('sexo', DB::raw('count(*) as total'))->where('estado',1)
                 ->groupBy('sexo')->orderBy('sexo','desc')
                 ->get();

                $adultosXSexo = array();
                foreach ($datos as $sexo) {
                     
                     
                    array_push($adultosXSexo,$sexo->total);
                     
                     
                }
                
                $datos = hijo::select('sexo', DB::raw('count(*) as total'))
                 ->groupBy('sexo')->orderBy('sexo','desc')
                 ->get();

                $hijosXSexo = array();
                foreach ($datos as $sexo) {
                     
                     
                    array_push($hijosXSexo,$sexo->total);
                     
                     
                }  

                $nuevosHijos = hijo::whereDate('created_at','>',\Carbon\Carbon::now()->subMonth(1))->where('estado','<=',2)->count();
                 
                $totalHijos = hijo::where('estado','<=',2)->count();
                
                $porcentajeHijos = number_format(($nuevosHijos/$totalHijos)*100, 0);

                $nuevosAdultos = padre::whereDate('created_at','>',\Carbon\Carbon::now()->subMonth(1))->where('estado','<=',2)->count();
                 
                $totalAdultos = padre::where('estado','<=',2)->count();
                
                $porcentajeAdultos = number_format(($nuevosAdultos/$totalAdultos)*100, 0);
               
                return view('dashboard.index',['corregimientos'=>$corregimientos,
                                                'totales'=>$totales,
                                                'adultosXSexo'=>$adultosXSexo,
                                                'hijosXSexo'=>$hijosXSexo,
                                                'nuevosHijos'=>$nuevosHijos,
                                                'porcentajeHijos' =>$porcentajeHijos,
                                                'nuevosAdultos' => $nuevosAdultos,
                                                'porcentajeAdultos' => $porcentajeAdultos
                                            ]);

            }else{

                return view('index');

            }
            

        }else {

            return redirect(route('login.index'));
            
        }

    }

    public function paises(){

        $datos1 = padre::where('estado',1)->select('pais_id', DB::raw('count(*) as total'))
        ->groupBy('pais_id')->orderBy('total','desc')->take(10)
        ->get();

       
        $paises1 = array();
        $totales1 = array();
        foreach ($datos1 as $dato1) {
           
           $pais = pais::find($dato1->pais_id);
           array_push($paises1,$pais->nombre);
           array_push($totales1,$dato1->total);
           
        }

        $datos2 = hijo::where('estado',1)->select('pais_id', DB::raw('count(*) as total'))
                            ->groupBy('pais_id')->orderBy('total','desc')->take(10)
                            ->get();

       
        $paises2 = array();
        $totales2 = array();
        foreach ($datos2 as $dato2) {
           
           $pais = pais::find($dato2->pais_id);
           array_push($paises2,$pais->nombre);
           array_push($totales2,$dato2->total);
           
        }

        $datos3 = padre::where('estado',1)->where('sexo','M')->select('pais_id', DB::raw('count(*) as total'))
        ->groupBy('pais_id')->orderBy('total','desc')->take(10)
        ->get();

       
        $paises3 = array();
        $totales3 = array();
        foreach ($datos3 as $dato3) {
           
           $pais = pais::find($dato3->pais_id);
           array_push($paises3,$pais->nombre);
           array_push($totales3,$dato3->total);
           
        }

        $datos4 = padre::where('estado',1)->where('sexo','F')->select('pais_id', DB::raw('count(*) as total'))
        ->groupBy('pais_id')->orderBy('total','desc')->take(10)
        ->get();

        $paises4 = array();
        $totales4 = array();
        foreach ($datos4 as $dato4) {
           
           $pais = pais::find($dato4->pais_id);
           array_push($paises4,$pais->nombre);
           array_push($totales4,$dato4->total);
           
        }

        $datos5 = hijo::where('estado',1)->where('sexo','M')->select('pais_id', DB::raw('count(*) as total'))
        ->groupBy('pais_id')->orderBy('total','desc')->take(10)
        ->get();

       
        $paises5 = array();
        $totales5 = array();
        foreach ($datos5 as $dato5) {
           
           $pais = pais::find($dato5->pais_id);
           array_push($paises5,$pais->nombre);
           array_push($totales5,$dato5->total);
           
        }

        $datos6 = hijo::where('estado',1)->where('sexo','F')->select('pais_id', DB::raw('count(*) as total'))
        ->groupBy('pais_id')->orderBy('total','desc')->take(10)
        ->get();

        $paises6 = array();
        $totales6 = array();
        foreach ($datos6 as $dato6) {
           
           $pais = pais::find($dato6->pais_id);
           array_push($paises6,$pais->nombre);
           array_push($totales6,$dato6->total);
           
        }


        return view('dashboard.paises',['totales1'=>$totales1,
                                        'paises1'=>$paises1,
                                        'totales2'=>$totales2,
                                        'paises2'=>$paises2,
                                        'totales3'=>$totales3,
                                        'paises3'=>$paises3,
                                        'totales4'=>$totales4,
                                        'paises4'=>$paises4,
                                        'totales5'=>$totales5,
                                        'paises5'=>$paises5,
                                        'totales6'=>$totales6,
                                        'paises6'=>$paises6
                                    ]);

    }
}
