<div x-data="savemygiraffe" class="absolute top-0 left-0 flex items-center w-full h-full pointer-events-none">
    <button @click="open=true" class=" cursor-pointer pointer-events-auto bg-gray-800 text-white drop-shadow-sm p-3 rounded-full absolute bottom-20 right-4">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
        </svg>
    </button>
    <div class="w-full h-full z-10 bg-black bg-opacity-60 flex items-center justify-center pointer-events-auto"
        x-show="open" @click.self="close">
            <div class=" bg-gray-800 m-8 max-w-4xl p-8 flex flex-col items-start h-5/6 overflow-y-scroll gap-4">
                <p class=" bg- text-2xl text-white">Find my giraffe<sup><small>TM</small></sup></p>
                @if (!$userHasWon) 
                <p class=" text-base text-white mb-4">Bitte geben Sie das Passwort ein um die aktuelle Position Ihrer Giraffe anzuzeigen.</p>
                <input class="mb-4" type="text" wire:model.defer='password' />
                <button wire:click='submit' class=" bg-green-400 px-4 py-2 rounded-sm font-semibold">Abschicken</button>
                @if ($message)
                    <p class=" text-sm text-red-300">{{$message}}</p>
                @endif
                @else
                    <p class="text-green-400 my-4">Erfolg: Die Giraffe wir jetzt als schwarzer Punkt auf der Karten angezeigt.</p>
                    <button @click="showGiraffe" class=" bg-green-400 px-4 py-2 rounded-sm font-semibold">Giraffe anzeigen</button>                    
                @endif
            </div>
    </div>
</div>
<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('savemygiraffe', () => ({

            open: false,

            close() {
                this.open = false;
            },

            showGiraffe() {
                this.close();
                this.$el.dispatchEvent(new CustomEvent('find-giraffe', {bubbles: true}));
            },

        }))
    });
</script>
