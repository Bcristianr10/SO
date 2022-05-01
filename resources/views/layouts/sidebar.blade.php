<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div class="h-100">

        

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu</li>
                @if (Auth::user()->rol_id == 1)
                    <li>
                        <a href="javascript: void(0);" class=" waves-effect">
                            <i class="fa fa-database"></i>
                            {{-- <span class="badge rounded-pill bg-danger float-end">9+</span> --}}
                            <span>Base Datos</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="javascript: void(0);" >Adultos</a>
                                <ul class="sub-menu" aria-expanded="true">
                                    <li><a href="/adultos">Activos</a></li>
                                    <li><a href="/adultosPendientes">Pendientes</a></li>
                                    <li><a href="/bloqueados/adultos">Bloqueados</a></li>
                                </ul>
                            </li>
                            <li><a href="javascript: void(0);" >Niños</a>
                                <ul class="sub-menu" aria-expanded="true">
                                    <li><a href="/niños">Activos</a></li>
                                    <li><a href="/niñosPendientes">Pendientes</a></li>
                                    <li><a href="/bloqueados/niños">Bloqueados</a></li>
                                </ul>
                            </li>                           
                            
                            <li><a href="/familias">Lista de Familias</a></li>
                            
                            
                            
                        </ul>                        
                    </li>
                    <li>
                        <a href="/mensajes" class=" waves-effect">
                            <i class="fa fa-envelope-o"></i>                           
                            <span>Mensajes</span> 
                                @if (Auth::user()->cantidad_mensajes_sin_leer()>9)
                                    <span class="badge rounded-pill bg-danger text-white float-end"> 9+  </span>
                                @elseif(Auth::user()->cantidad_mensajes_sin_leer()==0)
                                @else
                                    <span class="badge rounded-pill bg-danger text-white float-end"> {{Auth::user()->cantidad_mensajes_sin_leer()}}</span>
                                @endif
                            </span>
                        </a>
                        
                    </li>
                    <li>
                        <a href="javascript: void(0);" class=" waves-effect">
                            <i class="fa fa-bar-chart"></i>
                            {{-- <span class="badge rounded-pill bg-danger float-end">9+</span> --}}
                            <span>Reportes</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="/graficas">Dashboard</a></li> 
                            <li><a href="/graficas/paises">Paises</a></li>                               
                        </ul>                       
                    </li>
                    <li>
                    <li>
                        <a href="javascript: void(0);" class=" waves-effect">
                            <i class="fa fa-caret-square-o-right"></i>
                            {{-- <span class="badge rounded-pill bg-danger float-end">9+</span> --}}
                            <span>Ayudas</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="/ayudas">Lista de Ayudas</a></li>
                            
                        </ul>
                    </li>
                    <li>
                        <a href="javascript: void(0);" class=" waves-effect">
                            <i class="fa fa-internet-explorer"></i>
                            {{-- <span class="badge rounded-pill bg-danger float-end">9+</span> --}}
                            <span>Pagina Web</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="/imagenes">Imagenes</a></li>
                            <li><a href="/idiomas">Idiomas</a></li>
                            <li><a href="/emprendimientos">Emprendimientos</a></li>
                            <li><a href="/donaciones">Donaciones</a></li>
                            <li><a href="/blog">Blog</a></li>
                            
                        </ul>
                    </li>
                    
                    <li>
                        <a href="javascript: void(0);" class=" waves-effect">
                            <i class="fa fa-cog"></i>
                            {{-- <span class="badge rounded-pill bg-danger float-end">9+</span> --}}
                            <span>Administracion</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="/usuarios">Lista Usuarios</a></li>
                            <li><a href="/usuarioCreate">Crear Usuario</a></li>
                            <li><a href="/estados">Lista de Estados</a></li>
                        </ul>
                    </li>
                    
                    
                @else
                    
                @endif
               

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->