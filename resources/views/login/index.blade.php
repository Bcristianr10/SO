<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>Login | Organizacion sin Frontera</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- Bootstrap Css -->
    <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

</head>

<body class="auth-body-bg">

    <div class="container-fluid">
        <!-- Log In page -->
        <div class="row">
            <div class="col-lg-4 offset-lg-4">
                <div class="card mb-0 shadow-none">
                    <div class="card-body">

                        <h3 class="text-center m-0">
                            <a href="" class="logo logo-admin"><img src="assets/images/logo.png"
                                    height="150" alt="logo" class="my-3"></a>
                        </h3>

                        <div class="px-2 mt-2">
                            <h4 class="font-size-18 mb-2 text-center">Bienvenido!</h4>
                            <p class="text-muted text-center"></p>
                            @error('danger')
                                <div class="alert alert-danger alert-dismissible fade show d-flex align-items-center mb-0"
                                    role="alert">
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                    <i class="mdi mdi-close-circle me-2"></i>{{$message}}                                    
                                </div>
                            @enderror
                            <form class="form-horizontal my-4" action="" method="POST" role="form" autocomplete="off">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label" for="username">Usuario</label>
                                    <div class="input-group">

                                        <span class="input-group-text" id="basic-addon1"><i
                                                class="far fa-user"></i></span>

                                        <input type="text" class="form-control" id="username" name="usuario"
                                            placeholder="Ingrese su Usuario">
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="userpassword">Contraseña</label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon2"><i
                                                class="fa fa-key"></i></span>
                                        <input type="password" class="form-control" id="userpassword" name="password"
                                            placeholder="Ingrese su contraseña">
                                    </div>
                                </div>

                               
                                <!-- end row -->

                                <div class="mb-3 mb-0 row">
                                    <div class="col-12 mt-2">
                                        <button class="btn btn-primary w-100 waves-effect waves-light" type="submit">Ingresar <i class="fas fa-sign-in-alt ms-1"></i></button>
                                    </div>
                                    <!-- end col -->
                                </div>
                                <!-- end row -->
                            </form>
                            <!-- end form -->
                        </div>
                        
                    </div>
                </div>
            </div>
            <!-- end col -->

        </div>
        <!-- End Log In page -->
    </div>



    <!-- JAVASCRIPT -->
    <script src="assets/libs/jquery/jquery.min.js"></script>
    <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="assets/libs/simplebar/simplebar.min.js"></script>
    <script src="assets/libs/node-waves/waves.min.js"></script>

    <script src="assets/js/app.js"></script>

</body>

</html>