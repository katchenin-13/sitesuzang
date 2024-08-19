<div wire:ignore.self>

    @if($currentPage == PAGECREATEFORM)
         @include("livewire.services.add")
    @endif

    @if($currentPage == PAGEEDITFORM)
        @include("livewire.services.edit")
    @endif

    @if($currentPage == PAGELIST)
        @include("livewire.services.liste")
    @endif

</div>

<script>
    window.addEventListener("showSuccessMessage", event=>{
        Swal.fire({
                position: 'top-end',
                icon: 'success',
                toast:true,
                title: event.detail.message || "Opération effectuée avec succès!",
                showConfirmButton: false,
                timer: 5000
                }
            )
    })
</script>

<script>
    window.addEventListener("showConfirmMessage", event=>{
       Swal.fire({
        title: event.detail.message.title,
        text: event.detail.message.text,
        icon: event.detail.message.type,
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Continuer',
        cancelButtonText: 'Annuler'
        }).then((result) => {
        if (result.isConfirmed) {
            if(event.detail.message.data){
                @this.deleteService(event.detail.message.data.service_id)
            }

        }
        })
    })

</script>
