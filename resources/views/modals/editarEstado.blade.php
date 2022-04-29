<div class="modal fade editarEstadoModal{{$fila->id}}" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header  text-white">
                <h5 class="modal-title align-self-center"
                    id="myLargeModalLabel">Editar Estado</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                     </button>
            </div>
            <div class="modal-body">
                <form action="{{route('estado.save')}}" method="POST" role="form" autocomplete="off">
                    @csrf
                    <div class="row">
                        
                       
                        
                        <div class="mb-3 col-md-4 ">
                            <label for="example-password-input01" class="form-label">Tipo de Estado</label>
                            <div class="">
                                <select class="form-control" name="txtTipo">
                                    <option @if ($fila->tipo == 'Migratorio') selected @endif>Migratorio</option>
                                    <option @if ($fila->tipo == 'Civil') selected @endif>Civil</option> 
                                    <option @if ($fila->tipo == 'Academico') selected @endif>Academico</option>
                                    <option @if ($fila->tipo == 'Laboral') selected @endif>Laboral</option>           
                                    <option @if ($fila->tipo == 'Ayuda') selected @endif>Ayuda</option>   
                                    <option @if ($fila->tipo == 'Parentesco') selected @endif>Parentesco</option>     
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 col-md-8 ">
                            <label for="example-password-input1" class="form-label">Estado</label>
                            <div class="">
                                <input class="form-control" type="input" name="txtEstado" id="example-password-input1"
                                    placeholder="Ingrese el estado" value="{{$fila->nombre}}">
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
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>