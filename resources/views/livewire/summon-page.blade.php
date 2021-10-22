<div>
    <div class="container mx-auto">
        <div class="block w-full h-full py-5 text-center">
            <span class="text-3xl text-gray-900 lg:text-7xl md:text-5xl faction_header">
                Summoning Charts
            </span>
        </div>
        <div class="container grid px-2 my-2 lg:grid-cols-5">
            <div class="lg:col-span-3 lg:col-start-2">
                <select name="summoner" wire:model="summoner"
                    class="block w-full p-2 px-2 py-2 mx-auto bg-gray-200 border-2 border-gray-900 rounded shadow hover:border-gray-500 focus:outline-none focus:shadow-outline">
                    <option value="">Select a Summoner</option>
                    @foreach ($summoners as $selectSum)
                        <option value="{{ $selectSum->slug }}">{{ $selectSum->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="block my-3 border-b border-gray-500 border-dashed"></div>
    <div class="container mx-auto">
        <div class="px-2">
            <img src="{{ $chart }}" class="mx-auto border-2 border-black rounded-xl">
        </div>
    </div>
    @if ($newSum)
        <div class="block my-3 border-b border-gray-500 border-dashed"></div>
        <div class="container grid grid-cols-1 mx-auto">
            <div class="block w-full h-full col-span-1 py-5 text-center">
                <span class="text-4xl text-transparent text-gray-900 lg:text-5xl md:text-4xl faction_header">
                    Summoner
                </span>
            </div>
            <div class="text-center">
                <a href="{{ route('character.view', $newSum->slug) }}"
                    class="inline-block text-center p-0.5 text-white border border-black rounded-full {{ $this->getBackground($newSum) }} px-2 py-1 font-bold mb-1 cursor-pointer">{{ strtoupper($newSum->name) }}</a>
            </div>


        </div>
    @endif
    @if (count($summons) > 0)
        <div class="block my-3 border-b border-gray-500 border-dashed"></div>
        <div class="container grid grid-cols-1 mx-auto lg:grid-cols-3">
            <div class="block w-full h-full col-span-1 py-5 text-center lg:col-span-3">
                <span class="text-4xl text-transparent text-gray-900 lg:text-5xl md:text-4xl faction_header">
                    Summons
                </span>
            </div>
            @foreach ($summons as $summon)
                <div class="text-center">
                    <a href="{{ route('character.view', $summon->slug) }}"
                        class="inline-block text-center p-0.5 text-white border border-black rounded-full {{ $this->getBackground($summon) }} px-2 py-1 font-bold mb-1 cursor-pointer">{{ strtoupper($summon->name) }}</a>
                </div>
            @endforeach


        </div>
    @endif
    @if (count($upgrades) > 0)
        <div class="block my-3 border-b border-gray-500 border-dashed"></div>
        <div class="container grid grid-cols-1 mx-auto lg:grid-cols-3">
            <div class="block w-full h-full col-span-1 py-5 text-center lg:col-span-3">
                <span class="text-4xl text-transparent text-gray-900 lg:text-5xl md:text-4xl faction_header">
                    Upgrades
                </span>
            </div>
            @foreach ($upgrades as $upgrade)
                <div class="text-center">
                    <a href="{{ route('upgrade.view', $upgrade->slug) }}"
                        class="inline-block text-center p-0.5 text-white border border-black rounded-full {{ $this->getUpgradeBackground($upgrade) }} px-2 py-1 font-bold mb-1 cursor-pointer">{{ strtoupper($upgrade->name) }}</a>
                </div>
            @endforeach


        </div>
    @endif

    <div class="container grid px-2 mx-auto mt-10 lg:grid-cols-5">
        <div class="text-xs italic text-center lg:col-span-3 lg:col-start-2">
            *All Summon Charts Property of Bigger Hat, based on the original images by Trisha Waddell from "A Wyrd
            Place"
        </div>
    </div>
</div>
