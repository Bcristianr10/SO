<div class="modal fade asignarPadreModal" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header ">
                <h5 class="modal-title align-self-center"
                    id="myLargeModalLabel">Asignar Padre</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                     </button>
            </div>
            <div class="modal-body">
                <form action="{{route('asignar.padre')}}" method="POST" role="form" autocomplete="off" >
                    @csrf
                    <div class="row">
                        <div class="mb-3 col-md-12 ">
                            <label for="example-email-input1" class="form-label pt-0">Seleccione el padre</label>
                            <div class="">
                                <select class="form-control" name="txtPadre" data-live-search="true">
                                    <option>Escoja el padre</option>
                                    @foreach ($padre as $padre)
                                        <option value="{{$padre->id}}">{{$padre->nombres}} {{$padre->apellidos}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                       
                    </div>
                    
                    <div class="modal-footer"> 
                        
                        <input type="hidden" name="txtId" value="{{$dato->id}}">
                        <!-- <a class="btn btn-pink" href="{{route('crear.padre')}}">Crear Padre</a> -->
                        <button type="submit"  class="btn btn-primary text-left">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>