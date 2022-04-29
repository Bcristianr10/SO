@extends('layouts.master')

@section('title') {{$dato->nombres}} {{$dato->apellidos}} @endsection

@section('css')

    <!-- DataTables -->
    <link href="{{ URL::asset('/libs/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="http://qovex-v.laravel.themesbrand.com/libs/dropzone/dropzone.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')
   
    @component('common-components.breadcrumb')
         @slot('title') Perfil  @endslot
         @slot('li_1') Adultos  @endslot
     @endcomponent


                    <!-- start row -->
                    <div class="row">
                        <div class="col-md-12 col-xl-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="profile-widgets py-3">

                                        <div class="text-center">
                                            <div class="">
                                                @if ($dato->imagen_url == null)
                                                    <img src="{{asset('assets/images/perfilVacio.png')}}" alt=""
                                                        class="avatar-lg mx-auto img-thumbnail rounded-circle" data-toggle="modal" data-animation="bounce"
                                                        data-target="#cambiarImagenPerfilModal" title="Cambiar Imagen">
                                                    <div class="online-circle">
                                                        <i class="fa fa-circle text-success"></i>
                                                    </div>
                                                    
                                                @else
                                                    <img src="{{$dato->imagen_url}}" alt=""
                                                        class="avatar-lg mx-auto img-thumbnail rounded-circle" data-toggle="modal" data-animation="bounce"
                                                        data-target="#cambiarImagenPerfilModal" title="Cambiar Imagen">
                                                    <div class="online-circle">
                                                        <i class="fa fa-circle text-success"></i>
                                                    </div>
                                                @endif
                                                
                                            </div>

                                            <div class="mt-3 ">
                                                <a href="#" class="text-dark font-weight-medium font-size-16">{{$dato->nombres}} {{$dato->apellidos}}</a>
                                                <p class="text-body mt-1 mb-1">{{$dato->ocupacion->nombre}}</p>

                                                @if ($dato->estado == 1)
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <a class="btn btn-warning btn-round px-5 text-white" data-toggle="modal" data-animation="bounce"
                                                                data-target="#bloquearPerfilModal">
                                                                Bloquear
                                                            </a>
                                                        </div>
                                                        
                                                        <div class="col-md-6">
                                                            <a class="btn btn-danger btn-round px-5 text-white" data-toggle="modal" data-animation="bounce"
                                                            data-target="#eliminarPerfilModal">Eliminar</a>
                                                        </div>
                                                    </div>
                                                @else
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <a href="{{route('activar.perfilAdulto',['id'=>$dato->id])}}" class="btn btn-success btn-round px-5">Activar</a>

                                                        </div>
                                                        <div class="col-md-6">
                                                            <a class="btn btn-danger btn-round px-5 text-white" data-toggle="modal" data-animation="bounce"
                                                            data-target="#eliminarPerfilModal">Eliminar</a>
                                                        </div>
                                                        
                                                    </div>
                                                    
                                                @endif  
                                            </div>

                                        </div>

                                           

                                    </div>
                                </div>
                            </div>
                            @include('modals.cambiarImagenPerfil')
                            @include('modals.eliminarPerfilA')
                            @include('modals.bloquearPerfilA')
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title mb-3">Contacto</h5>
                                    <ul class="list-unstyled mb-0">
                                        <li class=""><i class="fa fa-phone me-2 text-success font-size-18"></i> <b>
                                                Telefono </b> : {{$dato->telefono}}</li>
                                        <li class="mt-2"><i
                                                class="fa fa-envelope text-success font-size-18 mt-2 me-2"></i>
                                            <b> Email </b> : {{$dato->email}}
                                        </li>
                                        <li class="mt-2"><i
                                                class="fa fa-map-marker text-success font-size-18 mt-2 me-2"></i>
                                            <b>Direccion</b> :{{$dato->corregimiento->distrito->provincia->nombre}}, {{$dato->corregimiento->distrito->nombre}}, {{$dato->corregimiento->nombre}}, {{$dato->direccion}}
                                        </li>
                                        <li class="mt-2"><i
                                            class="fa fa-id-card text-success font-size-18 mt-2 me-2"></i>
                                        <b>Pasaporte</b> : {{$dato->pasaporte}}
                                    </li>
                                    </ul>
                                    <div class="col-md-4 offset-md-8">
                                        
                                        <button type="button" class="btn btn-primary w-100 btn-sm"  
                                                        data-toggle="modal" data-animation="bounce"
                                                        data-target=".editarContactoPadreModal">
                                            Editar
                                        </button>
                                        
                                        @include('modals.editarContactoPadre')
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-body">
                                    <h5>Informacion Personal</h5>                
                                    <p class="card-title-desc">{!!$dato->comentario!!}
                                    </p>  
                                    <h5>Edad</h5>                
                                    <p class="card-title-desc">{{\Carbon\Carbon::parse($dato->fecha_nacimiento)->age}} años
                                    </p>                  
                                    <h5>Pais de Nacimiento</h5>                
                                    <p class="card-title-desc">{{$dato->pais->nombre}}
                                    </p>
                                    <h5>Estado Migratorio</h5>                
                                    <p class="card-title-desc">{{$dato->estado_migratorio}}
                                    </p>
                                    <h5>Ocupacion</h5>                
                                    <p class="card-title-desc">{{$dato->ocupacion->nombre}}
                                    </p>  
                                    <h5>Nivel Academico</h5>                
                                    <p class="card-title-desc">{{$dato->nivel_academico}}
                                    </p>              
                                    <h5>Estatus Laboral</h5>                
                                    <p class="card-title-desc">{{$dato->situacion_laboral}}
                                    </p>
                                    <h5>Ingresos</h5>                
                                    <p class="card-title-desc">{{$dato->ingreso_mensual}}
                                    </p>
                                    <div class="col-md-4 offset-md-8">
                                        
                                        <button type="button" class="btn btn-primary w-100 btn-sm"  
                                                        data-toggle="modal" data-animation="bounce"
                                                        data-target=".editarInformacionPadreModal">
                                            Editar
                                        </button>
                                        
                                        @include('modals.editarInformacionPadre')
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="col-md-12 col-xl-7">
                            
                            @include('cards.seguimiento')
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title mb-4">Archivos</h4>
        
                                    <div class="table-responsive">
                                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                                <tr class="align-self-center">
                                                    <th>Descripcion</th>
                                                    <th>Fecha</th>
                                                    <th>Ver</th>                                                        
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @isset($dato->carpeta->archivos)
                                                    @foreach ($dato->carpeta->archivos as $item)
                                                        <tr>
                                                            <td>{{$item->descripcion}}</td>
                                                            <td>{{\Carbon\Carbon::parse($item->created_at)->diffForHumans()}}</td>
                                                            <td>
                                                                <a   class="btn btn-success btn-sm" href="{{$item->url}}" target="_blank" onclick="window.open(this.href, this.target, 'width=800,height=800'); return false;"><i class="fa fa-eye"></i></a>
                                                            </td>
                                                            
                                                        </tr>
                                                    @endforeach
                                                @endisset
                                                
                                                
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                    
                                        <div class="col-lx-3 offset-xl-9">
                                            <div class="pt-3 text-end">
                                                <button type="button" class="btn btn-pink  btn-sm btn-block"  
                                                                data-toggle="modal" data-animation="bounce"
                                                                data-target=".agregarArchivoModal">
                                                    <i class="fa fa-plus"></i> Agregar Archivo
                                                </button>
                                            </div>
                                            @include('modals.agregarArchivo')
                                        </div>
                                        
                                    
                                    
                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-xl-2">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title mb-3">Informacion Familiar</h5>
                                    <ul class="list-unstyled mb-0">
                                        @if($dato->pareja())
                                            @if ($dato->sexo == 'M')
                                                <li class=""><i class="mdi mdi-gender-female me-2 text-pink font-size-18"></i> <b>
                                                    esposa </b> : <a  href="{{route('perfil.adulto',['id'=>$dato->pareja()->id])}}">{{$dato->pareja()->nombres}} {{$dato->pareja()->apellidos}}</a>
                                                </li>
                                            @else
                    
                                                <li class=""><i class="mdi mdi-gender-male me-2 text-primary font-size-18"></i> <b>
                                                    esposo </b> : <a  href="{{route('perfil.adulto',['id'=>$dato->pareja()->id])}}">{{$dato->pareja()->nombres}} {{$dato->pareja()->apellidos}}</a>
                                                    
                                                </li>
                                                
                                            @endif                    
                                            
                                        @else
                                            @if ($dato->sexo == 'M')
                                                <button type="button" class="btn btn-primary btn-sm w-100"  
                                                                data-toggle="modal" data-animation="bounce"
                                                                data-target=".asignarEsposaModal">
                                                    <i class="fa fa-plus"></i> Asignar Esposa
                                                </button>
                                                @include('modals.agregarEsposa')
                                            @else
                                                <button type="button" class="btn btn-primary btn-sm w-100"  
                                                                data-toggle="modal" data-animation="bounce"
                                                                data-target=".asignarEsposoModal">
                                                    <i class="fa fa-plus"></i> Asignar Esposo
                                                </button>
                                                @include('modals.agregarEsposo')
                                                    
                                            @endif  
                                            
                                        @endif
                                        <button type="button" class="btn btn-primary btn-sm w-100"  
                                                        data-toggle="modal" data-animation="bounce"
                                                        data-target=".asignarEsposoModal">
                                            <i class="fa fa-plus"></i> Agregar Hijo
                                        </button>
                                        
                                        @foreach ($dato->hijos as $hijo)
                                            <li class="mt-2"><i
                                                    class="mdi mdi-account-child-outline @if ($hijo->hijo->sexo == 'M') text-primary @else text-pink @endif font-size-18 mt-2 me-2"></i>
                                                <b> @if ($hijo->hijo->sexo == 'M')
                                                    Hijo
                                                @else
                                                    Hija
                                                @endif </b> : <a  href="{{route('perfil.hijo',['id'=>$hijo->hijo->id])}}">{{$hijo->hijo->nombres}} {{$hijo->hijo->apellidos}}</a>
                                                                                                   
                                            </li>
                                        @endforeach
                                        
                                       
                                    </ul>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title mb-3">Familia</h5>
                                    <ul class="list-unstyled mb-0">
                                        @if($dato->familia_id >0 || $dato->familia_id != null)
                                            <li class=""><i class="mdi mdi-family-tree me-2 text-success font-size-18"></i> <b>
                                                Familia </b> : <a class="button" onclick="event.preventDefault();document.getElementById('my_form3').submit();">
                                                    {{$dato->familia->nombre}} 
                                                </a>
                                                <form action="{{ route('familia.perfil')}}" method="post" id="my_form3">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{$dato->familia->id}}">
                                                </form> 
                                            </li>
                                            <button type="button" class="btn btn-pink btn-sm w-100"  
                                                            data-toggle="modal" data-animation="bounce"
                                                            data-target=".asignarFamiliaModal">
                                                <i class="fa fa-plus"></i> Asignar a otra Familia
                                            </button>
                                            @include('modals.agregarFamilia')
                    
                                        @else
                    
                                            <button type="button" class="btn btn-pink btn-sm w-100"  
                                                            data-toggle="modal" data-animation="bounce"
                                                            data-target=".asignarFamiliaModal">
                                                <i class="fa fa-plus"></i> Agregar a una Familia
                                            </button>
                                            @include('modals.agregarFamilia')
                                            
                                        @endif
                                        
                                        
                                        
                                        
                                       
                                    </ul>
                                </div>
                            </div>
                        </div>
                     

             </div>

            <!-- end row -->
    @endsection

    @section('script')
        <!-- apexcharts -->
        <script src="{{ URL::asset('/libs/apexcharts/apexcharts.min.js')}}"></script>
        <script src="{{ URL::asset('/js/pages/profile.init.js')}}"></script>
        

    

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
        <!-- Plugins js -->
        <script src="http://qovex-v.laravel.themesbrand.com/libs/dropzone/dropzone.min.js"></script>

    @endsection