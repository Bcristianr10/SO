<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\visita;
use App\Models\mes;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class visitasController extends Controller
{
    public function index(){

        if(Auth::user()){ 

            if(Auth::user()->rol_id == 1){

                $anos = visita::select('ano')
                 ->groupBy('ano')
                 ->get();
                
                
                // return DB::table('visita')
                //     ->select(DB::raw('DATE_FORMAT(created_at, "%d") as date'), DB::raw('count(*) as visitas'))
                //     ->groupBy('date')->where('ano','2022')->where('mes','07')
                //     ->get();

                $date = Carbon::now();

                $ano_actual = $date->format('Y');

                $datos = visita::select('mes', DB::raw('count(id) as total'))
                 ->groupBy('mes')->where('ano',$ano_actual)->orderBy('mes')
                 ->get();
                   

                
                $meses = array();
                $totales = array();
                $maximo = 10;
                $minimo = 100;
                foreach ($datos as $visitas) {                   
                    
                    $mes = mes::find($visitas->mes);
                    array_push($meses,$mes->nombre);
                    array_push($totales,$visitas->total);

                    if ($visitas->total > $maximo) {
                        $maximo = $visitas->total+7;
                    } 

                    if ($visitas->total < $minimo) {
                        $minimo = $visitas->total-4;
                    }
                    
                    
                }
                
                $meses_lista = mes::get();

                return view('visitas.index',['meses'=>$meses,'totales'=>$totales,'maximo'=>$maximo,'minimo'=>$minimo,'anos'=>$anos,'meses_lista'=>$meses_lista]);

            }else{

                return view('index');

            }
            

        }else {

            return redirect(route('login.index'));
            
        }

    }
    public function buscar(Request $request){

        if(Auth::user()){ 

            if(Auth::user()->rol_id == 1){

                

                $anos = visita::select('ano')
                 ->groupBy('ano')
                 ->get();
                
                if ($request->txtMes == '00') {

                    // return DB::table('visita')
                    //     ->select(DB::raw('DATE_FORMAT(created_at, "%d") as date'), DB::raw('count(*) as visitas'))
                    //     ->groupBy('date')->where('ano','2022')->where('mes','07')
                    //     ->get();

                    $datos = visita::select('mes', DB::raw('count(id) as total'))
                    ->groupBy('mes')->where('ano',$request->txtAno)->orderBy('mes')->take(12)
                    ->get();
                        

                    
                    $meses = array();
                    $totales = array();
                    $maximo = 10;
                    $minimo = 100;
                    foreach ($datos as $visitas) {                   
                        
                        $mes = mes::find($visitas->mes);
                        array_push($meses,$mes->nombre);
                        array_push($totales,$visitas->total);

                        if ($visitas->total > $maximo) {
                            $maximo = $visitas->total+7;
                        } 

                        if ($visitas->total < $minimo) {
                            $minimo = $visitas->total-4;
                        }
                        
                        
                    }
                    
                } else {

                    

                    $datos = DB::table('visita')
                            ->select(DB::raw('DATE_FORMAT(created_at, "%d") as dia'), DB::raw('count(*) as total'))
                            ->groupBy('dia')->where('ano',$request->txtAno)->where('mes',$request->txtMes)
                            ->get();

                    
                        

                    
                    $meses = array();
                    $totales = array();
                    $maximo = 10;
                    $minimo = 100;
                    foreach ($datos as $visitas) {                   
                        
                        
                        array_push($meses,$visitas->dia);
                        array_push($totales,$visitas->total);

                        if ($visitas->total > $maximo) {
                            $maximo = $visitas->total+7;
                        } 

                        if ($visitas->total < $minimo) {
                            $minimo = $visitas->total-4;
                        }
                        
                        
                    }
                    
                }
                
                
                
                
                

                return view('visitas.index',['meses'=>$meses,'totales'=>$totales,'maximo'=>$maximo,'minimo'=>$minimo,'anos'=>$anos]);

            }else{

                return view('index');

            }
            

        }else {

            return redirect(route('login.index'));
            
        }

    }
}
