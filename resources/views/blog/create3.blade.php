@extends('layouts.master')

@section('title') Crear Actividad @endsection

@section('css')
    <!-- Plugins css -->
    <link href="{{URL::asset('/libs/dropzone/dropzone.min.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
   
    @component('common-components.breadcrumb')
         @slot('title') Actividad  @endslot
         @slot('li_1') Crear @endslot
    @endcomponent

    <div class="row">
        <div class="col-md-12 col-xl-8 offset-xl-2">
            <div class="card">
                <div class="card-body">
                    <div class="text-center">
                        <h2>Crear Actividad</h2>
                        
                    </div>
                    <form action="{{route('adminBlog.insert3')}}"  method="POST" role="form" autocomplete="off"  enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            
                           
                            
                            <div class="mb-3 col-md-12 ">
                                <label for="example-password-input1" class="form-label">Tercer Titulo</label>
                                <div class="">
                                    <input class="form-control" type="input" name="txtTitulo3" id="example-password-input1"
                                        placeholder="Titulo Tres" value="">
                                </div>
                            </div>

                            
                    

                            <div class="mb-3 col-md-12 ">
                                <label >Tercer Texto</label>
                                <div class="col-lg-12" >
                                    <textarea class="form-control" id="elm1" rows="5" name="textoTres"></textarea>
                                    
                                </div>
                                    
                                
                            </div>                                                                                 

                          


                            
                            

                          

                          
                           
                        </div>
                        
                        <div class="modal-footer">  
                            <input type="hidden" name="txtId" value="{{$id}}">                           
                            <button type="submit"  class="btn btn-primary text-left">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
                   

@endsection

@section('script')
    
    <script src="{{URL::asset('/libs/dropzone/dropzone.min.js')}}"></script>


  

    <script src="{{ URL::asset('/libs/tinymce/tinymce.min.js')}}"></script>

<!-- init js -->
    <script src="{{ URL::asset('/js/pages/form-editor.init.js')}}"></script>

@endsection