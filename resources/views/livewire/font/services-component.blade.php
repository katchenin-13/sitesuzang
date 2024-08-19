
  <section id="hero1">
    
    <div class="container">
    
      <div class="row">
        @foreach ($contenus as $contenu)
        @if ($contenu->type=="blog_2")
             <img src="{{asset('storage')}}/{{$contenu->imageUrl}}" class="card-img-bottom img " alt="..."/>
        @endif
      @endforeach
        {{-- <img src="assets/img/images/RECADRAGE/RECADRAGE-071.png"  class="card-img-bottom im-fluid lesautrepageba animate__animated animate__fadeInDown w-100" alt=""> --}}
      </div>       
      <br>
    </div>

  </section><!-- End Hero -->

<main id="main"  class="arriere"  >

<!-- ======= Team Section ======= -->
<section id="team" class="team section-bg">
  <div class="container">
    <br><br>
    <h1 class="policetire">
      @foreach ($contenus as $contenu)
       {{-- @if ($contenu->type=="blog_9") {!!$contenu->titre!!} @endif --}}
       @if ($contenu->type=="blog_9"&& app()->getLocale() == 'fr')
        {!!$contenu->titre!!}
        @else
        {!!$contenu->title!!}
        @endif
      @endforeach
    </h1>
    {{-- <h1> Domaine de competences</h1> --}}
    <div class="row"> 
      <div class="col-lg-3 col-md-3 col-3">
        <div class="progress my-2 mb-2 bg-transparent ">
          <div class="progress-bar progbarcolor progbarleft " role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="height: 10px; background: #f9b442;" >
          <span class="sr-only orangee">20% Complete</span>
      </div>
        {{-- <hr class="orangee" style="height: 15px; background: #f9b442;" > --}}
      </div>
    </div>
           
    <div class="rowv pilicecon">
      @foreach ($contenus as $contenu)
        @if ($contenu->type=="blog_9") {!!$contenu->contenu!!}  @endif
      @endforeach 
        {{-- <p>
          Le terrain est impitoyable, tout comme le bois sacré. Nous avons developpé la culture du courage. Y compris le courage de se remettre en cause.  <br>  
        </p> --}}
        <br>
    </div>
  </div>
</section> <!-- End Team Section -->

<!-- ======= Our Skills Section ======= -->
<section id="skills" class="skills">
  <div class="container">
                    
    <div class="row">
   
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach ($services as $service)
            <div class="col">
              <div class="card" style="border:none;" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal{{$service->id}}">
                <div class="card-header" style="border:none; background-color: #f9b442;">
                    <h4>
                      @if (app()->getLocale() == 'fr')
                      {{$service->titre}}
                      @else
                     {{$service->title}}
                     @endif
                    </h4>
                </div>
                <div class="card-body ">
                  <p class="card-text ">
                    
                    @if (app()->getLocale() == 'fr')
                    {{$service->extrait}}
                    @else
                    {{$service->extraitang}}
                    @endif
                  </p>
                  <div class="d-flex justify-content-end ">
                    <a class="noir gras text-just" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal{{$service->id}}">{{app()->getLocale()=='fr'?'En savoir plus':'See more'}}</a>
                   
                  </div>
                </div>
              </div>
            </div>
            @endforeach
          <!-- Modal -->
          @foreach ($services as $service)
         <div class="modal fade" id="exampleModal{{$service->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">
                    {{-- {{$service->titre}} --}}
                    @if (app()->getLocale() == 'fr')
                      {{$service->titre}}
                    @else
                      {{$service->title}}
                    @endif
                  </h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body ">
                  <p class="card-text ">
                    
                    @if (app()->getLocale() == 'fr')
                      {{$service->contenu}}
                    @else
                      {{$service->contenus}}
                    @endif
                  </p>
                  {{-- <p class="card-text ">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</ --}}

                  <div class="row justify-content-center">
                    <div class="col-8"><br><img src="assets/img/images/RECADRAGE/RECADRAGE-071.png" width="100%" height="100%" alt=""></div>
                  </div>
                  <br>
                  <div class="row text-center">
                    <h4> Appatam | djela | suzang | yefien | socopi</h4>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{app()->getLocale()=='fr'?'Fermer':'Close'}}</button>
                  {{-- <button type="button" class="btn btn-primary">Sauvegarder</button> --}}
                </div>
              </div>
            </div>
         </div>
          <!-- Modal -->
          @endforeach
        </div>
    </div>

          <div class="row">
            <div class="col">
                <br> <br>
                <div class="row justify-content-center">
                    <div class="d-flex justify-content-center"> {{$services->links()}}</div>                  
                </div>
                <br> <br>
                <div class="row text-center noir gras">
                    <h4> Appatam | djela | suzang | yefien | socopi</h4>
                </div>
                <br> <br>
            </div>
          </div> 
</div>
</section><!-- End Our Skills Section -->
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
        
          Designed by <a href="https://www.appatam.com/">APPATAM</a>
     
          </div>
        </div>
        
      </div>
      
     </footer><!-- End Footer -->