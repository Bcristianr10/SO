<div class="modal fade asignarEsposaModal" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header ">
                <h5 class="modal-title align-self-center"
                    id="myLargeModalLabel">Agregar a Esposa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                     </button>
            </div>
            <div class="modal-body">
                <form action="{{route('asignar.esposa')}}" method="POST" role="form" autocomplete="off" >
                    @csrf
                    <div class="row">
                        <div class="mb-3 col-md-12 ">
                            <label for="example-email-input1" class="form-label pt-0">Seleccione una esposa</label>
                            <div class="">
                                <select class="form-control" name="txtEsposa" data-live-search="true">
                                    <option>Escoja un esposa</option>
                                    @foreach ($esposos as $esposo)
                                        <option value="{{$esposo->id}}">{{$esposo->nombres}} {{$esposo->apellidos}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                       
                    </div>
                    
                    <div class="modal-footer"> 
                        
                        <input type="hidden" name="txtId" value="{{$dato->id}}">
                        <a class="btn btn-pink" href="{{route('crear.padre')}}">Crear Esposa</a><button type="submit"  class="btn btn-primary text-left">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>