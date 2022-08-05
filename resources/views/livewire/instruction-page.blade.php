@section('title')
    - Blueprints - {{ $mini->name }}
@endsection

<div>
    <div class="container mx-auto">
        <div class="block w-full h-full py-5 text-center">
            <span class="text-4xl text-gray-900 lg:text-7xl md:text-5xl faction_header">
                Blueprints
            </span>
        </div>
    </div>

    <div class="block my-3 border-b border-gray-500 border-dashed"></div>

    <div class="container mx-auto">
        <div class="block w-full h-full py-5 text-center">
            <span
                class="inline-block text-transparent lg:text-5xl md:text-4xl text-3xl mb-2 bg-clip-text {{ $background }} faction_header">
                {{ $mini->name }}
            </span>
        </div>
        <img src="\storage\{{ $instruction->image }}" class="px-2 mx-auto rounded-lg" />
    </div>

    <div class="block my-3 border-b border-gray-500 border-dashed"></div>

    <div class="container grid grid-cols-1 mx-auto lg:grid-cols-3">
        <div class="block w-full h-full col-span-1 py-5 text-center lg:col-span-3">
            <span class="text-4xl text-transparent text-gray-900 lg:text-6xl md:text-4xl faction_header">
                Models Listed
            </span>
        </div>
        @foreach ($instruction->minis as $miniListed)
            <div class="text-center">
                <a href="{{ route('character.view', $miniListed->slug) }}"
                    class="inline-block text-center p-0.5 text-white border border-black rounded-full @if ($miniListed->id == $mini->id) bg-gray-900 @else
                    {{ $this->getBackground($miniListed) }} @endif
                    px-2 py-1 font-bold mb-1 cursor-pointer">{{ strtoupper($miniListed->name) }}</a>
            </div>
        @endforeach


    </div>
</div>
