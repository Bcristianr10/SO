<div class="modal fade asignarFamiliaModal" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header ">
                <h5 class="modal-title align-self-center"
                    id="myLargeModalLabel">Agregar a Familia</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                     </button>
            </div>
            <div class="modal-body">
                <form action="{{route('asignar.familia')}}" method="POST" role="form" autocomplete="off" >
                    @csrf
                    <div class="row">
                        <div class="mb-3 col-md-12 ">
                            <label for="example-email-input1" class="form-label pt-0">Seleccione una familia</label>
                            <div class="">
                                <select class="form-control" name="txtFamilia" data-live-search="true">
                                    <option>Escoja una familia</option>
                                    @foreach ($familias as $familia)
                                        <option value="{{$familia->id}}">{{$familia->nombre}}</option>
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