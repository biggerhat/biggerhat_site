<div>
    <div class="container mx-auto">
        <div class="block w-full h-full py-5 text-center">
            <span class="text-3xl text-gray-900 lg:text-7xl md:text-5xl faction_header">
                Tacticas
            </span>
        </div>
        <div class="grid px-2 my-2 lg:grid-cols-5">
            <div class="lg:col-span-3 lg:col-start-2">
                <label for="query" class="inline-block font-bold">Search Tacticas: </label>
                <input type="text"
                    class="w-full p-1 text-lg bg-gray-200 border border-gray-900 rounded focus:outline-none"
                    wire:model.defer="query" name="query" placeholder="Enter Search Term">
            </div>
            <div class="block mt-3 text-center lg:col-span-5">
                <button wire:click="search"
                    class="p-2 mx-1 font-bold text-white bg-gray-900 rounded focus:outline-none">
                    Search</button>
                <button wire:click="clearQuery"
                    class="p-2 mx-1 font-bold text-white bg-gray-900 rounded focus:outline-none">
                    Clear</button>
            </div>
        </div>
        <div class="block my-3 border-b border-gray-400 border-dashed"></div>
        <div class="container">
            @if (!$query)
                <div class="block w-full h-full py-5 text-center">
                    <span class="text-3xl text-gray-900 lg:text-7xl md:text-3xl faction_header">
                        Latest Tacticas
                    </span>
                </div>
                <div class="container grid lg:grid-cols-3 xl:grid-cols-4">
                    @foreach ($results as $tactica)
                        <div class="p-2 my-1 text-center bg-gray-200 border-2 border-black rounded">
                            <div><a class="text-lg font-bold text-gray-900 hover:underline hover:text-gray-500 active:outline-none"
                                    href="{{ route('tactica.view', $tactica->slug) }}">{{ $tactica->name }}</a>
                            </div>
                            <div class="text-sm italic">
                                Submitted By {{ $tactica->author }}
                            </div>
                            @if ($tactica->summary)
                                <div class="block my-3 border-b border-gray-400 border-dashed"></div>
                                <div>
                                    {{ $tactica->summary }}
                                </div>
                            @endif
                            <div class="block my-3 border-b border-gray-400 border-dashed"></div>
                            <div class="mb-2">
                                <span class="font-bold">Tags:</span>
                                @if ($tactica->keyword)
                                    <div class="inline-block my-1 text-center"><a
                                            href="{{ route('keyword.view', $tactica->keyword->slug) }}"
                                            class="inline-block p-1 px-2 py-1 text-sm font-bold text-center text-white bg-gray-900 rounded-full ">{{ strtoupper($tactica->keyword->name) }}</a>
                                    </div>
                                @endif
                                @if ($tactica->faction)
                                    <div class="inline-block my-1 text-center"><a
                                            href="{{ route('faction.view', $tactica->faction->slug) }}"
                                            class="inline-block p-1 px-2 py-1 text-sm font-bold text-center text-white bg-{{ $tactica->faction->bg_color }} rounded-full ">{{ strtoupper($tactica->faction->name) }}</a>
                                    </div>
                                @endif
                                @if ($tactica->mini)
                                    <div class="inline-block my-1 text-center"><a
                                            href="{{ route('character.view', $tactica->mini->slug) }}"
                                            class="inline-block p-1 px-2 py-1 text-sm font-bold text-center text-white bg-gray-900 rounded-full ">{{ strtoupper($tactica->mini->name) }}</a>
                                    </div>
                                @endif
                                @if ($tactica->upgrade)
                                    <div class="inline-block my-1 text-center"><a
                                            href="{{ route('upgrade.view', $tactica->upgrade->slug) }}"
                                            class="inline-block p-1 px-2 py-1 text-sm font-bold text-center text-white bg-gray-900 rounded-full ">{{ strtoupper($tactica->upgrade->name) }}</a>
                                    </div>
                                @endif
                                @if ($tactica->scheme)
                                    <div class="inline-block my-1 text-center"><a href="{{ route('schemes') }}"
                                            class="inline-block p-1 px-2 py-1 text-sm font-bold text-center text-white bg-gray-900 rounded-full ">{{ strtoupper($tactica->scheme->name) }}</a>
                                    </div>
                                @endif
                                @if ($tactica->strategy)
                                    <div class="inline-block my-1 text-center"><a href="{{ route('schemes') }}"
                                            class="inline-block p-1 px-2 py-1 text-sm font-bold text-center text-white bg-gray-900 rounded-full ">{{ strtoupper($tactica->strategy->name) }}</a>
                                    </div>
                                @endif
                            </div>

                        </div>
                    @endforeach
                </div>
            @elseif ($results)
                <div class="container mx-auto mb-2 text-center">
                    <div class="block w-full h-full py-2 text-center">
                        <span class="text-4xl text-gray-900 lg:text-6xl faction_header">
                            Results
                        </span>
                    </div>
                </div>
                <div class="text-2xl text-center"><span class="font-bold">Total:</span> {{ count($results) }}
                    Tacticas
                </div>
                <div class="container grid lg:grid-cols-3 xl:grid-cols-4">
                    @foreach ($results as $tactica)
                        <div class="p-2 my-1 text-center bg-gray-200 border-2 border-black rounded">
                            <div><a class="text-lg font-bold text-gray-900 hover:underline hover:text-gray-500 active:outline-none"
                                    href="{{ route('tactica.view', $tactica->slug) }}">{{ $tactica->name }}</a>
                            </div>
                            <div class="text-sm italic">
                                Submitted By {{ $tactica->author }}
                            </div>
                            @if ($tactica->summary)
                                <div class="block my-3 border-b border-gray-400 border-dashed"></div>
                                <div>
                                    {{ $tactica->summary }}
                                </div>
                            @endif
                            <div class="block my-3 border-b border-gray-400 border-dashed"></div>
                            <div class="mb-2">
                                <span class="font-bold">Tags:</span>
                                @if ($tactica->keyword)
                                    <div class="inline-block my-1 text-center"><a
                                            href="{{ route('keyword.view', $tactica->keyword->slug) }}"
                                            class="inline-block p-1 px-2 py-1 text-sm font-bold text-center text-white bg-gray-900 rounded-full ">{{ strtoupper($tactica->keyword->name) }}</a>
                                    </div>
                                @endif
                                @if ($tactica->faction)
                                    <div class="inline-block my-1 text-center"><a
                                            href="{{ route('faction.view', $tactica->faction->slug) }}"
                                            class="inline-block p-1 px-2 py-1 text-sm font-bold text-center text-white bg-{{ $tactica->faction->bg_color }} rounded-full ">{{ strtoupper($tactica->faction->name) }}</a>
                                    </div>
                                @endif
                                @if ($tactica->mini)
                                    <div class="inline-block my-1 text-center"><a
                                            href="{{ route('character.view', $tactica->mini->slug) }}"
                                            class="inline-block p-1 px-2 py-1 text-sm font-bold text-center text-white bg-gray-900 rounded-full ">{{ strtoupper($tactica->mini->name) }}</a>
                                    </div>
                                @endif
                                @if ($tactica->upgrade)
                                    <div class="inline-block my-1 text-center"><a
                                            href="{{ route('upgrade.view', $tactica->upgrade->slug) }}"
                                            class="inline-block p-1 px-2 py-1 text-sm font-bold text-center text-white bg-gray-900 rounded-full ">{{ strtoupper($tactica->upgrade->name) }}</a>
                                    </div>
                                @endif
                                @if ($tactica->scheme)
                                    <div class="inline-block my-1 text-center"><a href="{{ route('schemes') }}"
                                            class="inline-block p-1 px-2 py-1 text-sm font-bold text-center text-white bg-gray-900 rounded-full ">{{ strtoupper($tactica->scheme->name) }}</a>
                                    </div>
                                @endif
                                @if ($tactica->strategy)
                                    <div class="inline-block my-1 text-center"><a href="{{ route('schemes') }}"
                                            class="inline-block p-1 px-2 py-1 text-sm font-bold text-center text-white bg-gray-900 rounded-full ">{{ strtoupper($tactica->strategy->name) }}</a>
                                    </div>
                                @endif
                            </div>

                        </div>
                    @endforeach
                </div>
            @endif

        </div>
    </div>
</div>
