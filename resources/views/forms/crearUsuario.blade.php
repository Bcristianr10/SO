<form action="{{route('usuario.insert')}}" method="POST" role="form" autocomplete="off">
    @csrf
    <div class="row">
        <div class="mb-3 col-md-6 ">
            <label for="example-email-input1" class="form-label pt-0">Usuario</label>
            <div class="">
                <input class="form-control" type="input" value=""
                    id="example-email-input1" name="nombre" required placeholder="Pedro08">
            </div>
        </div>
        <div class="mb-3 col-md-6">
            <label for="example-email-input1" class="form-label pt-0">Email</label>
            <div class="">
                <input class="form-control" type="email" value=""
                    id="example-email-input1" name="email" required placeholder="@Example.com">
            </div>
        </div>
        <div class="mb-3 col-md-6 ">
            <label for="example-password-input1" class="form-label">Contraseña</label>
            <div class="">
                <input class="form-control" type="password" name="password" id="example-password-input1"
                    placeholder="Password">
            </div>
        </div>
        <div class="mb-3 col-md-6 ">
            <label for="example-password-input01" class="form-label">Rol</label>
            <div class="">
                <select class="form-control" name="rol_id">
                    <option value="0" selected>Escoge una Opción</option>
                    @foreach ($roles as $rol)
                        <option value="{{$rol->id}}">{{$rol->nombre}}</option>
                    @endforeach                 
                    
                </select>
            </div>
        </div>

       
    </div>
    
    <div class="modal-footer">                                        
        <button type="submit"  class="btn btn-primary text-left">Guardar</button>
    </div>
</form>