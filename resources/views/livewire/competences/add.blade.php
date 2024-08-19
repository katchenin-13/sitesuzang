<div class="row p-4 pt-5"wire:ignore.self>
    <div class="col-md-10">
        <!-- general form elements -->
          <div class="card card-primary">
                <div class="card-header" style="background-color: #64350d !important;" >
                  <h3 class="card-title"><i class="fas fa-user-plus fa-2x"></i> Formulaire de création d'une nouvelle compétence </h3>
                </div><!-- /.card-header -->
                    <!-- form start -->
                <form role="form" wire:submit.prevent="addCompetence">
                       @csrf             
                    <div class="col-md-12">
                        <div class="card-body">
                          <div class="form-group">
                              <label class="control-label" >Nom</label>
                              <div class="col-md-12" wire:ignore >
                                    <input id="titre" class="form-control @error('titre') is-invalid @enderror"  wire:model="titre">
                              </div>
                              @error("titre")
                              <span class="text-danger">{{ $message }}</span>
                              @enderror
                          </div>
                          </br>
                          <div class="form-group">
                            <label class="control-label">Nom</label>
                            <div class="col-md-12" wire:ignore>
                              <input id="title" class="form-control @error('title') is-invalid @enderror" wire:model="title">
                            </div>
                            @error("title")
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                          <div class="form-group">
                            <label class="control-label" >Taux d'évolution</label>
                            <div class="col-md-12" wire:ignore >
                                  <input type="number" id="extrait" class="form-control @error('extrait') is-invalid @enderror"  wire:model="extrait">
                            </div>
                            @error("extrait")
                            <span class="text-danger">{{ $message }}</span>
                            
                          
                         
                          </div>
                            @enderror
                        </div>
                          {{-- <div class="form-group">
                              <label class="control-label" >Contenu</label>
                              <div class="col-md-12" wire:ignore >
                                 <textarea id="contenu" class="form-control @error('contenu') is-invalid @enderror"  wire:model="contenu">
                                  </textarea>                       
                                  
                                 @error("description")
                                  <span class="text-danger">{{ $message }}</span>
                                @enderror
                              </div>
                          </div> --}}
                          {{-- <div class="p-4" >
                            <div class="custom-file mt-3">
                              <input type="file" wire:model='imageUrl' class="custom-file-input" id="customFile">
                              <label class="custom-file-label" for="customFile">Choose file</label>

                          </div>
                          @if ($imageUrl)
                          <img src="{{$imageUrl->temporaryUrl()}}" style="border: 1px solid #d0d1d3; border-radius: 20px; height: 200px; width:200px; overflow:hidden;"alt="">
                          @endif
                            {{-- <div class="form-group">
                                <input type="file" wire:model="imageUrl" >
                            </div>
                            <div style="border: 1px solid #d0d1d3; border-radius: 20px; height: 200px; width:200px; overflow:hidden;">
                                    @if ($addPhoto)

                                        <img src="{{ $addPhoto->temporaryUrl() }}" style="height:200px; width:200px;">
                                    @endif
                            </div> 
                          </div> --}}
                        </div> <!-- /.card-body -->
                        <div class="card-footer">
                            <div class="float-right">
                              <button type="button" wire:click="goToListCompetence()" class="btn btn-danger">Retouner à la liste des compétences</button>
                            </div>
                            <button type="submit" class="btn btn-primary">Enregistrer</button>
                          </div><!-- /.card-footer -->
                        </div>
                </form>
        </div><!-- /.card -->
    </div>
</div>



 {{-- <script>
     {{-- $(function(){

            tinymce.init({
                selector:'#titre',
                setup:function(editor){
                      editor.on('Change',function(e){
                          tinyMCE.triggerSave();
                          var titre = $('#titre').val();
                          @this.set('titre', titre);
                      });
                }
            });


            tinymce.init({
                selector:'#description',
                setup:function(editor){
                        editor.on('Change',function(e){
                          tinyMCE.triggerSave();
                          var des = $('#description').val();
                          @this.set('description', des);
                      });
                }
            });
       
     }); 
  
  </script> --}}
