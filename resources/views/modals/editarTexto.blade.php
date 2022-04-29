<div class="modal fade editarTextoModal{{$fila->id}}" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header  text-white">
                <h5 class="modal-title align-self-center"
                    id="myLargeModalLabel">Editar Texto</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                     </button>
            </div>
            <div class="modal-body">
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
                            <label for="example-password-input1" class="form-label">Texto</label>
                            <div class="">
                                <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea" name="txtTexto">{{$fila->texto}}</textarea>
                                
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