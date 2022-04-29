@extends('layouts.master')

@section('title') Ayudas @endsection
@section('css')

    <!-- DataTables -->
    <link href="{{ URL::asset('/libs/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />

@endsection

@section('content')
    @component('common-components.breadcrumb')
        @slot('title') Ayudas  @endslot
        @slot('title_li') Bienvenido a Organizacion sin Fronteras   @endslot
    @endcomponent

    <div class="row">
        <div class="col-md-10 offset-md-1">
            @include('plantilla.error')
            <div class="card">
                <div class="card-body">
                    
                    <div class="row">
                        <h4 class="card-title col-sm-2">Ayudas</h4>
                        <div class="col-sm-2 offset-sm-8">
                            
                            
                            <button type="button" class="btn btn-primary waves-effect waves-light w-100"
                                            data-toggle="modal" data-animation="bounce"
                                            data-target=".crearAyudaModal">
                                <span class="btn-label"><i class="fa fa-plus"></i> </span><span class="btn-text">
                                    Crear Ayuda
                                </span>
                            </button>
                            
                            @include('modals.crearAyuda')

                        </div>
                    </div>
                    <br><br>
                    
                    <div class="table-responsive">
                        <table id="datatable" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Comentario</th>                                                                 
                                    <th>Acciones</th>
                                </tr>
                            </thead>


                            <tbody>
                                @foreach ($resultado as $fila)
                                    <tr>
                                        <td>{{$fila->nombre}}</td>
                                        <td>{!!$fila->comentario!!}</td>                                       
                                       
                                        <td>
                                            
                                            <a class="btn btn-primary btn-sm" href="{{route('ayuda.editar',['id'=>$fila->id])}}"><i class="fa fa-edit"></i></a>
                                            
                                            
                                            <a class="btn btn-danger btn-sm" href="{{route('ayuda.eliminar',['id'=>$fila->id])}}"><i class="fa fa-trash"></i></a>
                                            
                                               
                                                                                       
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
    <script src="{{asset('assets/js/pages/form-editor.init.js')}}"></script>
    <script src="{{asset('assets/libs/tinymce/tinymce.min.js')}}"></script>
@endsection

