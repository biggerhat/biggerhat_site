@section('title')
    - Encylcopedia Malifauxica
@endsection

<div>
    <div class="container mx-auto p-2">
        <div class="block w-full h-full py-5 text-center">
            <span class="text-4xl text-gray-900 lg:text-7xl md:text-5xl faction_header">
                Encyclopedia Malifauxica
            </span>
            <span class="text-md font-italic block">Courtesy of <a href="https://www.youtube.com/c/MalifauxUniversity" target="_blank">Malifaux University</a></span>
        </div>
        <div class="grid grid-cols-7 w-full">
            <div class="grid lg:col-start-2 lg:col-span-5 col-span-7 bg-gray-300 rounded mx-2 p-6 border-gray-900 border border-t-4 border-b-4">
                <p style="text-indent: 1.5rem">Lorum ipsum test description. Lorum ipsum test description. Lorum ipsum
                    test description. Lorum ipsum test description.
                    Lorum ipsum test description. Lorum ipsum test description. Lorum ipsum test description. Lorum
                    ipsum test description. Lorum ipsum test description.
                    Lorum ipsum test description. Lorum ipsum test description. Lorum ipsum test description. Lorum
                    ipsum test description. Lorum ipsum test description.
                    Lorum ipsum test description. Lorum ipsum test description. Lorum ipsum test description. Lorum
                    ipsum test description. Lorum ipsum test description.
                    Lorum ipsum test description. Lorum ipsum test description. Lorum ipsum test description. Lorum
                    ipsum test description. Lorum ipsum test description.
                    Lorum ipsum test description. Lorum ipsum test description. Lorum ipsum test description. Lorum
                    ipsum test description. Lorum ipsum test description.
                </p>
            </div>
        </div>
        <div class="container mt-6 shadow lg:w-3/4 mx-auto">
            <div class="flex w-full flex-grow">
                @foreach($loreTopicTypes as $topicType)
                    <button
                        class="flex flex-grow items-center h-12 px-2 py-2 text-sm text-center border-gray-900 bg-transparent sm:text-base dark:border-gray-500 dark:text-white whitespace-nowrap focus:outline-none border rounded-t-md @if($activeTab == $topicType->id) border-b-0 text-gray-900 bg-gray-300 border-t-4 @else text-gray-200 cursor-base bg-gray-500 @endif"
                        wire:click="changeTab({{ $topicType->id }})"
                    >
                        {{ $topicType->name }}
                    </button>
                @endforeach
            </div>
            <div class="border-b-4 border-l border-r rounded-b border-gray-900 bg-gray-300">
                <div class="container p-2">
                    <div class="flex w-full flex-grow text-center items-center">
                        @foreach($selections as $selection)
                            <div class="flex flex-grow">
                                <a href="#{{ $selection }}"
                                   class="w-full text-center underline hover:text-blue-800">{{ $selection }}</a>
                            </div>
                        @endforeach
                    </div>
                </div>
                @foreach($selections as $selection)
                    <div class="px-2 text-2xl mt-2"><a id="{{ $selection }}">{{ $selection }}</a></div>
                    <div class="block border-b border-gray-400 border-dashed"></div>
                    @foreach($sortedTopics[$selection] ?? [] as $topic)
                        <a href="{{ route("lore.entry", $topic["slug"]) }}" class="block hover:bg-gray-500 hover:text-white px-2 py-1">{{ $topic["title"] }}</a>
                    @endforeach
                @endforeach
            </div>
        </div>
    </div>
</div>
