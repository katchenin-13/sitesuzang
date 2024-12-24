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
  <!-- ======= Features Section ======= -->
  <section id="features" class="features">
    <div class="container">
      <h1 class="policetire">
        @foreach ($contenus as $contenu)
        {{-- @if ($contenu->type=="blog_11") {!!$contenu->titre!!} @endif --}}
        @if ($contenu->type=="blog_11" && app()->getLocale() == 'fr')
        {!!$contenu->titre!!}
        @else
        {!!$contenu->title!!}
        @endif
        @endforeach
      </h1>
      <br>
      {{-- <h1>DEVENIR UN MEMBRE DE L'EQUIPE SUZANG</h1> --}}
      <div class="row">
        <div class="col-lg-3 col-md-3 col-3">
          <div class="progress my-2 mb-2 bg-transparent ">
            <div class="progress-bar progbarcolor progbarleft " role="progressbar" aria-valuenow="20" aria-valuemin="0"
              aria-valuemax="100" style="height: 10px; background: #f9b442;">
              <span class="sr-only orangee">20% Complete</span>
            </div>
            <!-- <hr class="orangee" style="height: 15px; background: #f9b442;" > -->
          </div>
          <br><br>
        </div>
        <div class="row">
          <div class="col-lg-3">
            <ul class="nav nav-tabs flex-column">
              @foreach($categories as $categorie)
              <li class="nav-item">
                <a @if ($loop->first) class="nav-link active show" @else class="nav-link " @endif data-bs-toggle="tab"
                  href="#tab-{{$categorie->id}}">{{$categorie->titre}}</a>
              </li>
              @endforeach
            </ul>
          </div>
          <div class="col-lg-9 mt-4 mt-lg-0">
            <div class="tab-content">
              @foreach($categories as $categorie)
              <div class="tab-pane  @if ($loop->first) active   @else  @endif show" id="tab-{{$categorie->id}}">
                <div class="row">
                  <div class="col-lg-8 details order-2 order-lg-1">


                    <div class="accordion" id="accordionExample{{$categorie->id}}">

                      @foreach($categorie->posts as $post)
                      <div class="accordion-item">

                        <h2 class="accordion-header" id="headingOne{{$post->id}}">
                          <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseOne{{$post->id}}" aria-expanded="true"
                            aria-controls="collapseOne{{$post->id}}">
                            {{$post->titre}}
                          </button>
                        </h2>

                        <div id="collapseOne{{$post->id}}"
                          class="accordion-collapse collapse  @if ($loop->first) show   @endif"
                          aria-labelledby="headingOne{{$post->id}}"
                          data-bs-parent="#accordionExample{{$categorie->id}}">
                          <div class="accordion-body">
                            <p class="pilicecon"> {{ $post->contenu}}</p>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#exampleModalToggle">{{app()->getLocale()=='fr'?'Postuler':'To
                                apply'}}</button>
                            </div>

                          </div>
                        </div>
                      </div>
                      @endforeach
                    </div>

                  </div>

                </div>
              </div>
              @endforeach


            </div>
          </div>

        </div>

        {{-- --}}

        <!-- Modal -->

        <div class="modal fade noir" id="exampleModalToggle" tabindex="-1" aria-labelledby="exampleModalLabel"
          aria-hidden="true" style="display: none;">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{app()->getLocale()=='fr'?"Formulaire
                  d'inscription":'Registration form:'}}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <div class="my-3">
                  <ul id="save_msgList"></ul>
                  <div class="noir" id="success_message"></div>
                </div>

                <div class="col-lg-12 mt-5 mt-lg-0">
                  {{-- <div class="my-3">
                    <ul class="alert alert-danger d-none" id="save_msgList"></ul>
                    <div id="success_message"></div>
                  </div> --}}



                  <form id="addcandidature" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                      <div class="col-md-12 form-group mt-3 mt-md-0">
                        <label for="nom" class="form-label">{{app()->getLocale()=='fr'?'Nom et prenom':'First and last
                          name'}}</label>
                        <input type="text" name="nom" class="form-control nom" id="nom" placeholder="Notre nom"
                          required>

                      </div>
                      <div class="col-md-6 form-group mt-3 mt-md-0">
                        <label for="telephone"
                          class="form-label">{{app()->getLocale()=='fr'?'Téléphone:':'Phone:'}}</label>
                        <input type="text" name="telephone" class="telephone form-control">

                      </div>
                      <div class="col-md-6 form-group mt-3 mt-md-0">
                        <label for="post" class="form-label ">{{app()->getLocale()=='fr'?'Selectionner le post':'Select
                          the post:'}}</label>
                        <select class="form-control post v " name="post">
                          <option value="0" selected="selected">------------------</option>
                          @foreach ($posts as $post)
                          <option value="{{$post->id}}">{{$post->titre}}</option>
                          @endforeach
                        </select>
                      </div>

                      <div class="col-md-6 form-group mt-3 mt-md-0">
                        <label for="cv" class="form-label">E-Mail</label>
                        <input type="email" class="form-control adresse" name="adresse" id="adresse"
                          placeholder="votree adresse email" required>

                      </div>
                      <div class="form-group mt-3">
                        <label for="cv" class="form-label"> {{app()->getLocale()=='fr'?'Importer votre cv ici':'Import
                          your cv here'}}</label>
                        <input type="file" name="cv" id="cv" class="cv form-control">
                      </div>
                    </div>

                  </form>
                </div>
                <div class="row justify-content-center">
                  <div class="col-8"><br><img src="assets/img/images/RECADRAGE/RECADRAGE-071.png" width="100%"
                      height="100%" alt=""></div>
                </div>
                <br>
                <div class="row text-center">
                  <h4> APPATAM | DJELA | SUZANG | YEFIEN | SOCOPI</h4>
                </div>
              </div>
              <div class="modal-footer">
                {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> --}}
                <button class="btn tn btn-primary soumet "
                  type="submit">{{app()->getLocale()=='fr'?'Envoyer:':'Send:'}}</button>

              </div>
            </div>
          </div>
        </div>

        <br><br><br>

        <!-- Modal -->
  </section><!-- End Features Section -->

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

@section('scripts')
<script>
  $(document).ready(function (){
      $('.soumet').on('click',function (e) {
        e.preventDefault();
        var formData = new FormData();
          formData.append('cv', $('#cv')[0].files[0]); 
          formData.append('nom', $('.nom').val()); 
          formData.append('telephone', $('.telephone').val()); 
          formData.append('post', $('.post').val()); 
          formData.append('adresse', $('.adresse').val()); 
         
          $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
               });
            $.ajax({
                type: "POST",
                url: "/carriere",
                data: formData,
                contentType: false,
                processData: false,
                success: function (response){
                    if (response.status == 400) {
                        $('#save_msgList').html("");
                        $('#save_msgList').addClass('alert alert-danger');
                        $.each(response.errors, function (key, err_value) {
                            $('#save_msgList').append('<li>' + err_value + '</li>');
                        });
                       
                    } else{
                         
                        $('#save_msgList').hide();
                        //alert(response.message);
                        $('#success_message').addClass('alert alert-success');
                        $('#success_message').text(response.message);
                         $('#addcandidature').find('input').val('');
                         $('#addcandidature').find('select').val('');
                        $('.exampleModalToggle'+response).model('hide');

                       
                    }

               
                  
                }
            });
      });
      });
   
</script>
@endsection