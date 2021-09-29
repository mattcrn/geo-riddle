<div class="mt-8 font-bold">
    <h2 class=" text-xl mb-6">Members:</h2>
    @isset($members)
        <ul>
            @foreach ($members as $member)
                <li
                    class="font-normal flex items-center my-2 bg-indigo-400 text-white px-4 py-3 rounded-sm justify-between shadow-sm">
                    {{ $member->name }}
                    <button class="ml-2 text-white hover:text-grey" wire:click='delete({{ $member->id }})'>
                        <svg class="stroke-current w-5" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </li>
            @endforeach
            <form wire:submit.prevent="save" class="flex flex-col mt-8">
                <label class="mb-6 text-xl">Add a member to the team:</label>
                <div class="flex items-center">
                    <input class="flex-grow border-white rounded-sm focus:ring-indigo-400" type="text" wire:model="newMemberName">
                    <button class="bg-indigo-400 text-white px-2 py-2 rounded-sm shadow-sm h-10" type="submit">
                        <svg class="stroke-current h-5" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                        </svg>
                    </button>
                </div>
            </form>
        </ul>
    @endisset
</div>
