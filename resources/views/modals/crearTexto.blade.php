<div class="modal fade crearTextoModal" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header  text-white">
                <h5 class="modal-title align-self-center"
                    id="myLargeModalLabel">Crear Texto</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                     </button>
            </div>
            <div class="modal-body">
                <form action="{{route('texto.insert')}}" method="POST" role="form" autocomplete="off">
                    @csrf
                    <div class="row">
                        
                       
                        
                        <div class="mb-3 col-md-4 ">
                            <label for="example-password-input01" class="form-label">Idioma</label>
                            <div class="">
                                <select class="form-control" name="txtIdioma">

                                    <option value="ESP">Español</option>
                                    <option value="ENG">Ingles</option>                                   
                                     
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 col-md-8 ">
                            <label for="example-password-input1" class="form-label">Nombre</label>
                            <div class="">
                                <input class="form-control" type="input" name="txtNombre" id="example-password-input1"
                                    placeholder="Ingrese un nombre">
                            </div>
                        </div>

                        <div class="mb-3 col-md-12 ">
                            <label >Texto</label>
                            <div class="col-lg-12" >
                                <textarea class="form-control" id="elm1" rows="5" name="txtTexto"></textarea>
                                
                            </div>
                                
                            
                        </div>
                
                       
                    </div>
                    
                    <div class="modal-footer">                                        
                        <button type="submit"  class="btn btn-primary text-left">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>