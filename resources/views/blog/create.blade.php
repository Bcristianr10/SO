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
                    <form action="{{route('adminBlog.insert')}}"  method="POST" role="form" autocomplete="off"  enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            
                           
                            <div class="mb-3 col-md-12 ">
                                <label for="example-password-input1" class="form-label">Titulo</label>
                                <div class="">
                                    <input class="form-control" type="input" name="txtTitulo1" id="example-password-input1"
                                        placeholder="Titulo uno" value="" required>
                                </div>
                            </div>
                            <div class=" mb-3 col-md-12">
                                <label for="example-password-input1" class="form-label">Imagen Principal</label>
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
                                                       

                          

                            <div class="mb-3 col-md-12 ">
                                <label >Reseña</label>
                                <div class="col-lg-12" >
                                    <textarea class="form-control" rows="5" name="txtResena"></textarea>
                                    
                                </div>
                                    
                                
                            </div>

                          

                            <div class="mb-3 col-md-12 ">
                                <label for="example-password-input1" class="form-label">Escritor</label>
                                <div class="">
                                    <input class="form-control" type="input" name="escritor" id="example-password-input1"
                                        placeholder="Autor" value="" required>
                                </div>
                            </div>

                           

                            <div class="mb-3 col-md-4">
                                <label class="col-md-6 col-form-label">Programa</label>
                                <div class="col-md-12">
                                    <input class="form-control" list="datalistOptions" id="exampleDataList"
                                    placeholder="Seleccione un Plan" name="txtPrograma" required>
                                    <datalist id="datalistOptions">
                                        <option value="Progama de Salud"></option>
                                        <option value="Programa Deportivo"></option>
                                        <option value="Programa Educacion y Cultura"></option>
                                        <option value="Programa Social"></option>
                                    </datalist>
                                </div>
                                
                            </div>
                            <div class="mb-3 col-md-4 ">
                                <label for="example-date-input" class="col-md-6 col-form-label">Idioma</label>
                                <div class="col-md-12">
                                    <input class="form-control" list="datalistOptions" id="exampleDataList"
                                    placeholder="Seleccione un Plan" name="txtPrograma" required>
                                    <datalist id="datalistOptions">
                                        <option value="ESP">Español</option>
                                        <option value="ENG">Ingles</option>
                                        
                                    </datalist>
                                </div>
                            </div>

                            <div class="mb-3 col-md-4 ">
                                <label for="example-date-input" class="col-md-6 col-form-label">Fecha</label>
                                <div class="col-md-12">
                                    <input class="form-control" type="date" name="txtFecha"
                                        id="example-date-input" required>
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


  

    <script src="{{ URL::asset('/libs/tinymce/tinymce.min.js')}}"></script>

<!-- init js -->
    <script src="{{ URL::asset('/js/pages/form-editor.init.js')}}"></script>

@endsection