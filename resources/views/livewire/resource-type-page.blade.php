@section('title')
    - {{ $resourceType->name }}
@endsection

<div>
    <div class="container mx-auto mb-2 text-center">
        <div class="block w-full h-full py-5 text-center">
            <span class="text-6xl text-gray-900 lg:text-8xl md:text-7xl faction_header">
                {{ $resourceType->name }}
            </span>
        </div>
    </div>
    <div class="container grid gap-0 mx-auto lg:grid-cols-3 auto-cols-fr lg:gap-2">
        @foreach ($resourceType->resources as $resource)
            <div class="block px-2 mb-2 text-center lg:px-0">
                <div class="block w-full p-2 border-2 border-gray-900 rounded active:outline-none"
                    href="{{ route('keywords') }}">
                    <div class="block w-full h-full py-2 text-center">
                        <span class="text-3xl text-transparent text-gray-900 lg:text-4xl faction_header">
                            {{ $resource->name }}
                        </span>
                    </div>
                    <img src="\storage\{{ $resource->logo }}" class="mx-auto rounded-lg" />
                    <div class="block my-2 italic">
                        {!! nl2br($resource->description) !!}
                    </div>
                    <div class="p-2">
                        @if ($resourceType->is_direct_link)
                            <a class="inline-block px-5 py-2 mx-auto my-2 font-bold text-white bg-gray-900 border-2 border-black rounded active:outline-none"
                                href="{{ $resource->link }}" target="_{{ $resourceType->name }}">Visit
                                {{ $resource->name }}</a>
                        @else
                            <a class="inline-block px-5 py-2 mx-auto my-2 font-bold text-white bg-gray-900 border-2 border-black rounded active:outline-none"
                                href="{{ route('resource.view', $resource->slug) }}">View {{ $resource->name }}</a>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach

    </div>

</div>
