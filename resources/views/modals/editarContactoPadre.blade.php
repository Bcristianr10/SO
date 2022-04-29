<div  class="modal fade editarContactoPadreModal" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header ">
                <h5 class="modal-title align-self-center"
                    id="myLargeModalLabel">Editar Contacto</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                     </button>
            </div>
            <div class="modal-body">
                <form action="{{route('editar.contacto.padre')}}" method="POST" role="form" autocomplete="off">
                    @csrf
                    <div class="row">
                        <div class="mb-3 col-md-6 ">
                            <label for="example-email-input1" class="form-label pt-0">Telefono</label>
                            <div class="">
                                <input class="form-control" type="input" value="{{$dato->telefono}}"
                                    id="example-email-input1" name="txtTelefono" required placeholder="65874898">
                            </div>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="example-email-input1" class="form-label pt-0">Email</label>
                            <div class="">
                                <input class="form-control" type="email" value="{{$dato->email}}"
                                    id="example-email-input1" name="txtEmail" required placeholder="@Example.com">
                            </div>
                        </div>
                        <label for="example-email-input1" class="form-label pt-0 col-lg-12">Direccion</label>
                        <div class="mb-3 col-md-4">
                            <label for="example-password-input01" class="form-label">Provincia</label>
                            <div class="">
                                <select class="form-control" name="provincia_id" id = "provincia_id">
                                   
                                    <option value=""  >Escoge una Opción</option>
                                    @foreach ($provincias as $provincia)
                                        <option value="{{$provincia->id}}" @if ($dato->corregimiento->distrito->provincia->id == $provincia->id) selected @endif >{{$provincia->nombre}}</option>
                                    @endforeach              
                                    
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 col-md-4">
                            <label for="example-password-input01" class="form-label">Distrito</label>
                            <div class="">
                                <select class="form-control" name="distrito_id" id="distrito_id">
                                   
                                    <option value=""  >Escoge una Opción</option>
                                    @foreach ($distritos as $distrito)
                                        <option value="{{$distrito->id}}" @if ($dato->corregimiento->distrito->id == $distrito->id) selected @endif >{{$distrito->nombre}}</option>
                                    @endforeach            
                                    
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 col-md-4">
                            <label for="example-password-input01" class="form-label">Corregimiento</label>
                            <div class="">
                                <select class="form-control" name="corregimiento_id" id="corregimiento_id">
                                   
                                    <option value=""  >Escoge una Opción</option>
                                    @foreach ($corregimientos as $corregimiento)
                                        <option value="{{$corregimiento->id}}" @if ($dato->corregimiento->id == $corregimiento->id) selected @endif >{{$corregimiento->nombre}}</option>
                                    @endforeach             
                                        
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 col-md-12 ">
                            <label for="example-password-input1" class="form-label">Direccion Exacta</label>
                            <div class="">
                                <input class="form-control" type="input" name="txtDireccion" value="{{$dato->direccion}}" id="example-password-input1"
                                    placeholder="Escriba su direccion">
                            </div>
                        </div>
                        <div class="mb-3 col-md-6 ">
                            <label for="example-password-input1" class="form-label">Pasaporte</label>
                            <div class="">
                                <input class="form-control" type="input" name="txtPasaporte" value="{{$dato->pasaporte}}" id="example-password-input1"
                                    placeholder="Ingrese su pasaporte">
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
    <script  
        src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
        crossorigin="anonymous">
    </script>
    <script type=text/javascript>
    
      
        $('#provincia_id').change(function(){
            var provincia_id = $(this).val();

            if (provincia_id == null){

                $('#distrito_id').html('<option value="" >Escoga una Opcion</option>');               
                $('#corregimiento_id').html('<option value="" >Escoga una Opcion</option>');   
            }

            $.get('/distritos/'+provincia_id+'', function(distrito){
                var html_distrito;
                html_distrito = '<option value="" >Escoga una Opcion</option>' ;

                for (var i=0; i<distrito.length; i++){
                    html_distrito += '<option value="'+distrito[i].id+'" >'+distrito[i].nombre+'</option>';
                }
                $('#distrito_id').html(html_distrito);
                $('#corregimiento_id').html('<option value="" >Escoga una Opcion</option>');   
            });
        });

        $('#distrito_id').change(function(){
            var distrito_id = $(this).val();

            if (distrito_id == 0){

                $('#corregimiento_id').html('<option value="" >Escoga una Opcion</option>');               
                
            }

            $.get('/corregimientos/'+distrito_id+'', function(corregimiento){
                var html;
                html = '<option value="" >Escoga una Opcion</option>' ;

                for (var i=0; i<corregimiento.length; i++){
                    html += '<option value="'+corregimiento[i].id+'" >'+corregimiento[i].nombre+'</option>';
                }
                $('#corregimiento_id').html(html);
            });
        });

       
      
      
      
      
    </script>
</div>