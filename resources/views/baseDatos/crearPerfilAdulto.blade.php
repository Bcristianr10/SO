@extends('layouts.master')

@section('title') Crear Beneficiario @endsection

@section('css2')

<link href="{{asset('assets/css/style.css')}}" id="app-style" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    @component('common-components.breadcrumb')
    @slot('title') Crear Beneficiario   @endslot
    @slot('title_li') Bienvenido a Organizacion sin Fronteras   @endslot
    @endcomponent
        @include('forms.formulario')
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