<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="{{route('index')}}" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="{{asset('assets/images/logo.png')}}" alt="" height="40">
                    </span>
                    <span class="logo-lg">
                        <img src="{{asset('assets/images/logo.png')}}"  alt="" height="60">
                    </span>
                </a>

                <a href="{{route('index')}}" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="{{asset('assets/images/logo.png')}}" alt="" height="40">
                    </span>
                    <span class="logo-lg">
                        <img src="{{asset('assets/images/logo.png')}}" alt="" height="60">
                    </span>
                </a>
            </div>

            <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn">
                <i class="mdi mdi-menu"></i>
            </button>

            <!-- Tools -->
            {{-- <div class="d-none d-sm-block ms-1">
                <div class="dropdown">
                    <button type="button" class="btn header-item waves-effect" data-bs-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="mdi mdi-plus-box-multiple"></i>
                        <span class="d-none d-xl-inline-block ms-1">Tools</span>
                        <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                    </button>
                    <div class="dropdown-menu">
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item">Photoshop</a>
                        <a href="javascript:void(0);" class="dropdown-item">Visual Studio</a>
                        <a href="javascript:void(0);" class="dropdown-item">Sublime Text 3</a>
                        <a href="javascript:void(0);" class="dropdown-item">Phpstorm</a>
                    </div>
                </div>
            </div>

            <div class="d-none d-lg-inline-block">
                <button type="button" class="btn header-item noti-icon waves-effect" data-bs-target="#search-wrap">
                    <i class="mdi mdi-airplane me-2 font-size-16"></i>Landing
                </button>
            </div> --}}

        </div>

        <!-- Search input -->
        {{-- <div class="search-wrap" id="search-wrap">
            <div class="search-bar">
                <input class="search-input form-control" placeholder="Search" />
                <a href="#" class="close-search toggle-search" data-target="#search-wrap">
                    <i class="mdi mdi-close-circle"></i>
                </a>
            </div>
        </div> --}}

        <div class="d-flex">

            {{-- <div class="dropdown d-none d-lg-inline-block">
                <button type="button" class="btn header-item toggle-search noti-icon waves-effect"
                    data-target="#search-wrap">
                    <i class="mdi mdi-magnify"></i>
                </button>
            </div> --}}

            {{-- <div class="dropdown d-inline-block d-lg-none ms-2">
                <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="mdi mdi-magnify"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                    aria-labelledby="page-header-search-dropdown">

                    <form class="p-3">
                        <div class="m-0">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search ..."
                                    aria-label="Recipient's username">
                                <button class="btn btn-primary" type="submit"><i class="mdi mdi-magnify"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="dropdown d-none d-md-block">
                <button type="button" class="btn header-item waves-effect" data-bs-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <img class="me-2" src="{{asset('assets/images/flags/us.jpg')}}" alt="Header Language" height="16"> English <span
                        class="mdi mdi-chevron-down"> </span>
                </button>
                <div class="dropdown-menu dropdown-menu-end">

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <img src="{{asset('assets/images/flags/germany.jpg')}}" alt="user-image" class="me-1" height="12"> <span
                            class="align-middle"> German </span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <img src="{{asset('assets/images/flags/italy.jpg')}}" alt="user-image" class="me-1" height="12"> <span
                            class="align-middle"> Italian </span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <img src="{{asset('assets/images/flags/french.jpg')}}" alt="user-image" class="me-1" height="12"> <span
                            class="align-middle"> French </span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <img src="{{asset('assets/images/flags/spain.jpg')}}" alt="user-image" class="me-1" height="12"> <span
                            class="align-middle"> Spanish </span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <img src="{{asset('assets/images/flags/russia.jpg')}}" alt="user-image" class="me-1" height="12"> <span
                            class="align-middle"> Russian </span>
                    </a>
                </div>
            </div> --}}

            <!-- Notification -->
            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item noti-icon waves-effect notification-step"
                    id="page-header-notifications-dropdown" data-bs-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    <i class="mdi mdi-bell-outline"></i>
                    @if (Auth::user()->cantidad_notificaciones()>0)
                        <span class="badge bg-danger rounded-pill">{{Auth::user()->cantidad_notificaciones()}}</span>
                    @endif                    
                </button>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                    aria-labelledby="page-header-notifications-dropdown">
                    <div class="p-3">
                        <h6 class="m-0">Notificaciones ({{Auth::user()->cantidad_notificaciones()}}) </h6>
                    </div>

                    <div data-simplebar style="max-height: 230px;">
                        @foreach (Auth::user()->notificaciones as $notificacion)
                            <?php

                                $data = json_decode($notificacion->data, true);                                        
                                
                            ?>
                            @if ($notificacion->type =='App\Notifications\nuevoUsuario')
                                <a href="" class="text-reset notification-item">
                                    <div class="d-flex align-items-start">
                                        <div class="avatar-xs me-3">
                                            <span class="avatar-title bg-primary rounded-circle font-size-16">
                                                <i class="mdi mdi-account"></i>
                                            </span>
                                        </div>
                                        <div class="flex-1">
                                            <h6 class="mb-1 font-size-15">{{$data['nombre']}}</h6>
                                            <div class="text-muted">
                                                <p class="mb-1 font-size-12">{{$data['mensaje']}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            @else

                                <a href="" class="text-reset notification-item">
                                    <div class="d-flex align-items-start">
                                        <div class="avatar-xs me-3">
                                            <span class="avatar-title bg-pink rounded-circle font-size-16">
                                                <i class="mdi mdi-email"></i>
                                            </span>
                                        </div>
                                        <div class="flex-1">
                                            <h6 class="mb-1 font-size-15">{{$data['nombre']}}</h6>
                                            <div class="text-muted">
                                                <p class="mb-1 font-size-12">Te a dejado un nuevo mensaje!</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                
                            @endif
                            
                        @endforeach                       

                    </div>
                        
                    
                </div>
            </div>

            <!-- full-screen -->
            <div class="dropdown d-none d-lg-inline-block ms-1">
                <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
                    <i class="mdi mdi-fullscreen"></i>
                </button>
            </div>

            <!-- User -->
            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item waves-effect user-step" id="page-header-user-dropdown"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                
                    <img class="rounded-circle header-profile-user" 
                    @if (Auth::user()->imagen_url == null)
                        src="{{asset('assets/images/perfilVacio.png')}}"
                    @else
                        src="{{Auth::user()->imagen_url}}"
                    @endif                    
                        alt="Header Avatar">
                    <span class="d-none d-xl-inline-block ms-1">{{Auth::user()->nombre}}</span>
                    <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <!-- item-->
                    {{-- <a class="dropdown-item" href="#"><i class="dripicons-user d-inline-block text-muted me-2"></i>
                        Profile</a>
                    <a class="dropdown-item" href="#"><i class="dripicons-wallet d-inline-block text-muted me-2"></i> My
                        Wallet</a> --}}
                    <a class="dropdown-item d-block" data-bs-toggle="modal" data-animation="bounce"
                    data-bs-target=".cambiarImagenPerfilUModal"><i
                            class="mdi mdi-image-auto-adjust d-inline-block text-muted me-2"></i>Cambiar Imagen</a>
                    <a class="dropdown-item d-block" data-bs-toggle="modal" data-animation="bounce"
                    data-bs-target=".cambiarContrasenaModal"><i
                            class="dripicons-gear d-inline-block text-muted me-2"></i> Cambiar Contraseña</a>
                 
                            
                        
                    {{-- <a class="dropdown-item" href="#"><i class="dripicons-lock d-inline-block text-muted me-2"></i> Lock
                        screen</a>
                    <div class="dropdown-divider"></div> --}}
                    <a class="dropdown-item" href="{{route('logout')}}"><i class="dripicons-exit d-inline-block text-muted me-2"></i>
                        Cerrar Sesion</a>
                </div>
                
            </div>
           
            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item noti-icon right-bar-toggle waves-effect">
                    <i class="mdi mdi-spin mdi-cog"></i>
                </button>
            </div>

        </div>
    </div>
</header>
@include('modals.cambiarImagenPerfilU')
@include('modals.cambiarContrasena')