<div class="modal fade editarUsuarioModal{{$fila->id}}" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title align-self-center"
                    id="myLargeModalLabel">Editar Usuario</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('usuario.save')}}" method="POST" role="form" autocomplete="off">
                    @csrf
                    <div class="row">
                        <div class="mb-3 col-md-6 ">
                            <label for="example-email-input1" class="form-label pt-0">Usuario</label>
                            <div class="">
                                <input class="form-control" type="input" value="{{$fila->nombre}}"
                                    id="example-email-input1" name="nombre" required placeholder="Pedro08">
                            </div>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="example-email-input1" class="form-label pt-0">Email</label>
                            <div class="">
                                <input class="form-control" type="email" value="{{$fila->email}}"
                                    id="example-email-input1" name="email" required placeholder="@Example.com">
                            </div>
                        </div>
                        <div class="mb-3 col-md-6 ">
                            <label for="example-password-input1" class="form-label">Contraseña</label>
                            <div class="">
                                <input class="form-control" type="password" name="password" value="{{$fila->password}}" id="example-password-input1"
                                    placeholder="Password">
                            </div>
                        </div>
                        <div class="mb-3 col-md-6 ">
                            <label for="example-password-input01" class="form-label">Rol</label>
                            <div class="">
                                <select class="form-control" name="rol_id">
                                   
                                    <option value="0" @if ($fila->rol_id == 0) selected @endif >Escoge una Opción</option>
                                    @foreach ($roles as $rol)
                                        <option value="{{$rol->id}}" @if ($fila->rol_id == $rol->id) selected @endif>{{$rol->nombre}}</option>
                                    @endforeach                 
                                    
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 col-md-6 ">
                            <label for="example-password-input01" class="form-label">Estado</label>
                            <div class="">
                                <select class="form-control" name="estado">

                                    <option value="1" @if ($fila->estado == 1) selected @endif >Activo</option>
                                    <option value="0" @if ($fila->estado == 0) selected @endif >Bloqueado</option>                                                   
                                    
                                </select>
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