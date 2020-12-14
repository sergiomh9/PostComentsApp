<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Amoeba Bootstrap Template - Home</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="https://www.clipartmax.com/png/middle/218-2186049_icono-diario-documento-texto-noticias-circle.png" rel="icon">
  <link href="https://www.clipartmax.com/png/middle/218-2186049_icono-diario-documento-texto-noticias-circle.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Lato:400,300,700,900" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ url('assets/frontend/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{ url('assets/frontend/vendor/icofont/icofont.min.css')}}" rel="stylesheet">
  <link href="{{ url('assets/frontend/vendor/venobox/venobox.css')}}" rel="stylesheet">
  <link href="{{ url('assets/frontend/vendor/owl.carousel/assets/owl.carousel.min.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ url('assets/frontend/css/style.css')}}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Amoeba - v2.3.0
  * Template URL: https://bootstrapmade.com/free-one-page-bootstrap-template-amoeba/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
   <style type="text/css">
    #hero:before {
    content: "";
    background: rgba(112, 185, 176, 0.25)!important;
      
    }
    
    .noneBorder{
      border:none;
      background:none;
    }
  </style>
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container">

       <div class="logo float-left">
        <h1 class="text-light"><a href="{{ url('frontend/index') }}"><span>SergioPost</span></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav class="nav-menu float-right d-none d-lg-block">
        <ul>
          <!--<li class="active"><a href="ndex.html">Home</a></li>-->
          <!--<li><a href="#about">About Us</a></li>-->
          <!--<li><a href="#services">Services</a></li>-->
          <!--<li><a href="#portfolio">Portfolio</a></li>-->
          <li><a href="#team">Register</a></li>
          
          <li><a href="#contact">Login</a></li>
        </ul>
      </nav><!-- .nav-menu -->

    </div>
  </header><!-- End #header -->

  <!-- ======= Hero Section ======= -->
  <!--<section id="hero">-->
  <!--  <div class="hero-container">-->
  <!--    <h1>Welcome to SergioPost</h1>-->
  <!--    <h2>Pagina de post de aventuras</h2>-->
  <!--    <a href="{{ url('backend/post') }}" class="btn-get-started scrollto">Login</a>-->
  <!--  </div>-->
  <!--</section><!-- #hero -->-->

  <main id="main">

    <!-- ======= About Us Section ======= -->
    <section id="about" class="about">
      <div class="container">

        
    
    
                        
                        
                   
        <div class="row" style="margin-top:40px">
       
          <div class="col-lg-6 order-1 order-lg-2">
           <a class="btn btn-info" href="{{ url('frontend/index/' . $post->id) }}"><img src="{{ url('logo/' . $logo)}}"  class="img-fluid" alt=""></a> 
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1">
            <h3>{{ $post->title }}</h3>
            <p class="font-italic">
              {{ $post->author }}
            </p>
            <p class="font-italic">
              {{ date('d-m-Y', strtotime($post->date)) }}
            </p>
           
            <p>
             {{ $post->text }}
            </p>
            
              <td><a class="btn btn-info" href="{{ url('frontend/index') }}">All Post</a></td>
          </div>
        </div>
  
      <br>
      <br>
      <br>
      
                     @foreach ($coments as $coment)
                        <tr>
                            
                            <td><p class="font-italic">{{ $coment->email }}</p></td>
                                 
                                <td><p class="font-italic">{{ date('d-m-Y', strtotime($coment->date)) }}</p></td>
                                
                                
                                 
                                  <td><p>{{ $coment->text }}</p></td>
                                  <br>
                             <br>

                        </tr>
                       
                        @endforeach
                                                
                         @if(empty($coment))
                            <h2>No hay comentarios</h2>
                        @endif
                        
                        
    <form role="form" action="{{ url('frontend/base') }}" method="post" id="createpostForm">
    @csrf
       
            
        <div class="card-body">
            
            <div class="form-group" style="display:none">
                 <label for="idpost">idpost</label>
                 <input type="idpost" maxlength="45" minlength="1" required class="form-control" id="idpost" placeholder="idpost" name="idpost" value="{{ $post ->id }}">
          </div>
          <div class="form-group">
                <label for="email">Email</label>
                    <input type="text" maxlength="80" minlength="2" required class="form-control" id="email" placeholder="email" name="email" value="{{ old('email') }}">
            </div>
            <div class="form-group">
                 <label for="text">Coment</label>
                 <input type="text" maxlength="45" minlength="1" required class="form-control" id="text" placeholder="texto" name="text" value="{{ old('text') }}">
            </div>
            <div class="form-group" style="display:none">
                 <label for="date">date</label>
                    <input type="date" class="form-control" id="date" name="date" value="<?php echo date("Y-n-j"); ?>">
            </div>
            
             <button type="submit" class="btn btn-info">Submit</button>
        </div>
        <!-- /.card-body -->
        <br>
   
</form>


      </div>
    </section><!-- End About Us Section -->

   


  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>Amoeba</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/free-one-page-bootstrap-template-amoeba/ -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </footer><!-- End #footer -->

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ url('assets/frontend/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{ url('assets/frontend/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{ url('assets/frontend/jquery.easing/jquery.easing.min.js')}}"></script>
  <script src="{{ url('assets/frontend/vendor/php-email-form/validate.js')}}"></script>
  <script src="{{ url('assets/frontend/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
  <script src="{{ url('assets/frontend/vendor/venobox/venobox.min.js')}}"></script>
  <script src="{{ url('assets/frontend/vendor/owl.carousel/owl.carousel.min.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{ url('assets/frontend/js/main.js')}}"></script>

</body>

</html>