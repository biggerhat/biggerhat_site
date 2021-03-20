<div>
    <div class="container mx-auto">
        <div class="block w-full h-full py-5 text-center">
            <span class="text-3xl text-gray-900 lg:text-7xl md:text-5xl faction_header">
                Schemes & Strategies
            </span>
        </div>
        <div class="grid px-2 my-2 lg:grid-cols-5">
            <div class="lg:col-span-3 lg:col-start-2">
                <select name="seasons" wire:model="season"
                    class="block w-full p-2 px-2 py-2 mx-auto bg-gray-200 border-2 border-gray-900 rounded shadow hover:border-gray-500 focus:outline-none focus:shadow-outline">
                    @foreach ($seasons as $season)
                        <option value="{{ $season->id }}">{{ $season->name }}</option>
                    @endforeach
                </select>
            </div>

        </div>

        <div class="block my-3 border-b border-gray-400 border-dashed"></div>

        @if (count($strategies) > 0)
            <div class="block w-full h-full py-5 text-center">
                <span class="text-3xl text-gray-900 lg:text-7xl md:text-5xl faction_header">
                    Strategies
                </span>
            </div>
            <div class="grid px-2 lg:gap-1 lg:grid-cols-4">
                @foreach ($strategies as $strategy)
                    <div>
                        <img src="\storage\{{ $strategy->image }}"
                            class="mx-auto border-2 border-black rounded-lg card__image"></a>
                    </div>
                @endforeach
            </div>
        @endif

        @if (count($schemes) > 0)
            <div class="block my-3 border-b border-gray-400 border-dashed"></div>

            <div class="block w-full h-full py-5 text-center">
                <span class="text-3xl text-gray-900 lg:text-7xl md:text-5xl faction_header">
                    Schemes
                </span>
            </div>
            <div class="grid px-2 lg:gap-1 lg:grid-cols-4">
                @foreach ($schemes as $scheme)
                    <div>
                        <img src="\storage\{{ $scheme->image }}"
                            class="mx-auto border-2 border-black rounded-lg card__image"></a>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</div>
