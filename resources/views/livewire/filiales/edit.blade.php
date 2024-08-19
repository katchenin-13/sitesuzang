<div class="row p-4 pt-5 ">
    <div class="col-md-10 ">
        <!-- general form elements -->
        <div class="card card-primary">
                <div class="card-header" style="background-color: #64350d !important;" >
                  <h3 class="card-title"><i class="fas fa-user-plus fa-2x"></i> Formulaire de modifiction d'une nouvelle filiale </h3>
                </div><!-- /.card-header -->
                    <!-- form start -->
                <form role="form" wire:submit.prevent=" updateFiliale({{$edit_id}})">
                       @csrf             
                    <div class="col-md-12">
                        <div class="card-body">
                          <div class="form-group">
                              <label class="control-label" >Titre</label>
                              <div class="col-md-12" wire:ignore >
                                    <input id="edit_titre" class="form-control @error('edit_titre') is-invalid @enderror"  wire:model="edit_titre">
                                                        
                                   
                              </div>
                              @error("edit_titre")
                              <span class="text-danger">{{ $message }}</span>
                              @enderror
                          </div>
                          <div class="form-group">
                            <label class="control-label" >Spécialité</label>
                            <div class="col-md-12" wire:ignore >
                              <input id="edit_extrait" class="form-control @error('edit_extrait') is-invalid @enderror"  wire:model="edit_extrait">
                              {{-- <textarea id="edit_extrait" class="form-control @error('edit_extrait') is-invalid @enderror"  wire:model="edit_extrait">
                                </textarea>   --}}
                               
                            </div>
                            @error("edit_extrait")
                              <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                          <div class="form-group">
                            <label class="control-label" >Domaine d'activité</label>
                              <div class="col-md-12" wire:ignore >
                                <input id="edit_contenu" class="form-control @error('edit_contenu') is-invalid @enderror"  wire:model="edit_contenu">

                                {{-- <textarea id="edit_contenu" class="form-control @error('edit_contenu') is-invalid @enderror"  wire:model="edit_contenu">
                                  </textarea>   --}}
                                
                              </div>
                              @error("edit_contenu")
                              <span class="text-danger">{{ $message }}</span>
                            @enderror
                          </div>
                          <div class="form-group">
                            <label class="control-label" >Lien Twitter</label>
                            <div class="col-md-12" wire:ignore >
                                  <input id="edit_twit" class="form-control @error('edit_twit') is-invalid @enderror"  wire:model="edit_twit">
                            </div>
                            @error("edit_twit")
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                          <label class="control-label" >Lien Facebook</label>
                          <div class="col-md-12" wire:ignore >
                                <input id="edit_faceb" class="form-control @error('edit_faceb') is-invalid @enderror"  wire:model="edit_faceb">
                          </div>
                          @error("edit_faceb")
                          <span class="text-danger">{{ $message }}</span>
                          @enderror
                      </div>
                      <div class="form-group">
                        <label class="control-label" >Lien Instagram</label>
                        <div class="col-md-12" wire:ignore >
                              <input id="edit_instag" class="form-control @error('edit_instag') is-invalid @enderror"  wire:model="edit_instag">
                        </div>
                        @error("edit_instag")
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                      <label class="control-label" >Lien Linkedin</label>
                      <div class="col-md-12" wire:ignore >
                            <input id="edit_lin" class="form-control @error('edit_lin') is-invalid @enderror"  wire:model="edit_lin">
                      </div>
                      @error("edit_lin")
                      <span class="text-danger">{{ $message }}</span>
                      @enderror
                  </div>
                          <div class="p-4" >

                            <div class="custom-file mt-3">
                              <input type="file" wire:model='new_imageUrl' class="custom-file-input  @error('new_imageUrl') is-invalid @enderror" id="customFile">
                              <label class="custom-file-label" for="customFile">Choose file</label>
                          </div>
                          @error("new_imageUrl")
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                          @if ($new_imageUrl)
                          <img src="{{$new_imageUrl->temporaryUrl()}}" style="width: 200px;height:200px;" alt="">
                          @else
                          <img src="{{ asset('storage') }}/{{$old_imageUrl}}" style="width: 200px;height:200px;" alt="">
                          @endif
                          <input type="hidden" wire:model='old_imageUrl' name="" id="">
                      </div>
                           
                         
                 </div>
                        </div> <!-- /.card-body -->
                        <div class="card-footer">
                            <div class="float-right">
                              <button type="button" wire:click="goToListFiliale()" class="btn btn-danger">Retouner à la liste des filiales</button>
                            </div>
                            <button type="submit" class="btn btn-primary">Enregistrer</button>
                          </div><!-- /.card-footer -->
                        </div>
                </form>
        </div><!-- /.card -->
        <!-- /.card -->
    </div>
    </div>
   
</div>
