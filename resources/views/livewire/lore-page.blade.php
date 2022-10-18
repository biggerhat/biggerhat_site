@section('title')
    - Encylcopedia Malifauxica
@endsection

<div>
    <div class="container mx-auto p-2">
        <div class="block w-full h-full py-5 text-center">
            <span class="text-4xl text-gray-900 lg:text-7xl md:text-5xl faction_header">
                Encyclopedia Malifauxica
            </span>
            <span class="text-md font-italic block">Courtesy of <a href="https://www.youtube.com/c/MalifauxUniversity" class="underline hover:text-blue-600" target="_blank">Malifaux University</a></span>
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
        <div class="container mt-6 shadow xl:w-3/4 mx-auto">
            <div class="lg:flex lg:w-full lg:flex-grow hidden">
                @foreach($loreTopicTypes as $topicType)
                    <button
                        class="flex flex-grow items-center h-12 px-2 py-2 text-sm text-center border-gray-900 bg-transparent sm:text-base dark:border-gray-500 dark:text-white whitespace-nowrap focus:outline-none border rounded-t-md @if($activeTab == $topicType->id) border-b-0 text-gray-900 bg-gray-300 border-t-4 @else text-gray-200 cursor-base bg-gray-500 @endif"
                        wire:click="changeTab({{ $topicType->id }})"
                    >
                        {{ $topicType->name }}
                    </button>
                @endforeach
            </div>
            <div class="border-b-4 border-l border-r rounded-b border-gray-900 bg-gray-300 border-t-4 rounded-t lg:border-t-0 lg:rounded-t-none">
                <div class="container p-2 block lg:hidden">
                    <select name="topic_types" wire:model="activeTab" wire:change="selectChangeTab"
                            class="block w-full p-2 px-2 py-2 mx-auto bg-gray-200 border-2 border-gray-900 rounded shadow hover:border-gray-500 focus:outline-none focus:shadow-outline">
                        @foreach($loreTopicTypes as $topicType)
                            <option value="{{ $topicType->id }}">{{ $topicType->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="container p-2">
                    <div class="flex w-full flex-grow text-center items-center">
                        @foreach($selections as $selection)
                            @if (isset($sortedTopics[$selection]))
                                <div class="flex flex-grow">
                                    <a href="#{{ $selection }}"
                                       class="w-full text-center underline hover:text-blue-800">{{ $selection }}</a>
                                </div>
                            @else
                                <div class="flex flex-grow">
                                    <span class="w-full text-center">{{ $selection }}</span>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
                @foreach($selections as $selection)
                    @if (isset($sortedTopics[$selection]))
                        <div class="px-2 text-2xl mt-2"><a id="{{ $selection }}">{{ $selection }}</a></div>
                        <div class="block border-b border-gray-400 border-dashed"></div>
                        @foreach($sortedTopics[$selection] ?? [] as $topic)
                            <div>
                                <span class="block px-2 py-1 w-full hover:bg-gray-500 hover:text-white cursor-pointer" wire:click="getEntryList({{ $topic }})">{{ $topic["name"] }}</span>
                            </div>
                        @endforeach
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</div>
