<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="description" content="suzang groups marketing politique transformation" >
  <title>Suzang</title>
   <!-- Load the css and js file in your document -->
 
  <meta content="" name="description">
  <meta content="" name="keywords">
  

  <!-- Favicons -->
  <link rel="stylesheet" href="{{mix('css/app.css')}}" />
  <link href="{{asset('assets/img/favicon.png')}}" rel="icon">
  <link href="{{asset('assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('assets/vendor/animate.css/animate.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/Holdon/HoldOn.min.css')}}" rel="stylesheet">
  

  <!-- Template Main CSS File -->
  <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Sailor - v4.10.0
  * Template URL: https://bootstrapmade.com/sailor-free-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
 
</head>
<body class="hold-transition sidebar-mini layout-fixed border-0 rounded-0 m-0 p-0 ">
  <div class=" content-wrapper border-0 rounded-0 m-0 p-0 bg-white " >
      <!-- Preloader -->
      <div class="preloader d-flex justify-content-center align-items-center">
         <img class="animation__shake orange" src="{{asset('assets/img/images/logo1.png')}}" alt="AdminLTELogo" height="60" width="60">
      </div>
   

       <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center">

      <!-- <h1 class="logo me-auto"><a href="index.html">Sailor</a></h1>
      Uncomment below if you prefer to use an image logo -->
      <a href="/" class="logo me-auto"><img src="{{asset('assets/img/images/logo.png')}}" alt="" class="img-fluid"></a>


      <nav id="navbar" class="navbar">
        <ul>
        <li><a href="/" class="">{{app()->getLocale()=='fr'?'Accueil':'Home'}}</a></li>
          <li><a href="/{{app()->getLocale()=='fr'?'fr':'en'}}/about">{{app()->getLocale()=='fr'?'Présentation':'About'}}</a></li>
          <li><a href="/{{app()->getLocale()=='fr'?'fr':'en'}}/atout">{{app()->getLocale()=='fr'?'Atouts':'Assets'}}</a></li>
          <li><a href="/{{app()->getLocale()=='fr'?'fr':'en'}}/service">{{app()->getLocale()=='fr'?'Services':'Services'}}</a></li>
          <li><a href="/{{app()->getLocale()=='fr'?'fr':'en'}}/client">{{app()->getLocale()=='fr'?'Clients':'Clients'}}</a></li>
          <li><a href="/{{app()->getLocale()=='fr'?'fr':'en'}}/carriere">{{app()->getLocale()=='fr'?'Carriere':'Career'}}</a></li>
          <li><a href="/{{app()->getLocale()=='fr'?'fr':'en'}}/contact">{{app()->getLocale()=='fr'?'Contacts':'Contacts'}}</a></li>

         
       <div class="dropdown show"  style="right: -17px;width: 100px;" >
       <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">
          {{app()->getLocale()=='fr'?'FR':'EN'}}
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton"style="left: inherit;right: -10px;background-color: #ffffff0a;">
          <a class="dropdown-item" href="{{url(app()->getLocale()=='fr'?'en':'fr')}}" data-lang="{{ app()->getLocale() == 'fr' ? 'en' : 'fr' }}" >
            {{app()->getLocale()=='fr'?'EN':'FR'}} 
          </a>
         
       </div>
        {{-- <select  id="langSelect" class="form-control change-lang " fdprocessedid="pyo6zc">
          <option value="fr">Français</option>
          <option value="en">English</option>
         
        </select> --}}
     
      
      </div>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
      
    </div>
  </header><!-- End Header -->

              
           

            <!-- ./CONTENU -->

               {{$slot}}

          <!-- ./CONTENU -->
       <!-- ======= Footer ======= -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>


<!-- jQuery UI 1.11.4 -->
<script src="{{ mix('js/app.js') }}"></script>

  <!-- Vendor JS Files -->
  <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
  <script src="{{asset('assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
  <script src="{{asset('assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
  <script src="{{asset('assets/vendor/waypoints/noframework.waypoints.js')}}"></script>
  <script src="{{asset('assets/vendor/php-email-form/validate.js')}}"></script>
  <script src="{{asset('assets/Holdon/HoldOn.min.js')}}"></script>
   
  <script>
    $(document).ready(function () {
    $('.dropdown-item').on('click', function (e) {
    e.preventDefault();
    
    var selectedLang = $(this).data('lang');
    var currentUrl = window.location.href;

     // Vérifier si l'URL est de la forme /langue
    var isHomePage = currentUrl.match(/^https?:\/\/[^\/]+\/[a-z]{2}(\/|$)/i);

     // Si c'est la page d'accueil, rediriger vers la page d'accueil avec la langue sélectionnée
    if (isHomePage == null) {
      
    currentUrl = '/' + selectedLang;
    window.location.href = currentUrl;
    
    } else {
      
    // Extraire la langue actuelle de l'URL
    var urlSegments = currentUrl.split('/');
    var currentLang = urlSegments[3];
    
    // Construire la nouvelle URL avec la langue sélectionnée
    var newUrl = currentUrl.replace('/' + currentLang + '/', '/' + selectedLang + '/');
    
    // Effectuer une redirection vers la nouvelle URL
    window.location.href = newUrl;
    }
    });
    });
  </script>

 
  

  @yield('scripts')
  

  <!-- Template Main JS File -->
  <script src="{{asset('assets/js/main.js')}}"></script>

@livewireScripts
</body>
</html>


