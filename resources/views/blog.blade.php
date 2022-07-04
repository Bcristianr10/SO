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

        if (request()->is('actividades')) {
          
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
              <div class="blog-content-area post-items-style2 row">
                <!--== Start Blog Post Item ==-->
                @foreach ($resultado as $fila)
                    <div class="post-item col-6">
                        <div class="thumb">
                            <a href="{{route('blog.detalle',['id'=>$fila->slug])}}"><img src="{{$fila->principal()->ruta}}" alt="Givest-Blog"></a>
                            <div class="meta-date">
                            <a href="blog.html"><span>{{Carbon\Carbon::parse($fila->fecha)->format('d')}}</span> {!!idiomaController::traerTexto(Carbon\Carbon::parse($fila->fecha)->format('M'),$idioma);!!}</a>
                            </div>
                            <div class="shape-line"></div>
                        </div>
                        <div class="content">
                            <div class="inner-content">
                            <div class="meta">
                                <a class="post-category" href="blog.html">{!!idiomaController::traerTexto($fila->programa,$idioma);!!}</a>
                                <a class="post-author" href="blog.html"><span class="icon"><img class="icon-img" src="{{asset('assets/images/icons/admin1.png')}}" alt="Icon-Image"></span>By: {{$fila->escritor}}</a>
                            </div>
                            <h4 class="title">
                                <a href="{{route('blog.detalle',['id'=>$fila->slug])}}">{{$fila->titulo_1}}</a>
                            </h4>
                            <p>{{$fila->resena}}</p>
                            <a href="
                            @if(request()->is('actividades'))
                              {{route('blog.detalle',['id'=>$fila->slug])}}
                            @else
                              {{route('blog.anuncio',['id'=>$fila->slug])}}
                            @endif

                            
                              " class="btn-theme btn-border-gradient btn-size-md"><span>{!!idiomaController::traerTexto('leer_mas',$idioma);!!} <img class="icon icon-img" src="{{asset('assets/images/icons/arrow-line-right-gradient.png')}}" alt="Icon"></span></a>
                            </div>
                        </div>
                    </div>
                @endforeach
                
                
                @if ($resultado->lastPage()>1)
                  <div class="pagination-area pt-0 pb-0">
                    <nav>
                      <ul class="page-numbers">
                        @if ($resultado->currentPage()>1)
                          <li>
                            <a class="page-number previus" href="{{$resultado->previousPageUrl()}}">
                              <img src="{{asset('assets/images/icons/arrow-line-left-gradient.png')}}" alt="Icon-Image">
                            </a>
                          </li>
                        @endif
                        

                        @for ($i = 1; $i <= $resultado->lastPage(); $i++)
                          <li>
                            <a class="page-number @if($resultado->currentPage()==$i) active @endif"  href="{{$resultado->url($i)}}">{{$i}}</a>
                          </li>
                        @endfor
                        
                        
                        <li>
                          <a class="page-number next" href="{{$resultado->nextPageUrl()}}">
                            <img src="{{asset('assets/images/icons/arrow-line-right-gradient.png')}}" alt="Icon-Image">
                          </a>
                        </li>
                      </ul>
                    </nav>
                  </div>
                @endif
                
              </div>
              
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--== End Blog Area Wrapper ==-->
  </main>

  <!--== Start Footer Area Wrapper ==-->
  
  <!--== End Footer Area Wrapper ==-->
 @include('footer')
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