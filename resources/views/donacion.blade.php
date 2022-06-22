<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <?php 
      
      use App\Http\Controllers\idiomaController; 
      if (Session::has('idioma')){
        $idioma = Session::get('idioma');
      }else{
        $idioma = 'ESP';
      }
      use App\Http\Controllers\imagenesController; 
        
      $banner = imagenesController::traerImagen('banner_donacion');
      
    
    ?>
    <title>{!!idiomaController::traerTexto('donacion',$idioma);!!} | Organización Sin Fronteras</title>

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
<div class="wrapper contact-page-wrapper">

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
    <section class="page-title-area"data-bg-img="@if(isset($banner)){{$banner->ruta}}@else{{asset('assets/images/photos/bg-page-title.jpg')}}@endif">
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

    <!--== Start Contact Area ==-->
    <section class="causes-area causes-default-area">
      <div class="container">
        <div class="row">
        @foreach($resultado as $donacion)
        <div class="col-md-6 col-lg-3">
            <div class="causes-item mb-30">
              <div class="thumb">
              
                <img src="{{$donacion->imagen}}" alt="Givest-HasTech">
              </div>
              <div class="content" style="min-height: 200px;">
                <ul class="donate-info">
                  <li class="info-item">
                    <span class="info-title">{!!idiomaController::traerTexto('monto',$idioma);!!}</span>
                    <span class="amount">${{$donacion->monto}}</span>
                  </li>
                  
                  
                </ul>                
                {!!$donacion->descripcion!!}
              </div>
              <div class="causes-footer">
                <div class="admin">
                  <h5><a href="#"><span class="icon-img"><img src="{{asset('assets/images/icons/admin1.png')}}" alt="Icon"></span>{{$donacion->nombre}}</a></h5>
                </div><br>
                <div>
                <a class="btn-theme btn-border-gradient gray-border btn-size-md" href="{{route('contact')}}"><span>{!!idiomaController::traerTexto('donaYa',$idioma);!!}<img class="icon icon-img" src="{{asset('assets/images/icons/arrow-line-right-gradient.png')}}" alt="Icon"></span></a>
                </div>
                
              </div>
            </div>
          </div>
        @endforeach  

        </div>
      </div>
    </section>
    <br><br><br>
    <!--== End Contact Area ==-->
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
            <a href="{{route('index')}}"><img src="{{asset('assets/images/logo.png')}}" alt="Logo" /></a>
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