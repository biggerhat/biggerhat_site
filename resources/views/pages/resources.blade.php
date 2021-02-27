@extends('main')

@section('title')
    - Resources
@endsection

@section('content')
    <div class="container mx-auto mb-2 text-center">
        <div class="block w-full h-full py-5 text-center">
            <span class="text-6xl text-gray-900 lg:text-8xl md:text-7xl faction_header">
                Resources
            </span>
        </div>
    </div>
    <div class="block my-3 border-b border-gray-400 border-dashed"></div>

    <div class="container grid gap-0 mx-auto lg:grid-cols-3 auto-cols-fr lg:gap-2">
        @foreach ($resources as $resource)
            <div class="block px-2 mb-2 text-center lg:px-0">
                <div class="block w-full p-2 border-2 border-gray-900 rounded active:outline-none"
                    href="{{ route('keywords') }}">
                    <div class="block w-full h-full py-2 text-center">
                        <span class="text-3xl text-transparent text-gray-900 lg:text-4xl faction_header">
                            {{ $resource->name }}
                        </span>
                    </div>
                    {!! $resource->icon_large !!}
                    <div class="block italic">
                        {{ $resource->description }}
                    </div>
                    <button
                        class="px-5 py-2 mx-auto my-2 font-bold text-white bg-gray-900 border-2 border-black rounded active:outline-none"
                        href="{{ route('resourcetype.view', $resource->slug) }}">View {{ $resource->name }}</button>
                </div>
            </div>
        @endforeach

    </div>

@endsection
