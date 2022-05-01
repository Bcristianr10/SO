@extends('layouts.master')

@section('title') Actualizar Blog @endsection

@section('css')
    <!-- Plugins css -->
    <link href="{{URL::asset('/libs/dropzone/dropzone.min.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
   
    @component('common-components.breadcrumb')
         @slot('title') Blog  @endslot
         @slot('li_1') Actualizar @endslot
    @endcomponent

    <div class="row">
        <div class="col-md-12 col-xl-8 offset-xl-2">
            <div class="card">
                <div class="card-body">
                    <div class="text-center">
                        <h2>Actualizar Blog</h2>
                        
                    </div>
                    <form action="{{route('adminBlog.save')}}"  method="POST" role="form" autocomplete="off"  enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            
                           
                            
                            
                            <div class="mb-3 col-md-12 ">
                                <label for="example-password-input1" class="form-label">Primer Titulo</label>
                                <div class="">
                                    <input class="form-control" type="input" name="txtTitulo1" id="example-password-input1"
                                        placeholder="Titulo uno" value="{{$resultado->titulo_1}}" required>
                                </div>
                            </div>

                            
                            <div class=" mb-3 col-md-12">
                            <label for="example-password-input1" class="form-label">Imagen principal</label>
                                <div class="dropzone">
                                    <div class="fallback">
                                        <input name="archivo" type="file" accept="image/*">
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
                                     rows="7"  required>{{$resultado->resena}}
                                    </textarea>                                                                                                           
                                </div>
                            </div>

                            <div class="mb-3 col-md-12 ">
                                <label for="example-password-input1" class="form-label">Primer Texto</label>
                                <div class="">
                                    <textarea class="form-control" name="textoUno" id=""
                                     rows="7" required>{{$resultado->texto_1}}
                                    </textarea>                                                                                                           
                                </div>
                            </div>

                            <div class="mb-3 col-md-12 ">
                                <label for="example-password-input1" class="form-label">Comentario</label>
                                <div class="">
                                    <textarea class="form-control" name="comentario" id=""
                                     rows="7" required>{{$resultado->comentario}}
                                    </textarea>                                                                                                           
                                </div>
                            </div>

                            <div class="mb-3 col-md-12 ">
                                <label for="example-password-input1" class="form-label">Segundo Titulo</label>
                                <div class="">
                                    <input class="form-control" type="input" name="txtTitulo2" id="example-password-input1"
                                        placeholder="Titulo dos" value="{{$resultado->titulo_2}}" required>
                                </div>
                            </div>

                            <div class="mb-3 col-md-12 ">
                                <label for="example-password-input1" class="form-label">Segundo Texto</label>
                                <div class="">
                                    <textarea class="form-control" name="textoDos" id=""
                                     rows="7" required>{{$resultado->texto_2}}
                                    </textarea>                                                                                                           
                                </div>
                            </div>

                            <div class=" mb-3 col-md-12">
                            <label for="example-password-input1" class="form-label">Imagenes</label>
                                <div class="dropzone">
                                    <div class="fallback">
                                        <input name="imagenes[]" type="file" accept="image/*" multiple>
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
                                        placeholder="Titulo tres" value="{{$resultado->titulo_3}}" required>
                                </div>
                            </div>

                            <div class="mb-3 col-md-12 ">
                                <label for="example-password-input1" class="form-label">Tercer Texto</label>
                                <div class="">
                                    <textarea class="form-control" name="textoTres" id=""
                                     rows="7" required>{{$resultado->texto_3}}
                                    </textarea>                                                                                                           
                                </div>
                            </div>

                            <div class="mb-3 col-md-12 ">
                                <label for="example-password-input1" class="form-label">Escritor</label>
                                <div class="">
                                    <input class="form-control" type="input" name="escritor" id="example-password-input1"
                                        placeholder="Autor" value="{{$resultado->escritor}}" required>
                                </div>
                            </div>

                            <div class="mb-3 col-md-12 ">
                                <label for="example-password-input1" class="form-label">Programa</label>
                                <div class="">
                                    <input class="form-control" type="input" name="programa" id="example-password-input1"
                                        placeholder="Tipo de Programa" value="{{$resultado->programa}}" required>
                                </div>
                            </div>
                           
                        </div>
                        
                        <div class="modal-footer">  
                        <input type="hidden" name="txtId" value="{{$resultado->id}}">                 
                            <button type="submit"  class="btn btn-primary text-left">Guardar</button>
                        </div>
                    </form>

                    <h3>Imagenes</h3>

                    <div class="table-responsive">
                        <table id="datatable" class="table table-bordered">
                            <thead>
                                <tr>
                                    
                                    <th>Imagen</th>                                                              
                                    <th>Orden</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>


                            <tbody>
                            @foreach ($fotoBlog as $fotoBlogq)
                                    
                                    <tr>                                        
                                    <td class="d-flex justify-content-center"><img src="{{$fotoBlogq->ruta}}" alt="Givest-HasTech" height="100"></td>                                       
                                    <td>
                                            @if($fotoBlogq->tipo == 1)
                                            Imagen Principal
                                            @else
                                            Imagen Secundaria
                                            @endif                                
                                    </td> 
                                    <td>
                                         <button type="button" class="btn btn-danger btn-sm"  
                                                            data-toggle="modal" data-animation="bounce"
                                                            data-target=".eliminarEstadoModal{{$fotoBlogq->id}}">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                            @include('modals.eliminarImagenBlog')
                                    </td>                            
                                    </tr>
                                     
                            @endforeach                                                           
                            </tbody>
                        </table>
                    </div>
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