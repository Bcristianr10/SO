<div class="modal fade agregarSegumientoModal" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header ">
                <h5 class="modal-title align-self-center"
                    id="myLargeModalLabel">Agregar Seguimiento</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                     </button>
            </div>
            <div class="modal-body">
                <form action="{{route('agregar.seguimiento')}}" method="POST" role="form" autocomplete="off">
                    @csrf
                    <div class="row">
                        <div class="mb-3 col-md-3">
                            <label  class="form-label">Tipo Ayuda</label>
                            <div class="">
                                <select class="form-control"  name="txtEstado" id="tipo_select">
                                   
                                    @foreach ($estados as $estado)
                                        @if ($estado->tipo == 'Ayuda')
                                            <option value="{{$estado->id}}">{{$estado->nombre}}</option>
                                        @endif                                        
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="mb-3 col-md-5">
                            <label  class="form-label">Ayuda</label>
                            <div class="">
                                <select class="form-control"  name="txtAyuda" id="ayuda_select">

                                    <option >puede seleccionar una ayuda</option>
                                    
                                </select>
                            </div>
                        </div>
                        
                        <div class="mb-3 col-md-4">
                            <label class="form-label pt-0">Fecha de Ayuda</label>
                            <div class="">
                                <input class="form-control" type="date" 
                                            name="txtFecha"            id="example-date-input" required>
                            </div>
                        </div>
                        <div class="mb-3 col-md-12 ">
                            <label  class="form-label pt-0">Comentario</label>
                            <div class="">
                                <textarea class="form-control" id="elm2" name="txtComentario"  required></textarea>
                            </div>
                        </div>
                        
                       
                    </div>
                   
                    
                    <div class="modal-footer"> 
                        
                        <input type="hidden" name="txtId" value="{{$dato->id}}">
                        @if (str_contains(Request::url(), 'perfilAdulto'))
                            <input type="hidden" name="txtTipo" value="padre">
                        @else
                            <input type="hidden" name="txtTipo" value="hijo">
                        @endif                      
                        
                        <button type="submit"  class="btn btn-primary text-left">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<script  
    src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
    crossorigin="anonymous">
</script>
<script type=text/javascript>


    $('#tipo_select').change(function(){
        var tipo = $(this).val();

        
        
        $.get('/ayudas/tipo/'+tipo+'', function(ayuda){
            var html_ayuda;
            html_ayuda = '<option value="" >puede seleccionar una ayuda</option>' ;

            for (var i=0; i<ayuda.length; i++){
                html_ayuda += '<option value="'+ayuda[i].id+'" >'+ayuda[i].nombre+'</option>';
            }
            $('#ayuda_select').html(html_ayuda);
           
        });

        $('#ayuda_select').html(html_ayuda);
    });


</script>