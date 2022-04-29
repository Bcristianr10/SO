<div class="modal fade editarInformacionPadreModal" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header ">
                <h5 class="modal-title align-self-center"
                    id="myLargeModalLabel">Editar Informacion</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                     </button>
            </div>
            <div class="modal-body">
                <form action="{{route('editar.informacion.padre')}}" method="POST" role="form" autocomplete="off">
                    @csrf
                    <div class="row">
                        <div class="mb-3 col-md-12 ">
                            <label  class="form-label pt-0">Comentario</label>
                            <div class="">
                                <textarea class="form-control" id="elm1" name="txtComentario">{!!$dato->comentario!!}</textarea>
                            </div>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label pt-0">Fecha de Nacimiento</label>
                            <div class="">
                                <input class="form-control" type="date" value="{{$dato->fecha_nacimiento}}"
                                            name="txtNacimiento"            id="example-date-input">
                            </div>
                        </div>
                        
                        <div class="mb-3 col-md-6">
                            <label  class="form-label">Pais de Nacimiento</label>
                            <div class="">
                                <select class="form-control" name="pais_id">
                                   
                                    <option value="0"  >Escoge una Opción</option>
                                    @foreach ($paises as $pais)
                                        <option value="{{$pais->id}}" @if ($dato->pais_id == $pais->id) selected @endif >{{$pais->nombre}}</option>
                                    @endforeach              
                                    
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label  class="form-label">Ocupacion</label>
                            <div class="">
                                <select class="form-control" onchange="val()" name="ocupacion_id" id="ocupacion_id">
                                   
                                    <option value="0"  >Insertar Ocupacion</option>
                                    @foreach ($ocupaciones as $ocupacion)
                                        <option value="{{$ocupacion->id}}" @if ($dato->ocupacion_id == $ocupacion->id) selected @endif >{{$ocupacion->nombre}}</option>
                                    @endforeach            
                                    
                                </select>
                                <script>
                                    function val() {
                                        d = document.getElementById("ocupacion_id").value;
                                        if (d != 0) {
                                            document.getElementById("div_ocupacion").style = "display: none"
                                        } else {
                                            document.getElementById("div_ocupacion").style = ""
                                        }
                                    }
                                </script>
                            </div>
                        </div>
                        <div class="mb-3 col-md-6" id="div_ocupacion" style="display: none">
                            <label  class="form-label">Ingrese su Ocupacion</label>
                            <div class="">
                                <input class="form-control" type="input" name="txtOcupacion"  id="example-password-input1"
                                    placeholder="Escriba su Ocupacion">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label  class="form-label">Nivel Academico</label>
                            <div class="">
                                <select class="form-control"  name="nivel_academico" >
                                   
                                    @foreach ($estados as $estado)
                                        @if ($estado->tipo == 'Academico')
                                            <option  @if ($dato->nivel_academico == $estado->nombre) selected @endif >{{$estado->nombre}}</option>
                                        @endif                                        
                                    @endforeach
                                    
                                    
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label  class="form-label">Estatus Laboral</label>
                            <div class="">
                                <select class="form-control"  name="estatus_laboral" >
                                   
                                    @foreach ($estados as $estado)
                                        @if ($estado->tipo == 'Laboral')
                                            <option  @if ($dato->situacion_laboral == $estado->nombre) selected @endif >{{$estado->nombre}}</option>
                                        @endif                                        
                                    @endforeach
                                </select>
                            </div>
                        </div>
                      
                        <div class="mb-3 col-md-6 ">
                            <label for="example-password-input1" class="form-label">Ingresos</label>
                            <div class="">
                                <input class="form-control" type="input" name="txtIngreso" value="{{$dato->ingreso_mensual}}" id="example-password-input1"
                                    placeholder="Ingrese su Ingreso">
                            </div>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label  class="form-label">Estado Migratorio</label>
                            <div class="">
                                <select class="form-control"  name="estatus_laboral" >
                                   
                                    @foreach ($estados as $estado)
                                        @if ($estado->tipo == 'Migratorio')
                                            <option  @if ($dato->estado_migratorio == $estado->nombre) selected @endif >{{$estado->nombre}}</option>
                                        @endif                                        
                                    @endforeach
                                </select>
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