@section('title')
    - {{ $resource->name }}
@endsection

<div>
    <div class="container mx-auto mb-2 text-center">
        <div class="block w-full h-full pt-5 text-center">
            <span class="text-4xl text-gray-900 lg:text-6xl faction_header">
                {{ $resource->name }}
            </span>

        </div>
        <div class="mx-auto italic text-center">
            {!! nl2br($resource->description) !!}
        </div>
        <div class="pt-5 mx-auto">
            <a href="{{ $resource->link }}" alt="{{ $resource->name }} " class="inline-block active:outline-none"
                target="{{ $resource->slug }}">
                <img src="\storage\{{ $resource->logo }}" class="px-2 mx-auto rounded-lg lg:max-w-xl lg:max-h-xl" />
            </a>
        </div>
        <div class="text-xl">
            <a href="{{ $resource->link }}" alt="{{ $resource->name }} "
                class="active:outline-none hover:text-gray-900 hover:underline" target="{{ $resource->slug }}">Click
                Here to Visit {{ $resource->name }}</a>
        </div>

        @if (count($types) > 1)
            <div class="block my-3 border-b border-gray-400 border-dashed"></div>
            <div class="block w-full h-full py-3 text-center">
                <span class="text-2xl text-gray-900 lg:text-3xl faction_header">
                    Episode Filters
                </span>
            </div>
            <div class="my-4 text-center">
                <select name="characteristic" wire:model="type" wire:change="filterCheck()"
                    class="block w-40 p-2 px-2 py-2 mx-auto leading-loose bg-gray-200 border border-gray-900 rounded shadow hover:border-gray-500 focus:outline-none focus:shadow-outline">
                    <option value=''>Episode Types</option>
                    @foreach ($types as $aType)
                        <option value="{{ $aType->slug }}">{{ $aType->name }}</option>
                    @endforeach
                </select>
                @if ($type)
                    <span class="inline-block p-2 mx-auto font-bold cursor-pointer" wire:click="clearFilters()">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="inline-block"
                            style="height: 25px; width: 25px;">
                            <g class="" transform="translate(0,0)" style="">
                                <path
                                    d="M256 16C123.45 16 16 123.45 16 256s107.45 240 240 240 240-107.45 240-240S388.55 16 256 16zm0 60c99.41 0 180 80.59 180 180s-80.59 180-180 180S76 355.41 76 256 156.59 76 256 76zm-80.625 60c-.97-.005-2.006.112-3.063.313v-.032c-18.297 3.436-45.264 34.743-33.375 46.626l73.157 73.125-73.156 73.126c-14.63 14.625 29.275 58.534 43.906 43.906L256 299.906l73.156 73.156c14.63 14.628 58.537-29.28 43.906-43.906l-73.156-73.125 73.156-73.124c14.63-14.625-29.275-58.5-43.906-43.875L256 212.157l-73.156-73.125c-2.06-2.046-4.56-3.015-7.47-3.03z"
                                    fill="#000000" fill-opacity="1"
                                    transform="translate(25.6, 25.6) scale(0.9, 0.9) rotate(0, 256, 256) skewX(0) skewY(0)">
                                </path>
                            </g>
                        </svg> Clear
                    </span>
                @endif
            </div>

        @endif

        <div class="block my-3 border-b border-gray-400 border-dashed"></div>

        <div class="block w-full h-full py-3 text-center">
            <span class="text-2xl text-gray-900 lg:text-4xl faction_header">
                Episodes
            </span>
        </div>
        <div>
            <div class="container grid gap-0 mx-auto lg:grid-cols-3 auto-cols-fr lg:gap-2">
                @foreach ($episodes as $episode)
                    <div class="block px-2 mb-2 text-center lg:px-0">
                        <div class="block w-full p-2 border-2 border-gray-900 rounded">
                            <a href="{{ $episode->link }}" class="inline-block font-bold hover:underline"
                                target="_{{ $resource->slug }}">
                                <div>
                                    {!! $episode->type->icon_large !!}
                                </div>
                                {{ $episode->name }}
                            </a>
                            <div class="block my-3 border-b border-gray-400 border-dashed"></div>
                            @if ($episode->description)
                                <div class="block italic">
                                    {{ $episode->description }}
                                </div>
                                <div class="block my-3 border-b border-gray-400 border-dashed"></div>
                            @endif
                            <div class="mb-2">
                                <span class="font-bold">Tags:</span>
                                @foreach ($episode->factions as $faction)
                                    <div class="inline-block my-1 text-center"><a
                                            href="/factions/{{ $faction->slug }}"
                                            class="inline-block text-center p-1 text-white rounded-full bg-{{ $faction->bg_color }} px-2 py-1 text-sm font-bold ">{{ strtoupper($faction->name) }}</a>
                                    </div>
                                @endforeach
                                @foreach ($episode->keywords as $keyword)
                                    <div class="inline-block my-1 text-center"><a
                                            href="/keywords/{{ $keyword->name }}"
                                            class="inline-block p-1 px-2 py-1 text-sm font-bold text-center text-white bg-gray-900 rounded-full ">{{ strtoupper($keyword->name) }}</a>
                                    </div>
                                @endforeach
                                @foreach ($episode->minis as $mini)
                                    <div class="inline-block my-1 text-center"><a
                                            href="/characters/{{ $mini->slug }}"
                                            class="inline-block p-1 px-2 py-1 text-sm font-bold text-center text-white bg-gray-900 rounded-full ">{{ strtoupper($mini->name) }}</a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>





                @endforeach
            </div>
        </div>
    </div>
