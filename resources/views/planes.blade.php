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
        
        $banner = imagenesController::traerImagen('banner_1');
    
    ?>
    <title>{!!idiomaController::traerTexto('programas',$idioma);!!} | Organización Sin Fronteras</title>

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
<div class="wrapper blog-page-wrapper">

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
    <section class="page-title-area" data-bg-img="@if(isset($banner->ruta)){{$banner->ruta}} @else {{asset('assets/images/photos/bg-page-title.jpg')}} @endif">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="page-title-content text-center">
              <h2 class="title text-white">{!!idiomaController::traerTexto('programas',$idioma);!!}</h2>
              <div class="bread-crumbs"><a href="{{route('index')}}">{!!idiomaController::traerTexto('inicio',$idioma);!!}<span class="breadcrumb-sep">//</span></a><span class="active">{!!idiomaController::traerTexto('programas',$idioma);!!}</span></div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--== End Page Title Area ==-->

    <!--== Start Blog Area Wrapper ==-->
    <section class="blog-grid-area">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="">
                <div class="blog-content-area post-items-style2">
                
                

                    <div class="post-details-content">
                        <div class="post-details-body">
                        <div class="thumb">
                            <img class="w-100" src="@if(imagenesController::traerImagen($plan)){{imagenesController::traerImagen($plan)->ruta}} @else {{asset('assets/images/blog/g1.jpg')}} @endif " alt="Givest-HasTech">
                        </div>
                        <div class="content">
                            
                            <h2 class="title">{!!idiomaController::traerTexto($plan,$idioma);!!}</h2>

                            
                           
                            <p>

                              @if ($plan == 'programa_de_salud')
                                {!!idiomaController::traerTexto('texto1_programa_de_salud',$idioma);!!}

                              @else
                                @if ($plan == 'programa_educativo')
                                  {!!idiomaController::traerTexto('texto1_programa_educativo',$idioma);!!}

                                @else

                                  @if ($plan == 'programa_social')
                                    {!!idiomaController::traerTexto('texto1_programa_social',$idioma);!!}

                                  @else
                                    @if ($plan == 'programa_deportivo')
                                      {!!idiomaController::traerTexto('texto1_programa_deportivo',$idioma);!!}

                                      
                                    @endif
                                    
                                  @endif
                                  
                                @endif
                                
                                
                              @endif
                            
                            </p>                            
                            
                            
                            <div class="row mb-32">
                              @if ($plan == 'programa_de_salud')
                                @foreach (imagenesController::traerGaleria('galeria_programa_de_salud',3) as $item)
                                  <div class="col-sm-4">
                                      <img class="w-100 mb-xs-30" src="{{$item->ruta}}" alt="Image-Givest">
                                  </div>
                                @endforeach

                              @else
                                @if ($plan == 'programa_educativo')
                                  @foreach (imagenesController::traerGaleria('galeria_programa_educación_y_cultura',3) as $item)
                                    <div class="col-sm-4">
                                        <img class="w-100 mb-xs-30" src="{{$item->ruta}}" alt="Image-Givest">
                                    </div>
                                  @endforeach

                                @else

                                  @if ($plan == 'programa_social')
                                    @foreach (imagenesController::traerGaleria('galeria_programa_social',3) as $item)
                                      <div class="col-sm-4">
                                          <img class="w-100 mb-xs-30" src="{{$item->ruta}}" alt="Image-Givest">
                                      </div>
                                    @endforeach

                                  @else
                                    @if ($plan == 'programa_deportivo')

                                      @foreach (imagenesController::traerGaleria('galeria_programa_deportivo',3) as $item)
                                          <div class="col-sm-4">
                                              <img class="w-100 mb-xs-30" src="{{$item->ruta}}" alt="Image-Givest">
                                          </div>
                                      @endforeach

                                      
                                    @endif
                                    
                                  @endif
                                  
                                @endif
                                
                                
                              @endif
                               
                                
                                
                            </div>
                            
                            
                            
                        </div>
                        
                        </div>
                    </div>
                </div>
              
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--== End Blog Area Wrapper ==-->
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
            <a href="index.html"><img src="assets/img/logo.png" alt="Logo" /></a>
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