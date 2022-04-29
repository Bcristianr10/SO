@extends('layouts.master')

@section('title') Estados @endsection
@section('css')

    <!-- DataTables -->
    <link href="{{ URL::asset('/libs/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />

@endsection

@section('content')
    @component('common-components.breadcrumb')
        @slot('title') Estados  @endslot
        @slot('title_li') Bienvenido a Organizacion sin Fronteras   @endslot
    @endcomponent

    <div class="row">
        <div class="col-md-10 offset-md-1">
            @include('plantilla.error')
            <div class="card">
                <div class="card-body">
                    
                    <div class="row">
                        <h4 class="card-title col-sm-2">Estados</h4>
                        <div class="col-sm-2 offset-sm-8">
                            
                            
                            <button type="button" class="btn btn-primary waves-effect waves-light w-100"
                                            data-toggle="modal" data-animation="bounce"
                                            data-target=".crearEstadoModal">
                                <span class="btn-label"><i class="fa fa-plus"></i> </span><span class="btn-text">
                                    Crear Estado
                                </span>
                            </button>
                            
                            @include('modals.crearEstado')

                        </div>
                    </div>
                    <br><br>
                    
                    <div class="table-responsive">
                        <table id="datatable" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Tipo</th>
                                    <th>Nombre</th>                                                                 
                                    <th>Acciones</th>
                                </tr>
                            </thead>


                            <tbody>
                                @foreach ($resultado as $fila)
                                    <tr>
                                        <td>{{$fila->tipo}}</td>
                                        <td>{{$fila->nombre}}</td>                                       
                                       
                                        <td>
                                            <button type="button" class="btn btn-primary btn-sm"  
                                                            data-toggle="modal" data-animation="bounce"
                                                            data-target=".editarEstadoModal{{$fila->id}}">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                            @include('modals.editarEstado') 
                                            
                                           
                                            <button type="button" class="btn btn-danger btn-sm"  
                                                            data-toggle="modal" data-animation="bounce"
                                                            data-target=".eliminarEstadoModal{{$fila->id}}">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                            @include('modals.eliminarEstado') 
                                               
                                                                                       
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