<div class="row p-4 pt-5">
  <div class="col-12">
    <div class="card">
      <div class="card-header d-flex align-items-center text-white" style="background-color: #64350d !important;">
        <h3 class="card-title flex-grow-1"><i class="fas fa-list fa-2x"></i> Liste des contenus</h3>
        <div class="card-tools d-flex align-items-center ">
          <div class="d-flex justify-content-end p-4">
            <div class="form-group mr-3 text-white">
              <label for="filtreType">Filtrer par nom de page</label>
              <select id="filtreType" wire:model="filtreType" class="form-control">
                <option value=""></option>
                <option value="0">Accueil</option>
                <option value="1">Présentation</option>
                <option value="2">Atout</option>
                <option value="3">Service</option>
                <option value="4">Clients</option>
                <option value="5">Carrières</option>
                <option value="6">Contacts</option>
                <option value="7">Autre passe bannière</option>
              </select>
            </div>
          </div>
          <a class="btn text-white mr-4 d-block" wire:click.prevent="goToAddContenu"><i class="fas fa-user-plus"></i>
            Nouveau contenu</a>
          <div class="input-group input-group-md" style="width: 250px;">
            <input type="text" name="table_search" class="form-control float-right" wire:model.debounce.700ms="search"
              placeholder="Search">
            <div class="input-group-append">
              <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
            </div>
          </div>
        </div>
      </div>
      <!-- /.card-header -->
      <div class="card-body table-responsive p-0 table-striped">
        <div style="height:350px;">
          <table class="table table-head-fixed">
            <thead>
              <tr>
                <th style="width:10%;">photo</th>
                <th style="width:20%;">Titre</th>
                <th style="width:30%;">Extrait</th>
                <th style="width:20%;" class="text-center">Ajouté</th>
                <th style="width:20%;" class="text-center">Action</th>
              </tr>
            </thead>
            <tbody>
              {{-- @if($contenus!==null)
              @foreach($contenus as $contenu)
              <tr>
                <td><img src="{{asset('storage')}}/{{$contenu->imageUrl}}" style="width: 70px;height:70px;" alt=""></td>
                <td>{!! $contenu->titre !!}</td>
                <td>{!! $contenu->extrait !!}</td>
                <td class="text-center"><span class="tag tag-success">{{ $contenu->created_at->diffForHumans() }}</span>
                </td>
                <td class="text-center">
                  <button class="btn btn-link" wire:click="goToEditContenu({{$contenu->id}})"><i
                      class="far fa-edit"></i></button>
                  <button class="btn btn-link" wire:click="confirmDelete('{{ $contenu->titre }}', {{$contenu->id}})"><i
                      class="far fa-trash-alt"></i></button>
                </td>
              </tr>
              @endforeach
              @else
             <tr>
                <td colspan="6">
                  <div class="alert alert-danger">
              
                    <h5><i class="icon fas fa-ban"></i> Information!</h5>
                    Aucune donnée trouvée par rapport aux éléments de recherche entrés.
                  </div>
                </td>
              </tr>
              @endif --}}

             @forelse ($contenues as $contenux)
              <tr>
                <td><img src="{{asset('storage')}}/{{$contenux->imageUrl}}" style="width: 70px;height:70px;" alt="">
                </td>
                <td>{!! $contenux->titre !!}</td>
                <td>{!! $contenux->extrait !!} </td>
              
                <td class="text-center"><span class="tag tag-success">{{ $contenux->created_at->diffForHumans() }}</span></td>
                <td class="text-center">
                  <button class="btn btn-link" wire:click="goToEditContenu({{$contenux->id}})"> <i class="far fa-edit"></i> </button>
                  <button class="btn btn-link" wire:click="confirmDelete('{{ $contenux->titre }}', {{$contenux->id}})"> <i
                      class="far fa-trash-alt"></i> </button>
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
      </div>
      <!-- /.card-body -->
      <div class="card-footer">
        <div class="float-right">
        {{ $contenues->links() }}
        {{-- @if($contenus !== null)
          {{ $contenus->links() }}
          @endif --}}
        </div>
      </div>
    </div>
    <!-- /.card -->
  </div>
</div>
