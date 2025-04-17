@section('title')
    - Damage Check
@endsection

<div>
    <div class="container mx-auto mb-2 text-center">
        <div class="block w-full h-full pt-5 text-center">
            <span class="text-4xl text-gray-900 lg:text-6xl faction_header">
                Damage Track Check
            </span>
        </div>
    </div>

    <div class="block my-3 border-b border-gray-500 border-dashed"></div>
    <div class="container mx-auto">
        Total Actions With Damage Tracks: {{ $totalActions }}
        <br /><br />
        <div class="flex justify-content-between">
            <div class="my-1 ">
                <label for="minDmg" class="block font-bold lg:text-right lg:inline-block lg:w-36">Min Damage: </label>
                <select name="minDmg" wire:model.defer="minDmg"
                        class="w-1/3 p-1 text-lg bg-gray-200 border border-gray-900 rounded lg:w-1/4 focus:outline-none">
                    <option value=""></option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                </select>
            </div>
            <div class="my-1 ">
                <label for="modDmg" class="block font-bold lg:text-right lg:inline-block lg:w-36">Mod Damage: </label>
                <select name="modDmg" wire:model.defer="modDmg"
                        class="w-1/3 p-1 text-lg bg-gray-200 border border-gray-900 rounded lg:w-1/4 focus:outline-none">
                    <option value=""></option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                </select>
            </div>
            <div class="my-1 ">
                <label for="sevDmg" class="block font-bold lg:text-right lg:inline-block lg:w-36">Sev Damage: </label>
                <select name="sevDmg" wire:model.defer="sevDmg"
                        class="w-1/3 p-1 text-lg bg-gray-200 border border-gray-900 rounded lg:w-1/4 focus:outline-none">
                    <option value=""></option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                </select>
            </div>
        </div>
        <button wire:click="filter" class="p-2 mx-1 font-bold text-white bg-gray-900 rounded focus:outline-none">
            Filter
        </button>

        @if($calculatedActions)
            Total Actions With {{ $minDmg }}/{{ $modDmg }}/{{ $sevDmg }} Damage Track: {{ $calculatedActions }}.
            Percent Of Damaging Actions: {{ $calculatedPercent }}%
        @endif

    </div>
</div>
