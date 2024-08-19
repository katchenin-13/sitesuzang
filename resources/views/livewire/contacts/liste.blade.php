<div class="row p-4 pt-5">
   
          <div class="col-12">
            <div class="card card card-primary">
              <div class="card-header  d-flex align-items-center"  style="background-color: #64350d !important;">
                <h3 class="card-title flex-grow-1"><i class="fas fa-list fa-2x"></i> Liste des contacts</h3>

                <div class="card-tools d-flex align-items-center ">
                <a class="btn  text-white mr-4 d-block" wire:click.prevent='ExportIntoExcel()' ><i class="fas fa-list fa-2x"></i> Exporter la liste des contacts</a>
                  <div class="input-group input-group-md" style="width: 250px;">
                    <input type="text" name="table_search"  wire:model.debounce.700ms="search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit"  class="btn btn-default"><i class="fas fa-search"></i></button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0 table-striped" style="height: 350px;">
                <table class="table table-head-fixed">
              
                  <thead>
                    <tr>
                      <th style="width:20%;">Nom</th>
                      <th style="width:10%;" >Telephone</th>
                      <th style="width:20%;" >Adresse</th>
                      <th style="width:20%;" >objet</th>
                      <th style="width:10%;" class="text-center">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                      @forelse ($contacts as $contact )
                        <tr>
                            <div class="modal fade" id="exampleModalToggle{{$contact->id}}" aria-hidden="true" aria-labelledby="exampleModalToggleLabel{{$contact->id}}" tabindex="-1">
                              <div class="modal-dialog ">
                                  <div class="modal-content">
                                      <div class="modal-header " style="background-color:#64350d ;">
                                        <h5 class="modal-title " id="exampleModalToggleLabel{{$contact->id}}"style="color:#fff ;">Les Details sur le contact {{$contact->nom}}</h5>
                                      </div>
                                      <div class="modal-body border-0 card-solid">
                                          <div class="col-12  d-flex align-items-stretch flex-column">
                                              <div class="card bg-light d-flex flex-fill">
                                                
                                                <div class="card-body pt-0">
                                                  <div class="row">
                                                    <div class="col-12">
                                                      <h2 class="lead"><b>{{$contact->nom}}</b></h2>
                                                      <ul class="ml-4 mb-0 fa-ul text-muted">
                                                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Address: {{$contact->adresse}}</li>
                                                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Phone #: {{$contact->telephone}}</li>
                                                      </ul>
                                                      <p class="text-muted text-sm"><b>Objet: </b> {{$contact->objet}} </p>
                                                      <p class="text-muted text-sm"><b>Message: </b> {{$contact->msg}} </p>
                                                    
                                                    </div>
                                                  </div>
                                                </div>
                                            
                                              </div>
                                            </div>
                                      </div>
                                      <div class="d-flex justify-content-end my-4 me-5" >
                                        <button class="btn btn-warning" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal">Quitter</button>
                                      </div>
                                  </div>
                              </div>
                          <td>{{$contact->nom}}</td>
                          <td>{{$contact->telephone}}</td>
                          <td>{{$contact->adresse}}</td>
                          <td>{{$contact->objet}}</td>
                          <td class="nav-item dropdown text-center" style="width:12%;height:20px;line-height:20px">
                                  <style> 
                                  #drop{border:1px solid #6435; border-radius:5px;background:#6435;border:1px solid #6435; color:#000} 
                                  .btn-primary{ border-radius:5px}
                              </style>
                              
                              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false" id="drop"> Action <span class="caret">  </span></a> 
                              
                              <div class="dropdown-menu" x-placement="top-start" style="position: absolute; will-change: transform; top: 10px; left:0px; transform: translate3d(0px, 1px, 0px);">
                              
                                  <a class="dropdown-item" data-bs-toggle="modal" href="#exampleModalToggle{{$contact->id}}" role="button"> <span class="fa fa-eye"></span>  Aperçu</a>  
                                  <button class="btn btn-link dropdown-item" wire:click="confirmDelete('{{ $contact->titre }}', {{$contact->id}})"><span class="far fa-trash-alt"></span> supprimer</button>

                              </div>
                          </td>
                       </tr>
                     @empty
                        <tr>
                            <td colspan="6">
                                <div class="alert alert-danger">
        
                                    <h5><i class="icon fas fa-ban"></i> Information!</h5>
                                    Aucune donnée trouvée par rapport aux éléments de recherche entrés.
                                    </div>
                            </td>
                        </tr>
                     @endforelse
                 </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <div class="float-right">
                   {{$contacts->links()}}
                   <!-- Pargination-->
                </div>
              </div>
            </div>
            <!-- /.card -->
          </div>
        </div>



