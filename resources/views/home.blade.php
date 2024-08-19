
@extends("layouts.master")

@section("contenu")
  

<figure class="highcharts-figure">

 <div class="col-12 p-4 ">
            <h2 class="ellipsis">Bienvenu, <strong> {{ userFullName() }} </strong></h1>
          
        </div>

    <div class="row ">
          <div class="col-lg-3 col-6 mt-1">
                 <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{$users->count()}}</h3>

                        <p>Utilisateur</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                 </div>
           </div><!-- ./col -->
          <div class="col-lg-3 col-6 mt-1">
                 <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{$contacts->count()}}</h3>

                        <p>Contact</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    {{-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
                 </div>
           </div><!-- ./col -->
           <div class="col-lg-3 col-6 mt-1">
                 <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{$newletters->count()}}</h3>

                        <p>Newletter</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    {{-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
                 </div>
           </div><!-- ./col -->
          <div class="col-lg-3 col-6 mt-1">
                 <div class="small-box bg-info">
                    <div class="inner">
                        <h3 >{{$candidats->count()}}</h3>

                        <p>Postulants</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    {{-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
                 </div>
           </div><!-- ./col -->
    </div>  <!-- /.row -->
    <div class="row">
        <div class="col-md-6">
            <!-- AREA CHART -->
            <div class="card card-primary">
              <div class="card-header">
                 
                <h3 class="card-title">Area Chart</h3>

                <div class="card-tools">
                <div class="btn-group">
                    <button type="button" class="btn btn-tool dropdown-toggle" data-toggle="dropdown" data-offset="-52" aria-expanded="false">
                      <i class="fas fa-bars"></i>
                    </button>
                    <div class="dropdown-menu" role="menu" style="">
                      <a href="#" class="dropdown-item">Add new event</a>
                      <a href="#" class="dropdown-item">Clear events</a>
                      <div class="dropdown-divider"></div>
                      <a href="#" class="dropdown-item">View calendar</a>
                    </div>
                  </div>
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div class="chart" id="container" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;">
                  {{-- {!! $chart->container() !!} --}}
                </div>
              </div>
              <!-- /.card-body -->
            </div> <!-- /.card -->
       </div>
        <div class="col-md-6">
            <!-- AREA CHART -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Area Chart</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div class="chart" id="container1" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;">
                      {{-- {!! $chart->container() !!}
                   <script>
                      var app = new Vue({
                          el: '#container1',
                      });
                  </script> --}}
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
  <div ></div>
  <p class="highcharts-description">
    Demonstrating a basic area chart, also known as a mountain chart.
    Area charts are similar to line charts, but commonly used to visualize
    volumes.
  </p>
</figure>

      
        
<script>
 var datas = <?php echo json_encode($datas)?>;
 Highcharts.chart('container',
 {
   title:{
     text: 'les utilisateurs'
   },
   subtitle:{
      text:'Source:Evolution des utilisateurs'
   },
   
   xAxis:{
    categories:['Jan','Fev','Mar','Apr','Mai','Jun','July','Aug','Sep','Oct','Nov','Dec']
   },
   yAxis:{
        title:{
          text:'Le nombre d\'utilisateurs'
      }
   },
   legend:{
    layout:'vertical',
    align:'right',
    VerticalAlign:'middle',
   },
   plotOptions:{
    servies:{
      allowPointSelect:true
    }
   },
   series:[
        {
          name:'Nouvel utlisateur',
          data:datas
        }
    ],
    responsive:{
      rules:[
        {
           condition:{
              maxWidth:500
            },
            chartOptions:{
                  legend:{
                     legnd:'horizontal',
                     align:'center',
                    verticalAlign:'bottom'
                  }
               }
            }
      ]
    }
 });
 Highcharts.chart('container1',
 {
   chart: {
    type: 'column',
    zoomType: 'x',
    panning: true,
    panKey: 'shift',
    scrollablePlotArea: {
      minWidth: 600
    }
  },
   title:{
     text: 'les utilisateurs'
   },
   subtitle:{
      text:'Source:Evolution des utilisateurs'
   },
   
   xAxis:{
    categories:['Jan','Fev','Mar','Apr','Mai','Jun','July','Aug','Sep','Oct','Nov','Dec']
   },
   yAxis:{
        title:{
          text:'Le nombre d\'utilisateurs'
      }
   },
   legend:{
    layout:'vertical',
    align:'right',
    VerticalAlign:'middle',
   },
   plotOptions:{
    servies:{
      allowPointSelect:true
    }
   },
   series:[
        {
          name:'Nouvel utlisateur',
          data:datas
        }
    ],
    responsive:{
      rules:[
        {
           condition:{
              maxWidth:500
            },
            chartOptions:{
                  legend:{
                     legnd:'horizontal',
                     align:'center',
                    verticalAlign:'bottom'
                  }
               }
            }
      ]
    }
 });
</script>

  
@endsection

