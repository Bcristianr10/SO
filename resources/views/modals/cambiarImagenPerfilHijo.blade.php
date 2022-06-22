<div id="cambiarImagenPerfilHijoModal" class="modal fade" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title align-self-center"
                    id="myLargeModalLabel">Editar Perfil</h5>
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
                 
                <form action="{{route('cambiar.nombre.perfil')}}" method="POST" role="form" autocomplete="off" accept-charset="UTF-8" enctype="multipart/form-data">
                    @csrf
                    <div class="row">

                        <div class="mb-3 col-md-12 ">
                            <label for="example-email-input1" class="form-label pt-0">Nueva Imagen</label>
                            <div class="">
                                <input type="file" name="imagen" id="input-file-now" class="dropify" accept="image/*"/>  
                            </div>
                        </div>
                                              
                        <div class="mb-3 col-md-12 ">
                            <label for="example-email-input1" class="form-label pt-0">Nombres</label>
                            <div class="">
                                <input type="text" class="form-control" name="txtNombres" value="{{$dato->nombres}}"  />  
                            </div>
                        </div>
                        <div class="mb-3 col-md-12 ">
                            <label for="example-email-input1" class="form-label pt-0">Apellidos</label>
                            <div class="">
                                <input type="text" class="form-control" name="txtApellidos" value="{{$dato->apellidos}}"  />  
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