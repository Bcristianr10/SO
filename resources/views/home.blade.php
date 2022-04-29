<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <?php 
      use App\Http\Controllers\imagenesController; 
      use App\Http\Controllers\idiomaController; 
      if (Session::has('idioma')){
        $idioma = Session::get('idioma');
      }else{
        $idioma = 'ESP';
      }
      $imagenPrueba = imagenesController::traerImagen('principal_1');

    
    ?>

    <title>{{idiomaController::traerTexto('inicio',$idioma);}} | Organización Sin Fronteras</title>

    <!--== Favicon ==-->
    <link rel="shortcut icon" href="{{asset('assets/images/Logol2.png')}}" type="image/x-icon" />

    <!--== Google Fonts ==-->
    <link href="https://fonts.googleapis.com/css?family=Yeseva+One:400" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,400i,500,500i,700,700i" rel="stylesheet">

    <!--== Bootstrap CSS ==-->
    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet"/>
    <!--== Icofont CSS ==-->
    <link href="{{asset('assets/css/icofont.css')}}" rel="stylesheet"/>
    <!--== ElegantIcons CSS ==-->
    <link href="{{asset('assets/css/elegantIcons.css')}}" rel="stylesheet"/>
    <!--== Animate CSS ==-->
    <link href="{{asset('assets/css/animate.css')}}" rel="stylesheet"/>
    <!--== Aos CSS ==-->
    <link href="{{asset('assets/css/aos.css')}}" rel="stylesheet"/>
    <!--== FancyBox CSS ==-->
    <link href="{{asset('assets/css/jquery.fancybox.min.css')}}" rel="stylesheet"/>
    <!--== Slicknav CSS ==-->
    <link href="{{asset('assets/css/slicknav.css')}}" rel="stylesheet"/>
    <!--== Swiper CSS ==-->
    <link href="{{asset('assets/css/swiper.min.css')}}" rel="stylesheet"/>
    <!--== Main Style CSS ==-->
    <link href="{{asset('assets/css/style2.css')}}" rel="stylesheet" />

</head>

<body>
  
