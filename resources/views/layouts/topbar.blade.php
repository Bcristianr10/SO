<header id="page-topbar">
    <div class="navbar-header">
        <div class="container-fluid">
            <div class="float-right">

                <div class="dropdown d-inline-block d-lg-none ml-2">
                    <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="mdi mdi-magnify"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-0" aria-labelledby="page-header-search-dropdown">

                        <form class="p-3">
                            <div class="form-group m-0">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="submit"><i class="mdi mdi-magnify"></i></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                

                <div class="dropdown d-none d-lg-inline-block ml-1">
                    <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
                    <i class="fa fa-arrows-alt" aria-hidden="true"></i>
                    </button>
                </div>

                <div class="dropdown d-inline-block">
                    <button style="padding-right: 20px;" type="button" class="btn header-item noti-icon waves-effect" id="page-header-notifications-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-bell" aria-hidden="true"></i>
                        @if (Auth::user()->cantidad_notificaciones()>0)
                            <span class="badge bg-danger rounded-pill">{{Auth::user()->cantidad_notificaciones()}}</span>
                        @endif    
                    </button>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-0" aria-labelledby="page-header-notifications-dropdown">
                        <div class="p-3">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h6 class="m-0"> Notificationes </h6>
                                </div>
                                
                                @if (Auth::user()->cantidad_notificaciones()>1)
                                    <div class="col-auto">
                                        <a href="{{route('eliminar.todas.notificaciones')}}" class="small text-danger"> Borrar todas</a>
                                    </div>
                                @endif  
                            </div>
                        </div>
                        <div data-simplebar style="max-height: 230px;">
                            @foreach (Auth::user()->notificaciones() as $notificacion)
                                <?php
    
                                    $data = json_decode($notificacion->data, true);                                        
                                    
                                ?>
                                @if ($notificacion->type =='App\Notifications\nuevoUsuario')
                                    
                                    <a 
                                        @if ($data['tipo']=='hijo')
                                            href="{{route('ver.notificacion.hijo',['id'=>$data['id']])}}"
                                        @else
                                            href="{{route('ver.notificacion.padre',['id'=>$data['id']])}}"
                                        @endif  
                                    class="text-reset notification-item">
                                        <div class="media">
                                            <div class="avatar-xs mr-3">
                                                <span class="avatar-title bg-primary rounded-circle font-size-16">
                                                    <i class="fa fa-user-circle-o"></i>
                                                </span>
                                            </div>
                                            <div class="media-body">
                                                <h6 class="mt-0 mb-1">{{$data['nombre']}}</h6>
                                                <div class="font-size-12 text-muted">
                                                    <p class="mb-1">{{$data['mensaje']}}</p>                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                @else

                                    <a href="{{route('mensaje.index')}}" class="text-reset notification-item">
                                        <div class="media">
                                            <div class="avatar-xs mr-3">
                                                <span class="avatar-title bg-pink rounded-circle font-size-16">
                                                    <i class="fa fa-envelope-o"></i>
                                                </span>
                                            </div>
                                            <div class="media-body">
                                                <h6 class="mt-0 mb-1">{{$data['nombre']}}</h6>
                                                <div class="font-size-12 text-muted">
                                                    <p class="mb-1">Te a dejado un nuevo mensaje!</p>                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </a>
    
                                    
                                    
                                @endif
                                
                            @endforeach                       
    
                        </div>
                       
                    </div>
                </div>

                <div class="dropdown d-inline-block">
                    <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img class="rounded-circle header-profile-user"
                            @if (Auth::user()->imagen_url == null)
                                src="{{asset('assets/images/perfilVacio.png')}}"
                            @else
                                src="{{Auth::user()->imagen_url}}"
                            @endif                    
                        alt="Header Avatar">
                        <span class="d-none d-xl-inline-block ml-1">{{Auth::user()->nombre}}</span>
                        <i class="fa fa-angle-down d-none d-xl-inline-block"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right">
                        <!-- item-->
                        <a class="dropdown-item d-block" data-toggle="modal" data-target="#cambiarImagenPerfilUModal" ><i class="fa fa-upload" aria-hidden="true"></i> Cambiar Imagen</a>
                        <a class="dropdown-item d-block" data-toggle="modal" data-target="#cambiarContrasenaModal"><i class="fa fa-key" aria-hidden="true"></i> Cambiar Contraseña</a>
                        <!-- <a class="dropdown-item d-block" href="#"><span class="badge badge-success float-right">11</span><i class="bx bx-wrench font-size-16 align-middle mr-1"></i> Settings</a>
                        <a class="dropdown-item" href="#"><i class="bx bx-lock-open font-size-16 align-middle mr-1"></i> Lock screen</a> -->
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item text-danger" href="{{route('logout')}}"><i class="fa fa-sign-out" aria-hidden="true"></i> Cerrar Sesión</a>
                    </div>
                </div>

                <div class="dropdown d-inline-block">
                    <button type="button" class="btn header-item noti-icon right-bar-toggle waves-effect">
                    <i class="fa fa-cog" aria-hidden="true"></i>
                    </button>
                </div>

            </div>
            <div>
                <!-- LOGO -->
                <div class="navbar-brand-box">
                    <a href="{{route('inicio')}}" class="logo logo-dark">
                        <span class="logo-sm">
                            <img src="{{asset('assets/images/Logo.png')}}" alt="" height="60">
                        </span>
                        <span class="logo-lg">
                            <img src="{{asset('assets/images/Logo.png')}}" alt="" height="55">
                        </span>
                    </a>

                    <a href="{{route('inicio')}}" class="logo logo-light">
                        <span class="logo-sm">
                            <img src="{{asset('assets/images/Logo.png')}}" alt="" height="60">
                        </span>
                        <span class="logo-lg">
                            <img src="{{asset('assets/images/Logo.png')}}" alt="" height="60">
                        </span>
                    </a>
                </div>

                <button type="button" class="btn btn-sm px-3 font-size-16 header-item toggle-btn waves-effect" id="vertical-menu-btn">
                    <i class="fa fa-fw fa-bars"></i>
                </button>

                <!-- App Search-->
                

                
            </div>

        </div>
    </div>
</header>
@include('modals.cambiarImagenPerfilU')
@include('modals.cambiarContrasena')