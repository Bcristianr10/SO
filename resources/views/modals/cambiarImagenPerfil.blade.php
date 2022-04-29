<div id="cambiarImagenPerfilModal" class="modal fade" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title align-self-center"
                    id="myLargeModalLabel">Cambiar Imagen</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                     </button>
            </div>
            <div class="modal-body">
                <div class="mb-3 col-md-12 text-center ">
                    @if ($dato->imagen_url == null)
                    <img src="{{asset('assets/images/perfilVacio.png')}}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" width="200px" alt="">
                    @else
                    <img src="{{$dato->imagen_url}}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" width="200px" alt="">    
                    @endif
                   
                </div>  
                <form action="{{route('cambiar.imagen.perfil')}}" method="POST" role="form" autocomplete="off" accept-charset="UTF-8" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                                              
                        <div class="mb-3 col-md-12 ">
                            <label for="example-email-input1" class="form-label pt-0">Nueva Imagen</label>
                            <div class="">
                                <input type="file" name="imagen" id="input-file-now" class="dropify" required accept="image/*"/>  
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