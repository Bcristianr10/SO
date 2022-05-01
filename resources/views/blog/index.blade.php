@extends('layouts.master')

@section('title') Blog @endsection
@section('css')

    <!-- DataTables -->
    <link href="{{ URL::asset('/libs/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />

@endsection

@section('content')
    @component('common-components.breadcrumb')
        @slot('title') Blog  @endslot
        @slot('title_li') Bienvenido a Organizacion sin Fronteras   @endslot
    @endcomponent

    <div class="row">
        <div class="col-md-10 offset-md-1">
            @include('plantilla.error')
            <div class="card">
                <div class="card-body">
                    
                    <div class="row">
                        <h4 class="card-title col-sm-4">Blog</h4>
                        <div class="col-sm-4 offset-sm-8">
                            
                            <a class="btn btn-primary waves-effect waves-light w-100" href="{{route('adminBlog.create')}}">
                                
                                <span class="btn-label"><i class="fa fa-plus"></i> </span><span class="btn-text">
                                    Crear Blog
                                </span>
                            </a>
                            

                        </div>
                    </div>
                    <br><br>
                    
                    <div class="table-responsive">
                        <table id="datatable" class="table table-bordered">
                            <thead>
                                <tr>
                                    
                                    <th>Titulo</th>   
                                    <th>Escritor</th>
                                    <th>Programa</th>                                                              
                                    <th>Acciones</th>
                                </tr>
                            </thead>


                            <tbody>
                                @foreach ($resultado as $fila)
                                    
                                    <tr>                                        
                                        <td>{{$fila->titulo_1}}</td>
                                        <td>{{$fila->escritor}}</td>                                       
                                        <td>{{$fila->programa}}</td>
                                        <td>
                                            
                                                <a class="btn btn-primary btn-sm" href="{{route('adminBlog.update',['id'=>$fila->id])}}">
                                                <i class="fa fa-edit"></i>
                                                </a>
                                                
                                            
                                            
                                            
                                           
                                            <button type="button" class="btn btn-danger btn-sm"  
                                                            data-toggle="modal" data-animation="bounce"
                                                            data-target=".eliminarEstadoModal{{$fila->id}}">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                            @include('modals.eliminarBlog') 
                                               
                                                                                       
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
        <!--tinymce js-->
        <script src="http://qovex-v.laravel.themesbrand.com/libs/tinymce/tinymce.min.js"></script>
    <!-- init js -->
    <script src="http://qovex-v.laravel.themesbrand.com/js/pages/form-editor.init.js"></script>

@endsection