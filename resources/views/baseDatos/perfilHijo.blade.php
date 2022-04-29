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
         @slot('li_1') Niños  @endslot
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
                                                        data-target="#cambiarImagenPerfilHijoModal" title="Cambiar Imagen">
                                                    <div class="online-circle">
                                                        <i class="fa fa-circle text-success"></i>
                                                    </div>
                                                    
                                                @else
                                                    <img src="{{$dato->imagen_url}}" alt=""
                                                        class="avatar-lg mx-auto img-thumbnail rounded-circle" data-toggle="modal" data-animation="bounce"
                                                        data-target="#cambiarImagenPerfilHijoModal-" title="Cambiar Imagen">
                                                    <div class="online-circle">
                                                        <i class="fa fa-circle text-success"></i>
                                                    </div>
                                                @endif
                                                
                                            </div>

                                            <div class="mt-3 ">
                                                <a href="#" class="text-dark font-weight-medium font-size-16">{{$dato->nombres}} {{$dato->apellidos}}</a>
                                                
                                                <div class="row">
                                                    @if ($dato->estado == 1)
                                                        <div class="col-md-6 offset-md-3">
                                                            <a href="#" class="btn btn-success btn-round px-5">Activo</a>
                                                        </div>
                                                    @else
                                                    
                                                        <div class="col-md-6">
                                                            <a href="{{route('activar.perfilHijo',['id'=>$dato->id])}}" class="btn btn-success btn-round px-5">Activar</a>

                                                        </div>
                                                        <div class="col-md-6">
                                                            <a class="btn btn-danger btn-round px-5 text-white" data-toggle="modal" data-animation="bounce"
                                                            data-target="#eliminarPerfilHijoModal">Eliminar</a>
                                                        </div>
                                                        
                                                    
                                                        
                                                    @endif 
                                                </div> 
                                            </div>

                                        </div>

                                           

                                    </div>
                                </div>
                            </div>
                            @include('modals.cambiarImagenPerfilHijo')
                            @include('modals.eliminarPerfilAHijo')
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
                                                        data-target=".editarContactoHijoModal">
                                            Editar
                                        </button>
                                        
                                        @include('modals.editarContactoHijo')
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
                                      
                                    <h5>Nivel Academico</h5>                
                                    <p class="card-title-desc">{{$dato->nivel_academico}}
                                    </p>              
                                   
                                    <div class="col-md-4 offset-md-8">
                                        
                                        <button type="button" class="btn btn-primary w-100 btn-sm"  
                                                        data-toggle="modal" data-animation="bounce"
                                                        data-target=".editarInformacionHijoModal">
                                            Editar
                                        </button>
                                        
                                        @include('modals.editarInformacionHijo')
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
                                                                data-target=".agregarArchivoHijoModal">
                                                    <i class="fa fa-plus"></i> Agregar Archivo
                                                </button>
                                            </div>
                                            @include('modals.agregarArchivoHijo')
                                        </div>
                                        
                                    
                                    
                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-xl-2">
                            <div class="card">
                                <div class="card-body">
                                <h5 class="card-title mb-3">Informacion Familiar</h5>
                                    <ul class="list-unstyled mb-0">
                                    @if($dato->padre() == null)
                                        <button type="button" class="btn btn-primary btn-sm w-100"  
                                            data-toggle="modal" data-animation="bounce"
                                            data-target=".asignarPadreModal">
                                            <i class="fa fa-plus"></i> Asignar Padre
                                        </button>
                                    @else
                                        <li class="mt-2"><i
                                            class="mdi mdi-account-child-outline  text-primary  font-size-18 mt-2 me-2"></i>
                                            <b> Padre </b> : <a  href="{{route('perfil.adulto',['id'=>$dato->padre()->padre->id])}}">{{$dato->padre()->padre->nombres}} {{$dato->padre()->padre->apellidos}}</a>
                                        </li>
                                    @endif
                                    @include('modals.agregarPadre')
                                    <hr>
                                    @if($dato->madre() == null)
                                        <button type="button" class="btn btn-primary btn-sm w-100"  
                                            data-toggle="modal" data-animation="bounce"
                                            data-target=".asignarMadreModal">
                                            <i class="fa fa-plus"></i> Asignar Madre
                                        </button>
                                    @else
                                        <li class="mt-2"><i
                                            class="mdi mdi-account-child-outline  text-pink  font-size-18 mt-2 me-2"></i>
                                            <b> Madre </b> : <a  href="{{route('perfil.adulto',['id'=>$dato->madre()->padre->id])}}">{{$dato->madre()->padre->nombres}} {{$dato->madre()->padre->apellidos}}</a>
                                        </li>
                                    @endif
                                    @include('modals.agregarMadre')

                                    
                                        
                                       
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