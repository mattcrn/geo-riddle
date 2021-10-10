<div class="absolute top-0 left-0 flex items-center w-full" @if ($visible) style="height: 100%;" @endif>
        <x-alert :message="$message" />
    <div class="w-full h-full z-10 bg-black bg-opacity-60 flex items-center justify-center"
        @if (!$visible) style="display:none;" @endif wire:click.self="$emit('hideModal')">
        @isset($riddle)
            <div class=" bg-gray-800 m-8 max-w-4xl p-8 flex flex-col items-center h-5/6 overflow-y-scroll gap-4">
                <p class=" text-2xl text-red-300">{{ $riddle->copy }}</p>
                <input type="text" wire:model.defer='userSolution' />
                <p class="text-2x2 text-green-300">{{ $userSolution }}</p>
                <button wire:click='answer' class=" bg-green-400 p-1 rounded-sm font-semibold">Code eingeben</button>
                @if ($message)
                    <p class=" w-min p-2 my-4 bg-red-300 text-red-800 border border-red-800 rounded-sm">{{ $message }}
                    </p>
                @endif
            </div>
        @endisset
    </div>
</div>
