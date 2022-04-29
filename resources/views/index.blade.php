@extends('layouts.master')

@section('title') Inicio @endsection

@section('content')
    @component('common-components.breadcrumb')
    @slot('title') Inicio   @endslot
    @slot('title_li') Bienvenido a Organizacion sin Fronteras   @endslot
    @endcomponent
        <div ><img src="{{asset('assets/images/Logo.png')}}"  alt="Coches" style="width:60%; opacity: 0.3;" class="mx-auto d-block"></div>
@endsection