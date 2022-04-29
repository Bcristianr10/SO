@extends('layouts.master')

@section('title') Crear Usuario @endsection


@section('content')
   
    @component('common-components.breadcrumb')
         @slot('title') Crear Usuario  @endslot
         @slot('li_1') Administracion  @endslot
     @endcomponent
    <div class="row col-md-8 offset-md-2">

        <div class="card">
            <div class="card-body">
                
                @include('forms.crearUsuario')
                
            </div>
        </div>

        
       
    </div>
    
@endsection