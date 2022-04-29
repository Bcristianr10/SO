<div class="modal fade agregarArchivoHijoModal" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header ">
                <h5 class="modal-title align-self-center"
                    id="myLargeModalLabel">Agregar Archivo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                     </button>
            </div>
            <div class="modal-body">
                <form action="{{route('agregar.archivo.hijo')}}" method="POST" role="form" autocomplete="off" accept-charset="UTF-8" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="mb-3 col-md-12 ">
                            <label for="example-email-input1" class="form-label pt-0">Descripcion</label>
                            <div class="">
                                <input class="form-control" type="input" value=""
                                    id="example-email-input1" name="txtDescripcion" required placeholder="Escriba una Descripcion del Archivo">
                            </div>
                        </div>                        
                        <div class="mb-3 col-md-12 ">
                            <label for="example-email-input1" class="form-label pt-0">Archivo</label>
                            <div class="">
                                <input type="file" name="archivo" id="input-file-now" class="dropify " />  
                            </div>
                        </div>
                
                       
                    </div>
                    
                    <div class="modal-footer"> 
                        
                        <input type="hidden" name="txtId" value="{{$dato->id}}">
                        <button type="submit"  class="btn btn-primary text-left">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>