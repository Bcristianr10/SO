<div class="modal fade editarImagenModal{{$fila->id}}" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header  text-white">
                <h5 class="modal-title align-self-center"
                    id="myLargeModalLabel">Editar Imagen</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                     </button>
            </div>
            <div class="modal-body">
                <form action="{{route('imagen.save')}}" method="POST" role="form" autocomplete="off">
                    @csrf
                    <div class="row">
                        
                        <div class="mb-3 col-md-8 ">
                            <label for="example-password-input1" class="form-label">Nombre</label>
                            <div class="">
                                <input class="form-control" type="input" name="txtNombre" id="example-password-input1"
                                    placeholder="Ingrese el nombre" value="{{$fila->nombre}} ">
                            </div>
                        </div>
                        
                        <div class="mb-3 col-md-4 ">
                            <label for="example-password-input1" class="form-label">Estado</label>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name ="estado" id="flexSwitchCheckChecked" @if ($fila->estado == 1)
                                    checked
                                @endif >
                                <label class="form-check-label ms-1" for="flexSwitchCheckChecked">Activo</label>
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