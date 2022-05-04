@extends('layouts.master')

@section('title') Idioma @endsection
@section('css')

    <!-- DataTables -->
    <link href="{{ URL::asset('/libs/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />

@endsection

@section('content')
    @component('common-components.breadcrumb')
        @slot('title') Textos  @endslot
        @slot('title_li') Bienvenido a Organizacion sin Fronteras   @endslot
    @endcomponent

    <div class="row">
        <div class="col-md-10 offset-md-1">
            @include('plantilla.error')
            <div class="card">
                <div class="card-body">
                    
                    <div class="text-center">
                        <h2>Editar Texto</h2>
                        
                    </div>
                    
                    <form action="{{route('texto.save')}}" method="POST" role="form" autocomplete="off">
                        @csrf
                        
                        <div class="row">
                            
                            
                            
                            <div class="mb-3 col-md-4 ">
                                <label for="example-password-input01" class="form-label">Idioma</label>
                                <div class="">
                                    <select class="form-control" name="txtIdioma">
    
                                        
                                        <option @if ($fila->idioma == 'ESP') selected @endif value='ESP'>Español</option>
                                        <option @if ($fila->idioma == 'ENG') selected @endif value='ENG'>Ingles</option>
                                        
                                            
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3 col-md-8 ">
                                <label for="example-password-input1" class="form-label">Nombre</label>
                                <div class="">
                                    <input class="form-control" type="input" name="txtNombre" id="example-password-input1"
                                        placeholder="Ingrese el estado" value="{{$fila->nombre}} ">
                                </div>
                            </div>                         

                            <div class="mb-3 col-md-12 ">
                                <label >Texto</label>
                                <div class="col-lg-12" >
                                    <textarea class="form-control" id="elm1" rows="5" name="txtTexto">{{$fila->texto}}</textarea>
                                    
                                </div>
                                    
                                
                            </div>
                    
                            
                        </div>
                        
                        <div class="modal-footer">    
                            <input type="hidden" name="txtId" value="{{$fila->id}}">                                    
                            <button type="submit"  class="btn btn-primary text-left">Guardar</button>
                        </div>
                    </form>
                    
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

    <script src="{{ URL::asset('/libs/tinymce/tinymce.min.js')}}"></script>

<!-- init js -->
    <script src="{{ URL::asset('/js/pages/form-editor.init.js')}}"></script>

@endsection