<!--wrapper start-->
<div class="wrapper home-default-wrapper">

  <!--== Start Preloader Content ==-->
  <div class="preloader-wrap">
    <div class="preloader">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>
  <!--== End Preloader Content ==-->

  <!--== Start Header Wrapper ==-->
  @include('navbar')
  <!--== End Header Wrapper ==-->
  
  <main class="main-content">
    <!--== Start Hero Area Wrapper ==-->
    <section class="home-slider-area slider-default">
      <div class="home-slider-content">
        <!-- Start Slide Item -->
        <div class="home-slider-item">
          <div class="slider-content-area">
            <div class="container">
              <div class="row">
                <div class="col-md-6 col-lg-6 col-xl-7">
                  <div class="content" data-aos="fade-right" data-aos-duration="1000">
                    <div class="subtitle-content">
                      <img src="{{asset('assets/images/icons/1.png')}}" alt="Givest-HasTech">
                      <h6>"{{idiomaController::traerTexto('titulo_2',$idioma);}}"</h6><br><h6>"{{idiomaController::traerTexto('titulo_3',$idioma);}}"</h6>
                    </div>
                    <div class="tittle-wrp">
                      <h2>{{idiomaController::traerTexto('titulo_1',$idioma);}}</h2>
                    </div>
                    <div class="btn-wrp">
                      <a href="{{route('form')}}" class="btn-theme btn-gradient btn-slide btn-style">{{idiomaController::traerTexto('formulario_adulto',$idioma);}}</a>
                      <a href="{{route('formhijo')}}" class="btn-theme btn-gradient btn-slide btn-style">{{idiomaController::traerTexto('formulario_nino',$idioma);}}</a>
                    </div>
                  </div>
                </div>
                <div class="col-md-5 offset-md-1 col-lg-5 offset-lg-1 col-xl-5 offset-xl-0">
                  <div class="layer-style">
                    <div class="thumb scene">
                      <span class="scene-layer" data-depth="0.20">  
                        
                        @if(isset($imagenPrueba))

                          <img class="" src="{{$imagenPrueba->ruta}}" alt="Image-Givest" height="612" width="634">
                          

                        @else
                          <img class="" src="{{asset('assets/images/slider/1.jpg')}}" alt="Image-Givest">
                        @endif
                        
                      </span>
                      <div class="shape-circle scene">
                        <span class="scene-layer" data-depth="0.10">
                          <img src="{{asset('assets/images/shape/circle1.png')}}" alt="Image-Givest">
                        </span>
                        <span class="scene-layer" data-depth="0.40">                        
                          <img class="circle-img" src="{{asset('assets/images/shape/2.png')}}" alt="Image-Givest">
                        </span>
                      </div>
                    </div>
                    <div class="shape-style1 scene">
                      <span class="scene-layer" data-depth="0.30">
                        <img src="{{asset('assets/images/shape/1.png')}}" alt="Image-Givest">
                      </span>
                    </div>
                    <div class="donate-circle-wrp">
                      <div class="pie-chart-circle" data-size="255" data-line-width="8" data-line-cap="butt" data-track-color="#ffffff54" data-bar-color="#fff" data-percent="68"></div>
                      <div class="donate-content">
                        <div class="raised-amount">{{idiomaController::traerTexto('apoyar',$idioma);}}</div>
                        <img class="line-shape-img" src="{{asset('assets/images/shape/line-s2.png')}}" alt="Image-Givest">
                        <h5 class="donate-title">{{idiomaController::traerTexto('subtitulo_2',$idioma);}} </h5>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="slider-shape">
              <div class="shape-style1">
                <img class="shape-img1" src="{{asset('assets/images/shape/map1.png')}}" alt="">
              </div>
              <div class="shape-style2">
                <img class="shape-img2" src="{{asset('assets/images/shape/map2.png')}}" alt="Image-Givest"> 
              </div>
              <div class="shape-style3">
                <img class="shape-img3" src="{{asset('assets/images/shape/banner-line1.png')}}" alt="Image-Givest">
              </div>
              <div class="shape-style4">
                <img class="shape-img3" src="{{asset('assets/images/shape/banner-line2.png')}}" alt="Image-Givest">
              </div>
            </div>
          </div>
        </div>
        <!-- End Slide Item -->
      </div>
    </section>
    <!--== End Hero Area Wrapper ==-->

    <!--== Start Service Area ==-->
    <section class="service-area service-default-area">
      <div class="container">
        <div class="row icon-box-style1" data-aos="fade-up" data-aos-duration="1000">
          <div class="col-md-6 col-lg-3">
            <div class="icon-box-item item-one mb-md-30"  style="background:linear-gradient(30deg, royalblue, #002C68);">
              <div class="icon-box-top">
                <!-- <div class="icon-box">
                  <img class="icon-img" src="{{asset('assets/images/icons/s1.png')}}" alt="Icon">
                </div> -->
                <h2 class="text-white" style="font-weight: bold;">{{idiomaController::traerTexto('programa_de_salud',$idioma);}}</h2>
              </div>
              <div class="content">
                <div class="separator-line">
                  <img src="{{asset('assets/images/shape/line-s1.png')}}" alt="Givest-HasTech">
                </div>
                <p class="text-center">{{idiomaController::traerTexto('texto_programa_de_salud',$idioma);}} </p>
                
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-3">
            <div class="icon-box-item item-two mb-md-30" style="background:linear-gradient(30deg, #00c8fb,#00A0C9);">
              <div class="icon-box-top">
                <!-- <div class="icon-box">
                  <img class="icon-img" src="{{asset('assets/images/icons/s2.png')}}" alt="Icon">
                </div> -->
                <h2 class="text-white" style="font-weight: bold;">{{idiomaController::traerTexto('programa_deportivo',$idioma);}}</h2>
              </div>
              <div class="content">
                <div class="separator-line">
                  <img src="{{asset('assets/images/shape/line-s1.png')}}" alt="Givest-HasTech">
                </div>
                <p class="text-center">{{idiomaController::traerTexto('texto_deporte',$idioma);}}</p>
                <!-- <a href="causes-details.html" class="btn-theme btn-white btn-border btn-size-md">View Details <img class="icon icon-img" src="{{asset('assets/images/icons/arrow-line-right.png')}}" alt="Icon"></a> -->
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-3">
            <div class="icon-box-item item-three mb-md-30" style="background:linear-gradient(30deg, royalblue, #002C68);">
              <div class="icon-box-top">
                <!-- <div class="icon-box">
                  <img class="icon-img" src="{{asset('assets/images/icons/s2.png')}}" alt="Icon">
                </div> -->
                <h2 class="text-white" style="font-weight: bold;">{{idiomaController::traerTexto('programa_social',$idioma);}}</h2>
              </div>
              <div class="content">
                <div class="separator-line">
                  <img src="{{asset('assets/images/shape/line-s1.png')}}" alt="Givest-HasTech">
                </div>
                <p>{{idiomaController::traerTexto('texto_social',$idioma);}}</p>
                <!-- <a href="causes-details.html" class="btn-theme btn-white btn-border btn-size-md">View Details <img class="icon icon-img" src="{{asset('assets/images/icons/arrow-line-right.png')}}" alt="Icon"></a> -->
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-3">
            <div class="icon-box-item item-two" style="background:linear-gradient(30deg, #00c8fb,#00A0C9);">
              <div class="icon-box-top">
                <!-- <div class="icon-box">
                  <img class="icon-img" src="{{asset('assets/images/icons/s3.png')}}" alt="Icon">
                </div> -->
                <h2 class="text-white" style="font-weight: bold;">{{idiomaController::traerTexto('programa_educacion',$idioma);}}</h2>
              </div>
              <div class="content">
                <div class="separator-line">
                  <img src="{{asset('assets/images/shape/line-s1.png')}}" alt="Givest-HasTech">
                </div>
                <p>{{idiomaController::traerTexto('texto_educacion',$idioma);}}</p>
                <!-- <a href="causes-details.html" class="btn-theme btn-white btn-border btn-size-md">View Details <img class="icon icon-img" src="{{asset('assets/images/icons/arrow-line-right.png')}}" alt="Icon"></a> -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--== End Service Area ==-->

    

    

    

    

    

    

    

    <!--== Start Brand Logo Area ==-->
    <section class="brand-logo-area brand-logo-default-area">
      <div class="container">
        <div class="row" data-aos="fade-up" data-aos-duration="1000">
          <div class="col-sm-8 offset-sm-2 col-md-8 offset-md-2 col-lg-4 offset-lg-0 col-xl-4">
            <div class="section-title text-center text-lg-start">
              
            </div>
          </div>
          <div class="col-lg-8 col-xl-7 offset-xl-1">
            <div class="brand-logo-content">
              
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--== End Brand Logo Area ==-->
  </main>

  <!--== Start Footer Area Wrapper ==-->
  @include('footer')
  <!--== End Footer Area Wrapper ==-->

  <!--== Start Side Menu ==-->
  <aside class="off-canvas-wrapper">
    <div class="off-canvas-inner">
      <div class="off-canvas-overlay"></div>
      <!-- Start Off Canvas Content Wrapper -->
      <div class="off-canvas-content">
        <!-- Off Canvas Header -->
        <div class="off-canvas-header">
          <div class="logo-area">
            <a href="{{route('index')}}"><img src="{{asset('assets/images/logol.png')}}" alt="Logo" /></a>
          </div>
          <div class="close-action">
            <button class="btn-close"><i class="icofont-close"></i></button>
          </div>
        </div>

        <div class="off-canvas-item">
          <!-- Start Mobile Menu Wrapper -->
          <div class="res-mobile-menu menu-active-one">
            <!-- Note Content Auto Generate By Jquery From Main Menu -->
          </div>
          <!-- End Mobile Menu Wrapper -->
        </div>
        <!-- Off Canvas Footer -->
        <div class="off-canvas-footer"></div>
      </div>
      <!-- End Off Canvas Content Wrapper -->
    </div>
  </aside>
  <!--== End Side Menu ==-->  
