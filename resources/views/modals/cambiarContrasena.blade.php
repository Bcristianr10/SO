<div id="cambiarContrasenaModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title align-self-center"
                    id="myLargeModalLabel">Cambiar Contraseña</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                     </button>
            </div>
            <div class="modal-body">
                <form action="{{route('login.cambiarContrasena.save')}}" method="POST" role="form" autocomplete="off">
                    @csrf
                    <div class="row">
                        <div class="mb-3 col-md-12 ">
                            <label for="example-email-input1" class="form-label pt-0">Contraseña Actual</label>
                            <div class="">
                                <input class="form-control" type="password" value=""
                                    id="example-email-input1" name="txtContrasenaActual" required placeholder="Escriba la contraseña actual">
                            </div>
                        </div>
                        <div class="mb-3 col-md-12 ">
                            <label for="example-email-input1" class="form-label pt-0">Contraseña Nueva</label>
                            <div class="">
                                <input class="form-control" type="password" value=""
                                    id="example-email-input1" name="txtContrasenaNueva" required placeholder="Escriba la contraseña nueva">
                            </div>
                        </div>   
                        <div class="mb-3 col-md-12 ">
                            <label for="example-email-input1" class="form-label pt-0">Confirme la nueva Contraseña</label>
                            <div class="">
                                <input class="form-control" type="password" value=""
                                    id="example-email-input1" name="txtContrasenaConfirmacion" required placeholder="confirme la nueva contraseña">
                            </div>
                        </div>                           
                        
                
                       
                    </div>
                    
                    <div class="modal-footer">                         
                        <button type="submit"  class="btn btn-primary text-left">Cambiar</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>