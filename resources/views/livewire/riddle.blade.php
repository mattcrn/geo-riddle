<div>
    <p class=" text-2xl text-red-300">{{$riddle->copy}}</p>
    <input type="text" wire:model.defer='userSolution'/>
    <p class="text-2x2 text-green-300">{{$userSolution}}</p>
    <button wire:click='answer' class=" bg-green-400 p-1 rounded-sm font-semibold">Code eingeben</button>   
    @if ($message)
    <p class=" w-min p-2 my-4 bg-red-300 text-red-800 border border-red-800 rounded-sm">{{ $message }}</p>
    @endif
</div>
