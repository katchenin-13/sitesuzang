<div class="row p-4 pt-5 ">
    <div class="col-md-10 ">
        <!-- general form elements -->
        <div class="card card-primary">
                <div class="card-header" style="background-color: #64350d !important;" >
                  <h3 class="card-title"><i class="fas fa-user-plus fa-2x"></i> Formulaire de modifiction d'un nouveau atout </h3>
                </div><!-- /.card-header -->
                    <!-- form start -->
                <form role="form" wire:submit.prevent=" updateAtout({{$edit_id}})">
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
                            <label class="control-label" >Description bref</label>
                            <div class="col-md-12" wire:ignore >
                              <textarea id="edit_extrait" class="form-control @error('edit_extrait') is-invalid @enderror"  wire:model="edit_extrait">
                                </textarea>  
                            </div>
                            @error("edit_extrait")
                            <span class="text-danger">{{ $message }}</span>
                           @enderror
                          </div>
                          <div class="form-group">
                                <label class="control-label" >Description complète</label>
                                <div class="col-md-12" wire:ignore >
                                  <textarea id="edit_contenu" class="form-control @error('edit_contenu') is-invalid @enderror"  wire:model="edit_contenu">
                                    </textarea>  
                                </div>
                                @error("edit_contenu")
                                <span class="text-danger">{{ $message }}</span>
                              @enderror
                          </div>
                        </br>

                        <div class="form-group">
                          <label class="control-label">Titre</label>
                          <div class="col-md-12" wire:ignore>
                            <input id="edit_title" class="form-control @error('edit_title') is-invalid @enderror" wire:model="edit_title">
                        
                        
                          </div>
                          @error("edit_title")
                          <span class="text-danger">{{ $message }}</span>
                          @enderror
                        </div>
                        <div class="form-group">
                          <label class="control-label">Description bref</label>
                          <div class="col-md-12" wire:ignore>
                            <textarea id="edit_extraitang" class="form-control @error('edit_extraitang') is-invalid @enderror"
                              wire:model="edit_extraitang">
                                                        </textarea>
                          </div>
                          @error("edit_extraitang")
                          <span class="text-danger">{{ $message }}</span>
                          @enderror
                        </div>
                        <div class="form-group">
                          <label class="control-label">Description complète</label>
                          <div class="col-md-12" wire:ignore>
                            <textarea id="edit_contenus" class="form-control @error('edit_contenus') is-invalid @enderror"
                              wire:model="edit_contenus">
                                                            </textarea>
                          </div>
                          @error("edit_contenus")
                          <span class="text-danger">{{ $message }}</span>
                          @enderror
                        </div>
                        </div> <!-- /.card-body -->
                        <div class="card-footer">
                            <div class="float-right">
                              <button type="button" wire:click="goToListAtout()" class="btn btn-danger">Retouner à la liste des atouts</button>
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
