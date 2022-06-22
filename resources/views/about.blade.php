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
      
      $galeria = imagenesController::traerGaleria('galeria_1',6);
    
    ?>
    <title>{!!idiomaController::traerTexto('nosotros',$idioma);!!}  | Organización Sin Fronteras </title>

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
<div class="wrapper about-page-wrapper">

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

  <main class="main-content site-wrapper-reveal">
    <!--== Start Page Title Area ==-->
    <section class="page-title-area" data-bg-img="{{imagenesController::traerImagen('banner-nosotros')->ruta}}">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="page-title-content text-center">
              
            </div>
          </div>
          <div class="col-lg-12">
            <div class="page-title-content text-center">
              
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--== End Page Title Area ==-->

    <!--== Start About Area ==-->
    <section class="about-area">
      <div class="container">
        <div class="row">
          <div class="col-lg-9">
            <div class="section-title">
              <h5 class="subtitle line-theme-color">{!!idiomaController::traerTexto('nosotros',$idioma);!!}.</h5>
              <h2 class="title">{!!idiomaController::traerTexto('subtitulo_1',$idioma);!!}</h2><br>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-4">
            <div class="thumb thumb-style">
              <img src=" @isset(imagenesController::traerImagen('principal_nosotros')->ruta){{imagenesController::traerImagen('principal_nosotros')->ruta}} @endisset" alt="Image-Givest">
            </div>
          </div>
          <div class="col-lg-8">
            <div class="about-content">
              <p class="text-style">{!!idiomaController::traerTexto('sinfrontera_1',$idioma);!!} {{\Carbon\Carbon::parse('2019-03-01')->age}} {!!idiomaController::traerTexto('sinfrontera_2',$idioma);!!}.</p>
              <p class="mb-0"> {!!idiomaController::traerTexto('sinfrontera_3',$idioma);!!}</p><br><br>
            </div>
            <div class="content-box-wrp">
              <div class="row">
                <div class="col-lg-6" >
                  <div class="content-box-item mb-md-30">
                    <h3 class="title">{!!idiomaController::traerTexto('mision',$idioma);!!}</h3>
                    <img class="img-line-shape" src="{{asset('assets/images/shape/line-s1.png')}}" alt="Image-Givest">
                    <p style="min-height: 245px; display: flex; align-items: center;">{!!idiomaController::traerTexto('texto_mision',$idioma);!!}</p>
                    
                    <img class="bg-line-shape" src="{{asset('assets/images/shape/line5.png')}}" alt="Image-Givest">
                  </div>
                </div>
                <div class="col-lg-6" >
                  <div class="content-box-item" data-bg-color="#00a0c9">
                    <h3 class="title">{!!idiomaController::traerTexto('vision',$idioma);!!}</h3>
                    <img class="img-line-shape" src="{{asset('assets/images/shape/line-s1.png')}}" alt="Image-Givest">
                    <p style="min-height: 245px; display: flex; align-items: center;">{!!idiomaController::traerTexto('texto_vision',$idioma);!!}</p>
                    
                    <img class="bg-line-shape" src="{{asset('assets/images/shape/line5.png')}}" alt="Image-Givest">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--== End About Area ==-->

    <!--== Start Team Area ==-->
    <section class="team-area team-fluid-area">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 offset-lg-3 col-xl-4 offset-xl-0">
            <div class="section-title">
              
              <h2 class="title title-style">{!!idiomaController::traerTexto('equipo_de_trabajo',$idioma);!!}<img class="img-shape" src="{{asset('assets/images/shape/3.png')}}" alt="Image-Givest"></h2>
              <div class="desc">
                <p>{!!idiomaController::traerTexto('equipo_texto',$idioma);!!}</p>
                <!-- <a href="volunteer.html" class="btn-theme btn-gradient btn-slide">Join Now <img class="icon icon-img" src="{{asset('assets/images/icons/arrow-line-right2.png')}}" alt="Icon"></a> -->
              </div>
            </div>
          </div>
          <div class="col-xl-8">
            <div class="team-member-items">
              <div class="swiper-container team-slider-container">
                <div class="swiper-wrapper team-slider">

                  @foreach ($galeria as $item)
                    <div class="swiper-slide team-member">
                      <div class="thumb">
                        <img src="{{$item->ruta}}" alt="Image" height="445" width="330">
                        
                      </div>
                      
                    </div>
                  @endforeach
                  
                  
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--== End Team Area ==-->

    

    

    <!--== Start Brand Logo Area ==-->
    <section class="brand-logo-area brand-logo-default-area">

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