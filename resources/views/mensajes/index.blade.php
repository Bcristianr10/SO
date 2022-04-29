@extends('layouts.master')

@section('title')Mensajes @endsection

@section('css')

    <!-- DataTables -->
    <link href="{{ URL::asset('/libs/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />

@endsection

@section('content')

    @component('common-components.breadcrumb')
         @slot('title') Mensajes  @endslot
         @slot('li_1') Paginas  @endslot
     @endcomponent

     <div class="row">
        <div class="col-md-12">
            @include('plantilla.error')
            <div class="card">
                <div class="card-body">
                    
                    <div class="row">
                        <h4 class="card-title col-sm-2">Mensajes</h4>
                        <div class="col-sm-2 offset-sm-8">
                            
                            
                            
                        </div>
                    </div>
                    <br><br>
                    
                    <div class="table-responsive">
                        <table id="datatable" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Fecha</th>
                                    <th>Remitente</th>
                                    <th>Email</th>                                                             
                                    <th>Acciones</th>
                                </tr>
                            </thead>


                            <tbody>
                                
                               
                                @foreach ($mensajes as $key =>  $fila)
                                    <tr @if (in_array($fila->id, $mensajes_sin_leer)) style="font-weight: bold;" @endif>
                                        
                                        
                                        <td>                                            
                                            {{$key+1}}
                                        </td>
                                        <td>{{$fila->created_at->diffForHumans()}}</td>
                                        <td>{{$fila->nombre}}</td>
                                        <td>{{$fila->email}}</td>                                       
                                        <td>
                                            <button type="button" class="btn btn-success btn-sm"  
                                                            data-toggle="modal" data-animation="bounce"
                                                            data-target=".verMensajeModal{{$fila->id}}">
                                                <i class="fa fa-eye"></i>
                                            </button>
                                            <a href="{{route('mensaje.eliminar',['id'=>$fila->id])}}" class="btn btn-danger  btn-sm"><i class="fa fa-trash"></i></a>
                                            @include('modals.verMensaje')

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

@endsection