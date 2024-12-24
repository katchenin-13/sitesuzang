<div class="row p-4 pt-5" wire:ignore.self>
  <div class="col-md-10">
    <!-- general form elements -->
    <div class="card card-primary">
      <div class="card-header" style="background-color: #64350d !important;">
        <h3 class="card-title"><i class="fas fa-user-plus fa-2x"></i> Formulaire de création d'un nouveau contenu </h3>
      </div><!-- /.card-header -->
      <!-- form start -->
      <form role="form" wire:submit.prevent="addContenu">
        @csrf
        <div class="col-md-12">
          <div class="card-body">
            <div class="form-group">
              <label class="control-label">Titre</label>
              <div class="col-md-12" wire:ignore>
                <input id="titre" class="form-control @error('titre') is-invalid @enderror" wire:model="titre">
              </div>
              @error("titre")
              <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>
            <div class="form-group">
              <label class="control-label">Extrait</label>
              <div class="col-md-12" wire:ignore>
                <input id="extrait" class="form-control @error('extrait') is-invalid @enderror" wire:model="extrait">
              </div>
              @error("extrait")
              <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>

            <div class="form-group">
              <label class="control-label">Contenu</label>
              <div class="col-md-12" wire:ignore>
                <textarea id="contenu" class="form-control @error('contenu') is-invalid @enderror" wire:model="contenu">
                                  </textarea>
              </div>
              @error("contenu")
              <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>

            </br>

            <div class="form-group">
              <label class="control-label">Title</label>
              <div class="col-md-12" wire:ignore>
                <input id="title" class="form-control @error('title') is-invalid @enderror" wire:model="title">
              </div>
              @error("title")
              <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>
            <div class="form-group">
              <label class="control-label">Extrait</label>
              <div class="col-md-12" wire:ignore>
                <input id="extraitang" class="form-control @error('extraitang') is-invalid @enderror"
                  wire:model="extraitang">
              </div>
              @error("extraitang")
              <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>

            <div class="form-group">
              <label class="control-label">Contenu</label>
              <div class="col-md-12" wire:ignore>
                <textarea id="contenus" class="form-control @error('contenus') is-invalid @enderror"
                  wire:model="contenus">
                                                          </textarea>
              </div>
              @error("contenus")
              <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>
            <div class="row">
              <div class="col-6">
                <div class="form-group">
                  <label class="control-label">Veuillez selectionner le bloc</label>
                  <select class="form-control @error('type') is-invalid @enderror" wire:model="type">
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
                  @error("type")
                  <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <label class="control-label">Sélectionner la page</label>
                  <select class="form-control @error('pagef') is-invalid @enderror" wire:model="pagef">
                    <option value="">Sélectionner la page</option>
                    <option value="0">Accueil</option>
                    <option value="1">Présentation</option>
                    <option value="2">Atout</option>
                    <option value="3">Service</option>
                    <option value="4">Clients</option>
                    <option value="5">Carrières</option>
                    <option value="6">Contacts</option>
                    <option value="7">autre</option>

                  </select>
                  @error("pagef")
                  <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
              </div>
            </div>
            <div class="p-4">
              <div class="custom-file mt-3">
                <input type="file" wire:model='imageUrl'
                  class="custom-file-input @error('imageUrl') is-invalid @enderror" id="customFile">
                <label class="custom-file-label" for="customFile">Choose file</label>

              </div>
              @error("imageUrl")
              <span class="text-danger">{{ $message }}</span>
              @enderror
              @if ($imageUrl)
              <img src="{{$imageUrl->temporaryUrl()}}"
                style="border: 1px solid #d0d1d3; border-radius: 20px; height: 200px; width:200px; overflow:hidden;"
                alt="">
              @endif
              {{-- <div class="form-group">
                <input type="file" wire:model="imageUrl">
              </div>
              <div style="border: 1px solid #d0d1d3; border-radius: 20px; height: 200px; width:200px; overflow:hidden;">
                @if ($addPhoto)

                <img src="{{ $addPhoto->temporaryUrl() }}" style="height:200px; width:200px;">
                @endif
              </div> --}}
            </div>
          </div> <!-- /.card-body -->
          <div class="card-footer">
            <div class="float-right">
              <button type="button" wire:click="goToListContenu()" class="btn btn-danger">Retouner à la liste des
                utilisateurs</button>
            </div>
            <button type="submit" class="btn btn-primary">Enregistrer</button>
          </div><!-- /.card-footer -->
        </div>
      </form>
    </div><!-- /.card -->
  </div>
</div>

<script>
  $(function(){

         tinymce.init({
             height: 200,
             selector:'#extrait',
             setup:function(editor){
                   editor.on('Change',function(e){
                       tinyMCE.triggerSave();
                       var extrait = $('#extrait').val();
                       @this.set('extrait', extrait);
                   });
             }
         });
         tinymce.init({
           height: 200,
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
           height: 200,
             selector:'#contenu',
             setup:function(editor){
                     editor.on('Change',function(e){
                       tinyMCE.triggerSave();
                       var des = $('#contenu').val();
                       @this.set('contenu', des);
                   });
             }
         });


         tinymce.init({
          height: 200,
          selector:'#extraitang',
          setup:function(editor){
          editor.on('Change',function(e){
          tinyMCE.triggerSave();
          var extraitang = $('#extraitang').val();
          @this.set('extraitang', extrait);
          });
          }
          });
          tinymce.init({
          height: 200,
          selector:'#title',
          setup:function(editor){
          editor.on('Change',function(e){
          tinyMCE.triggerSave();
          var title = $('#title').val();
          @this.set('title', title);
          });
          }
          });
          
          
          tinymce.init({
          height: 200,
          selector:'#contenus',
          setup:function(editor){
          editor.on('Change',function(e){
          tinyMCE.triggerSave();
          var des = $('#contenus').val();
          @this.set('contenus', des);
          });
          }
          });
    
  });  

</script>