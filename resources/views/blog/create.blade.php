@extends('layouts.master')

@section('title') Crear Blog @endsection

@section('css')
    <!-- Plugins css -->
    <link href="{{URL::asset('/libs/dropzone/dropzone.min.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
   
    @component('common-components.breadcrumb')
         @slot('title') Blog  @endslot
         @slot('li_1') Crear @endslot
    @endcomponent

    <div class="row">
        <div class="col-md-12 col-xl-8 offset-xl-2">
            <div class="card">
                <div class="card-body">
                    <div class="text-center">
                        <h2>Crear Blog</h2>
                        
                    </div>
                    <form action="{{route('adminBlog.insert')}}"  method="POST" role="form" autocomplete="off"  enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            
                           
                            
                            
                            <div class="mb-3 col-md-12 ">
                                <label for="example-password-input1" class="form-label">Primer Titulo</label>
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
                                <label for="example-password-input1" class="form-label">Reseña</label>
                                <div class="">
                                    <textarea class="form-control" name="resena" id=""
                                     rows="7" required>
                                    </textarea>                                                                                                           
                                </div>
                            </div>

                            <div class="mb-3 col-md-12 ">
                                <label for="example-password-input1" class="form-label">Primer Texto</label>
                                <div class="">
                                    <textarea class="form-control" name="textoUno" id=""
                                     rows="7" required>
                                    </textarea>                                                                                                           
                                </div>
                            </div>

                            <div class="mb-3 col-md-12 ">
                                <label for="example-password-input1" class="form-label">Comentario</label>
                                <div class="">
                                    <textarea class="form-control" name="comentario" id=""
                                     rows="7" required>
                                    </textarea>                                                                                                           
                                </div>
                            </div>

                            <div class="mb-3 col-md-12 ">
                                <label for="example-password-input1" class="form-label">Segundo Titulo</label>
                                <div class="">
                                    <input class="form-control" type="input" name="txtTitulo2" id="example-password-input1"
                                        placeholder="Titulo dos" value="" required>
                                </div>
                            </div>

                            <div class="mb-3 col-md-12 ">
                                <label for="example-password-input1" class="form-label">Segundo Texto</label>
                                <div class="">
                                    <textarea class="form-control" name="textoDos" id=""
                                     rows="7" required>
                                    </textarea>                                                                                                           
                                </div>
                            </div>

                            <div class=" mb-3 col-md-12">
                            <label for="example-password-input1" class="form-label">Imagenes Secundarias</label>
                                <div class="dropzone">
                                    <div class="fallback">
                                        <input name="imagenes[]" type="file" accept="image/*" multiple required>
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
                                <label for="example-password-input1" class="form-label">Tercer Titulo</label>
                                <div class="">
                                    <input class="form-control" type="input" name="txtTitulo3" id="example-password-input1"
                                        placeholder="Titulo tres" value="" required>
                                </div>
                            </div>

                            <div class="mb-3 col-md-12 ">
                                <label for="example-password-input1" class="form-label">Tercer Texto</label>
                                <div class="">
                                    <textarea class="form-control" name="textoTres" id=""
                                     rows="7" required>
                                    </textarea>                                                                                                           
                                </div>
                            </div>

                            <div class="mb-3 col-md-12 ">
                                <label for="example-password-input1" class="form-label">Escritor</label>
                                <div class="">
                                    <input class="form-control" type="input" name="escritor" id="example-password-input1"
                                        placeholder="Autor" value="" required>
                                </div>
                            </div>

                            <div class="mb-3 col-md-12 ">
                                <label for="example-password-input1" class="form-label">Programa</label>
                                <div class="">
                                    <input class="form-control" type="input" name="programa" id="example-password-input1"
                                        placeholder="Tipo de Programa" value="" required>
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