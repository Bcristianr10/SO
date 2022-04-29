<div id="eliminarPerfilModal" class="modal fade" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header  text-white">
                <h5 class="modal-title align-self-center"
                    id="myLargeModalLabel">Editar Usuario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                     </button>
            </div>
            <div class="modal-body">
                
                    <div class="row">
                        <div class="text-center col-md-12">
                            <h2>Desea Eliminar el Perfil?</h2>
                        </div>
                        <div class="col-md-2 offset-md-2 ">
                            <a class="btn btn-danger btn-round w-100" href="{{route('eliminar.perfilAdulto',['id'=>$dato->id])}}"><i class="fa fa-trash"></i> Eliminar</a>
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