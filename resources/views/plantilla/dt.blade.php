<!doctype html>
<html lang="en">

    <head>

        <meta charset="utf-8" />
        <title>@yield('titulo')</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Organizacion sin Fronteras Panamá Oeste" name="description" />
        <meta content="Themesbrand" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{asset('assets/images/Logo.png')}}">       

    

        <!-- DataTables -->
        <link href="{{asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />

        <!-- Responsive datatable examples -->
        <link href="{{asset('assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />

        <!-- Bootstrap Css -->
        <link href="{{asset('assets/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="{{asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="{{asset('assets/css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css" />



    </head>

    <body data-topbar="dark">
        
        <!-- Begin page -->
        <div id="layout-wrapper">

            
           @include('plantilla.topBar')

            <!-- ========== Left Sidebar Start ========== -->
            @include('plantilla.sideBar')
            <!-- Left Sidebar End -->

            

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">
                        @include('plantilla.error')
                        @yield('contenido')

                    </div>
                    <!-- container-fluid -->
                </div>
                <!-- End Page-content -->


                @include('plantilla.footer')
            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->

        <!-- Right Sidebar -->
        <div class="right-bar">
            <div data-simplebar class="h-100">
                <div class="rightbar-title px-3 py-4">
                    <a href="javascript:void(0);" class="right-bar-toggle float-end">
                        <i class="mdi mdi-close noti-icon"></i>
                    </a>
                    <h5 class="m-0">Settings</h5>
                </div>

                <!-- Settings -->
                <hr />
                <h6 class="text-center mb-0">Choose Layouts</h6>

                <div class="p-4">
                    <div class="mb-2">
                        <img src="{{asset('assets/images/layouts/layout-1.jpg')}}" class="img-fluid img-thumbnail" alt="">
                    </div>
                    <div class="form-check form-switch mb-3">
                        <input type="checkbox" class="form-check-input theme-choice" id="light-mode-switch" checked />
                        <label class="custom-control-label" for="light-mode-switch">Light Mode</label>
                    </div>

                    <div class="mb-2">
                        <img src="{{asset('assets/images/layouts/layout-2.jpg')}}" class="img-fluid img-thumbnail" alt="">
                    </div>
                    <div class="form-check form-switch mb-3">
                        <input type="checkbox" class="form-check-input theme-choice" id="dark-mode-switch"
                            data-bsStyle="{{asset('assets/css/bootstrap-dark.min.css')}}" data-appStyle="{{asset('assets/css/app-dark.min.css')}}" />
                        <label class="custom-control-label" for="dark-mode-switch">Dark Mode</label>
                    </div>

                    <div class="mb-2">
                        <img src="{{asset('assets/images/layouts/layout-3.jpg')}}" class="img-fluid img-thumbnail" alt="">
                    </div>
                    <div class="form-check form-switch mb-5">
                        <input type="checkbox" class="form-check-input theme-choice" id="rtl-mode-switch"
                            data-appStyle="{{asset('assets/css/app-rtl.min.css')}}" />
                        <label class="custom-control-label" for="rtl-mode-switch">RTL Mode</label>
                    </div>


                </div>

            </div> <!-- end slimscroll-menu-->
        </div>
        <!-- /Right-bar -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

         <!-- JAVASCRIPT -->
         <script src="{{asset('assets/libs/jquery/jquery.min.js')}}"></script>
         <script src="{{asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
         <script src="{{asset('assets/libs/metismenu/metisMenu.min.js')}}"></script>
         <script src="{{asset('assets/libs/simplebar/simplebar.min.js')}}"></script>
         <script src="{{asset('assets/libs/node-waves/waves.min.js')}}"></script>
 
         <!-- Required datatable js -->
         <script src="{{asset('assets/libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
         <script src="{{asset('assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
         <!-- Buttons examples -->
         <script src="{{asset('assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
         <script src="{{asset('assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js')}}"></script>
         <script src="{{asset('assets/libs/jszip/jszip.min.js')}}"></script>
         <script src="{{asset('assets/libs/pdfmake/build/pdfmake.min.js')}}"></script>
         <script src="{{asset('assets/libs/pdfmake/build/vfs_fonts.js')}}"></script>
         <script src="{{asset('assets/libs/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
         <script src="{{asset('assets/libs/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
         <script src="{{asset('assets/libs/datatables.net-buttons/js/buttons.colVis.min.js')}}"></script>
         <!-- Responsive examples -->
         <script src="{{asset('assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
         <script src="{{asset('assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')}}"></script>
 
         <!-- Datatable init js -->
         <script src="{{asset('assets/js/pages/datatables.init.js')}}"></script>
 
         <script src="{{asset('assets/js/app.js')}}"></script>
        
    </body>

</html>