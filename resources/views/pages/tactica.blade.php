@extends('main')

@section('title')
    - {{ $tactica->name }}
@endsection

@section('content')
    <div class="container mx-auto mb-2 text-center">
        <div class="block w-full h-full py-5 text-center">
            <span class="block text-3xl text-gray-900 lg:text-5xl faction_header">
                {{ $tactica->name }}
            </span>
            <span class="text-sm italic">Submitted By {{ $tactica->author }}</span>
        </div>
    </div>
    <div class="block my-3 border-b border-gray-400 border-dashed"></div>
    <div class="container grid px-2 mx-auto lg:grid-cols-5">
        <div class="text-lg lg:col-start-2 lg:col-span-3">
            {!! fauxdown(nl2br($tactica->description)) !!}
        </div>
    </div>
    <div class="block my-3 border-b border-gray-400 border-dashed"></div>
    <div class="block w-full h-full py-5 text-center">
        <span class="block text-3xl text-gray-900 lg:text-4xl faction_header">
            Tags
        </span>
    </div>
    <div class="container grid px-2 mx-auto">
        @if ($tactica->keyword)
            <div class="inline-block my-1 text-center"><a href="{{ route('keyword.view', $tactica->keyword->slug) }}"
                    class="inline-block p-1 px-2 py-1 text-sm font-bold text-center text-white bg-gray-900 rounded-full ">{{ strtoupper($tactica->keyword->name) }}</a>
            </div>
        @endif
        @if ($tactica->faction)
            <div class="inline-block my-1 text-center"><a href="{{ route('faction.view', $tactica->faction->slug) }}"
                    class="inline-block p-1 px-2 py-1 text-sm font-bold text-center text-white bg-{{ $tactica->faction->bg_color }} rounded-full ">{{ strtoupper($tactica->faction->name) }}</a>
            </div>
        @endif
        @if ($tactica->mini)
            <div class="inline-block my-1 text-center"><a href="{{ route('character.view', $tactica->mini->slug) }}"
                    class="inline-block p-1 px-2 py-1 text-sm font-bold text-center text-white bg-gray-900 rounded-full ">{{ strtoupper($tactica->mini->name) }}</a>
            </div>
        @endif
        @if ($tactica->upgrade)
            <div class="inline-block my-1 text-center"><a href="{{ route('upgrade.view', $tactica->upgrade->slug) }}"
                    class="inline-block p-1 px-2 py-1 text-sm font-bold text-center text-white bg-gray-900 rounded-full ">{{ strtoupper($tactica->upgrade->name) }}</a>
            </div>
        @endif
        @if ($tactica->scheme)
            <div class="inline-block my-1 text-center"><a href="{{ route('schemes') }}"
                    class="inline-block p-1 px-2 py-1 text-sm font-bold text-center text-white bg-gray-900 rounded-full ">{{ strtoupper($tactica->scheme->name) }}</a>
            </div>
        @endif
        @if ($tactica->strategy)
            <div class="inline-block my-1 text-center"><a href="{{ route('schemes') }}"
                    class="inline-block p-1 px-2 py-1 text-sm font-bold text-center text-white bg-gray-900 rounded-full ">{{ strtoupper($tactica->strategy->name) }}</a>
            </div>
        @endif
    </div>

@endsection
