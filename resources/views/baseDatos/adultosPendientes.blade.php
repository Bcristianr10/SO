@extends('layouts.master')

@section('title') Base de Datos Adultos Pendientes @endsection
@section('css')

    <!-- DataTables -->
    <link href="{{ URL::asset('/libs/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />

@endsection

@section('content')

    @component('common-components.breadcrumb')
    @slot('title') Base de Datos Adultos   @endslot
    @slot('title_li') Bienvenido a Organizacion sin Fronteras   @endslot
    @endcomponent
<div class="row">
    <div class="col-xl-12 col-xxl-10 offset-xxl-1">
        <div class="card">
            <div class="card-body">
                
                <div class="row">
                    <h4 class="card-title col-sm-2">Base Datos</h4>
                    <div class="col-sm-2 offset-sm-8">
                        
                        
                        
                        
                        
                                    
                    </div>
                </div>
                <br><br>
                <div class="table-responsive">
                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Telefono</th>
                                <th>Distrito</th>
                                <th>Corregimiento</th>
                                <th>Pais</th>
                                <th>Sexo</th>
                                <th>Edad</th>
                                <th>Estatus Migratorio</th>
                                <th>Ocupacion</th>
                                <th>Estado Laboral</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>


                        <tbody>

                            @foreach ($resultado as $fila)
                                <tr>
                                    <td>{{$fila->nombres}} {{$fila->apellidos}}</td>
                                    <td>{{$fila->telefono}}</td>
                                    <td>{{$fila->corregimiento->distrito->nombre}}</td>
                                    <td>{{$fila->corregimiento->nombre}}</td>
                                    <td>{{$fila->pais->nombre}}</td>
                                    <td>
                                        @if ($fila->sexo == 'M')
                                            Masculino
                                        @else
                                            Femenino
                                        @endif
                                    </td>
                                    <td>{{\Carbon\Carbon::parse($fila->fecha_nacimiento)->age}}</td>
                                    <td>{{$fila->estado_migratorio}}</td>
                                    <td>{{$fila->ocupacion->nombre}}</td>
                                    <td>{{$fila->situacion_laboral}}</td>
                                    <td>
                                                                       
                                        <a class="btn btn-success btn-sm" href="{{route('perfil.adulto',['id'=>$fila->id])}}"><i class="fa fa-eye"></i></a>

                                    </td>

                                </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->    
@endsection

@section('script')

    <!-- Required datatable js -->
    <script src="{{ URL::asset('/libs/datatables/datatables.min.js')}}"></script>
    <script src="{{ URL::asset('/libs/jszip/jszip.min.js')}}"></script>
    <script src="{{ URL::asset('/libs/pdfmake/pdfmake.min.js')}}"></script>

    <!-- Datatable init js -->
    <script src="{{ URL::asset('/js/pages/datatables.init.js')}}"></script>

@endsection