</div>

<!--=======================Javascript============================-->

<!--=== Modernizr Min Js ===-->
<script src="{{asset('assets/js/modernizr.js')}}"></script>
<!--=== jQuery Min Js ===-->
<script src="{{asset('assets/js/jquery-main.js')}}"></script>
<!--=== jQuery Migration Min Js ===-->
<script src="{{asset('assets/js/jquery-migrate.js')}}"></script>
<!--=== Popper Min Js ===-->
<script src="{{asset('assets/js/popper.min.js')}}"></script>
<!--=== Bootstrap Min Js ===-->
<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
<!--=== jquery Appear Js ===-->
<script src="{{asset('assets/js/jquery.appear.js')}}"></script>
<!--=== jquery Swiper Min Js ===-->
<script src="{{asset('assets/js/swiper.min.js')}}"></script>
<!--=== jquery Fancybox Min Js ===-->
<script src="{{asset('assets/js/fancybox.min.js')}}"></script>
<!--=== jquery Aos Min Js ===-->
<script src="{{asset('assets/js/aos.min.js')}}"></script>
<!--=== jquery Tilt Animation Js ===-->
<script src="{{asset('assets/js/tilt-animation.js')}}"></script>
<!--=== jquery Scene Mouse Move Min Js ===-->
<script src="{{asset('assets/js/parallax.min.js')}}"></script>
<!--=== jquery Slicknav Js ===-->
<script src="{{asset('assets/js/jquery.slicknav.js')}}"></script>
<!--=== jquery Counterup Js ===-->
<script src="{{asset('assets/js/counterup.js')}}"></script>
<!--=== jquery Waypoint Js ===-->
<script src="{{asset('assets/js/waypoint.js')}}"></script>
<!--=== jquery Wow Min Js ===-->
<script src="{{asset('assets/js/wow.min.js')}}"></script>
<!--=== jQuery EasyPieChart Min Js ===-->
<script src="{{asset('assets/js/jquery.easypiechart.min.js')}}"></script>

<!--=== Custom Js ===-->
<script src="{{asset('assets/js/custom.js')}}"></script>

</body>

</html>