<div class="modal fade eliminarEstadoModal{{$fila->id}}" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title align-self-center"
                    id="myLargeModalLabel">Eliminar</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                
                    <div class="row">
                        <div class="text-center col-md-12">
                            <h2>Desea Eliminar el Estado?</h2>
                        </div>
                        <br>
                        <br>
                        <br>

                        <div class="col-md-2 offset-md-2 ">
                            <a class="btn btn-danger btn-round w-100" href="{{route('eliminar.estado',['id'=>$fila->id])}}"><i class="fa fa-trash"></i> Eliminar</a>
                        </div>
                        <div class="col-md-2 offset-md-4">
                            <button type="button" class="btn btn-primary btn-round w-100" data-bs-dismiss="modal"
                            aria-label="Close">Salir</button>
                        </div>
                        
                        
                    </div>
                    
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>