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
            {{ $resource->description }}
        </div>
        <div class="pt-5 mx-auto">
            <a href="{{ $resource->link }}" alt="{{ $resource->name }} " class="inline-block active:outline-none"
                target="{{ $resource->slug }}">
                <img src="\storage\{{ $resource->logo }}" class="mx-auto rounded-lg" />
            </a>
        </div>
        <div class="text-xl">
            <a href="{{ $resource->link }}" alt="{{ $resource->name }} "
                class="active:outline-none hover:text-gray-900 hover:underline"
                target="{{ $resource->slug }}">{{ $resource->link }}</a>
        </div>

        <div class="block my-3 border-b border-gray-400 border-dashed"></div>

        <div class="block w-full h-full py-3 text-center">
            <span class="text-2xl text-gray-900 lg:text-4xl faction_header">
                Episodes
            </span>
        </div>
        <div>
            @foreach ($resource->episodes as $episode)
                <a href="{{ $episode->link }}" class="inline-block hover:underline"
                    target="_{{ $resource->slug }}">
                    <div class="inline-block bg-gray-900 rounded-full">
                        {!! $episode->type->icon !!}
                    </div>
                    {{ $episode->name }}
                </a>
                <div class="mb-2">
                    <span class="font-bold">Tags:</span>
                    @foreach ($episode->factions as $faction)
                        <div class="inline-block text-center"><a href="/factions/{{ $faction->slug }}"
                                class="inline-block text-center p-1 text-white rounded-full bg-{{ $faction->bg_color }} px-2 py-1 text-sm font-bold ">{{ strtoupper($faction->name) }}</a>
                        </div>
                    @endforeach
                    @foreach ($episode->keywords as $keyword)
                        <div class="inline-block text-center"><a href="/keywords/{{ $keyword }}"
                                class="inline-block p-1 px-2 py-1 text-sm font-bold text-center text-white bg-gray-900 rounded-full ">{{ strtoupper($keyword->name) }}</a>
                        </div>
                    @endforeach
                    @foreach ($episode->minis as $mini)
                        <div class="inline-block text-center"><a href="/characters/{{ $mini->slug }}"
                                class="inline-block p-1 px-2 py-1 text-sm font-bold text-center text-white bg-gray-900 rounded-full ">{{ strtoupper($mini->name) }}</a>
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>
