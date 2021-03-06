<div>
    <div class="container mx-auto">
        <div class="block w-full h-full py-5 text-center">
            <span class="text-4xl text-gray-900 lg:text-7xl md:text-5xl faction_header">
                Boxes
            </span>
        </div>
    </div>

    <div class="block my-3 border-b border-gray-400 border-dashed"></div>

    <div class="container grid mx-auto lg:grid-cols-2">
        <div class="block w-full h-full py-5 text-center lg:col-span-2 ">
            <span class="inline-block mb-2 text-3xl text-gray-900 lg:text-5xl md:text-4xl faction_header">
                {{ $box->name }}
            </span>
        </div>
        <div class="px-2 text-center">
            <img src="\storage\{{ $box->front }}" class="mx-auto mb-2 border border-black rounded" />
        </div>
        <div class="px-2 text-center">
            <img src="\storage\{{ $box->back }}" class="mx-auto border border-black rounded" />
        </div>
    </div>

    @if ($box->keywords->count() > 0)
        <div class="block my-3 border-b border-gray-400 border-dashed"></div>

        <div class="container grid grid-cols-1 mx-auto lg:grid-cols-{{ $box->keywords->count() }}">
            <div class="block w-full h-full col-span-1 py-5 text-center lg:col-span-{{ $box->keywords->count() }}">
                <span class="text-4xl text-transparent text-gray-900 lg:text-5xl md:text-4xl faction_header">
                    Keywords
                </span>
            </div>
            @foreach ($box->keywords as $keyword)
                <div class="text-center">
                    <a href="{{ route('keyword.view', $keyword->slug) }}"
                        class="inline-block text-center p-0.5 border border-black text-white rounded-full bg-gray-900 px-2 py-1 font-bold mb-1 cursor-pointer">{{ strtoupper($keyword->name) }}</a>
                </div>
            @endforeach
        </div>
    @endif

    <div class="block my-3 border-b border-gray-400 border-dashed"></div>

    <div class="container grid grid-cols-1 mx-auto lg:grid-cols-3">
        <div class="block w-full h-full col-span-1 py-5 text-center lg:col-span-3">
            <span class="text-4xl text-transparent text-gray-900 lg:text-5xl md:text-4xl faction_header">
                Models Inside
            </span>
        </div>
        @foreach ($box->minis as $miniListed)
            <div class="text-center">
                <a href="{{ route('character.view', $miniListed->slug) }}"
                    class="inline-block text-center p-0.5 text-white border border-black rounded-full {{ $this->getBackground($miniListed) }} px-2 py-1 font-bold mb-1 cursor-pointer">{{ strtoupper($miniListed->name) }}</a>
            </div>
        @endforeach


    </div>

    @if ($box->instructions->count() > 0)
        <div class="block my-3 border-b border-gray-400 border-dashed"></div>

        <div class="container grid grid-cols-1 mx-auto lg:grid-cols-{{ $box->instructions->count() }}">
            <div
                class="block w-full h-full col-span-1 py-5 text-center lg:col-span-{{ $box->instructions->count() }}">
                <span class="text-4xl text-transparent text-gray-900 lg:text-5xl md:text-4xl faction_header">
                    Blueprints
                </span>
            </div>
            @foreach ($box->instructions as $blueprint)
                <div class="px-2 text-center">
                    <img src="/storage/{{ $blueprint->image }}" class="mx-auto mb-2 border border-gray-500 rounded">
                </div>
            @endforeach
        </div>
    @endif
</div>
