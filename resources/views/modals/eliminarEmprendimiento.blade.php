<div class="modal fade eliminarEstadoModal{{$fila->id}}" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header text-white">
                <h5 class="modal-title align-self-center"
                    id="myLargeModalLabel">Eliminar</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                     </button>
            </div>
            <div class="modal-body">
                
                    <div class="row">
                        <div class="text-center col-md-12">
                            <h3>Desea Eliminar el Emprendimiento:</h3>
                            <h4>{{$fila->titulo}}</h4>
                        </div>
                        <br>
                        <br>
                        <br>

                        <div class="col-md-2 offset-md-2 ">
                            <a class="btn btn-outline-danger btn-round w-100" href="{{route('emprendimientos.eliminar',['id'=>$fila->id])}}"><i class="fa fa-trash"></i> Eliminar</a>
                        </div>
                        <div class="col-md-2 offset-md-4">
                            <button type="button" class="btn btn-outline-dark btn-round w-100" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">Cancelar</span>
                            </button>
                        </div>

                        
                        
                    </div>
                    
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>