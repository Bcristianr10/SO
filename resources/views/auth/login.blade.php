@extends('layouts.master-without-nav')

@section('title') Login @endsection

@section('body')

<body>
    @endsection

    @section('content')
    <div class="home-btn d-none d-sm-block">
        <a href="index" class="text-dark"><i class="fa fa-home h2"></i></a>
    </div>
    <div class="account-pages my-5 pt-sm-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card overflow-hidden">
                        <div class="bg-login text-center">
                            <div class="bg-login-overlay"></div>
                            <div class="position-relative">
                                <h5 class="text-white font-size-20">Bienvenidos!</h5>
                                <p class="text-white-50 mb-0"></p>
                                <a href="index" class="logo logo-admin mt-4">
                                    <img src="{{asset('assets/images/Logo.png')}}" alt="" height="70">
                                </a>
                            </div>
                        </div>
                        <div class="card-body pt-5">
                            <div class="p-2">
                                <form method="POST" action="{{ route('login.login') }}">
                                    @csrf
                                    <div class="form-group">
                                        <label for="username">Usuario</label>
                                        <input id="email" type="text" class="form-control @error('usuario') is-invalid @enderror" name="txtUsuario" @if(old('txtUsuario')) value="{{ old('txtUsuario') }}" @else value="" @endif required  autofocus>
                                        @error('usuario')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="userpassword">Contraseña</label>
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" value="" name="txtPassword" required autocomplete="current-password">
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    

                                    <div class="mt-3">
                                        <button class="btn btn-primary btn-block waves-effect waves-light" id="login" type="submit">Ingresar</button>
                                    </div>

                                    
                                </form>
                            </div>

                        </div>
                    </div>
                    <div class="mt-5 text-center">
                        
                        <p>© <script>
                                document.write(new Date().getFullYear())
                            </script> Organizacion Sin Fronteras <i class="mdi mdi-heart text-danger"></i> by StyleSolution</p>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- JAVASCRIPT -->
    <script src="{{ URL::asset('libs/jquery/jquery.min.js')}}"></script>
    <script src="{{ URL::asset('libs/bootstrap/bootstrap.min.js')}}"></script>
    <script src="{{ URL::asset('libs/metismenu/metismenu.min.js')}}"></script>
    <script src="{{ URL::asset('libs/simplebar/simplebar.min.js')}}"></script>
    <script src="{{ URL::asset('libs/node-waves/node-waves.min.js')}}"></script>

    <script src="{{ URL::asset('js/app.min.js')}}"></script>
    @endsection