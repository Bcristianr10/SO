<div class="card">
    <div class="card-body">
        <h4 class="card-title mb-4">Seguimiento</h4>

        <div class="table-responsive">
            <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                <thead>
                    <tr class="align-self-center">
                        <th>Id</th>                        
                        <th>Fecha</th>
                        <th>Tipo</th>                        
                        <th>Ver</th>
                        <th>Ayuda</th>                                                        
                    </tr>
                </thead>
                <tbody>
                    @isset($dato->carpeta->seguimientos)
                         @foreach ($dato->carpeta->seguimientos as $key => $item) 
                            <tr>
                                <td>{{$key + 1 }}</td>
                                <td>{{\Carbon\Carbon::parse($item->created_at)->diffForHumans()}}</td>
                                <td>{{$item->tipo->nombre}}</td>
                                <td>
                                    <button type="button" class="btn btn-success  btn-sm"  
                                                    data-toggle="modal" data-animation="bounce"
                                                    data-target=".verAydudaModal{{$item->id}}">
                                        <i class="fa fa-eye"></i>
                                    </button>
                                </td> 
                                <td>
                                    @isset($item->comentario->comentario)
                                        {!!$item->comentario->comentario!!}
                                    @endisset
                                </td>
                                
                            </tr>
                            @include('modals.verAyuda')
                        @endforeach 
                    @endisset
                     
                    
                    
                </tbody>
            </table>
        </div>
        
        <div class="col-lx-3 offset-xl-9">
            <div class="pt-3 text-end">
                <button type="button" class="btn btn-success  btn-sm btn-block"  
                                data-toggle="modal" data-animation="bounce"
                                data-target=".agregarSegumientoModal">
                    <i class="fa fa-plus"></i> Agregar Seguimiento
                </button>
            </div>
            
        </div>

        @include('modals.seguimiento')
            
        
        
        
    </div>
</div>