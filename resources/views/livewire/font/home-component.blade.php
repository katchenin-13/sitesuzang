<section id="hero">
  <div class="hero-container">
    <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">
      <div class="carousel-inner" role="listbox">
        <!-- Slide 1 -->
        <div class="carousel-item active" style="background-image: url(../../assets/img/slide/slide-2.png);">
          <div class="carousel-container">
            <div class="carousel-content actestpos" style="font-weight: 700px !important; ">
              <div class="container-fluid pos justify-content-center d-flex align-items-center text-center">
                <div class="col-lg-12 col-md-2 col-6 postext ">
                  <img src="assets/img/images/RECADRAGE/ANIMATION.gif"
                    class="card-img-bottom im-fluid accueil-im animate__animated animate__fadeInDown imgpost"
                    alt="..." />
                  <h2 class="animate__animated animate__fadeInDown orangee ">{{app()->getLocale()=='fr'?"SE POSER SANS
                    S'IMPOSER":'SETTLE WITHOUT IMPOSING YOURSELF'}}</h2>
                </div>

              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
</section><!-- End Hero -->


<main id="main" style="background-color:#08090C !important;">

  <!-- ======= About Section ======= -->
  <section id="about" class="about">

    <div class="container blanc ">
      <div class="row content positionpere ">
        <div class="positionfil">
          <div class="col-lg-6">
            <br><br>
            <div class="row">
              <h1 class="policetire">
                @foreach ($contenus as $contenu)
                @if ($contenu->type == "blog_3" && app()->getLocale() == 'fr')
                {!!$contenu->titre!!}
                @else
                {!!$contenu->title!!} @endif
                {{-- @if ($contenu->type=="blog_3") {{app()->getLocale() == 'fn' ? '$({!!$contenu->titre!!})' : ''
                }}@endif --}}
                @endforeach
              </h1>




              {{-- <h1 class="policetire">DES CHASSEURS RELÂCHES DANS LA VILLES</h1> --}}
            </div>
            <div class="row">
              <div class="col-3">
                <div class="progress my-2 mb-2 bg-transparent ">
                  <div class="progress-bar progbarcolor progbarleft " role="progressbar" aria-valuenow="20"
                    aria-valuemin="0" aria-valuemax="100" style="height: 10px; background: #f9b442; width:100%">
                    <span class="sr-only orangee">20% Complete</span>
                  </div>
                </div>
                <!-- <hr class="orangee" style="height: 15px; background: #f9b442;" > -->
              </div>
            </div>
            <div class="row ">
              <div class="col-md-10 icon-box">
                <div class="d-flex pilicecon justifier ">
                  @foreach ($contenus as $contenu)
                  @if ($contenu->type == "blog_3" && app()->getLocale() == 'fr')
                  {!! $contenu->extrait !!}
                  @else
                  {!! $contenu->extraitang !!}
                  @endif

                  @endforeach

                  <br>
                </div>
                <div class="d-flex justify-content-end text-black "><a href="/about"><button type="button" class="btn">
                      {{app()->getLocale()=='fr'?'En savoir plus':'See More'}}</button></a></div>

                <img src="assets/img/images/RECADRAGE/RECADRAGE-08.png" class="card-img-bottom img " alt="..." />

              </div>
            </div>

          </div>

          <div class="col-lg-5 pt-4 pt-lg-0">


          </div>
        </div>
      </div>

    </div>
    {{-- <div><img src="img/RECADRAGE-08.png" width="100%" height="100%" alt=""></div> --}}
    <div>
      @foreach ($contenus as $contenu)
      @if ($contenu->type=="blog_3")
      <img src="{{asset('storage')}}/{{$contenu->imageUrl}}" width="100%" height="80%" alt="..." />
      @endif
      @endforeach
    </div>


  </section><!-- End About Section -->



  <!-- ======= Services Section ======= -->
  <section id="services" class="services">
    <div class="container blanc ">
      <div class="row content positionpere  redressed">
        <div class="positionfil d-flex justify-content-center">
          <div class="col-lg-5 cache">

          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 justify-content-end">
            <br><br>
            <div class="row justify-content-end">
              <h1 class="float-right policetire textgauche">
                @foreach ($contenus as $contenu)
                @if ($contenu->type=="blog_4"&& app()->getLocale() == 'fr')
                {!!$contenu->titre!!}
                @else
                {!!$contenu->title!!}
                @endif
                @endforeach
              </h1>

              {{-- <h1 class="float-right policetire " style="text-align: end">UNE INITIATION, DEUX MAITRES</h1> --}}
            </div>
            <div class="row justify-content-end">
              <div class="col-3">
                <div class="progress my-2 mb-2 bg-transparent ">
                  <div class="progress-bar progbarcolor progbarleft " role="progressbar" aria-valuenow="20"
                    aria-valuemin="0" aria-valuemax="100" style="height: 10px; background: #f9b442;">
                    <span class="sr-only orangee">20% Complete</span>
                  </div>
                </div>

              </div>

              <div class="conteneur  pilicecon justifier">
                @foreach ($contenus as $contenu)
                @if ($contenu->type=="blog_4"&&app()->getLocale() == 'fr')
                {!!$contenu->extrait!!}
                @else
                {!!$contenu->extraitang!!}
                @endif
                @endforeach

                {{-- <p class="card-text redressed blanc border-0 rounded-0  pilicecon "> Le terrain est impitoyable,
                  tout comme le bois sacré. Y compris le courage de la culture du courage de se remettre en cause. Nous
                  manoins la confidentialité comme une stratégie à par entière au même titre que la publicité. Car en
                  maitière de chasse, la surprise est un art qui permet de prendre d'avantage.<br />Nous visons
                  l'excellence. Nous débusquons les meilleures technolosies pourchassons les meilleures solutions pour
                  appater les réponses les plus adaptées aux défis que vons affrontez Sur tous les canaux, nous
                  planifions,preparons et organisons minatieusement cette rencontre entre vous et le clients Sur tous
                  les canaux, nous planifions,preparons et organisons minatieusement cette rencontre entre vous et le
                  clients</p> --}}
              </div>
            </div>

            <br>
            <!--<div class="d-flex justify-content-end "><button type="button" class="btn "> En savoir plus</button></div>-->
            <div class="d-flex justify-content-end text-black "><a href="/atout"><button type="button" class="btn">
                  {{app()->getLocale()=='fr'?'En savoir plus':'See More'}}</button></a></div>
          </div>
        </div>
      </div>

    </div>
    @foreach ($contenus as $contenu)
    @if ($contenu->type=="blog_4")
    <img src="{{asset('storage')}}/{{$contenu->imageUrl}}" class="card-img-bottom img " alt="..." />
    @endif
    @endforeach
    {{-- <img src="assets/img/images/RECADRAGE/RECADRAGE-03.png" class="card-img-bottom w-100 im-fluid accueil-im"
      alt="..." /> --}}

  </section><!-- End Services Section -->

  <!-- ======= Portfolio Section ======= -->
  <section id="portfolio" class="portfolio">
    <div class="container blanc ">
      <div class="row content positionpere ">
        <div class="positionfil">
          <div class="col-lg-7">
            <br><br>
            <div class="row">
              <h1 class="policetire">
                @foreach ($contenus as $contenu)
                @if ($contenu->type=="blog_5" && app()->getLocale() == 'fr')
                {!!$contenu->titre!!}
                @else
                {!!$contenu->title!!}
                @endif
                @endforeach
              </h1>
              {{-- <h1 class="policetire"> LE MEILLEUR, RIEN DE MOINS</h1> --}}
            </div>
            <div class="row">
              <div class="col-3">
                <div class="progress my-2 mb-2 bg-transparent ">
                  <div class="progress-bar progbarcolor progbarleft " role="progressbar" aria-valuenow="20"
                    aria-valuemin="0" aria-valuemax="100">
                    <span class="sr-only orangee">20% Complete</span>
                  </div>
                </div>
                <!-- <hr class="orangee" style="height: 15px; background: #f9b442;" > -->
              </div>
            </div>
            <div class="row ">
              <div class="col-md-10 icon-box">
                <div class="conteneur pilicecon justifier">
                  @foreach ($contenus as $contenu)
                  @if ($contenu->type=="blog_5" && app()->getLocale() == 'fr')
                  {!!$contenu->extrait!!}
                  @else
                  {!!$contenu->extraitang!!}
                  @endif
                  @endforeach
                  {{-- <p class="pilicecon">
                    Le terrain est impitoyable, tout comme le bois sacré. Y compris le courage de la culture du courage
                    de se remettre en cause. Nous manoins la confidentialité comme une stratégie à par entière au même
                    titre que la publicité. Car en maitière de chasse, la surprise est un art qui permet de prendre
                    d'avantage.<br />Nous visons l'excellence. Nous débusquons les meilleures technolosies pourchassons
                    les meilleures solutions pour appater les réponses les plus adaptées aux défis que vons affrontez
                    Sur tous les canaux, nous planifions,preparons et organisons minatieusement cette rencontre entre
                    vous et le clients Sur tous les canaux, nous planifions,preparons et organisons minatieusement cette
                    rencontre entre vous et le clients
                  </p> --}}
                </div>


                <!--<div class="d-flex justify-content-end "><button type="button" class="btn "> En savoir plus</button></div>-->
                <div class="d-flex justify-content-end text-black "><a href="/client"><button type="button" class="btn">
                      {{app()->getLocale()=='fr'?'En savoir plus':'See More'}}</button></a></div>
                <img src="assets/img/images/RECADRAGE/RECADRAGE-08.png" class="card-img-bottom img " alt="..." />

              </div>
            </div>

          </div>

          <div class="col-lg-5 pt-4 pt-lg-0">


          </div>
        </div>
      </div>

    </div>
    @foreach ($contenus as $contenu)
    @if ($contenu->type=="blog_5")
    <img src="{{asset('storage')}}/{{$contenu->imageUrl}}" class="card-img-bottom img " alt="..." />
    @endif
    @endforeach
    {{-- <img src="assets/img/images/RECADRAGE/RECADRAGE-04.png" class="card-img-bottom w-100 im-fluid accueil-im"
      alt="..." /> --}}

  </section><!-- End Portfolio Section -->



  <!-- ======= Services Section ======= -->
  <section id="services" class="services">
    <div class="container blanc ">
      <div class="row content positionpere  redressed">
        <div class="positionfil d-flex justify-content-center">
          <div class="col-lg-5 ">

          </div>
          <div class="col-lg-6 pt-4 pt-lg-0">
            <br><br>
            <div class="row justify-content-end">

            </div>
            <div class="row justify-content-end">

              <h2 class="texte-end policetire" style="text-align: end">
                @foreach ($contenus as $contenu)
                @if ($contenu->type=="blog_6"&& app()->getLocale() == 'fr')
                {!!$contenu->titre!!}
                @else
                {!!$contenu->title!!}
                @endif
                @endforeach
              </h2>

              {{-- <h2 class="texte-end policetire" style="text-align: end">DOMAINE DE COMPETENCES</h2> --}}
              <div class="col-3">
                <div class="progress my-2 mb-2 bg-transparent  ">
                  <div class="progress-bar progbarcolor progbarleft " role="progressbar" aria-valuenow="20"
                    aria-valuemin="0" aria-valuemax="100" style="height: 10px; background: #f9b442;">
                    <span class="sr-only orangee">20% Complete</span>
                  </div>
                </div>
                <!-- <hr class="orangee" style="height: 15px; background: #f9b442;" > -->
              </div>
            </div>
            <div class="content d-flex flex-column justify-content-end blanc">
              <img src="{{asset('assets/img/images/RECADRAGE/RECADRAGE-14.png')}}"
                class="card-img-bottom w-100 im-fluid accueil-im" alt="..." />
              <div class="row text-end d-flex">
                <ul class="comptence mb-3 d-flex  " style="list-style: none;padding-left: 0px;">
                  <li class="nav-item  blanc "><a class="nav-link refpolice11  blanc "
                      style="border-right: 2px solid #ffffff !important ; background-color:rgb(0,0,0,0) !important"
                      href="https://www.appatam.com/">APPATAM</a></li>
                  <li class="nav-item  blanc "
                    style="border-right: 2px solid #ffffff !important ; background-color:rgb(0,0,0,0) !important"><a
                      class="nav-link refpolice11  blanc" href="https://www.djela.ci/">DJELA</a></li>
                  <li class="nav-item  blanc "
                    style="border-right: 2px solid #ffffff !important ; background-color:rgb(0,0,0,0) !important"><a
                      class="nav-link refpolice11  blanc" href="https://socopi.ci/">SOCOPI</a></li>
                  <li class="nav-item  blanc "
                    style="border-right: 2px solid #ffffff !important ; background-color:rgb(0,0,0,0) !important"><a
                      class="nav-link refpolice11  blanc" href="https://fr-fr.facebook.com/SuzangG/">SUZANG</a></li>
                  <li class="nav-item  blanc" style=" background-color:rgb(0,0,0,0) !important"><a
                      class="nav-link refpolice11  blanc" href="https://www.yefien.com/">YEFIEN</a></li>

                </ul>
              </div>

            </div><!-- End .content-->
            <br>
          </div>
        </div>
      </div>

    </div>

    <img src="assets/img/images/RECADRAGE/RECADRAGE-05.png" class="card-img-bottom w-100 im-fluid accueil-im"
      alt="..." />

  </section><!-- End Services Section -->




  <!-- ======= Clients Section ======= -->
  <section id="clients" class="clients section-bg">
    <div class="container">
      <h1 class="reference noir"> {{app()->getLocale()=='fr'?'Références':'reference'}}</h1>
      <div data-bs-interval="3000" class="carousel slide " data-bs-ride="carousel">
        <div class="carousel-inner" role="listbox">

          @foreach ($clients as $client )
          <div class="carousel-item @if($loop->first) active @endif">
            <div class="container d-flex justify-content-center d-flex  text-center">
              <div class="row align-items-center">
                @foreach ($clients as $client )
                <div class="col-lg-2 col-md-2 col-2 slider-image text-center">
                  <img src="{{asset('storage')}}/{{$client->imageUrl}}" class="img-fluid" alt="">
                </div>
                @endforeach
              </div>
            </div>
          </div>
          @endforeach

        </div>
      </div>


    </div>
  </section><!-- End Clients Section -->

</main><!-- End #main -->
</div>
<footer id="footer" style="background-color:#08090C !important;">
  <div class="footer-top" style="background-color:#08090C !important;">
    <div class="container">
      <div class="container">
        <br>
        <div class="row justify-content-center">
          <div class="col-12">
            <div class="row">
              <div class=" col-md-2 col-lg-2  col-2"></div>
              <div class="col-md-10 col-lg-10  col-10 ">
                <h3 id="contact text-end" class="contact-police  "> {{app()->getLocale()=='fr'?'Contactez Nous':'Contact
                  us'}}</h3>
              </div>

              <div class=" col-lg-6 col-md-12">
                <div class="row text-center">
                  <div class="row text-center">

                  </div>
                  <br><br>
                  <div class="row textecentrer">
                    <div class="col-lg-2 col-md-2 col-sm-12 ">
                      <i class="bi bi-geo-alt text-center orangee" style="font-size: 2rem !important"
                        aria-hidden="true"></i>
                    </div>
                    <div class="col-md-12 col-lg-10  col-12">
                      <p class="card-text redressed blanc contpolice">
                        {{app()->getLocale()=='fr'?'ADRESSE':'ADRESS'}}<br />Villa 69 cité Belle vue, Cocody Angré 8ème
                        tranche</p>
                    </div>
                  </div>
                  <div class="row textecentrer">
                    <div class="col-lg-2 col-md-2 col-sm-12 ">
                      <i class="bi bi-phone orangee text-center " style="font-size: 2rem !important"
                        aria-hidden="true"></i>
                    </div>
                    <div class="col-md-12 col-lg-10  col-12">
                      <p class="card-text redressed blanc contpolice ">
                        {{app()->getLocale()=='fr'?'TELEPHONE':'PHONE'}}<br />(225) 27 22 42 14 83 <br /> <span
                          style="padding-left:0px">(225) 07 77 63 61 40 / 07 77 63 63 07</span> </p>
                    </div>

                  </div>
                  <div class="row textecentrer">
                    <div class="col-lg-2 col-md-2 col-sm-12 ">
                      <i class="bi bi-envelope orangee text-center" style="font-size: 2rem !important"
                        aria-hidden="true"></i>

                    </div>
                    <div class="col-md-12 col-lg-10  col-12">
                      <p class="card-text redressed blanc contpolice">
                        {{app()->getLocale()=='fr'?'EMAIL':'EMAIL'}}<br />contactsite@suzang-group.com</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-6 col-md-12" style="background-color:#64350d !important ;">
                <br><br>
                <div id="le_form" class="row  redressed  ">
                  <div id="le_form" class="row blanc newsletter">
                    <div class="d-grid gap-2 mx-auto text-center">
                      <h2> Newsletter</h2>
                      <div class="my-3">
                        <ul id="save_msgList"></ul>
                        <div id="success_message"></div>
                      </div>

                      @csrf
                      <div class="form-group mb-3">
                        <input input type="text" id="nom" class="form-control nom" name="nom" placeholder="nom"
                          required>
                      </div>
                      <div class="form-group mb-3">
                        <input type="text" id="adresse" class="form-control adresse " name="adresse" placeholder="email"
                          required>
                      </div>
                      <button class="btn add_newsletter"
                        type="button">{{app()->getLocale()=='fr'?'Souscrire':'Subscribe'}}</button>
                      <br>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>



    </div>
  </div>
  </div>

  <div class="container">

    <div class="copyright">

      &copy; Copyright 2023 <strong><span>Suzang</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/groovin-free-bootstrap-theme/ -->
      Designed by <a href="https://www.appatam.com/">APPATAM</a>
    </div>
  </div>
</footer><!-- End Footer -->

@section('scripts')
<script>
  $(document).ready(function (){
      $(document).on('click', '.add_newsletter', function (e) {
            e.preventDefault();
           
            var data = {
                'nom': $('.nom').val(),
                'adresse': $('.adresse').val()
            };
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "POST",
                url: "/newletter",
                data: data,
                dataType: "json",
                success: function (response) {
                    if (response.status == 400) {
                        $('#save_msgList').html("");
                         $('#success_message').hide()
                         $('#success_message').removeClass('d-none');
                        //$('#save_msgList').addClass('alert alert-danger');
                        $.each(response.errors, function (key, err_value) {
                            $('#save_msgList').append('<span>' + err_value + '</span><br/>');
                        });
                         $('.add_newsletter').text('Save');
                    } else {
                        $('#save_msgList').hide();
                        $('#success_message').removeClass('d-none');
                        $('#success_message').addClass('alert alert-success d-block');
                        $('#success_message').text(response.message);
                        $('#le_form').find('input').val('');
                        $('.add_newsletter').text('Save');
                    }
                }
            });
       });
    });
</script>

@endsection