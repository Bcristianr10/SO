<div class="modal fade editarImagenModal{{$fila->id}}" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header  text-white">
                <h5 class="modal-title align-self-center"
                    id="myLargeModalLabel">Editar Donación</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                     </button>
            </div>
            <div class="modal-body">
                <form action="{{route('donaciones.save')}}" method="POST" role="form" autocomplete="off"  enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                            
                           
                            
                            
                            <div class="mb-3 col-md-12 ">
                                <label for="example-password-input1" class="form-label">Monto</label>
                                <div class="">
                                    <input class="form-control" type="number" name="txtMonto" id="example-password-input1"
                                        placeholder="Ingrese el titulo" value="{{$fila->monto}}" required>
                                </div>
                            </div>

                            <div class="col-md-12 " id="div__changes-nivelInstrucion">
                                <div class="mb-3 row " >
                                <label for="txtCityShipping"
                                        class="col-lg-3 col-form-label">Descripción</label>
                                    <div class="col-lg-12" id="grupo__txtPrincipal__Comentario">
                                    <textarea class="form-control" id="elm1" name="txtDescripcion">{{$fila->descripcion}}</textarea>
                                    <i class="fa fa-times-circle validacion__estado"></i>    
                                </div>
                                    
                                </div>
                            </div>

                            <div class="mb-3 col-md-12 ">
                                <label for="example-password-input1" class="form-label">Nombre</label>
                                <div class="">
                                    <input class="form-control" type="input" name="txtNombre" id="example-password-input1"
                                        placeholder="Ingrese un nombre" value="{{$fila->nombre}}" required>
                                </div>
                            </div>

                            <div class=" mb-3 col-md-12">
                            <label for="example-password-input1" class="form-label">Imagen (330 x 200 px)</label>
                                <div class="dropzone">
                                    <div class="fallback">
                                        <input name="archivo" type="file" accept="image/*">
                                    </div>
                                    <div class="dz-message needsclick">
                                        <div class="mb-3">
                                            <i class="display-4 text-muted fa fa-cloud-upload"></i>
                                        </div>
            
                                        <h4>Arrastre el archivo o presione aquí.</h4>
                                    </div>
                                </div>
                            </div>
                    
                           
                        </div>
                    
                    <div class="modal-footer">    
                        <input type="hidden" name="txtId" value="{{$fila->id}}">                                    
                        <button type="submit"  class="btn btn-primary text-left">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

