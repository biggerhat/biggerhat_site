<div>
    <div class="container mx-auto">
        <div class="block w-full h-full py-5 text-center">
            <span class="text-4xl text-gray-900 lg:text-6xl md:text-4xl faction_header">
                {{ $mini->name }}
            </span>
        </div>
        <img src="\storage\{{ $instruction->image }}" class="px-2 mx-auto rounded-lg" />
    </div>

    <div class="block my-3 border-b border-gray-400 border-dashed"></div>
    <div class="container grid grid-cols-1 mx-auto lg:grid-cols-3">
        <div class="block w-full h-full col-span-1 py-5 text-center lg:col-span-3">
            <span class="text-4xl text-transparent text-gray-900 lg:text-6xl md:text-4xl faction_header">
                Models Listed
            </span>
        </div>
        @foreach ($instruction->minis as $miniListed)
            <div class="text-center">
                <a href="{{ route('character.view', $miniListed->slug) }}"
                    class="inline-block text-center p-0.5 text-white rounded-full @if ($miniListed->id == $mini->id) bg-gray-600 @else bg-gray-900 @endif
                    px-2 py-1 font-bold mb-1 cursor-pointer">{{ strtoupper($miniListed->name) }}</a>
            </div>
        @endforeach


    </div>
</div>
