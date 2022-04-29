@extends('layouts.master')

@section('title') Crear Donación @endsection

@section('css')
    <!-- Plugins css -->
    <link href="{{URL::asset('/libs/dropzone/dropzone.min.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
   
    @component('common-components.breadcrumb')
         @slot('title') Donación  @endslot
         @slot('li_1') Crear @endslot
    @endcomponent

    <div class="row">
        <div class="col-md-12 col-xl-8 offset-xl-2">
            <div class="card">
                <div class="card-body">
                    <div class="text-center">
                        <h2>Crear Donación</h2>
                        
                    </div>
                    <form action="{{route('donaciones.insert')}}"  method="POST" role="form" autocomplete="off"  enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            
                           
                            
                            
                            <div class="mb-3 col-md-12 ">
                                <label for="example-password-input1" class="form-label">Monto</label>
                                <div class="">
                                    <input class="form-control" type="number" name="txtMonto" id="example-password-input1"
                                        placeholder="Ingrese el monto" value="" required>
                                </div>
                            </div>

                            <div class="col-md-12 " id="div__changes-nivelInstrucion">
                                <div class="mb-3 row " >
                                <label for="txtCityShipping"
                                        class="col-lg-3 col-form-label">Descripción</label>
                                    <div class="col-lg-12" id="grupo__txtPrincipal__Comentario">
                                    <textarea class="form-control" id="elm1" name="txtDescripcion"></textarea>
                                    <i class="fa fa-times-circle validacion__estado"></i>    
                                </div>
                                    
                                </div>
                            </div>

                            <div class="mb-3 col-md-12 ">
                                <label for="example-password-input1" class="form-label">Nombre</label>
                                <div class="">
                                    <input class="form-control" type="input" name="txtNombre" id="example-password-input1"
                                        placeholder="Ingrese un nombre" value="" required>
                                </div>
                            </div>

                            <div class=" mb-3 col-md-12">
                            <label for="example-password-input1" class="form-label">Imagen (330 x 200 px)</label>
                                <div class="dropzone">
                                    <div class="fallback">
                                        <input name="archivo" type="file" accept="image/*" required>
                                    </div>
                                    <div class="dz-message needsclick">
                                        <div class="mb-3">
                                            <i class="display-4 text-muted fa fa-cloud-upload"></i>
                                        </div>
            
                                        <h4>Arrastre el archivo o presione aquí.</h4>
                                    </div>
                                </div>
                            </div>
                    
                           
                        </div>
                        
                        <div class="modal-footer">  
                                                              
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
    
    <!--tinymce js-->
    <script src="http://qovex-v.laravel.themesbrand.com/libs/tinymce/tinymce.min.js"></script>
    <!-- init js -->
    <script src="http://qovex-v.laravel.themesbrand.com/js/pages/form-editor.init.js"></script>
    



@endsection