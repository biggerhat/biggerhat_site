@section('title')
    - Upgrades
@endsection

<div>
    <div class="container mx-auto mb-2 text-center">
        <div class="block w-full h-full pt-5 text-center">
            <span class="text-4xl text-gray-900 lg:text-6xl faction_header">
                Upgrades
            </span>
        </div>
    </div>
    <div class="block my-3 border-b border-gray-400 border-dashed"></div>
    <div class="container mx-auto mb-2 text-center">
        <div class="block w-full h-full pt-5 text-center">
            <span class="text-3xl text-gray-900 lg:text-5xl faction_header">
                Filters
            </span>
        </div>
    </div>
    <div class="container grid mx-auto lg:grid-cols-3">
        <div class="px-2 my-1">
            <select name="factions" wire:model="faction"
                class="block w-full p-2 px-2 py-2 mx-auto bg-gray-200 border-2 border-gray-900 rounded shadow hover:border-gray-500 focus:outline-none focus:shadow-outline">
                <option value="">Select a Faction</option>
                @foreach ($formFactions as $formFaction)
                    <option value="{{ $formFaction->slug }}">{{ $formFaction->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="px-2 my-1">
            <select name="specials" wire:model="special"
                class="block w-full p-2 px-2 py-2 mx-auto bg-gray-200 border-2 border-gray-900 rounded shadow hover:border-gray-500 focus:outline-none focus:shadow-outline">
                <option value="">Select a Special Type</option>
                @foreach ($formSpecials as $formSpecial)
                    <option value="{{ $formSpecial->name }}">{{ $formSpecial->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="px-2 my-1">
            <select name="restricteds" wire:model="restricted"
                class="block w-full p-2 px-2 py-2 mx-auto bg-gray-200 border-2 border-gray-900 rounded shadow hover:border-gray-500 focus:outline-none focus:shadow-outline">
                <option value="">Select a Restricted Option</option>
                @foreach ($formRestricteds as $formRestricted)
                    <option value="{{ $formRestricted->name }}">{{ $formRestricted->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="block mt-3 text-center">
        <button wire:click="clearFilters" class="p-2 mx-1 font-bold text-white bg-gray-900 rounded focus:outline-none">
            Clear Filters</button>
    </div>
    <div class="block my-3 border-b border-gray-400 border-dashed"></div>
    <div class="text-2xl text-center"><span class="font-bold">Total:</span> {{ count($upgrades) }} Upgrades
    </div>
    <div class="container grid mx-auto md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
        @foreach ($upgrades as $upgrade)
            <div class="p-2">
                <a href="{{ route('upgrade.view', $upgrade->slug) }}" class="active:outline-none">
                    <img src="\storage\{{ $upgrade->image }}"
                        class="mx-auto border-2 border-black rounded-lg card__image"></a>
            </div>
        @endforeach
    </div>
</div>