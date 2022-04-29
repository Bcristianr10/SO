@extends('layouts.master')

@section('title') Editar Ayuda @endsection

@section('content')
   
    @component('common-components.breadcrumb')
         @slot('title') Ayudas  @endslot
         @slot('li_1') Editar @endslot
    @endcomponent

    <div class="row">
        <div class="col-md-12 col-xl-8 offset-xl-2">
            <div class="card">
                <div class="card-body">
                    <div class="text-center">
                        <h2>Editar Ayuda</h2>
                        
                    </div>
                    <form action="{{route('ayuda.save')}}" method="POST" role="form" autocomplete="off">
                        @csrf
                        <div class="row">
                            
                           
                            
                            <div class="mb-3 col-md-4 ">
                                <label for="example-password-input01" class="form-label">Tipo de Ayuda</label>
                                <div class="">
                                    <select class="form-control" name="txtTipo">
    
                                        @foreach ($tipos as $tipo)
                                            <option value="{{$tipo->id}}" @if($tipo->id == $resultado->estado_id) selected @endif>{{$tipo->nombre}}</option>
                                        @endforeach
                                       
                                       
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3 col-md-8 ">
                                <label for="example-password-input1" class="form-label">Nombre</label>
                                <div class="">
                                    <input class="form-control" type="input" name="txtNombre" id="example-password-input1"
                                        placeholder="Ingrese un nombre" value="{{$resultado->nombre}}">
                                </div>
                            </div>
    
                            <div class="mb-3 col-md-12 ">
                                <label >Mensaje</label>
                                <div class="col-lg-12" >
                                    <textarea class="form-control" id="elm1" name="txtMensaje">{!!$resultado->comentario!!}</textarea>
                                    
                                </div>
                                    
                                
                            </div>
                    
                           
                        </div>
                        
                        <div class="modal-footer">  
                            <input type="hidden" name="txtId" value="{{$resultado->id}}">                                      
                            <button type="submit"  class="btn btn-primary text-left">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
                   

@endsection

@section('script')
    

    
    <!--tinymce js-->
    <script src="http://qovex-v.laravel.themesbrand.com/libs/tinymce/tinymce.min.js"></script>
    <!-- init js -->
    <script src="http://qovex-v.laravel.themesbrand.com/js/pages/form-editor.init.js"></script>
    

@endsection