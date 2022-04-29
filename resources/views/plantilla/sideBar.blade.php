<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menú</li>
                
                @if (Auth::user()->rol_id == 1)
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="mdi mdi-database"></i>
                            {{-- <span class="badge rounded-pill bg-danger float-end">9+</span> --}}
                            <span>Base Datos</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="/adultos">Lista de Adultos</a></li>
                            <li><a href="/niños">Lista de Niños</a></li>
                            <li><a href="/familias">Lista de Familias</a></li>
                            <li><a href="/adultosPendientes">Lista de adultos pendientes</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="mdi mdi-web"></i>
                            {{-- <span class="badge rounded-pill bg-danger float-end">9+</span> --}}
                            <span>Pagina Web</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="/imagenes">Imagenes</a></li>
                            <li><a href="/usuarioCreate">Crear Usuario</a></li>
                            <li><a href="/estados">Lista de Estados</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="mdi mdi-cog"></i>
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


                {{-- <li>
                    <a href="javascript: void(0);" class="waves-effect">
                        <i class="mdi mdi-speedometer"></i>
                        <span class="badge rounded-pill bg-danger float-end">9+</span>
                        <span>Dashboards</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="index.html">Dashboard 1</a></li>
                        <li><a href="index-2.html">Dashboard 2</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-email-variant"></i>
                        <span>Email</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="email-inbox.html">Inbox</a></li>
                        <li><a href="email-read.html">Read Email</a></li>
                        <li><a href="email-compose.html">Compose Email</a></li>
                    </ul>
                </li>

                <!-- Calender -->
                <li>
                    <a href="calendar.html" class=" waves-effect">
                        <i class="mdi mdi-calendar"></i>
                        <span>Calendar</span>
                    </a>
                </li>


                <li class="menu-title">Components</li>

                <!-- UI Elements -->
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-briefcase-check"></i>
                        <span>UI Elements</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="ui-alerts.html">Alerts</a></li>
                        <li><a href="ui-buttons.html">Buttons</a></li>
                        <li><a href="ui-cards.html">Cards</a></li>
                        <li><a href="ui-dropdowns.html">Dropdowns</a></li>
                        <li><a href="ui-modals.html">Modals</a></li>
                        <li><a href="ui-typography.html">Typography</a></li>
                        <li><a href="ui-progress.html">Progress Bars</a></li>
                        <li><a href="ui-tabs-accordions.html">Tabs &amp; Accordions</a></li>
                        <li><a href="ui-tooltips-popovers.html">Tooltips &amp; Popover</a></li>
                        <li><a href="ui-carousel.html">Carousel</a></li>
                        <li><a href="ui-pagination.html">Pagination</a></li>
                        <li><a href="ui-video.html">Video</a></li>
                        <li><a href="ui-colors.html">Colors</a></li>
                        <li><a href="ui-grid.html">Grid System</a></li>
                        <li><a href="ui-spinners.html">Spinners</a></li>
                        <li><a href="ui-toasts.html">Toasts</a></li>
                    </ul>
                </li>

                <!-- Advanced UI -->
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-buffer"></i>
                        <span>Advanced UI</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="advanced-rangeslider.html">Range Slider</a></li>
                        <li><a href="advanced-sweetalerts.html">Sweet Alert</a></li>
                        <li><a href="advanced-nestable.html">Nestable List</a></li>
                        <li><a href="advanced-ratings.html">Ratings</a></li>
                        <li><a href="advanced-highlight.html">Highlight</a></li>
                        <li><a href="advanced-clipboard.html">Clipboard</a></li>
                        <li><a href="advanced-lightbox.html">Lightbox</a></li>
                        <li><a href="advanced-session.html">Session Timeout</a></li>
                        <li><a href="advanced-scrollbars.html">Scrollbars</a></li>
                    </ul>
                </li>

                <!-- Forms -->
                <li>
                    <a href="javascript: void(0);" class="waves-effect">
                        <i class="mdi mdi-clipboard-outline"></i>
                        <span class="badge bg-info float-end">8</span>
                        <span>Forms</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="forms-elements.html">Form Elements</a></li>
                        <li><a href="forms-advanced.html">Form Advanced</a></li>
                        <li><a href="forms-validation.html">Form Validation</a></li>
                        <li><a href="forms-wizard.html">Form Wizard</a></li>
                        <li><a href="forms-editors.html">Form Editor</a></li>
                        <li><a href="forms-repeater.html">Form Repeater</a></li>
                        <li><a href="forms-x-editable.html">Form Xeditable</a></li>
                        <li><a href="forms-uploads.html">Form File Upload</a></li>
                    </ul>
                </li>

                <!-- Charts -->
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-chart-arc"></i>
                        <span>Charts</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="charts-morris.html">Morris Chart</a></li>
                        <li><a href="charts-chartist.html">Chartist Chart</a></li>
                        <li><a href="charts-flot.html">Flot Chart</a></li>
                        <li><a href="charts-peity.html">Peity Chart</a></li>
                        <li><a href="charts-chartjs.html">Chartjs Chart</a></li>
                        <li><a href="charts-sparkline.html">Sparkline Chart</a></li>
                        <li><a href="charts-knob.html">Jquery Knob Chart</a></li>
                    </ul>
                </li>

                <!-- Table -->
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-format-list-bulleted-type"></i>
                        <span>Tables</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="tables-basic.html">Basic</a></li>
                        <li><a href="tables-datatable.html">Datatable</a></li>
                        <li><a href="tables-responsive.html">Responsive</a></li>
                        <li><a href="tables-editable.html">Editable</a></li>
                    </ul>
                </li>

                <!-- Icons -->
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-album"></i>
                        <span>Icons</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="icons-materialdesign.html">Material Design</a></li>
                        <li><a href="icons-dripicons.html">Dripicons</a></li>
                        <li><a href="icons-fontawesome.html">Font Awesome</a></li>
                        <li><a href="icons-themify.html">Themify</a></li>
                        <li><a href="icons-typicons.html">Typicons</a></li>
                    </ul>
                </li>

                <li class="menu-title">More</li>


                <!-- Layouts -->
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-cellphone-link"></i>
                        <span>Layouts</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li><a href="javascript: void(0);" class="has-arrow">Vertical</a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li><a href="layouts-compact-sidebar.html">Compact Sidebar</a></li>
                                <li><a href="layouts-dark-sidebar.html">Dark Sidebar</a></li>
                                <li><a href="layouts-icon-sidebar.html">Icon Sidebar</a></li>
                                <li><a href="layouts-colored-sidebar.html">Colored Sidebar</a></li>
                                <li><a href="layouts-boxed.html">Boxed Layout</a></li>
                                <li><a href="layouts-preloader.html">Preloader</a></li>
                            </ul>
                        </li>

                        <li><a href="javascript: void(0);" class="has-arrow">Horizontal</a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li><a href="layouts-horizontal.html">Horizontal</a></li>
                                <li><a href="layouts-hori-topbar-light.html">Topbar Light</a></li>
                                <li><a href="layouts-hori-boxed.html">Boxed Layout</a></li>
                                <li><a href="layouts-hori-preloader.html">Preloader</a></li>
                            </ul>
                        </li>
                    </ul>

                </li>

                <!-- Maps -->
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-map"></i>
                        <span>Maps</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="maps-google.html">Google Maps</a></li>
                        <li><a href="maps-vector.html">Vector Maps</a></li>
                    </ul>
                </li>

                <!-- Authentication -->
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-account-box"></i>
                        <span>Authentication</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="auth-login.html">Login</a></li>
                        <li><a href="auth-register.html">Register</a></li>
                        <li><a href="auth-recoverpw.html">Recover Password</a></li>
                        <li><a href="auth-lock-screen.html">Lock Screen</a></li>
                        <li><a href="auth-404.html">Error 404</a></li>
                        <li><a href="auth-500.html">Error 500</a></li>
                    </ul>
                </li>

                <!-- Pages -->
                <li>
                    <a href="javascript: void(0);" class="waves-effect">
                        <i class="mdi mdi-checkbox-multiple-blank-outline"></i>
                        <span class="badge bg-success float-end">Hot</span>
                        <span>Pages</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="page-tour.html">Tour</a></li>
                        <li><a href="page-timeline.html">Timeline</a></li>
                        <li><a href="page-invoice.html">Invoice</a></li>
                        <li><a href="page-treeview.html">Treeview</a></li>
                        <li><a href="page-profile.html">Profile</a></li>
                        <li><a href="page-starter.html">Starter Page</a></li>
                        <li><a href="page-pricing.html">Pricing</a></li>
                        <li><a href="page-faq.html">FAQs</a></li>
                    </ul>
                </li>

                <!-- Email -->
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-card-account-details"></i>
                        <span>Email Templates</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="email-templates-basic.html">Basic Action Email</a></li>
                        <li><a href="email-templates-alert.html">Alert Email</a></li>
                        <li><a href="email-templates-billing.html">Billing Email</a></li>
                    </ul>
                </li>


                <!-- Multi Level -->
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-share-variant"></i>
                        <span>Multi Level</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li><a href="javascript: void(0);">Level 1.1</a></li>
                        <li><a href="javascript: void(0);" class="has-arrow">Level 1.2</a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li><a href="javascript: void(0);">Level 2.1</a></li>
                                <li><a href="javascript: void(0);">Level 2.2</a></li>
                            </ul>
                        </li>
                    </ul>
                </li> --}}

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>