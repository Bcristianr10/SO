<div class="modal fade eliminarEstadoModal{{$fotoBlogq->id}}" tabindex="-1" role="dialog"
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
                            <h3>Desea Eliminar la imagen:</h3>
                            <img src="{{$fotoBlogq->ruta}}" alt="Givest-HasTech" height="100">
                        </div>
                        <br>
                        <br>
                        <br>

                        <div class="col-md-2 offset-md-2 ">
                            <a class="btn btn-outline-danger btn-round w-100" href="{{route('adminBlogImage.eliminar',['id'=>$fotoBlogq->id,'idB'=>$blogID])}}"><i class="fa fa-trash"></i> Eliminar</a>
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