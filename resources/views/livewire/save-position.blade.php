<div x-data="saveposition" class="absolute flex bottom-10 justify-center w-full">
    <input type="text" x-model="description"  />
    <button @click="$dispatch('save-position', {description})" class=" bg-green-400 p-1 rounded-sm font-semibold">Punkt speichern</button>
</div>
<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('saveposition', () => ({

            description: @entangle('description').defer

        }))
    });
</script>