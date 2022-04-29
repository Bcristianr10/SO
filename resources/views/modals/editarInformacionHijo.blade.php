<div class="modal fade editarInformacionHijoModal" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header ">
                <h5 class="modal-title align-self-center"
                    id="myLargeModalLabel">Editar Informacion</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                     </button>
            </div>
            <div class="modal-body">
                <form action="{{route('editar.informacion.hijo')}}" method="POST" role="form" autocomplete="off">
                    @csrf
                    <div class="row">
                        <div class="mb-3 col-md-12 ">
                            <label  class="form-label pt-0">Comentario</label>
                            <div class="">
                                <textarea class="form-control" id="elm1" name="txtComentario">{!!$dato->comentario!!}</textarea>
                            </div>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label pt-0">Fecha de Nacimiento</label>
                            <div class="">
                                <input class="form-control" type="date" value="{{$dato->fecha_nacimiento}}"
                                            name="txtNacimiento"            id="example-date-input">
                            </div>
                        </div>
                        
                        <div class="mb-3 col-md-6">
                            <label  class="form-label">Pais de Nacimiento</label>
                            <div class="">
                                <select class="form-control" name="pais_id">
                                   
                                    <option value="0"  >Escoge una Opción</option>
                                    @foreach ($paises as $pais)
                                        <option value="{{$pais->id}}" @if ($dato->pais_id == $pais->id) selected @endif >{{$pais->nombre}}</option>
                                    @endforeach              
                                    
                                </select>
                            </div>
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label  class="form-label">Nivel Academico</label>
                            <div class="">
                                <select class="form-control"  name="nivel_academico" >
                                   
                                    @foreach ($estados as $estado)
                                        @if ($estado->tipo == 'Academico')
                                            <option  @if ($dato->nivel_academico == $estado->nombre) selected @endif >{{$estado->nombre}}</option>
                                        @endif                                        
                                    @endforeach
                                    
                                    
                                </select>
                            </div>
                        </div>
                        
                        
                
                       
                    </div>
                    
                    <div class="modal-footer"> 
                        
                        <input type="hidden" name="txtId" value="{{$dato->id}}">
                        <button type="submit"  class="btn btn-primary text-left">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>