<footer class="footer-area">
    <div class="footer-main">
      <div class="container">
        <?php 
          use App\Http\Controllers\imagenesController; 
          use App\Http\Controllers\idiomaController; 
          if (Session::has('idioma')){
            $idioma = Session::get('idioma');
          }else{
            $idioma = 'ESP';
          }
          $galeria = imagenesController::traerGaleria('galeria_2',6);
        
        ?>
        <div class="row">
          <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4">
            <div class="widget-item">
              <div class="about-widget">
                <a class="footer-logo" href="/">
                  <img src="https://sinfronteras.s3.us-east-2.amazonaws.com/public/assets/images/Logol.png" alt="Logo">
                </a>
                <p >{!!idiomaController::traerTexto('texto_footer',$idioma);!!}</p>
                <div class="widget-total-raised">
                  <h4 class="raised-title"></h4>
                  <div class="raised-amount"></div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
            <div class="widget-item">
              <h4 class="widget-title line-style">{!!idiomaController::traerTexto('galeria',$idioma);!!}</h4>
              <div class="widget-gallery">
                <div class="row row-cols-3 row-gutter-10">
                  
                  @foreach ($galeria as $key => $item)
                      
                 
                    <div class="col">
                      <div class="gallery-item">
                        <img src="{{$item->ruta}}" alt="Givest-HasTech" height="100" width="100">
                       
                        
                      </div>
                    </div>
                  @endforeach
                </div>
              </div>              
            </div>
          </div>
          <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
            <div class="widget-item menu-wrap-two-column">
              <h4 class="widget-title line-style">{!!idiomaController::traerTexto('contenido',$idioma);!!}</h4>
              <nav class="widget-menu-wrap">
                <div class="row">
                  <div class="col-6 col-sm-6 col-md-6 pr-sm-5">
                    <ul class="nav-menu nav">
                      <li><a href="{{route('about')}}">{!!idiomaController::traerTexto('nosotros',$idioma);!!}</a></li>
                      <li><a href="{{route('blog.index')}}">{!!idiomaController::traerTexto('actividades',$idioma);!!}</a></li>
                      <li><a href="{{route('donacion.index')}}">{!!idiomaController::traerTexto('donacion',$idioma);!!}</a></li>
                      
                    </ul>
                  </div>
                  <div class="col-6 col-sm-6 col-md-6 pl-sm-5">
                    <ul class="nav-menu nav align-right">
                      <li><a href="{{route('contact')}}">{!!idiomaController::traerTexto('contactanos',$idioma);!!}</a></li>
                      <li><a href="{{route('emprendimiento.index')}}">{!!idiomaController::traerTexto('emprendimiento',$idioma);!!}</a></li>
                 
                    </ul>
                  </div>
                </div>
              </nav>
            </div>
          </div>
        </div>
      </div>
      <!--== Scroll Top Button ==-->
      <div class="scroll-to-top"><img src="{{asset('assets/images/icons/arrow-up-line.png')}}" alt="Icon-Image"></div>
    </div>
    <div class="footer-bottom">
      <div class="container">
        <div class="footer-bottom-content">
          <div class="row align-items-center">
            <div class="col-12">
              <div class="widget-copyright text-center">
                <p>© {{\Carbon\Carbon::now()->format('Y')}} <span>Organización sin frontera</span>. Made by <a target="_blank" href="#">Style Solution</a></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="shape-layer">
      <img src="{{asset('assets/images/shape/footer-line.png')}}" alt="Image-Givest">
    </div>
  </footer>