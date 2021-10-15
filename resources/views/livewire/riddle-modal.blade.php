<div class="absolute top-0 left-0 flex items-center w-full" @if ($visible) style="height: 100%;" @endif>
        <x-alert :message="$message" />
    <div class="w-full h-full z-10 bg-black bg-opacity-60 flex items-center justify-center"
        @if (!$visible) style="display:none;" @endif wire:click.self="$emit('hideModal')">
        @isset($riddle)
            <div class=" bg-gray-800 m-8 max-w-4xl p-8 flex flex-col items-start h-5/6 overflow-y-scroll gap-4">
                <p class=" bg- text-2xl text-white">{{ $riddle->title }}</p>
                <p class=" text-base text-white mb-4">{{ $riddle->copy }}</p>
                @if (!$riddle?->pivot?->solved)
                <input class="mb-4" type="text" wire:model.defer='userSolution' />
                <button wire:click='answer' class=" bg-green-400 px-4 py-2 rounded-sm font-semibold">Code eingeben</button>
                @if ($message)
                    <p class="text-sm text-red-300">{{ $message }}
                    </p>
                @endif
                @else
                    <p class=" text-green-400">Code ist korrekt, der Lösungsbuchstabe lautet:</p>
                    <p class="text-green-400 font-bold text-2xl">{{ $riddle->reward }}</p>
                @endif
            </div>
        @endisset
    </div>
</div>
