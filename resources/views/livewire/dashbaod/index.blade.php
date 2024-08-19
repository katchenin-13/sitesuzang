@extends("layouts.master")

@section("contenu")
  
        <div class="col-12 p-4 ">
            <h2 class="ellipsis">Bienvenu, <strong> {{ userFullName() }} </strong></h1>
             @foreach(auth()->user()->roles as $role)
                <p>{{$role->nom}}</p>
            @endforeach
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
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
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
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
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
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                 </div>
           </div><!-- ./col -->
          <div class="col-lg-3 col-6 mt-1">
                 <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{$candidats->count()}}</h3>

                        <p>Postulants</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
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
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div class="chart">
                  <canvas id="areaChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
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
                <div class="chart">
                  <canvas id="areaChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
@endsection