@section('title')
    - Encylcopedia Malifauxica - {{ $loreEntry->title }}
@endsection

<div>
    <div class="container mx-auto p-2">
        <div class="block w-full h-full py-5 text-center">
            <span class="text-4xl text-gray-900 lg:text-7xl md:text-5xl faction_header">
                {{ $loreEntry->title }}
            </span>
        </div>
        <div class="grid grid-cols-7 w-full">
            <div class="grid lg:col-start-2 lg:col-span-5 col-span-7 bg-gray-300 rounded mx-2 p-6 border-gray-900 border border-t-4 border-b-4">
                <p style="text-indent: 1.5rem">
                    {{ $loreEntry->entry }}
                </p>
            </div>
        </div>
        <div class="grid grid-cols-8 w-full mt-4 auto-cols-fr gap-0.5">
            <div class="lg:col-start-2 lg:col-span-3 col-span-8">
                <div
                    class="block p-1 text-xl font-medium text-white border-b border-gray-900 border-t-4 border-l border-r rounded-t bg-gray-900">
                    Related Entries
                </div>
                <div class="py-2 border-b-4 border-gray-900 border-l border-r rounded-b bg-gray-300 mb-2">
                    @foreach($relatedEntries as $entry)
                        <a href="{{ route("lore.entry", $entry->slug) }}" class="block hover:bg-gray-500 hover:text-white px-2 py-1">{{ $entry->title }}</a>
                    @endforeach
                </div>
            </div>
            <div class="lg:col-start-5 lg:col-span-3 col-span-8">
                <div
                    class="block p-1 text-xl font-medium text-white border-b border-gray-900 border-t-4 border-l border-r rounded-t bg-gray-900">
                    Related Topics
                </div>
                <div class="py-2 border-b-4 border-gray-900 border-l border-r rounded-b bg-gray-300 mb-2">
                    @foreach($loreEntry->loreTopics as $topic)
                        @if ($topic->name !== $loreEntry->title)
                            <a href="#" class="block hover:bg-gray-500 hover:text-white px-2 py-1">{{ $topic->name }}</a>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
        <div class="grid grid-cols-7 w-full mt-4">
            <div class="grid lg:col-start-2 lg:col-span-5 col-span-7 mx-2">
                <div
                    class="block p-1 text-xl font-medium text-white border-b border-gray-900 border-t-4 border-l border-r rounded-t bg-gray-900">
                    Resources
                </div>
                <div class="py-2 border-b-4 border-gray-900 border-l border-r rounded-b bg-gray-300 mb-2">
                    @foreach($loreEntry->loreSources as $source)
                        @if (isset($source->link))
                            <a href="{{ $source->link }}" target="_blank" class="block hover:bg-gray-500 hover:text-white px-2 py-1">{{ $source->title }}</a>
                        @else
                            <div class="block hover:bg-gray-500 hover:text-white px-2 py-1">{{ $source->title }}</div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
