
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
  <main id="main" >

    <section id="team" class="team section-bg">
      <div class="container">
        <br><br>
        <h1 class="policetire">
          @foreach ($contenus as $contenu)
        @if ($contenu->type=="blog_12") {!!$contenu->titre!!} @endif
        @if ($contenu->type=="blog_12" && app()->getLocale() == 'fr')
        {!!$contenu->titre!!}
        @else
        {!!$contenu->title!!}
        @endif
     @endforeach
        </h1>
        {{-- <h1>CONTACTEZ-NOUS</h1> --}}
        <div class="row"> 
          <div class="col-lg-3 col-md-3 col-3">
            <div class="progress my-2 mb-2 bg-transparent ">
              <div class="progress-bar progbarcolor progbarleft " role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="height: 10px; background: #f9b442;" >
              <span class="sr-only orangee">20% Complete</span>
          </div>
            {{-- <hr class="orangee" style="height: 15px; background: #f9b442 !important;" > --}}
          </div>
        </div>       
        <div class="row pilicecon">
          @foreach ($contenus as $contenu)
            {{-- @if ($contenu->type=="blog_12") {!!$contenu->contenu!!}  @endif --}}
            @if ($contenu->type=="blog_12" && app()->getLocale() == 'fr')
            {!!$contenu->contenu!!}
            @else
            {!!$contenu->contenus!!}
            @endif
          @endforeach 
            {{-- <p>
            Votre avis compte, il nous permet de mieux vous servir et d’affiner nos offres. Y compris le courage de se remettre en cause.  <br>  
            </p> --}}
            <br> <br>
        </div>
      </div>
      <br> <br>
    </section> <!-- End Team Section -->



    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container">
          <div>
            <iframe style="border:0; width: 100%; height: 270px;" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3972.121959165805!2d-3.9730758!3d5.3983832!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xfc195f732d66469%3A0x5d63b083915f0c4a!2sSUZANG%20Group!5e0!3m2!1sfr!2sci!4v1673866156328!5m2!1sfr!2sci" frameborder="0" allowfullscreen></iframe>
          </div>
          <div class="row mt-5">

            <div class="col-lg-4">
              <div class="info">
                <div class="address">
                  <i class="bi bi-geo-alt orangee"></i>
                  <h4>{{app()->getLocale()=='fr'?'Adresse:':'Adress:'}}</h4>
                  <p>villa 69 cité Belle vue, Cocody Angré 8ème tranche</p>
                </div>

                <div class="email">
                  <i class="bi bi-envelope orangee"></i>
                  <h4>{{app()->getLocale()=='fr'?'Email:':'Email:'}}</h4>
                  <p>contactsite@suzang-group.com</p>
                </div>

                <div class="phone">
                  <i class="bi bi-phone orangee"></i>
                  <h4>{{app()->getLocale()=='fr'?'TELEPHONE:':'PHONE:'}}</h4>
                  <p>(225) 22 42 14 83 <br/>   <span style="padding-left:0px" >(225) 07 77 63 61 40 / 07 77 63 63 07</p>
                </div>

              </div>

            </div>

            <div class="col-lg-8 mt-5 mt-lg-0">
                <div class="my-3">
                        <ul id="save_msgList"></ul>
                        <div id="success_message"></div>
                </div>
                <div class="row">
                    @csrf
                                                         
                  <div class="col-md-6 form-group mb-3 mt-3 mt-md-0">
                    <input type="text" name="nom" class="form-control nom" id="nom" placeholder="Nom et Prenon" required>
                  </div>
                  <div class="col-md-6 form-group mb-3 mt-3 mt-md-0">
                    <input type="text" name="telephone" class="form-control telephone" id="telephone" placeholder="Telephone" required>
                  </div>
                  <div class="col-md-6 form-group mb-3 mt-3 mt-md-0">
                    <input type="email" class="form-control adresse" name="adresse" id="adresse" placeholder="Votre adresse" required>
                  </div>
                
                  <div class="form-group mb-3 mt-3 mt-md-0">
                    <input type="text" class="form-control objet" name="objet" id="objet" placeholder="objet" required>
                  </div>
                  <div class="form-group mb-3 mt-3 mt-md-0">
                    <textarea id="msg" class="form-control msg" name="msg" rows="5" placeholder="Message" required></textarea>
                  </div>
                  <div class="my-3">
                      <ul id="save_msgList"></ul>
                      <div id="success_message"></div>
                  </div>
               </div>
                 <div class="text-center add_contact btn btn-secondary "><button  class ="btn btn-secondary" type="submit">envoyer</button></div>
                 
              <!-- </form> -->

            </div>

          </div>

        </div>
        <br> <br>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->
</div>

     <!-- ======= Footer ======= -->
     <footer id="footer"style="background-color:#08090C !important;">
 
      <div class="container-fluid p-0">
        <div class="row justify-content-center" >
            
          
         <div class="copyright">
         <ul class="d-flex justify-content-center redressed  align-items-center ">
                 <a class="nav-link "  href="#"> <i class="ri-facebook-fill orangee me-3 mt-3  " aria-hidden="true" ></i></a>
                 <a class="nav-link" href="#">  <i class="ri-twitter-fill  orangee me-3 mt-3 "  aria-hidden="true" ></i></a>
                 <a class="nav-link " href="#"> <i class="ri-linkedin-box-fill orangee me-3 mt-3 "  aria-hidden="true" ></i></a>
                 <a class="nav-link " href="#"> <i class="bi-youtube orangee me-3 mt-3 "  aria-hidden="true" ></i></a>
                                 
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
      $(document).on('click', '.add_contact', function (e) {
            e.preventDefault();
          
            var data = {
                'nom': $('.nom').val(),
                'telephone': $('.telephone').val(),
                'objet': $('.objet').val(),
                'adresse': $('.adresse').val(),
                'msg': $('.msg').val()
            };

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "POST",
                url: "/contact",
                data: data,
                dataType: "json",
                success: function (response) {
                    if (response.status == 400) {
                        $('#save_msgList').html("");
                        $('#save_msgList').addClass('alert alert-danger');
                        $.each(response.errors, function (key, err_value) {
                          $('#save_msgList').append('<li>' + err_value + '</li><br/>');
                        });
                        $('.add_contact').text('envoyer ');
                    } else {
                        $('#save_msgList').hide();
                        $('#success_message').addClass('alert alert-success');
                        $('#success_message').text(response.message);
                        $('.le_form').find('input').val('');
                        $('.le_form').find('textarea').val('');
                      $('.add_contact').text('envoyer ');
                    }
                }
            });
      });
      });
</script>
@endsection