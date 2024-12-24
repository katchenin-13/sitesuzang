<section id="hero1">

  <div class="container">

    <div class="row" style="
        margin-top: 157px;
    ">
      {{-- @foreach ($contenus as $contenu)
      @if ($contenu->type=="blog_2")
      <img src="{{asset('storage')}}/{{$contenu->imageUrl}}" class="card-img-bottom img " alt="..." />
      @endif
      @endforeach --}}
      <img src="{{asset('images/RECADRAGE/RECADRAGE-13.png')}}"
        class="card-img-bottom im-fluid lesautrepageba animate__animated animate__fadeInDown w-100" alt="">
    </div>
    <br>
  </div>

</section><!-- End Hero -->
<main id="main" class="arriere">

  <!-- ======= Portfolio Section ======= -->
  <section id="portfolio" class="portfolio">
    <div class="container">
      <br><br>
      <h1 class="policetire">
        @foreach ($contenus as $contenu)
        {{-- @if ($contenu->type=="blog_8") {!!$contenu->titre!!} @endif --}}
        @if ($contenu->type=="blog_8" && app()->getLocale() == 'fr')
        {!!$contenu->titre!!}
        @endif
        @if ($contenu->type=="blog_8" && app()->getLocale() == 'en')
        {!!$contenu->titre!!}
        @endif
      
        @endforeach
      </h1>
      {{-- <h1> Le meilleur, rien de moins</h1> --}}
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
        <div class="row justify-content-center">
          <div class="conteneur  pilicecon">
            @foreach ($contenus as $contenu)
            {{-- @if ($contenu->type=="blog_8")
            {!!$contenu->contenu!!}
            @endif --}}
            @if ($contenu->type=="blog_8" && app()->getLocale() == 'fr')
            {!!$contenu->contenu!!}
            @endif
            @if ($contenu->type=="blog_8" && app()->getLocale() == 'en')
            {!!$contenu->contenus!!}
            @endif
            @endforeach

            {{-- <p class="card-text redressed blanc border-0 rounded-0  pilicecon "> Le terrain est impitoyable, tout
              comme le bois sacré. Y compris le courage de la culture du courage de se remettre en cause. Nous manoins
              la confidentialité comme une stratégie à par entière au même titre que la publicité. Car en maitière de
              chasse, la surprise est un art qui permet de prendre d'avantage.<br />Nous visons l'excellence. Nous
              débusquons les meilleures technolosies pourchassons les meilleures solutions pour appater les réponses les
              plus adaptées aux défis que vons affrontez Sur tous les canaux, nous planifions,preparons et organisons
              minatieusement cette rencontre entre vous et le clients Sur tous les canaux, nous planifions,preparons et
              organisons minatieusement cette rencontre entre vous et le clients</p> --}}
          </div>

        </div>
      </div>
  </section><!-- End Portfolio Section -->
  <!-- ======= Services Section ======= -->
  <section id="services" class="services">
    <div class="container">

      <div class="row">

        @foreach ($atouts as $atout)

        <div class="col-md-6 mt-4 mt-md-0">
          <div class="icon-box">
            <i class="ri-check-double-line"></i>
            <h4 class="policetire">{{$atout->titre}}</h4>

            <p>{{$atout->extrait}}</p>
            <div class="d-flex justify-content-end ">
              <a class="noir gras text-just" href="#" data-bs-toggle="modal"
                data-bs-target="#exampleModal{{$atout->id}}">{{app()->getLocale()=='fr'?'En savoir plus':'See
                more'}}</a>

            </div>



          </div>

        </div>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal{{$atout->id}}" tabindex="-1" aria-labelledby="exampleModalLabel"
          aria-hidden="true" style="display: none;">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{$atout->titre}}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <p>
                  {{$atout->contenu}}
                </p>
                <div class="row justify-content-center">
                  <div class="col-8"><br><img src="assets/img/images/RECADRAGE/RECADRAGE-071.png" width="100%"
                      height="100%" alt=""></div>
                </div>
                <br>
                <div class="row text-end d-flex">

                </div>
                <div class="row text-center">
                  <ul class="comptence mb-3 d-flex noir  " style="list-style: none;padding-left: 0px;">
                    <li class="nav-item noir "><a class="nav-link refpolice11   "
                        style="border-right: 2px solid #ffffff !important ; background-color:rgb(0,0,0,0) !important"
                        href="https://www.appatam.com/">Appatam</a></li>
                    <li class="nav-item noir "
                      style="border-right: 2px solid #ffffff !important ; background-color:rgb(0,0,0,0) !important"><a
                        class="nav-link refpolice11  " href="https://www.djela.ci/">Djela</a></li>
                    <li class="nav-item noir "
                      style="border-right: 2px solid #ffffff !important ; background-color:rgb(0,0,0,0) !important"><a
                        class="nav-link refpolice11  " href="https://fr-fr.facebook.com/SuzangG/">Suzang</a></li>
                    <li class="nav-item noir "
                      style="border-right: 2px solid #ffffff !important ; background-color:rgb(0,0,0,0) !important"><a
                        class="nav-link refpolice11  " href="https://socopi.ci/">Socopi</a></li>
                    <li class="nav-item noir" style=" background-color:rgb(0,0,0,0) !important"><a
                        class="nav-link refpolice11  " href="https://www.yefien.com/">Yefien</a></li>

                  </ul>
                  {{-- <h4> Appatam | djela | suzang | yefien | socopi</h4> --}}
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary"
                  data-bs-dismiss="modal">{{app()->getLocale()=='fr'?'Fermer':'Close'}}</button>
                {{-- <button type="button" class="btn btn-primary">Sauvegarder</button> --}}
              </div>
            </div>
          </div>
        </div>
        <!-- Modal -->
        @endforeach

      </div>

    </div>
  </section><!-- End Services Section -->

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