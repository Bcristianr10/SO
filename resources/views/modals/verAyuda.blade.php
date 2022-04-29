<div class="modal fade verAydudaModal{{$item->id}}" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title align-self-center"
                    id="myLargeModalLabel">Ver Ayuda</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                     </button>
                    
            </div>
            <div class="modal-body">
                
                    <div class="row">
                        <div class="mb-3 col-md-12 ">
                            <label for="example-email-input1" class="form-label pt-0">Tipo: {{$item->tipo->nombre}}</label>
                          
                        </div>
                        <div class="mb-3 col-md-12 ">
                            <label for="example-email-input1" class="form-label pt-0">Fecha: {{$item->created_at->format('d-m-Y')}}</label>
                          
                        </div>
                        <div class="mb-3 col-md-12 ">
                            <label for="example-email-input1" class="form-label pt-0">Mensaje: @isset($item->comentario->comentario)
                                {!!$item->comentario->comentario!!}
                            @endisset </label>
                          
                        </div>

                        <div class="mb-3 col-md-12 ">
                            <label for="example-email-input1" class="form-label pt-0">Comentario: {{$item->mensaje}}</label>
                          
                        </div>
                
                       
                    </div>
     
                   
                    
              
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>