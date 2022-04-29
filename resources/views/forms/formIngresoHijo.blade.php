@extends('layouts.master-without-nav')

@section('title') Registrate @endsection
 @section('css2')

 <link href="{{asset('assets/css/style.css')}}" id="app-style" rel="stylesheet" type="text/css" />
 @endsection
@section('content')

     @component('common-components.breadcrumb')
         @slot('title') 
            <a href="{{route('inicio')}}" class="logo logo-dark" style="padding-left: 10px; padding-right: 10px;">
                <span class="logo-sm">
                    <img src="{{asset('assets/images/Logo.png')}}" alt="" height="60">
                </span>
                <span class="logo-lg">
                    <img src="{{asset('assets/images/Logo.png')}}" alt="" height="55">
                </span>
            </a>  
        @endslot
        
     @endcomponent

<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Formulario de Registros para Niños</h4>
                <p class="card-title-desc">Complete todos los campos</p>
                    @error('error')
                        <div class="alert alert-danger text-center" role="alert">
                             {{$message}}
                        </div>
                    @enderror
                    @include('forms.formularioHijo')

            </div>
        </div>
    </div>
</div>
<!-- end row -->

@endsection

@section('script')

<!-- form wizard -->
<script src="{{URL::asset('/libs/jquery-steps/jquery-steps.min.js')}}"></script>
<!-- form wizard init -->
<script src="{{URL::asset('/js/pages/form-wizard.init.js')}}"></script>
<script src="{{asset('assets/js/pages/function.js')}}"></script>
<script src="{{asset('assets/js/pages/form-editor.init.js')}}"></script>
<script src="{{asset('assets/libs/tinymce/tinymce.min.js')}}"></script>

@endsection