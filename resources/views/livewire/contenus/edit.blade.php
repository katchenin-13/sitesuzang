<div class="row p-4 pt-5 ">
    <div class="col-md-10 ">
        <!-- general form elements -->
        <div class="card card-primary">
                <div class="card-header" style="background-color: #64350d !important;" >
                  <h3 class="card-title"><i class="fas fa-user-plus fa-2x"></i> Formulaire de modifiction d'un contenu </h3>
                </div><!-- /.card-header -->
                    <!-- form start -->
                <form role="form" wire:submit.prevent=" updateContenu({{$edit_id}})">
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
                            <label class="control-label" >Extrait</label>
                            <div class="col-md-12" wire:ignore >
                              <textarea id="edit_extrait" class="form-control @error('edit_extrait') is-invalid @enderror"  wire:model="edit_extrait">
                                </textarea>  
                            </div>
                            @error("edit_extrait")
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                          </div>
                          <div class="form-group">
                              <label class="control-label" >Contenu</label>
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
                          <label class="control-label">Extrait</label>
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
                          <label class="control-label">Contenu</label>
                          <div class="col-md-12" wire:ignore>
                            <textarea id="edit_contenus" class="form-control @error('edit_contenus') is-invalid @enderror"
                              wire:model="edit_contenus">
                                                          </textarea>
                          </div>
                          @error("edit_contenus")
                          <span class="text-danger">{{ $message }}</span>
                          @enderror
                        </div>
                          <div class="row">
                            <div class="col-6">
                              <div class="form-group">
                                <label class="control-label" >Veuillez selectionner le bloc</label>
                                <select class="form-control @error("edit_type") is-invalid @enderror" wire:model="edit_type" disabled>
                              
                                   <option value="">Sélectionner la partie à modifier</option>
                                   <option value="blog_0">barniere_acc</option>
                                   <option value="blog_1">barniere_about</option>
                                   <option value="blog_2">barniere_autre</option>
                                   <option value="blog_3">section_chasseur_acc</option>
                                   <option value="blog_4">section_initiation_acc</option>
                                   <option value="blog_5">section_meilleur_acc</option>
                                   <option value="blog_6">section_comptence_acc</option>
                                   <option value="blog_7">section_text_about</option>
                                   <option value="blog_8">section_text_atout</option>
                                   <option value="blog_9">section_text_service</option>
                                   <option value="blog_10">section_text_client</option>
                                   <option value="blog_11">section_text_carriere</option>
                                   <option value="blog_12">section_text_contact</option>
                                  
                                </select>
                                @error("edit_type")
                                  <span class="text-danger">{{ $message }}</span>
                                @enderror
                              </div>
                            </div>
                            <div class="col-6">
                              <div class="form-group">
                                <label class="control-label" >Sélectionner la page</label>
                                <select class="form-control @error('edit_page') is-invalid @enderror" wire:model="edit_page">
                                  <option value="">Sélectionner la page</option>
                                  <option value="0">Accueil</option>
                                  <option value="1">Présentation</option>
                                  <option value="2">Atout</option>
                                  <option value="3">Service</option>
                                  <option value="4">Clients</option>
                                  <option value="5">Carrières</option>
                                  <option value="6">Contqcts</option>
                                  
                                  
                              </select>
                              @error("page")
                                  <span class="text-danger">{{ $message }}</span>
                                @enderror
                              </div>
                            </div>
                          </div>

                          <div class="p-4" >

                            <div class="custom-file mt-3">
                              <input type="file" wire:model='new_imageUrl' class="custom-file-input @error("new_imageUrl") is-invalid @enderror" id="customFile">
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
                       </div> <!-- /.card-body -->
                        <div class="card-footer">
                            <div class="float-right">
                              <button type="button" wire:click="goToListContenu()" class="btn btn-danger">Retouner à la liste des contenus</button>
                            </div>
                            <button type="submit" class="btn btn-primary">Enregistrer</button>
                        </div><!-- /.card-footer -->
                    </div>
                </form>
        </div><!-- /.card -->
        <!-- /.card -->
    </div>
</div>
<script>
      $(function(){
    
             tinymce.init({
                 height: 200,
                 selector:'#edit_extrait',
                 setup:function(editor){
                       editor.on('Change',function(e){
                           tinyMCE.triggerSave();
                           var edit_extrait = $('#edit_extrait').val();
                           @this.set('edit_extrait', edit_extrait);
                       });
                 }
             });
             tinymce.init({
               height: 200,
                 selector:'#edit_titre',
                 setup:function(editor){
                       editor.on('Change',function(e){
                           tinyMCE.triggerSave();
                           var edit_titre = $('#edit_titre').val();
                           @this.set('edit_titre', edit_titre);
                       });
                 }
             });
    
    
             tinymce.init({
               height: 200,
                 selector:'#edit_contenu',
                 setup:function(editor){
                         editor.on('Change',function(e){
                           tinyMCE.triggerSave();
                           var edit_contenu = $('#edit_contenu').val();
                           @this.set('edit_contenu', edit_contenu);
                       });
                 }
             });

             tinymce.init({
              height: 200,
              selector:'#edit_extraitang',
              setup:function(editor){
              editor.on('Change',function(e){
              tinyMCE.triggerSave();
              var edit_extraitang = $('#edit_extraitang').val();
              @this.set('edit_extraitang', edit_extraitang);
              });
              }
              });
              tinymce.init({
              height: 200,
              selector:'#edit_title',
              setup:function(editor){
              editor.on('Change',function(e){
              tinyMCE.triggerSave();
              var edit_title = $('#edit_title').val();
              @this.set('edit_title', edit_title);
              });
              }
              });
              
              
              tinymce.init({
              height: 200,
              selector:'#edit_contenus',
              setup:function(editor){
              editor.on('Change',function(e){
              tinyMCE.triggerSave();
              var edit_contenus = $('#edit_contenus').val();
              @this.set('edit_contenus', edit_contenus);
              });
              }
              });
        
      });  


      
    
    </script> 
    