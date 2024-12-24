<section id="hero">


  <div class="hero-container">
    <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

      <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

      <div class="carousel-inner" role="listbox">

        <!-- Slide 1 -->
        <div class="carousel-item active" style="background-image: url(../../assets/img/slide/fis/slide-1.png)">
          <div class="carousel-container">
            <div class="container">

            </div>
          </div>
        </div>

        <!-- Slide 2 -->
        <div class="carousel-item" style="background-image: url(../../assets/img/slide/fis/slide-2.png)">
          <div class="carousel-container">
            <div class="container">

            </div>
          </div>
        </div>
      </div>



    </div>
  </div>

</section><!-- End Hero -->
<main id="main">
  <!-- ======= About Section ======= -->
  <section id="about" class="about">
    <br><br>
    <div class="container">
      <br><br>
      <h1 class="policetire">
        @foreach ($contenus as $contenu)
        {{-- @if ($contenu->type=="blog_7") {!!$contenu->titre!!} @endif --}}
        @if ($contenu->type=="blog_7" && app()->getLocale() == 'fr')
        {!!$contenu->titre!!}
        @endif
        @if ($contenu->type=="blog_7" && app()->getLocale() == 'en')
        {!!$contenu->title!!}
        @endif
        @endforeach
        {{-- <h1> DES CHASSEURS RELÂCHES DANS LA VILLES</h1> --}}
      </h1>
      <div class="row">
        <div class="col-lg-3 col-md-3 col-3">
          <div class="progress my-2 mb-2 bg-transparent ">
            <div class="progress-bar progbarcolor progbarleft " role="progressbar" aria-valuenow="20" aria-valuemin="0"
              aria-valuemax="100" style="height: 10px; background: #f9b442;">
              <span class="sr-only orangee">20% Complete</span>
            </div>
            <!-- <hr class="orangee" style="height: 15px; background: #f9b442;" > -->
          </div>
        </div>
      </div>

      <div class="row content">
        <div class="col-lg-6 pt-4 pt-lg-0 mr-3 pilicecon">
          <br />


          @foreach ($contenus as $contenu)
          {{-- @if ($contenu->type=="blog_7") {!!$contenu->contenu!!} @endif --}}
          @if ($contenu->type=="blog_7" && app()->getLocale() == 'fr')
          {!!$contenu->contenu!!}
          @endif
          @if ($contenu->type=="blog_7" && app()->getLocale() == 'en')
          
          {!!$contenu->contenus!!}
          @endif
          @endforeach
        </div>
        <div class="col-lg-5 pt-4 pt-lg-0">
          <div class="row g-0 redressed ">
            <div class="row mt-3 pilicecon">
              <span class="btn btn-warning btn-lg nos-medias" type="button" style="">
                {{app()->getLocale()=='fr'?'Nos references sur les medias':'Our media references'}}
              </span>
              <p class="pilicecon">{{app()->getLocale()=='fr'?'Votre avis compte, Nous vous invitons a nous suivre sur
                nos differents reseaux sociaux.':'Your opinion counts, we invite you to follow us on our various social
                networks.'}}</p>
            </div>

            <div class="col-md-12 d-xs-none text-center">
              <i class="ri-facebook-fill  orangee" style="font-size: 2rem !important" aria-hidden="true"></i>
            </div>
            <div class="col-md-12 text-center">
              <p class="card-text redressed  noir pilicecon">Facebook</p>
            </div>
            <div class="col-md-12 d-xs-none text-center">
              <i class="ri-twitter-fill  bleu" aria-hidden="true"
                style="font-size: 2rem !important;font-weight:bold"></i>
            </div>
            <div class="col-md-12 text-center">
              <p class="card-text redressed noir pilicecon">Twitter</p>
            </div>
            <div class="col-md-12 d-xs-none text-center">
              <i class="ri-linkedin-box-fill bleue" aria-hidden="true"
                style="font-size: 2rem !important;font-weight:bold"></i>
            </div>
            <div class="col-md-12 text-center ">
              <p class="card-text redressed noir pilicecon">Linkedin</p>
            </div>
            <div class="col-md-12 d-xs-none text-center">
              <i class="bi-youtube rouge" aria-hidden="true" style="font-size: 2rem !important;font-weight:bold"></i>
            </div>
            <div class="col-md-12 text-center">
              <p class="card-text redressed noir pilicecon">Youtube</p>
            </div>
          </div>
        </div>

  </section><!-- End About Section -->



  <!-- ======= Our Skills Section ======= -->
  <section id="skills" class="skills">
    <div class="container">

      <div class="section-title">
        <p class="policetire">{{app()->getLocale()=='fr'?'Nos domaines de compétences':'Our areas of expertise'}}</p>
      </div>

      <div class="row skills-content">
        @foreach ($competences as $competence )
        <div class="col-lg-6">
          <span class="skill">{{app()->getLocale()=='fr'?$competence->titre:$competence->title}}</span>
          @if ($competence->extrait !="")
          <div class="progress">
            <span class="skill"><i class="val">{{$competence->extrait}}%</i></span>
            <div class="progress-bar-wrap">
              <div class="progress-bar" role="progressbar" aria-valuenow="{{$competence->extrait}}" aria-valuemin="0"
                aria-valuemax="100"></div>
            </div>
          </div>
          @endif
        </div>
        @endforeach



      </div>

    </div>
  </section><!-- End Our Skills Section -->

  <!-- ======= Team Section ======= -->
  <section id="team" class="team section-bg">
    <div class="container">
      <br><br>
      <div class="section-title">

        <p class="policetire">{{app()->getLocale()=='fr'?"NOS RESEAUX D'ENTREPRISES":'Our corporate networks'}}</p>
      </div>

      <div class="row">

        @foreach ($filiales as $filiale )
        <div class="col-lg-6 mb-3">
          <div class="member d-flex align-items-start">
            <div class="pic"><img src="{{asset('storage')}}/{{$filiale->imageUrl}}" class="img-fluid" alt=""></div>
            <div class="member-info">
              <h4>{{$filiale->titre}}</h4>
              <span>{{$filiale->extrait}}</span>
              <p>{{$filiale->contenu}}</p>
              <div class="social">
                @if ($filiale->links1 !="")
                <a href="{{$filiale->links1}}"><i class="ri-twitter-fill"></i></a>
                @endif
                @if ($filiale->links2 !="")
                <a href="{{$filiale->links2}}"><i class="ri-facebook-fill"></i></a>
                @endif
                @if ($filiale->links3 !="")
                <a href="{{$filiale->links3}}"><i class="ri-instagram-fill"></i></a>
                @endif
                @if ($filiale->links4 !="")
                <a href="{{$filiale->links4}}"> <i class="ri-linkedin-box-fill"></i> </a>
                @endif




              </div>
            </div>
          </div>
        </div>

        @endforeach



      </div>

    </div>
  </section><!-- End Team Section -->
  <div class="row ">
    <div class="col-md-12  d-flex justify-content-center redressed  align-items-cente ">
      <img class="img-fluid rounded  mb-lg-0 img-responsive" src="{{asset('assets/img/images/RECADRAGE/RECADRAGE-081.png')}}"
        alt="..." width="500px " height="130vh" />
    </div>
  </div>
</main><!-- End #main -->
</div>

<!-- ======= Footer ======= -->
<footer id="footer" style="background-color:#08090C !important;">

  <div class="container-fluid p-0">
    <div class="row justify-content-center">
      <div class="copyright">
        <ul class="d-flex justify-content-center redressed  align-items-center ">
          <a class="nav-link " href="#"> <i class="ri-facebook-fill orangee me-3 mt-3  " aria-hidden="true"></i></a>
          <a class="nav-link" href="#"> <i class="ri-twitter-fill  orangee me-3 mt-3 " aria-hidden="true"></i></a>
          <a class="nav-link " href="#"> <i class="ri-linkedin-box-fill orangee me-3 mt-3 " aria-hidden="true"></i></a>
          <a class="nav-link " href="#"> <i class="bi-youtube orangee me-3 mt-3 " aria-hidden="true"></i></a>

        </ul>
        &copy; Copyright 2023 <strong><span>Suzang</span></strong>. All Rights Reserved
      </div>
      <div class="credits">

        Designed by <a href="https://www.appatam.com/">APPATAM</a>

      </div>
    </div>

  </div>

</footer><!-- End Footer -->