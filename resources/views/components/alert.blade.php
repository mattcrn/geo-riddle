<p x-data="alert" x-show="open" x-ref="alertModal" wire:key="theThing" style="display: none"
    class="bg-white filter drop-shadow-sm mt-4 p-4 z-10 mx-auto flex justify-center items-center">
    <span x-text="message"></span>
    <button class="ml-2 hover:text-grey" @click="open = false">
        <svg class="stroke-current w-5" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
            viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg>
    </button>
</p>
<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('alert', () => ({

            open: false,
            message: null,

            init() {
                Livewire.on('alert', msg => {
                    this.message = msg;
                    this.open = true;
                })

                Livewire.on('hideAlert', () => {
                    this.open = false;
                })
            },

        }))
    })
</script>
