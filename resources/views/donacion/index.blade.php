@extends('layouts.master')

@section('title') Donaciones @endsection
@section('css')

    <!-- DataTables -->
    <link href="{{ URL::asset('/libs/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />

@endsection

@section('content')
    @component('common-components.breadcrumb')
        @slot('title') Donaciones  @endslot
        @slot('title_li') Bienvenido a Organizacion sin Fronteras   @endslot
    @endcomponent

    <div class="row">
        <div class="col-md-10 offset-md-1">
            @include('plantilla.error')
            <div class="card">
                <div class="card-body">
                    
                    <div class="row">
                        <h4 class="card-title col-sm-4">Donaciones</h4>
                        <div class="col-sm-4 offset-sm-8">
                            
                            <a class="btn btn-primary waves-effect waves-light w-100" href="{{route('donaciones.create')}}">
                                
                                <span class="btn-label"><i class="fa fa-plus"></i> </span><span class="btn-text">
                                    Crear Donación
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
                                    <th>Monto</th>                                                              
                                    <th>Acciones</th>
                                </tr>
                            </thead>


                            <tbody>
                                @foreach ($resultado as $fila)
                                    @if($fila->estado == 1) 
                                    <tr>                                        
                                        <td>{{$fila->nombre}}</td>
                                        <td class="d-flex justify-content-center"><img src="{{$fila->imagen}}" alt="Givest-HasTech" height="100"></td>                                       
                                        <td class=" text-center">
                                        ${{$fila->monto}}

                                            
                                        </td>
                                        <td>
                                                <a class="btn btn-primary btn-sm" href="{{route('donaciones.update',['id'=>$fila->id])}}">
                                                <i class="fa fa-edit"></i>
                                                </a>
                                            
                                            
                                           
                                            <button type="button" class="btn btn-danger btn-sm"  
                                                            data-toggle="modal" data-animation="bounce"
                                                            data-target=".eliminarEstadoModal{{$fila->id}}">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                            @include('modals.eliminarDonacion') 
                                               
                                                                                       
                                        </td>                                
                                    </tr>
                                    @endif 
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
        <!--tinymce js-->
        <script src="http://qovex-v.laravel.themesbrand.com/libs/tinymce/tinymce.min.js"></script>
    <!-- init js -->
    <script src="http://qovex-v.laravel.themesbrand.com/js/pages/form-editor.init.js"></script>

@endsection