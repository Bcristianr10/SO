@extends('plantilla.dt')
@section('titulo')
    Base de Datos Niños
@endsection

@section('contenido')
<div class="row">
    <div class="col-md-10 offset-md-1">
        <div class="card">
            <div class="card-body">
                
                <div class="row">
                    <h4 class="card-title col-sm-2">Base Datos</h4>
                    <div class="col-sm-2 offset-sm-8">
                        
                        
                        <button type="button" class="btn btn-primary waves-effect waves-light w-100"
                                        data-bs-toggle="modal" data-animation="bounce"
                                        data-bs-target=".crearUsuarioModal">
                            <span class="btn-label"><i class="fas fa-plus"></i> </span><span class="btn-text">
                                Crear Beneficiario
                            </span>
                        </button>
                        
                        
                                    
                    </div>
                </div>
                <br><br>
                <div class="table-responsive">
                    <table id="datatable-buttons" class="table table-striped table-bordered w-100">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Distrito</th>
                                <th>Corregimiento</th>
                                <th>Pais</th>
                                <th>Sexo</th>
                                <th>Edad</th>
                                <th>Estatus Migratorio</th>                                
                                <th>Nivel Academico</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>


                        <tbody>

                            @foreach ($resultado as $fila)
                                <tr>
                                    <td>{{$fila->nombres}} {{$fila->apellidos}}</td>
                                    <td>{{$fila->corregimiento->distrito->nombre}}</td>
                                    <td>{{$fila->corregimiento->nombre}}</td>
                                    <td>{{$fila->pais->nombre}}</td>
                                    <td>
                                        @if ($fila->sexo == 'M')
                                            Masculino
                                        @else
                                            Femenino
                                        @endif
                                    </td>
                                    <td>{{\Carbon\Carbon::parse($fila->fecha_nacimiento)->age}}</td>
                                    <td>{{$fila->estado_migratorio}}</td>
                                    <td>{{$fila->nivel_academico}}</td>                                    
                                    <td>
                                        <form action="{{route('baseDatos.perfil.hijo')}}" method="POST" role="form" autocomplete="off">
                                            @csrf
                                            <input type="hidden" name="id" value="{{$fila->id}}">                                  
                                            <button type="submit"  class="btn btn-success btn-sm"><i class="fas fa-eye"></i></button>
                                            
                                        </form>
                                        

                                    </td>

                                </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->    
@endsection