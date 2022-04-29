<div class="modal fade verMensajeModal{{$fila->id}}" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title align-self-center"
                    id="myLargeModalLabel">Ver Mensaje</h5>
                    
            </div>
            <div class="modal-body">
                
                    <div class="row">
                        <div class="mb-3 col-md-12 ">
                            <label for="example-email-input1" class="form-label pt-0">Nombre: {{$fila->nombre}}</label>
                          
                        </div>
                        <div class="mb-3 col-md-12 ">
                            <label for="example-email-input1" class="form-label pt-0">Email: {{$fila->email}}</label>
                          
                        </div>
                        <div class="mb-3 col-md-12 ">
                            <label for="example-email-input1" class="form-label pt-0">Telefono: {{$fila->telefono}}</label>
                          
                        </div>
                        <div class="mb-3 col-md-12 ">
                            <label for="example-email-input1" class="form-label pt-0">Mensaje: {{$fila->mensaje}}</label>
                          
                        </div>
                    
                        
                       
                
                       
                    </div>
     
                   
                    <div class="modal-footer">                         
                        
                        <a href="{{route('mensaje.marcar.leido',['id'=>$fila->id])}}" class="btn btn-danger btn-round px-5">Cerrar</a>
                    </div>
              
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>