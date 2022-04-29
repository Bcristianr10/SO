@extends('layouts.master')

@section('title') Usuarios @endsection
@section('css')

    <!-- DataTables -->
    <link href="{{ URL::asset('/libs/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />

@endsection

@section('content')
    @component('common-components.breadcrumb')
        @slot('title') Usuario   @endslot
        @slot('title_li') Bienvenido a Organizacion sin Fronteras   @endslot
    @endcomponent

    <div class="row">
        <div class="col-md-10 offset-md-1">
            @include('plantilla.error')
            <div class="card">
                <div class="card-body">
                    
                    <div class="row">
                        <h4 class="card-title col-sm-2">Usuarios</h4>
                        <div class="col-sm-2 offset-sm-8">
                            
                            
                            <button type="button" class="btn btn-primary waves-effect waves-light w-100"
                                            data-toggle="modal" data-animation="bounce"
                                            data-target=".crearUsuarioModal">
                                <span class="btn-label"><i class="fa fa-plus"></i> </span><span class="btn-text">
                                    Crear Usuario
                                </span>
                            </button>
                            
                            @include('modals.CrearUsuario')
                                        
                        </div>
                    </div>
                    <br><br>
                    
                    <div class="table-responsive">
                        <table id="datatable" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Usuario</th>
                                    <th>Rol</th>
                                    <th>Estado</th>                                
                                    <th>Acciones</th>
                                </tr>
                            </thead>


                            <tbody>
                                @foreach ($resultado as $fila)
                                    <tr>
                                        <td>{{$fila->id}}</td>
                                        <td>{{$fila->nombre}}</td>
                                        <td>{{$fila->rol->nombre}}</td>
                                        <td>
                                            @if ($fila->estado==1)
                                                <span class="badge badge-success badge-pill">Activo</span>
                                            @else
                                                <span class="badge badge-danger badge-pill">Bloqueado</span>
                                            @endif
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-primary btn-sm"  
                                                            data-toggle="modal" data-animation="bounce"
                                                            data-target=".editarUsuarioModal{{$fila->id}}">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                            @include('modals.editarUsuario')
                                            
                                            
                                            @if ($fila->estado == 1)
                                                <a class="btn btn-danger btn-sm" href="{{route('usuario.delete',['id'=>$fila->id])}}"><i class="fa fa-trash"></i></a>
                                            @else
                                                <a class="btn btn-warning btn-sm" href="{{route('usuario.unlock',['id'=>$fila->id])}}"><i class="fa fa-unlock"></i></a>
                                            @endif
                                            
                                               
                                                                                       
                                        </td>                                
                                    </tr>
                                @endforeach                                                            
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- end col -->
    </div>

    
@endsection

@section('script')

    <!-- Required datatable js -->
    <script src="{{ URL::asset('/libs/datatables/datatables.min.js')}}"></script>
    <script src="{{ URL::asset('/libs/jszip/jszip.min.js')}}"></script>
    <script src="{{ URL::asset('/libs/pdfmake/pdfmake.min.js')}}"></script>

    <!-- Datatable init js -->
    <script src="{{ URL::asset('/js/pages/datatables.init.js')}}"></script>

@endsection