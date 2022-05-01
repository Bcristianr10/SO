@extends('layouts.master')

@section('title') Imagenes @endsection
@section('css')

    <!-- DataTables -->
    <link href="{{ URL::asset('/libs/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />

@endsection

@section('content')
    @component('common-components.breadcrumb')
        @slot('title') Imagenes  @endslot
        @slot('title_li') Bienvenido a Organizacion sin Fronteras   @endslot
    @endcomponent

    <div class="row">
        <div class="col-md-10 offset-md-1">
            @include('plantilla.error')
            <div class="card">
                <div class="card-body">
                    
                    <div class="row">
                        <h4 class="card-title col-sm-2">Imagenes</h4>
                        <div class="col-sm-2 offset-sm-8">
                            
                            <a class="btn btn-primary waves-effect waves-light w-100" href="{{route('imagen.create')}}">
                                
                                <span class="btn-label"><i class="fa fa-plus"></i> </span><span class="btn-text">
                                    Crear Imagen
                                </span>
                            </a>
                            

                        </div>
                    </div>
                    <br><br>
                    
                    <div class="table-responsive">
                        <table id="datatable" class="table table-bordered">
                            <thead>
                                <tr>
                                    
                                    <th>Nombre</th>   
                                    <th>Imagen</th>
                                    <th>Estado</th>                                                              
                                    <th>Acciones</th>
                                </tr>
                            </thead>


                            <tbody>
                                @foreach ($resultado as $fila)
                                    <tr>                                        
                                        <td>{{$fila->nombre}}</td>
                                        <td class="d-flex justify-content-center"><img src="{{$fila->ruta}}" alt="Givest-HasTech" height="100"></td>                                       
                                        <td class=" text-center">
                                            
                                            @if($fila->estado == 1) 
                                                Activo
                                            @else 
                                                Eliminado
                                            @endif 
                                            
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-primary btn-sm"  
                                                            data-toggle="modal" data-animation="bounce"
                                                            data-target=".editarImagenModal{{$fila->id}}">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                            @include('modals.editarImagen') 
                                            
                                           
                                            <button type="button" class="btn btn-danger btn-sm"  
                                                            data-toggle="modal" data-animation="bounce"
                                                            data-target=".eliminarImagenModal{{$fila->id}}">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                            @include('modals.eliminarImagen') 
                                               
                                                                                       
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