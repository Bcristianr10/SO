<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="La Organización Sin Fronteras, es una organización no gubernamental, sin fines de lucro y con fin social, que tiene {{\Carbon\Carbon::parse('01-01-2019')->age}} años funcionando en la Chorrera, Provincia de Panamá Oeste."/>
    <?php 
        
        use App\Http\Controllers\idiomaController; 
        if (Session::has('idioma')){
        $idioma = Session::get('idioma');
        }else{
        $idioma = 'ESP';
        }
        use App\Http\Controllers\imagenesController; 

        if (request()->is('actividades/*')) {

          $banner = imagenesController::traerImagen('banner_actividades');

        } else {

          $banner = imagenesController::traerImagen('banner_anuncios');
        }
        
        
        
    
    ?>
    <title>{!!idiomaController::traerTexto('actividades',$idioma);!!} | Organización Sin Fronteras</title>

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
    <section class="page-title-area" data-bg-img="@if(isset($banner)){{$banner->ruta}}@else{{asset('assets/images/photos/bg-page-title.jpg')}}@endif">
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
                            <img class="w-100" src="{{$resultado->principal()->ruta}}" alt="Givest-HasTech">
                        </div>
                        <div class="content">
                            <div class="meta">
                            <a class="post-category" href="{{route('blog.detalle',['id'=>$resultado->id])}}">{!!idiomaController::traerTexto($resultado->programa,$idioma);!!}</a>
                            <a class="post-author" href="{{route('blog.detalle',['id'=>$resultado->id])}}"><span class="icon"><img class="icon-img" src="{{asset('assets/images/icons/admin1.png')}}" alt="Icon-Image"></span>By: {{$resultado->escritor}}</a>
                            </div>
                            <h2 class="title">{{$resultado->titulo_1}}</h2>
                            <p>{!!$resultado->texto_1!!}</p>                            
                            <div class="blockquote-area">
                            <blockquote class="blockquote-style">
                                <p>{{$resultado->comentario}}</p>
                                <div class="icon">“</div>
                            </blockquote>
                            </div>
                            <h2 class="title">{{$resultado->titulo_2}}</h2>
                            <p>{!!$resultado->texto_2!!}</p>
                            
                            <div class="row mb-32">
                               
                              <div class="col-xl-12">
                                <div class="team-member-items">
                                  <div class="swiper-container team-slider-container">
                                    <div class="swiper-wrapper team-slider">
                    
                                      @foreach ($resultado->galeria() as $item)
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
                            <h2 class="title">{{$resultado->titulo_3}}</h2>
                            <p>{!!$resultado->texto_3!!}</p>
                            
                            
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