
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

<!-- ======= Portfolio Section ======= -->
<section id="portfolio" class="portfolio">
  
  <div class="container">
    <br><br>
    <h1 class="policetire">
      @foreach ($contenus as $contenu)
    {{-- @if ($contenu->type=="blog_10") {!!$contenu->titre!!} @endif --}}
    @if ($contenu->type=="blog_10" && app()->getLocale() == 'fr')
    {!!$contenu->titre!!}
    @else
    {!!$contenu->title!!}
    @endif
 @endforeach
    </h1>
    {{-- <h1> Le meilleur, rien de moins</h1> --}}
    <div class="row"> 
      <div class="col-lg-3 col-md-3 col-3">
        <div class="progress my-2 mb-2 bg-transparent ">
          <div class="progress-bar progbarcolor progbarleft " role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="height: 10px; background: #f9b442;" >
          <span class="sr-only orangee">20% Complete</span>
       </div>
        {{-- <hr class="orangee" style="height: 15px; background: #f9b442;" > --}}
      </div>
    </div>       
    <div class="row justify-content-center pilicecon">
      @foreach ($contenus as $contenu)
        {{-- @if ($contenu->type=="blog_10") {!!$contenu->contenu!!}  @endif --}}
        @if ($contenu->type=="blog_10" && app()->getLocale() == 'fr')
        {!!$contenu->contenus!!}
        @else
        {!!$contenu->contenus!!}
        @endif
      @endforeach 
       
      <br><br> 
     
      
    </div>
  </div>
  
  <div class="container">
    <div class="row">
      <div class="col-lg-12 d-flex justify-content-center">
        <ul id="portfolio-flters">
           <h1>{{app()->getLocale()=='fr'?'Il nous font confiance':'They trust us'}}</h1>
        </ul>
      </div>
    </div>

    <div class="row portfolio-container ">
        <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach ($clients as $client )
        <div class="col-lg-3 col-md-6 portfolio-item filter-app">
          <div class="portfolio-wrap">
            <img src="{{asset('storage')}}/{{$client->imageUrl}}" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>{{$client->titre}}</h4>
              <p>{{$client->titre}}</p>
              <div class="portfolio-links">
                <a href="{{asset('storage')}}/{{$client->imageUrl}}" data-gallery="portfolioGallery" class="portfolio-lightbox" title="{{$client->titre}}"><i class="bx bx-plus"></i></a>
                <a href="{{$client->links1}}" ><i class="bx bx-link"></i></a>
              </div>
            </div>
          </div>
        </div>
          
        @endforeach    
    
      
     

    

        </div>
    

    </div>

  </div>
</section><!-- End Portfolio Section -->

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
  


